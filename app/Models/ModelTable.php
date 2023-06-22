<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTable extends Model
{
    protected $table = 'tables';
    protected $primaryKey = 'id';
    protected $allowedFields = ['table_number', 'status'];

    public function getActiveTables()
    {
        return $this->where('status', 'active')->findAll();
    }

    public function getInactiveTables()
    {
        return $this->where('status', 'inactive')->findAll();
    }

    public function activateTable($tableNumber)
    {
        $this->update($tableNumber,['status' => '1'] );
    }

    public function deactivateTable($tableNumber)
    {
        $this->update($tableNumber,['status' => '0']);
    }
}
