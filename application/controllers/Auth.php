<?php

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Komoditas',
			'M_Role',
			'M_User'
		]);
	}
	public function index(){
        $var['title'] = "Masuk";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/masuk', $var);
		$this->load->view('layout/user/footer', $var);
	
	}

    public function daftar(){
		$var = [
			'title' => "Daftar",
			'komoditas' => $this->M_Komoditas->getAll(),
			'role' => $this->M_Role->getAll()
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/daftar', $var);
		$this->load->view('layout/user/footer', $var);
	}

	public function logout(){
		session_destroy();
		redirect('','refresh');
	}

	/* Action Here */
	function register(){
		$password = $this->input->post('password', TRUE);
		$validate = $this->input->post('validate_password', TRUE);
		$komoditas = $this->input->post('komoditas_id[]', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$nohp = $this->input->post('hp', TRUE);
		$roleid = $this->input->post('role_id', TRUE);

		if($password != $validate){
			$this->session->set_flashdata('error', "Password Tidak Cocok");
		}else{
			$dataInsert = [
				'nama' => $nama,
				'hp' => $nohp,
				'password' => $password,
				'role_id' => $roleid,
			];
			$this->db->insert('user', $dataInsert);
			if($this->db->affected_rows() > 0){
				$userid = $this->db->insert_id();
				if(!empty($komoditas)){
					foreach($komoditas as $k){
						$dataInsertKomoditas = [
							'user_id' => $userid,
							'komoditas_id' => $k
						];
						$this->db->insert('user_komoditas', $dataInsertKomoditas);
					}
				}

				$this->session->set_userdata('masuk', TRUE);
				$this->session->set_userdata('userid', $userid);
				$this->session->set_userdata('nama', $nama);
				$this->session->set_userdata('roleid', $roleid);

				
				redirect('user','refresh');
			}else{
				$this->session->set_flashdata('error', "Gagal Mendaftar, Silahkan Coba Kembali!");
			}
		}

	}

	function login(){
		$hp = $this->input->post('hp', TRUE);
		$pwd = $this->input->post('password', TRUE);
		
		$user = $this->M_User->getByHp($hp);
		if(@$user->id){
			if($pwd == $user->password){
				$this->session->set_userdata('masuk', TRUE);
				$this->session->set_userdata('userid', $user->id);
				$this->session->set_userdata('nama', $user->nama);
				$this->session->set_userdata('hp', $user->hp);
				$this->session->set_userdata('roleid', $user->role_id);

				redirect('user','refresh');
			}else{
				$this->session->set_flashdata('error', "Wrong Password!");
				redirect($_SERVER['HTTP_REFERER']);
			}
			
		}else{
			$this->session->set_flashdata('error', "User Not Found!");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}