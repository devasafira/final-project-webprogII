<?php

namespace App\Controllers;

use App\Models\ModelMenu;

class MenuAdmin extends BaseController
{
    private $menuModel;

    public function __construct()
    {
        $this->menuModel = new ModelMenu();
    }

    public function dashboard()
    {
        // Cek apakah pengguna sudah login
        if (!session('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }

        // Ambil data menu dari model
        $menus = $this->menuModel->findAll();

        // Kirim data menu ke view
        return view('admin/dashMenu', ['menus' => $menus]);
    }

    public function addMenu()
    {
        // Cek apakah pengguna sudah login
        if (!session('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }

        // Tampilkan halaman tambah menu
        return view('admin/addMenu');
    }

    public function saveMenu()
    {
        // Validasi data menu dari form
        $rules = [
            'kategori' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required|numeric',
            'gambar' => [
                'uploaded[gambar]',
                'mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'max_size[gambar,2048]'
            ]
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, tampilkan pesan kesalahan
            return redirect()->back()->withInput()->with('data tidak masuk', $this->validator->getErrors());
        }

        // Ambil data dari input form
        $kategori  = $this->request->getPost('kategori');
        $namaMenu = $this->request->getPost('nama_produk');
        $harga = $this->request->getPost('harga');
        $stok = $this->request->getPost('stok');
        $gambar = $this->request->getFile('gambar');

        // Pindahkan file gambar yang diunggah ke folder yang diinginkan
        $gambar->move(ROOTPATH . 'public/uploads');

        // Simpan data menu ke dalam database
        $data = [
            'kategori' => $kategori,
            'nama_produk' => $namaMenu,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar->getName()
        ];

        $this->menuModel->insert($data);

        // Redirect ke halaman yang sesuai setelah berhasil menyimpan menu
        return redirect()->to('/menuadmin')->with('success', 'Menu berhasil ditambahkan.');
    }
    public function pesanan()
    {
        // Cek apakah pengguna sudah login
        // if (!session('isLoggedIn')) {
        //     return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        // }

        // Tampilkan halaman pesanan
        $menus = $this->menuModel->findAll();

        return view('admin/dashPesanan', ['menus' => $menus]);
    }
    public function deleteMenu($id)
    {
        // Cek apakah pengguna sudah login
        if (!session('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }

        // Hapus menu berdasarkan ID
        $this->menuModel->deleteMenu($id);

        // Redirect kembali ke halaman menu setelah berhasil menghapus
        return redirect()->to('/menuadmin')->with('success', 'Menu berhasil dihapus.');
    }

    public function processDeleteMenu()
    {
        // Proses delete menu
        $selectedMenus = $this->request->getPost('selected_menus');

        if (!empty($selectedMenus)) {
            foreach ($selectedMenus as $menuId) {
                $this->menuModel->deleteMenu($menuId);
            }

            return redirect()->to('/menuadmin')->with('success', 'Selected menus deleted successfully');
        }

        return redirect()->to('/menuadmin')->with('error', 'No menus selected');
    }

    public function editMenu($id)
    {
        // Cek apakah pengguna sudah login
        if (!session('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }

        // Ambil data menu berdasarkan ID
        $menu = $this->menuModel->find($id);

        // Tampilkan halaman edit menu dengan data menu yang akan diedit
        return view('admin/editMenu', ['menu' => $menu]);
    }

    public function updateMenu($id)
    {
        // Validasi data menu dari form
        $rules = [
            'kategori' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, tampilkan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari input form
        $kategori  = $this->request->getPost('kategori');
        $namaProduk = $this->request->getPost('nama_produk');
        $harga = $this->request->getPost('harga');
        $stok = $this->request->getPost('stok');
        $gambar = $this->request->getFile('gambar');

        // Cek apakah ada file gambar yang diunggah
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            // Pindahkan file gambar yang diunggah ke folder yang diinginkan
            $gambar->move(ROOTPATH . 'public/uploads');
        } else {
            // Jika tidak ada gambar baru diunggah, ambil nama gambar yang ada di database
            $menu = $this->menuModel->find($id);
            $gambar = $menu['gambar'];
        }

        // Update data menu ke dalam database
        $data = [
            'kategori' => $kategori,
            'nama_produk' => $namaProduk,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar // Simpan nama file gambar ke database
        ];

        $this->menuModel->update($id, $data);

        // Redirect ke halaman yang sesuai setelah berhasil menyimpan menu
        return redirect()->to('/menuadmin')->with('success', 'Menu berhasil diupdate.');
    }
}
