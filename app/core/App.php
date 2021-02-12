<?php

class App {
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

	public function __construct()
	{
		$url = $this->parseUrl();

		// kalau url kosong, isi dengan nilai default agar bisa melakukan pengkondisian, karena php versi 7.4.13 tidak bisa pengkondisian jika nilanya NULL
		if( $url == NULL ) { 
			$url = [$this->controller];
		}

		// controller
		if( file_exists('../app/controllers/' . $url[0] . '.php') ) {
			$this->controller = $url[0];
			unset($url[0]); // hapus dari url agar url diisi HANYA oleh params
		}

		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		// method/function
		if( isset($url[1]) ) {
			if( method_exists($this->controller, $url[1]) ) {
				$this->method = $url[1];
				unset($url[1]); // hapus dari url agar url diisi HANYA oleh params
			}
		}

		// params
		if( !empty($url) ) {
			$this->params = array_values($url);
		}

		// jalankan controller & method, serta kirimkan params jika ada
		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	public function parseUrl()
	{
		if( isset($_GET['url']) ) { // ambil url dari .htaccess
			$url = rtrim($_GET['url'], '/'); // bersihkan url dari simbol slash ("/")
			$url = filter_var($url, FILTER_SANITIZE_URL); // filter url dari weird character
			$url = explode('/', $url); // pecah url based on slash ("/") from string url
			return $url; // kembalikan nilai $url
		}
	}


}