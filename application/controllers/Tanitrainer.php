<?php

class Tanitrainer extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_User',
			'M_Tanitrainer',
			'M_Role'
		]);
	}

	public function index(){
		$batas = 9;
		$page = $this->input->get('page', TRUE);
		$halaman = isset($page) ? (int)$page : 1;
		$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

		$previous = $halaman - 1;
		$next = $halaman + 1;

		$jumlah_data = $this->M_Tanitrainer->getAll()->num_rows();
		$total_halaman = ceil($jumlah_data / $batas);

        $var = [
			'title' => "Tani Trainer",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'role' => $this->M_Role->getAll(),
			'data' => $this->M_Tanitrainer->getPaginate($halaman_awal, $batas),
			'count' => $total_halaman,
			'next' => $next,
			'previous' => $previous,
			'page' => $halaman,
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/tanitrainer', $var);
		$this->load->view('layout/user/footer', $var);
	}

    public function detail($flag){
        $var = [
			'title' => "Tani Trainer",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'data' => $this->M_Tanitrainer->getByFlag($flag)
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/tanitrainer-detail', $var);
		$this->load->view('layout/user/footer', $var);
	}
}