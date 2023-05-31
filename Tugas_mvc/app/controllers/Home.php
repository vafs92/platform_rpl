<?php

class Home extends Controller {
	public function index() {
		
        $this->view('login/index');
	}

	public function indexLogin(){
		$data['judul'] = 'Home';
		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}

