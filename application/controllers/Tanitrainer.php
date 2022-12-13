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
		$roleid = $this->input->get('ids[]', TRUE);
		$status = $this->input->get('status', TRUE);

		$whereRole = [];
		if($roleid != NULL){
			foreach($roleid as $val){
				array_push($whereRole, $val);
			}
		}

		$where = [];
		if($status != NULL){
			if($status == 'Selesai'){
				array_push($where, [
					'column' => 't.status_kegiatan',
					'value' => 3
				]);
			}elseif($status == 'Aktif'){
				array_push($where, [
					'column' => 't.status_kegiatan !=',
					'value' => 3
				]);
			}
		}


		$previous = $halaman - 1;
		$next = $halaman + 1;

		$jumlah_data = $this->M_Tanitrainer->getAll()->num_rows();
		$total_halaman = ceil($jumlah_data / $batas);

        $var = [
			'title' => "Tani Trainer",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'role' => $this->M_Role->getAll(),
			'data' => $this->M_Tanitrainer->getPaginate($halaman_awal, $batas, [],$whereRole, $where),
			'count' => $total_halaman,
			'next' => $next,
			'previous' => $previous,
			'page' => $halaman,
			'ajax' => [
				'tanitrainer'
			]
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/tanitrainer', $var);
		$this->load->view('layout/user/footer', $var);
	}

    public function detail($flag){
        $var = [
			'title' => "Tani Trainer",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'data' => $this->M_Tanitrainer->getByFlag($flag),
			'tanitrainer' => $this->M_Tanitrainer->getPaginate(1, 10, $flag),
			'ajax' => [
				'tanitrainer-detail'
			]
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/tanitrainer-detail', $var);
		$this->load->view('layout/user/footer', $var);
	}

	/* Action Here! */
	function join(){
		$userid = $this->session->userdata('userid');
		$id = $this->input->post('tanitrainerid', TRUE);

		if($userid){
			$cek =  $this->M_Tanitrainer->checkUser($userid, $id);
			if($cek->num_rows() > 0){}else{
				$dataInsert = [
					'user_id' => $this->session->userdata('userid'),
					'tanitrainer_id' => $id
				];
				$this->db->insert('user_tanitrainer', $dataInsert);
				if($this->db->affected_rows() > 0){
					$this->session->set_flashdata('success', "Berhasil Mengikuti Tanitrainer");
				}else{
					$this->session->set_flashdata('error', "Gagal Mengikuti Tanitrainer");
				}
			}
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
}