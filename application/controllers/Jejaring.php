<?php

class Jejaring extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Jejaring',
			'M_Komoditas',
			'M_Role',
			'M_Wilayah'
		]);
	}

	public function index(){
		$batas = 16;
		$page = $this->input->get('page', TRUE);
		$halaman = isset($page) ? (int)$page : 1;
		$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

		$previous = $halaman - 1;
		$next = $halaman + 1;

		$jumlah_data = $this->M_Jejaring->getAll()->num_rows();
		$total_halaman = ceil($jumlah_data / $batas);

        $var = [
			'title' => "Temui Sesama Jejaring",
			'komoditas' => $this->M_Komoditas->getAll(),
			'role' => $this->M_Role->getAll(),
			'provinsi' => $this->M_Wilayah->getProvinsi(),
			'count' => $total_halaman,
			'data' => $this->M_Jejaring->getPaginate($halaman_awal, $batas),
			'next' => $next,
			'previous' => $previous,
			'page' => $halaman,
			'ajax' => [
				'jejaring'
			]
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/jejaring', $var);
		$this->load->view('layout/user/footer', $var);
	}

	public function profil(){
        $var = [
			'title' => "Profil Jejaring"
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/jejaring-profil', $var);
		$this->load->view('layout/user/footer', $var);
	}


	/* Ajax Here! */
}