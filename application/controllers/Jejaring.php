<?php

class Jejaring extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_User',
			'M_Jejaring',
			'M_Komoditas',
			'M_Role',
			'M_Wilayah',
			'M_Kategori_olahan',
			'M_Ketertarikan',
			'M_Penjualan'
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
			'user' => $this->M_User->getById($this->session->userdata('userid')),
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

	public function detail($id){
        $var = [
			'title' => "Profil Jejaring",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'jejaring' => $this->M_Jejaring->getByUserid($id),
			'komoditas' => $this->M_Komoditas->getByUser($id),
			'kategori_olahan' => $this->M_Kategori_olahan->getByUser($id),
			'tertarik' => $this->M_Ketertarikan->getByUser($id),
			'penjualan' => $this->M_Penjualan->getByUser($id)
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/jejaring-profil', $var);
		$this->load->view('layout/user/footer', $var);
	}


	/* Ajax Here! */
}