<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'telepon', 'alamat', 'email'];
    
    public function getUserByUsername($username)
{
    return $this->where('username', $username)->first();
}

}
