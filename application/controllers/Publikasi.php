<?php

class Publikasi extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_User',
			'M_Publikasi',
			'M_Kategori_publikasi',
			'M_Tanitrainer'
		]);
	}

	public function index(){
		$ids = $this->input->get('ids[]', TRUE);
		$order = $this->input->get('order', TRUE);

		$where = [];
		if($ids != NULL){
			foreach($ids as $val){
				array_push($where, $val);
			}
		}

		$odr = [];
		if($order != NULL){
			if($order == 'A-Z'){
				array_push($odr, [
					'column' => 'judul',
					'order' => 'ASC'
				]);
			}else{
				array_push($odr, [
					'column' => 'timestamp',
					'order' => 'DESC'
				]);
			}
		}

		$batas = 10;
		$page = $this->input->get('page', TRUE);
		$halaman = isset($page) ? (int)$page : 1;
		$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

		$previous = $halaman - 1;
		$next = $halaman + 1;

		$jumlah_data = $this->M_Publikasi->getAll($where)->num_rows();
		$total_halaman = ceil($jumlah_data / $batas);

        $var = [
			'title' =>"Publikasi",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'data' => $this->M_Publikasi->getPaginate($halaman_awal, $batas, $where, $odr),
			'kategori' => $this->M_Kategori_publikasi->getAll(),
			'total' => $jumlah_data,
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

	public function detail($flag){
        $var = [
			'title' => "Detail Publikasi",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'data' => $this->M_Publikasi->getByFlag($flag),
			'latest' => $this->M_Publikasi->getLatest(),
			'tanitrainer' => $this->M_Tanitrainer->getPaginate(1, 10)
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/publikasi-detail', $var);
		$this->load->view('layout/user/footer', $var);
	}
}