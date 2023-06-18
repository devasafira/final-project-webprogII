<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('admin/dashPesanan'); 
    }

    public function menu()
    {
        return view('admin/dashMenu');
    }

    public function riwayatPembelian()
    {
        echo view('admin/dashRiwPem');
    }

    public function table()
    {
        echo view('admin/dashTable');
    }

    // sementara

    public function halamanUser()
    {
        echo view('user/Uboard');
    }

    public function bayarUser()
    {
        echo view('user/Ubayar');
    }

    public function login()
    {
        echo view('auth/login');
    }

    public function register()
    {
        echo view('auth/register');
    }

    public function addMenu()
    {
        echo view('admin/addMenu');
    }

    public function addTable()
    {
        echo view('admin/addTable');
    }
}
