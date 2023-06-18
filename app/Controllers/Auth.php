<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelMenu;


class Auth extends BaseController
{

    public function __construct()
    {
        $this->menuModel = new ModelMenu();
        $this->userModel = new ModelAdmin();
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            // Validasi data yang diinput oleh pengguna
            $rules = [
                'username' => 'required',
                'password' => 'required',
                'telepon'  => 'required',
                'alamat'   => 'required',
                'email'    => 'required',
            ];

            if (!$this->validate($rules)) {
                // Jika validasi gagal, tampilkan pesan kesalahan
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Ambil data dari input form
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $telepon = $this->request->getPost('telepon');
            $alamat = $this->request->getPost('alamat');
            $email = $this->request->getPost('email');

            // Simpan data pengguna ke dalam database
            $data = [
                'username' => $username,
                'password' => $password, // Password akan dienkripsi oleh Model
                'telepon'  => $telepon,
                'alamat'   => $alamat,
                'email'    => $email
            ];

            $this->userModel->insert($data);

            // Redirect ke halaman login setelah berhasil registrasi
            return redirect()->to('/login')->with('success', 'Registrasi berhasil. Silakan login.');
        }

        return view('auth/register');
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            // Validasi data yang diinput oleh pengguna
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                // Jika validasi gagal, tampilkan pesan kesalahan
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Ambil data dari input form
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // Cari pengguna berdasarkan username
            $user = $this->userModel->getUserByUsername($username);

            if (!$user) {
                // Jika pengguna tidak ditemukan, tampilkan pesan kesalahan
                return redirect()->back()->withInput()->with('error', 'Username salah.');
            }

            // Verifikasi password
            if (!password_verify($password, $user['password'])) {
                // Jika password tidak cocok, tampilkan pesan kesalahan
                return redirect()->back()->withInput()->with('error', 'password salah.');
            }

            // Simpan data pengguna ke dalam sesi (session)
            $userData = [
                'id'       => $user['id'],
                'username' => $user['username'],
                // tambahkan data pengguna lainnya yang diperlukan
            ];
            session()->set('userData', $userData);

            // Redirect ke halaman setelah berhasil login
            return redirect()->to('/pesan')->with('success', 'Login berhasil.');
        }

        return view('auth/login');
    }


    public function logout()
    {
        // Proses logout
        // Hapus data sesi
        session()->destroy();

        return redirect()->to('/login')->with('success', 'You have been logged out successfully');
    }
}
