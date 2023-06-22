<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPesanan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_pembeli', 'table_number', 'tanggal_transaksi' , 'nama_produk', 'jumlah', 'harga','total'];
}
