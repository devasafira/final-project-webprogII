<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelMenu;
use CodeIgniter\Validation\Validation;

class Auth extends BaseController
{
    protected $modelAdmin;
    protected $modelMenu;
    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->modelAdmin = new ModelAdmin();
        $this->modelMenu = new ModelMenu();
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            // Validasi data yang diinput oleh pengguna
            $rules = [
                'username' => 'required',
                'password' => 'required',
                'telepon' => 'required',
                'alamat' => 'required',
                'email' => 'required|valid_email',
            ];

            if (!$this->validate($rules)) {
                // Jika validasi gagal, tampilkan pesan kesalahan
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
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
                'password' => $password,
                'telepon' => $telepon,
                'alamat' => $alamat,
                'email' => $email,
            ];

            $this->modelAdmin->insert($data);

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
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }

            // Ambil data dari input form
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // Cari pengguna berdasarkan username
            $user = $this->modelAdmin->getUserByUsername($username);

            if (!$user) {
                // Jika pengguna tidak ditemukan, tampilkan pesan kesalahan
                return redirect()->back()->withInput()->with('error', 'Username salah.');
            }

            // Verifikasi password
            if ($password !== $user['password']) {
                // Jika password tidak cocok, tampilkan pesan kesalahan
                return redirect()->back()->withInput()->with('error', 'Password salah.');
            }

            // Simpan data pengguna ke dalam sesi (session)
            $userData = [
                'id' => $user['id'],
                'username' => $user['username'],
                'isLoggedIn' => true
            ];

            session()->set($userData);

            // Redirect ke halaman setelah berhasil login
            return redirect()->to('/pesan')->with('success', 'Login berhasil.');
        }
        return view('auth/login');
    }

    public function logout()
    {
        // Proses logout
        // Hapus data sesi
        session()->remove('userData');

        return redirect()->to('/login')->with('success', 'You have been logged out successfully');
    }
}
