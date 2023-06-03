<?php

class Permintaan extends Controller
{
    public function status()
    {
        $data['judul'] = 'Status';
        $data['selectedOption'] = isset($_POST['option']) ? $_POST['option'] : '';
        $this->view('templates/header', $data);

        if ($data['selectedOption'] == 'barang') {
            $data['items'] = $this->model('Model_StatusPinjam')->getAllPinjamB();
            $this->view('permintaan/status', $data);

            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $data['items_barang'] = $this->model('Model_StatusPinjam')->getAllPinjamBbyId($id);
                $this->view('permintaan/status_barang', $data);
            }
            
        } elseif ($data['selectedOption'] == 'ruang') {
            $data['items'] = $this->model('Model_StatusPinjam')->getAllPinjamR();
            $this->view('permintaan/status', $data);

            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $data['items_ruang'] = $this->model('Model_StatusPinjam')->getAllPinjamRbyId($id);
                $this->view('permintaan/status_ruang', $data);
            }
           
        } else {
            $data['items_barang'] = [];
            $data['items_ruang'] = [];
            $data['kodeLabel'] = '';
            $data['namaLabel'] = '';
            $this->view('permintaan/status', $data);
        }

        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['selectedOption'] = isset($_POST['option']) ? $_POST['option'] : '';
        $data['kodeP'] = isset($_POST['kodeP']) ? $_POST['kodeP'] : '';

        if ($data['selectedOption'] == 'barang') {
            // $data['kodeP'] = isset($_POST['kodeP']) ? $_POST['kodeP'] : '';
            if ($this->model('Model_StatusPinjam')->tambahDataPinjamB($_POST) > 0) {

                $data['items'] = $this->model('Model_StatusPinjam')->getDataBerhasilB($data['kodeP']);
                Flasher::setFlash('berhasil', ' ditambahkan', 'success');
            } else {
                Flasher::setFlash('gagal', ' ditambahkan', 'danger');
            }
        } elseif ($data['selectedOption'] == 'ruang') {
            // $data['kodeP'] = isset($_POST['kodeP']) ? $_POST['kodeP'] : '';
            if ($this->model('Model_StatusPinjam')->tambahDataPinjamR($_POST) > 0) {
                $data['items'] = $this->model('Model_StatusPinjam')->getDataBerhasilR($data['kodeP']);
                Flasher::setFlash('berhasil', ' ditambahkan', 'success');
            } else {
                Flasher::setFlash('gagal', ' ditambahkan', 'danger');
            }
        } else {
            $data['items'] = [];
        }


        $this->view('templates/header', $data);
        $this->view('permintaan/rekam', $data);
        $this->view('templates/footer', $data);
    }

    public function hapusB($kodeP, $kodeB, $jamP)
    {
        if ($this->model('Model_StatusPinjam')->hapusDataB($kodeP, $kodeB, $jamP) > 0) {
            Flasher::setFlash('berhasil', ' dihapus', 'success');
            header('Location: ' . BASEURL . '/permintaan/tambah');
            exit;
        } else {
            Flasher::setFlash('gagal', ' dihapus', 'danger');
            header('Location: ' . BASEURL . '/permintaan/tambah');
            exit;
        }
    }
    public function hapusR($kodeP, $kodeR, $jamP)
    {
        // $data['kodeP'] = isset($_POST['kodeP']) ? $_POST['kodeP'] : '';
        if ($this->model('Model_StatusPinjam')->hapusDataR($kodeP, $kodeR, $jamP) > 0) {
            Flasher::setFlash('berhasil', ' dihapus', 'success');
            header('Location: ' . BASEURL . '/permintaan/tambah');
            exit;
        } else {
            Flasher::setFlash('gagal', ' dihapus', 'danger');
            header('Location: ' . BASEURL . '/permintaan/tambah');
            exit;
        }
    }

    // public function getDataRekam()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $option = $_POST['option'];
    //         $kodeP = $_POST['kodeP'];

    //         // Lakukan query ke database berdasarkan pilihan tabel
    //         if ($option == 'barang') {
    //             $data = $this->model('Model_StatusPinjam')->getDataBerhasilB($kodeP);
    //         } elseif ($option == 'ruang') {
    //             $data = $this->model('Model_StatusPinjam')->getDataBerhasilR($kodeP);
    //         }
    //         // $data = $this->model('Model_StatusPinjam')->getDataMahasiswa();

    //         // Kirim data sebagai respons JSON ke JavaScript
    //         header('Content-Type: application/json');
    //         echo json_encode($data);
    //     }
    // }


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
        $this->view('templates/header', $data);

        if ($data['selectedOption'] == 'barang') {
            $data['items'] = $this->model('Model_StatusPinjam')->getAllPinjamBkirim();
            $this->view('permintaan/verif', $data);

            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                if (isset($_POST['status']) && isset($_POST['kode'])) {
                    $data['result'] = $this->model('Model_StatusPinjam')->ubahStatusB($_POST);
                }
                $data['items_barang'] = $this->model('Model_StatusPinjam')->getAllVerifB($id);
                $this->view('permintaan/verif_barang', $data);
            }
        } elseif ($data['selectedOption'] == 'ruang') {
            $data['items'] = $this->model('Model_StatusPinjam')->getAllPinjamRkirim();
            $this->view('permintaan/verif', $data);

            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                if (isset($_POST['status']) && isset($_POST['kode'])) {
                    $data['result'] = $this->model('Model_StatusPinjam')->ubahStatusR($_POST);
                }
                $data['items_ruang'] = $this->model('Model_StatusPinjam')->getAllVerifR($id);
                $this->view('permintaan/verif_ruang', $data);
            }
        } else {
            $data['items_barang'] = [];
            $data['items_ruang'] = [];
            $data['kodeLabel'] = '';
            $data['namaLabel'] = '';
            $this->view('permintaan/verif', $data);
        }

        $this->view('templates/footer', $data);
    }


    public function konfirmasi()
    {
        $data['judul'] = 'Konfirmasi';
        $data['selectedOption'] = isset($_POST['option']) ? $_POST['option'] : '';
        $this->view('templates/header', $data);

        if ($data['selectedOption'] == 'barang') {
            $data['items'] = $this->model('Model_StatusPinjam')->getAllPinjamBterus();
            $this->view('permintaan/konfirmasi', $data);

            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                if (isset($_POST['status']) && isset($_POST['kode'])) {
                    $data['result'] = $this->model('Model_StatusPinjam')->ubahStatusB($_POST);
                }
                $data['items_barang'] = $this->model('Model_StatusPinjam')->getAllKonfirmB($id);
                $this->view('permintaan/konfirmasi_barang', $data);
            }
        } elseif ($data['selectedOption'] == 'ruang') {
            $data['items'] = $this->model('Model_StatusPinjam')->getAllPinjamRterus();
            $this->view('permintaan/konfirmasi', $data);

            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                if (isset($_POST['status']) && isset($_POST['kode'])) {
                    $data['result'] = $this->model('Model_StatusPinjam')->ubahStatusR($_POST);
                }
                $data['items_ruang'] = $this->model('Model_StatusPinjam')->getAllKonfirmR($id);
                $this->view('permintaan/konfirmasi_ruang', $data);
            }
        } else {
            $data['items_barang'] = [];
            $data['items_ruang'] = [];
            $data['kodeLabel'] = '';
            $data['namaLabel'] = '';
            $this->view('permintaan/konfirmasi', $data);
        }

        $this->view('templates/footer', $data);
    }

    // public function getDataVerif()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $option = $_POST['option'];

    //         // Lakukan query ke database berdasarkan pilihan tabel
    //         if ($option == 'barang') {
    //             $data = $this->model('Model_PerekamanB')->getAllVerifB();
    //         } elseif ($option == 'ruang') {
    //             $data = $this->model('Model_PerekamanR')->getAllVerifR();
    //         }
    //         // $data = $this->model('Model_StatusPinjam')->getDataMahasiswa();

    //         // Kirim data sebagai respons JSON ke JavaScript
    //         header('Content-Type: application/json');
    //         echo json_encode($data);
    //     }
    // }

    // public function verifR()
    // {
    // 	// 	if($this->model('Model_PerekamanR')->ubahDataR($_POST)>0){
    //     $kodeP = $_POST['kodeP'];
    // 	$kodeR = $_POST['kodeR'];
    // 	$statusR = $_POST['statusR'];

    // 	if ($this->model('Model_PerekamanR')->ubahDataVerifR($_POST) > 0) {
    // 		Flasher::setFlash('berhasil', ' diubah', 'success');
    // 		header('Location: ' . BASEURL . '/perekaman/ruang');
    // 		exit;
    // 	} else {
    // 		Flasher::setFlash('gagal', 'dihapus', 'danger');
    // 		header('Location: ' . BASEURL . '/perekaman/ruang');
    // 		exit;
    // 	}
    // }

    // public function getDataVerif()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $option = $_POST['option'];
    //         $kodeP = $_POST['kodeP'];

    //         // Retrieve the verification data from the model based on the selected option
    //         if ($option == 'barang') {
    //             $data = $this->model('Model_PerekamanB')->getAllVerifB($kodeP);
    //         } elseif ($option == 'ruang') {
    //             $data = $this->model('Model_PerekamanR')->getAllVerifR($kodeP);
    //         }

    //         // Return the data as a JSON response
    //         header('Content-Type: application/json');
    //         echo json_encode($data);
    //     }
    // }

    // public function getDataVerif()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $option = $_POST['option'];
    //         $kodeP = $_POST['kodeP'];

    //         // Retrieve the verification data from the model based on the selected option
    //         if ($option == 'barang') {
    //             $data = $this->model('Model_StatusPinjam')->getAllVerifB($kodeP);
    //         } elseif ($option == 'ruang') {
    //             $data = $this->model('Model_StatusPinjam')->getAllVerifR($kodeP);
    //         }

    //         // Return the data as a JSON response
    //         header('Content-Type: application/json');
    //         echo json_encode($data);
    //     }
    // }

    public function verifR($kodeP)
    {
        if ($this->model('Model_StatusPinjam')->getAllVerifR($kodeP) > 0) {
            Flasher::setFlash('berhasil', ' dihapus', 'success');
            header('Location: ' . BASEURL . '/permintaan/verif');
            exit;
        } else {
            Flasher::setFlash('gagal', ' dihapus', 'danger');
            header('Location: ' . BASEURL . '/permintaan/verif');
            exit;
        }
    }

    public function verifB($kodeP)
    {
        if ($this->model('Model_StatusPinjam')->getAllVerifB($kodeP) > 0) {
            Flasher::setFlash('berhasil', ' dihapus', 'success');
            header('Location: ' . BASEURL . '/permintaan/verif');
            exit;
        } else {
            Flasher::setFlash('gagal', ' dihapus', 'danger');
            header('Location: ' . BASEURL . '/permintaan/verif');
            exit;
        }
    }


    public function updateStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kode = $_POST['kode'];
            $nama = $_POST['nama'];
            $status = $_POST['status'];

            // Update the status in your model based on the provided data
            $success = $this->model('Model_Perekaman')->updateStatus($kode, $nama, $status);

            // Return the success status as a JSON response
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
        }
    }

    // // Memeriksa apakah data POST sudah dikirimkan
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $kodeP = $_POST['kodeP'];

    //     if ($data['selectedOption'] == 'barang') {
    //         $data['items'] = $this->model('Model_StatusPinjam')->getDataBerhasilB($kodeP);
    //     } elseif ($data['selectedOption'] == 'ruang') {
    //         $data['items'] = $this->model('Model_StatusPinjam')->getDataBerhasilR($kodeP);
    //     }
    // }
    // public function rekam()
    // {
    //     $data['title'] = 'Tambah Data';
    //     $data['selectedOption'] = isset($_POST['option']) ? $_POST['option'] : '';
    //     // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // $kodeP = "PR006";
    //     $data['kodeP'] = isset($_POST['kodeP']) ? $_POST['kodeP'] : '';
    //         // $kodeP = $_POST['kodeP'];

    //         // if ($data['selectedOption'] == 'ruang') {
    //             // $data['items'] = $this->model('Model_StatusPinjam')->getDataBerhasilB($kodeP);
    //         //  } elseif ($data['selectedOption'] == 'ruang') {
    //             $data['items'] = $this->model('Model_StatusPinjam')->getDataBerhasilR($data['kodeP']);
    //         // }
    //         // $data['items'] =$this->model('Model_StatusPinjam')->getAllPinjamR();

    //         // }el/////se{
    //         //     $data['items'] = '';
    //         // }
    //     $this->view('templates/header', $data);
    //     $this->view('permintaan/rekam', $data);
    //     $this->view('templates/footer', $data);
    // }



    // public function tambah()
    // {
    //     $data['selectedOption'] = isset($_POST['option']) ? $_POST['option'] : '';

    //     if ($data['selectedOption'] == 'barang') {
    //         if ($this->model('Model_StatusPinjam')->tambahDataPinjamB($_POST) > 0) {
    //             Flasher::setFlash('berhasil', ' ditambahkan', 'success');
    //         } else {
    //             Flasher::setFlash('gagal', ' ditambahkan', 'danger');
    //         }
    //     } elseif ($data['selectedOption'] == 'ruang') {
    //         if ($this->model('Model_StatusPinjam')->tambahDataPinjamR($_POST) > 0) {
    //             Flasher::setFlash('berhasil', ' ditambahkan', 'success');
    //         } else {
    //             Flasher::setFlash('gagal', ' ditambahkan', 'danger');
    //         }
    //     }


    // header('Location: ' . BASEURL . '/permintaan/rekam');
    // exit;
    // }

}
