<?php 
class AksiLogout extends Controller
{
    public function logout()
    {
        // Hapus semua data session

        session_unset();
        session_destroy();

        // Redirect ke halaman setelah logout
        $this->view('logout/index');
        // header('Location: ' . BASEURL.'/home' );
        exit;
    }
}