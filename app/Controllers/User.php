<?php

namespace App\Controllers;

use App\Models\ModelMenu;
use App\Models\ModelTable;
use App\Models\ModelPesanan;

class User extends BaseController
{
    public function menu()
    {
        $menuModel = new ModelMenu();
        // Ambil data menu berdasarkan kategori
        $data['sushiMenus'] = $menuModel->where('kategori', 'Sushi')->findAll();
        $data['sashimiMenus'] = $menuModel->where('kategori', 'Sashimi')->findAll();
        $data['chinmiMenus'] = $menuModel->where('kategori', 'Chinmi')->findAll();
        $data['udonMenus'] = $menuModel->where('kategori', 'Udon')->findAll();
        $data['drinksMenus'] = $menuModel->where('kategori', 'Drinks')->findAll();

        return view('user/Uboard', $data);
    }

    public function selectTable()
    {
        $tableModel = new ModelTable();

        // Get inactive tables
        $inactiveTables = $tableModel->where('status', 'inactive')->findAll();

        if (empty($inactiveTables)) {
            $data['message'] = 'Meja Penuh'; // Set message when no inactive tables available
        } else {
            $data['tables'] = $inactiveTables;
        }
        return view('user/Pilihmeja', $data);
    }

    public function placeOrder()
    {
        $tableNumber = $this->request->getPost('table_number');
        $namaPembeli = $this->request->getPost('nama_pembeli');
        $tableModel = new ModelTable();
        $tableModel->activateTable($tableNumber);

        $session = session();
        $session->set([
            'nama_pembeli' => $namaPembeli,
            'table_number' => $tableNumber
        ]);
        return redirect()->to('/pilihmenu');
    }


    public function AddselecteMenu()
    {
        $session = session();
        $namaPembeli = $session->get('nama_pembeli');
        $tableNumber = $session->get('table_number');
        $menuModel = new ModelMenu();
        $menuId = $this->request->getPost('id');
        $quantity = $this->request->getPost('quantity');

        // Mengambil data menu berdasarkan ID
        $menu = $menuModel->find($menuId);

        // Simpan data menu dan quantity ke dalam session keranjang
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$menuId])) {
            // Jika menu sudah ada dalam keranjang, tambahkan quantity
            $cart[$menuId]['jumlah'] += $quantity;
        } else {
            // Jika menu belum ada dalam keranjang, tambahkan data baru
            $cart[$menuId] = [
                'gambar' => $menu['gambar'],
                'nama_produk' => $menu['nama_produk'],
                'harga' => $menu['harga'],
                'jumlah' => $quantity,
            ];
        }

        // Simpan kembali session keranjang
        session()->set('cart', $cart);
        return redirect()->to('/uboard');
    }

    public function uboard()
    {
        $menuModel = new ModelMenu();

        // Mengambil data menu dari database
        $sushiMenus = $menuModel->findAll();

        // Menampilkan halaman Uboard.php dengan data menu
        return view('user/Uboard', ['sushiMenus' => $sushiMenus]);
    }

    public function ubayar()
    {
        // Mendapatkan data keranjang dari session
        $cart = session()->get('cart') ?? [];

        // Menghitung total harga
        $totalHarga = 0;
        foreach ($cart as $item) {
            $totalHarga += $item['harga'] * $item['jumlah'];
        }

        // Menampilkan halaman Ubayar.php dengan data keranjang dan total harga
        return view('user/Ubayar', ['orderItems' => $cart, 'totalHarga' => $totalHarga]);
    }

    public function removeFromCart($menuId)
    {
        // Menghapus item menu dari keranjang
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$menuId])) {
            unset($cart[$menuId]);
        }

        // Simpan kembali session keranjang
        session()->set('cart', $cart);

        return redirect()->to('/ubayar');
    }

    public function clearCart()
    {
        // Menghapus semua item dari keranjang
        session()->remove('cart');

        return redirect()->to('/pilihmenu');
    }

    public function checkout()
    {
        // Melakukan proses checkout
        // ...

        // Setelah proses checkout selesai, hapus data keranjang dari session
        session()->remove('cart');

        return redirect()->to('/uboard');
    }
    public function processPayment()
    {
        $namaPembeli = $this->request->getPost('nama_pembeli');
        $tableNumber = $this->request->getPost('table_number');
        $cart = session()->get('cart') ?? [];

        // Lakukan proses penyimpanan data ke database
        $modelPesanan = new ModelPesanan();
        $totalHarga = 0;

        foreach ($cart as $menuId => $item) {
            $namaProduk = $item['nama_produk'];
            $harga = $item['harga'];
            $jumlah = $item['jumlah'];

            $menuModel = new ModelMenu();
            $menu = $menuModel->find($menuId);
            $newStock = $menu['stok'] - $jumlah;
            $menuModel->update($menuId, ['stok' => $newStock]);
            // Hitung total harga
            $totalHarga += $harga * $jumlah;

            // Simpan data pesanan ke database
            $modelPesanan->insert([
                'nama_pembeli' => $namaPembeli,
                'table_number' => $tableNumber,
                'nama_produk' => $namaProduk,
                'harga' => $harga,
                'jumlah' => $jumlah
            ]);
        }

        // Simpan total harga ke database
        // ...

        // Setelah data disimpan ke database, hapus data keranjang dari session
        session()->remove('cart');

        // Redirect ke halaman Uboard atau halaman konfirmasi pembayaran
        return redirect()->to('/uboard');
    }
}
