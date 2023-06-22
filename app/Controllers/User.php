<?php

namespace App\Controllers;

use App\Models\ModelMenu;
use App\Models\ModelTable;
use App\Models\ModelPesanan; // Tambahkan model ModelPesanan

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
    
    // public function saveTable()
    // {
    //     $selectedTable = $this->request->getPost('table');
    
    //     if (!empty($selectedTable)) {
    //         $tableModel = new ModelTable();
    //         $tableModel->deactivateTable($selectedTable); // Menonaktifkan meja yang dipilih
    
    //         // Update selected table status to active
    //         $tableModel->update(['status' => '1'], ['id' => $selectedTable]);
    
    //         return redirect()->to('/user');
    //     } else {
    //         return redirect()->back()->with('error', 'Please select a table.');
    //     }
    // }
    

    public function placeOrder()
    {
        $selectedTable = $this->request->getPost('table_number');
        $nama_pembeli = $this->request->getPost('nama_pembeli');
        $tanggal_transaksi = date('Y-m-d H:i:s');
    
        // Update selected table status to inactive
        $tableModel = new ModelTable();
        $tableModel->activateTable($selectedTable);
    
        // Save selected table and customer name to session
        session()->set('selectedTable', $selectedTable);
        session()->set('nama_pembeli', $nama_pembeli);
        return redirect()->to('/pilihmenu');
    }
    public function pembayaran()
    {
        $modelPesanan = new ModelPesanan();
    
        // Mendapatkan data pesanan dari form
        $nama_pembeli = $this->request->getPost('nama_pembeli');
        $table_number = $this->request->getPost('table_number');
        $tanggal_transaksi = date('Y-m-d H:i:s');
    
        // Memasukkan data pesanan ke dalam database
        $modelPesanan->insert([
            'nama_pembeli' => $nama_pembeli,
            'table_number' => $table_number,
            'tanggal_transaksi' => $tanggal_transaksi,y
        ]);
        
    
        return view('user/Ubayar');
    }
    
}
