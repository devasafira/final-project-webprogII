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
    protected $allowedFields    = ['nama_pembeli', 'table_number', 'tanggal_transaksi', 'nama_produk', 'jumlah', 'harga', 'total','metode_pembayaran','pembayaran_diterima','status'];

    // Tambahkan metode untuk mengambil pesanan berdasarkan nomor meja
    public function getOrderItemsByTable($tableNumber)
    {
        return $this->where('table_number', $tableNumber)->findAll();
    }
    public function createInvoice($data)
    {
        return $this->insert($data);
    }
}
