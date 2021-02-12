<?php

class About extends Controller {
	public function index($nama = 'Panji', $umur = 22)
	{
		$data = [
			'title' => 'about/index',
			'nama' => $nama,
			'umur' => $umur
		];
		$this->view('templates/header', $data);
		$this->view('about/index', $data);
		$this->view('templates/footer');
	}

	public function page()
	{
		$data = [
			'title' => 'about/page'
		];
		$this->view('templates/header', $data);
		$this->view('about/page');
		$this->view('templates/footer');
	}
}