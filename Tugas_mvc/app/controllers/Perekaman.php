<?php

class Perekaman extends Controller
{
	public function ruang()
	{
		$data['judul'] = 'Perekaman Sarana dan Prasarana';
		$data['ruang'] = $this->model('Model_PerekamanR')->getAllPerekaman();
		$this->view('templates/header', $data);
		$this->view('perekaman/ruang', $data);
		$this->view('templates/footer', $data);
	}

	public function barang()
	{
		$data['judul'] = 'Perekaman Sarana dan Prasarana';
		$data['barang'] = $this->model('Model_PerekamanB')->getAllPerekaman();
		$this->view('templates/header', $data);
		$this->view('perekaman/barang', $data);
		$this->view('templates/footer', $data);
	}

	public function tambahR()
	{
		if ($this->model('Model_PerekamanR')->tambahDataR($_POST) > 0) {
			Flasher::setFlash('berhasil', ' ditambahkan', 'success');
		} else {
			Flasher::setFlash('gagal', ' ditambahkan', 'danger');
		}
		header('Location: ' . BASEURL . '/perekaman/ruang');
		exit;
	}

	public function tambahB()
	{
		if ($this->model('Model_PerekamanB')->tambahDataB($_POST) > 0) {
			Flasher::setFlash('berhasil', ' ditambahkan', 'success');
			header('Location: ' . BASEURL . '/perekaman/barang');
			exit;
		} else {
			Flasher::setFlash('gagal', ' ditambahkan', 'danger');
			header('Location: ' . BASEURL . '/perekaman/barang');
			exit;
		}
	}

	public function hapusR($kodeR)
	{
		if ($this->model('Model_PerekamanR')->hapusDataR($kodeR) > 0) {
			Flasher::setFlash('berhasil', ' dihapus', 'success');
			header('Location: ' . BASEURL . '/perekaman/ruang');
			exit;
		} else {
			Flasher::setFlash('gagal', ' dihapus', 'danger');
			header('Location: ' . BASEURL . '/perekaman/ruang');
			exit;
		}
	}

	public function hapusB($kodeB)
	{
		if ($this->model('Model_PerekamanB')->hapusDataB($kodeB) > 0) {
			Flasher::setFlash('berhasil', ' dihapus', 'success');
			header('Location: ' . BASEURL . '/perekaman/barang');
			exit;
		} else {
			Flasher::setFlash('gagal', ' dihapus', 'danger');
			header('Location: ' . BASEURL . '/perekaman/barang');
			exit;
		}
	}
	public function getubahR()
	{
		$id = $_POST['id'];
		$data = $this->model('Model_PerekamanR')->getPerekamanByKodeR($id);
		echo json_encode($data);
		// echo json_encode($this->model('Model_PerekamanR')->getPerekamanByKodeR($_POST['kodeR']));
	}

	public function getubahB()
	{
		$id = $_POST['id'];
		$data = $this->model('Model_PerekamanB')->getPerekamanByKodeB($id);
		echo json_encode($data);
		// echo json_encode($this->model('Model_PerekamanR')->getPerekamanByKodeR($_POST['kodeR']));
	}

	public function editR()
	{
		// 	if($this->model('Model_PerekamanR')->ubahDataR($_POST)>0){
		$kodeR = $_POST['kodeR'];
		$namaR = $_POST['namaR'];

		if ($this->model('Model_PerekamanR')->ubahDataR($_POST) > 0) {
			Flasher::setFlash('berhasil', ' diubah', 'success');
			header('Location: ' . BASEURL . '/perekaman/ruang');
			exit;
		} else {
			Flasher::setFlash('gagal', 'dihapus', 'danger');
			header('Location: ' . BASEURL . '/perekaman/ruang');
			exit;
		}
	}

	public function editB()
	{
		// 	if($this->model('Model_PerekamanR')->ubahDataR($_POST)>0){
		$kodeB = $_POST['kodeB'];
		$namaB = $_POST['namaB'];

		if ($this->model('Model_PerekamanB')->ubahDataB($_POST) > 0) {
			Flasher::setFlash('berhasil', ' diubah', 'success');
			header('Location: ' . BASEURL . '/perekaman/barang');
			exit;
		} else {
			Flasher::setFlash('gagal', ' dihapus', 'danger');
			header('Location: ' . BASEURL . '/perekaman/barang');
			exit;
		}
	}

	public function cariR()
	{
		$data['judul'] = 'Daftar Ruang';
		$data['ruang'] = $this->model('Model_PerekamanR')->cariDataR();
		$this->view('templates/header', $data);
		$this->view('perekaman/ruang', $data);
		$this->view('templates/footer');
	}

	public function cariB()
	{
		$data['judul'] = 'Daftar Barang';
		$data['barang'] = $this->model('Model_PerekamanB')->cariDataB();
		$this->view('templates/header', $data);
		$this->view('perekaman/barang', $data);
		$this->view('templates/footer');
	}
}
