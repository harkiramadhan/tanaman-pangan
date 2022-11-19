<?php

class Publikasi extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_User',
			'M_Publikasi',
			'M_Kategori_publikasi'
		]);
	}

	public function index(){
		$batas = 10;
		$page = $this->input->get('page', TRUE);
		$halaman = isset($page) ? (int)$page : 1;
		$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

		$previous = $halaman - 1;
		$next = $halaman + 1;

		$jumlah_data = $this->M_Publikasi->getAll()->num_rows();
		$total_halaman = ceil($jumlah_data / $batas);

        $var = [
			'title' =>"Pertanyaan Umum",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'data' => $this->M_Publikasi->getPaginate($halaman_awal, $batas),
			'kategori' => $this->M_Kategori_publikasi->getAll(),
			'count' => $total_halaman,
			'next' => $next,
			'previous' => $previous,
			'page' => $halaman,
			'ajax' => [
				'publikasi'
			]
		];

		$this->load->view('layout/user/header', $var);
		$this->load->view('user/publikasi', $var);
		$this->load->view('layout/user/footer', $var);
	
	}

	public function detail(){
        $var = [
			'title' => "Detail Publikasi",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/publikasi-detail', $var);
		$this->load->view('layout/user/footer', $var);
	
	}
}