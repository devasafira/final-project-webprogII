<?php
namespace App\Controllers;

use App\Models\ModelMenu;
use App\Models\ModelTable;

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
        //$customerName = $this->request->getPost('customer_name');

        // Update selected table status to inactive
        $tableModel = new ModelTable();
        $tableModel->update(['status' => 'active'], ['table_number' => $tableNumber]);

        // Place order or perform other actions

        return redirect()->to('/user');
    }
    public function saveTable()
    {
        $selectedTable = $this->request->getPost('table');

        if (!empty($selectedTable)) {
            $tableModel = new ModelTable();
            $tableModel->activateTable($selectedTable);

            return redirect()->to('/user');
        } else {
            return redirect()->back()->with('error', 'Please select a table.');
        }
    }
}