<?php

namespace App\Controllers;

use App\Models\ModelTable;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function manageTables()
    {
        $tableModel = new ModelTable();

        $data['tables'] = $tableModel->findAll();

        return view('admin/dashTable', $data);
    }

    public function addTable()
    {
        $data = [];

        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'table_number' => 'required'
            ];

            $validationMessages = [
                'table_number' => [
                    'required' => 'Table name is required.'
                ]
            ];

            $validation = \Config\Services::validation();
            $validation->setRules($validationRules, $validationMessages);

            if ($validation->withRequest($this->request)->run()) {
                $tableModel = new ModelTable();

                $tableData = [
                    'table_number' => $this->request->getPost('table_number'),
                    'status' => 'inactive'
                ];

                $tableModel->insert($tableData);

                return redirect()->to('/table');
            }

            $data['validation'] = $validation;
        }

        return view('admin/addTable', $data);
    }

    public function deleteTable($id)
    {
        $tableModel = new ModelTable();

        $tableModel->delete($id);

        return redirect()->to('/table');
    }

    public function activateTable($id)
    {
        $tableModel = new ModelTable();

        $tableModel->update($id, ['status' => 1]);

        return redirect()->to('/table');
    }

    public function deactivateTable($id)
    {
        $tableModel = new ModelTable();

        $tableModel->update($id, ['status' => 0]);

        return redirect()->to('/table');
    }
}
