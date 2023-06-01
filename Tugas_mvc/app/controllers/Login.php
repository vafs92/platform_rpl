<?php
class Login extends Controller {

    public function login()
    {
        // Mendapatkan data yang dikirimkan melalui form login
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Memanggil model User untuk mendapatkan data user berdasarkan username
        $userModel = $this->model('Model_User');
        $user = $userModel->getUserByUsername($username);

        // Memeriksa apakah user ditemukan dan passwordnya cocok
        if ($user && $password === $user['password']) {
            // Login berhasil, simpan data user ke session atau sesuai kebutuhan
            // $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];
            // Redirect ke halaman setelah login
            header('Location: ' . BASEURL . '/home/indexLogin');
            exit;
        } else {
            // Login gagal, tampilkan pesan error atau sesuai kebutuhan
            echo '<script>';
            echo 'alert("Username atau password salah.");';
            echo 'window.location.href = "' . BASEURL . '";';
            echo '</script>';
        }
    }
}
