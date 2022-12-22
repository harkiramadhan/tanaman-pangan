<?php

class Pengaturan extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Role',
			'M_User'
		]);
		if($this->session->userdata('admin') != TRUE){
			redirect('admin/auth','refresh');
		}
	}

	public function index(){
        $var = [
			'title' => 'Pengaturan Admin',
			'role' => $this->M_Role->getAll(),
			'data' => $this->db->get_where('pengaturan', ['id', 1])->row()
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/pengaturan', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	function save(){
		$dataUpdate = [
			'kontak' => $this->input->post('kontak', TRUE),
			'instagram' => $this->input->post('instagram', TRUE),
			'instagram_link' => $this->input->post('instagram_link', TRUE),
			'facebook' => $this->input->post('facebook', TRUE),
			'facebook_link' => $this->input->post('facebook_link', TRUE),
			'tiktok' => $this->input->post('tiktok', TRUE),
			'tiktok_link' => $this->input->post('tiktok_link', TRUE),
			'youtube' => $this->input->post('youtube', TRUE),
			'youtube_link' => $this->input->post('youtube_link', TRUE),
		];
		$this->db->where('id', 1)->update('pengaturan', $dataUpdate);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}

		
		redirect($_SERVER['HTTP_REFERER']);
	}
}

