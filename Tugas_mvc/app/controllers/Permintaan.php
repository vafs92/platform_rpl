<?php

class Permintaan extends Controller
{
    public function status()
    {
        $data['judul'] = 'Status';
        $data['selectedOption'] = isset($_POST['option']) ? $_POST['option'] : '';

        $pinjamBarangModel = $this->model('Model_StatusPinjam');
        $pinjamRuangModel = $this->model('Model_StatusPinjam');

        if ($data['selectedOption'] == 'barang') {
            $data['items'] = $pinjamBarangModel->getAllPinjamB();
        } elseif ($data['selectedOption'] == 'ruang') {
            $data['items'] = $pinjamRuangModel->getAllPinjamR();
        } else {
            $data['items'] = [];
            $data['kodeLabel'] = '';
            $data['namaLabel'] = '';
        }

        $this->view('templates/header', $data);
        $this->view('permintaan/status', $data);
        $this->view('templates/footer', $data);
    }

    // public function rekam()
    // {
    //     $data['title'] = 'Tambah Data';
    //     $data['selectedOption'] = isset($_POST['option']) ? $_POST['option'] : '';

    //     if ($data['selectedOption'] == 'barang') {
    //         $data['items'] = $this->model('Model_PerekamanB')->getAllPerekaman();
    //     } elseif ($data['selectedOption'] == 'ruang') {
    //         $data['items'] = $this->model('Model_PerekamanR')->getAllPerekaman();
    //     } else {
    //         $data['items'] = [];
    //     }

    //     $this->view('templates/header', $data);
    //     $this->view('permintaan/rekam', $data);
    //     $this->view('templates/footer', $data);

    // }

    public function tambah()
    {

        $data['title'] = 'Tambah Data';
        $data['selectedOption'] = isset($_POST['option']) ? $_POST['option'] : '';

        $pinjamBarangModel = $this->model('Model_StatusPinjam');
        $pinjamRuangModel = $this->model('Model_StatusPinjam');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $namaP = $_POST['namaP'];
            $nimP = $_POST['nimP'];
            $noWA = $_POST['noWA'];
            $kode = $_POST['kode'];
            $tanggalP = $_POST['tanggalP'];
            $jamP = $_POST['jamP'];
            // $nama = $_POST['nama'];

            if ($data['selectedOption'] == 'barang') {
                $pinjamBarangModel->tambahDataPinjamB($namaP, $nimP, $noWA, $kode, $tanggalP, $jamP);
                Flasher::setFlash('berhasil', 'ditambah', 'success');
            } elseif ($data['selectedOption'] == 'ruang') {
                $pinjamRuangModel->tambahDataPinjamR($namaP, $nimP, $noWA, $kode, $tanggalP, $jamP);
                Flasher::setFlash('gagal', 'ditambah', 'warning');
            }

            header('Location: ' . BASEURL . '/permintaan/tambah');
            exit;
        }
        $this->view('templates/header', $data);
        $this->view('permintaan/rekam', $data);
        $this->view('templates/footer', $data);
    }

    public function getData()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $option = $_POST['option'];

            // Lakukan query ke database berdasarkan pilihan tabel
            if ($option == 'barang') {
                $data = $this->model('Model_PerekamanB')->getAllPerekaman();
            } elseif ($option == 'ruang') {
                $data = $this->model('Model_PerekamanR')->getAllPerekaman();
            }
            // $data = $this->model('Model_StatusPinjam')->getDataMahasiswa();

            // Kirim data sebagai respons JSON ke JavaScript
            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    public function getDataMahasiswa()
    {
        $data = $this->model('Model_StatusPinjam')->getDataMahasiswa();

        // Kirim data sebagai respons JSON ke JavaScript
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function verif()
    {
        $data['judul'] = 'Verifikasi';
        $data['selectedOption'] = isset($_POST['option']) ? $_POST['option'] : '';

        $pinjamBarangModel = $this->model('Model_StatusPinjam');
        $pinjamRuangModel = $this->model('Model_StatusPinjam');

        if ($data['selectedOption'] == 'barang') {
            $data['items'] = $pinjamBarangModel->getAllPinjamBkirim();
        } elseif ($data['selectedOption'] == 'ruang') {
            $data['items'] = $pinjamRuangModel->getAllPinjamRkirim();
        } else {
            $data['items'] = [];
            $data['kodeLabel'] = '';
            $data['namaLabel'] = '';
        }

        $this->view('templates/header', $data);
        $this->view('permintaan/verif', $data);
        $this->view('templates/footer', $data);
    }

    public function verifikasi()
    {
        // Retrieve the values from the form submission
        $verifikasi = $_POST['verifikasi'];
        // $kodePinjam = $_POST['kodePinjam'];
        
        $jenis = $_POST['jenis'];

        // Perform necessary validation and processing

        // Assuming you are using a database, update the verification status
        // Here's an example using PDO:
        $db = new PDO('your_database_connection_details');

        // Prepare and execute the update statement
        $stmt = $db->prepare("UPDATE permintaan SET status = :status WHERE kode_pinjam = :kodePinjam");
        $stmt->bindParam(':status', $verifikasi);
        $stmt->bindParam(':kodePinjam', $kodePinjam);
        $stmt->execute();

        // Redirect or display a success message as needed
    }

    public function konfirmasi()
    {
        $data['judul'] = 'Konfirmasi';
        $data['selectedOption'] = isset($_POST['option']) ? $_POST['option'] : '';

        $pinjamBarangModel = $this->model('Model_StatusPinjam');
        $pinjamRuangModel = $this->model('Model_StatusPinjam');

        if ($data['selectedOption'] == 'barang') {
            $data['items'] = $pinjamBarangModel->getAllPinjamBterus();
        } elseif ($data['selectedOption'] == 'ruang') {
            $data['items'] = $pinjamRuangModel->getAllPinjamRterus();
        } else {
            $data['items'] = [];
            $data['kodeLabel'] = '';
            $data['namaLabel'] = '';
        }

        $this->view('templates/header', $data);
        $this->view('permintaan/konfirmasi', $data);
        $this->view('templates/footer', $data);
    }
}
