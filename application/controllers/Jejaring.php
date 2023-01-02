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
			'M_Penjualan',
			'M_Gallery'
		]);
	}

	public function index(){
		$type = $this->input->get('type', TRUE);
		$roleid = $this->input->get('roleid', TRUE);
		$provid = $this->input->get('provid', TRUE);
		$komoditasid = $this->input->get('komoditasid', TRUE);

		$where = [];
		if($type != NULL){
			array_push($where, [
				'column' => 'u.status',
				'value' => ($type == 1) ? 2 : 1
			]);
		}

		if($roleid != NULL && $roleid != 'semua'){
			array_push($where, [
				'column' => 'u.role_id', 
				'value' => $roleid
			]);
		}

		if($provid != NULL && $provid != 'semua'){
			array_push($where, [
				'column' => 'u.prov', 
				'value' => $provid
			]);
		}

		if($komoditasid != NULL && $komoditasid != 'semua'){
			array_push($where, [
				'column' => 'komoditas_id', 
				'value' => $komoditasid
			]);
		}

		$batas = 16;
		$page = $this->input->get('page', TRUE);
		$halaman = isset($page) ? (int)$page : 1;
		$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

		$previous = $halaman - 1;
		$next = $halaman + 1;

		$jumlah_data = $this->M_Jejaring->getAll($where)->num_rows();
		$total_halaman = ceil($jumlah_data / $batas);

        $var = [
			'title' => ($this->session->userdata('lang') == 'EN') ? 'Find Your Network' : '"Temui Sesama Jejaring"',
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'komoditas' => $this->M_Komoditas->getAll(),
			'role' => $this->M_Role->getAll(),
			'provinsi' => $this->M_Wilayah->getProvinsi(),
			'count' => $total_halaman,
			'data' => $this->M_Jejaring->getPaginate($halaman_awal, $batas, $where),
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
			'title' => ($this->session->userdata('lang') == 'EN') ? 'Network Profile' : "Profil Jejaring",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'jejaring' => $this->M_Jejaring->getByUserid($id),
			'komoditas' => $this->M_Komoditas->getByUser($id),
			'kategori_olahan' => $this->M_Kategori_olahan->getByUser($id),
			'tertarik' => $this->M_Ketertarikan->getByUser($id),
			'penjualan' => $this->M_Penjualan->getByUser($id),
			'gallery' => $this->M_Gallery->getAll($id)
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/jejaring-profil', $var);
		$this->load->view('layout/user/footer', $var);
	}


	/* Ajax Here! */
}