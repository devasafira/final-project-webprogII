<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelMenu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_produk', 'harga', 'kategori', 'gambar'];

    public function getMenu()
    {
        return $this->findAll();
    }

    public function deleteMenu($id)
    {
        return $this->delete($id);
    }

    public function getMenuById($id)
    {
        return $this->find($id);
    }

    public function updateMenu($id, $data)
    {
        return $this->update($id, $data);
    }
}
