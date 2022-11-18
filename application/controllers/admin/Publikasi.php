<?php

class Publikasi extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Publikasi',
			'M_Kategori_publikasi'
		]);
		$this->load->library('image_lib');
		if($this->session->userdata('admin') != TRUE){
			redirect('admin/auth','refresh');
		}
	}

	private function resizeImage($filename, $path){
        $config['image_library'] = 'gd2';  
        $config['source_image'] = $path.$filename;  
        $config['create_thumb'] = FALSE;  
        $config['maintain_ratio'] = TRUE;  
        $config['quality'] = '75%';  
        $config['new_image'] = $path.$filename;  
        $config['width'] = 500;              
  
        $this->image_lib->initialize($config);
        $this->image_lib->resize();  
        $this->image_lib->clear();
    }
	
	public function index(){
        $var = [
			'title' => "Admin Publikasi",
			'publikasi' => $this->M_Publikasi->getAll()
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/publikasi', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function add(){
        $var = [
			'title' => "Tambah Publikasi",
			'kategori' => $this->M_Kategori_publikasi->getAll(),
			'ajax' => [
				'publikasi'
			]
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/publikasi-add', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function detail($id){
        $var = [
			'title' => "Detail Publikasi",
			'kategori' => $this->M_Kategori_publikasi->getAll(),
			'publikasi' => $this->M_Publikasi->getById($id),
			'ajax' => [
				'publikasi'
			]
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/publikasi-detail', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	/* Action Here */
	function create(){
		$filename = NULL;
		$config['upload_path'] = './uploads/publikasi';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('cover_img')){
            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/publikasi/'); 
        }

		$dataInsert = [
			'cover_img' => $filename,
			'judul' => $this->input->post('judul', TRUE),
			'flag' => strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE))),
			'tanggal' => $this->input->post('tanggal', TRUE),
			'kategori_id' => $this->input->post('kategori_id', TRUE),
			'link' => $this->input->post('link', TRUE),
			'deskripsi' => $this->input->post('deskripsi', TRUE),
			'status' => $this->input->post('status', TRUE),
		];
		$this->db->insert('publikasi', $dataInsert);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}

		redirect('admin/publikasi');
	}

	function update($id){
		$publikasi = $this->M_Publikasi->getById($id);

		$config['upload_path'] = './uploads/publikasi';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('cover_img')){
			if($publikasi->cover_img != NULL){
				@unlink('./uploads/publikasi/' . @$publikasi->cover_img);
			}

            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/publikasi/'); 
        }else{
			$filename = $publikasi->cover_img;
		}

		$dataUpdate = [
			'cover_img' => $filename,
			'judul' => $this->input->post('judul', TRUE),
			'flag' => strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE))),
			'tanggal' => $this->input->post('tanggal', TRUE),
			'kategori_id' => $this->input->post('kategori_id', TRUE),
			'link' => $this->input->post('link', TRUE),
			'deskripsi' => $this->input->post('deskripsi', TRUE),
			'status' => $this->input->post('status', TRUE),
		];
		$this->db->where('id', $id)->update('publikasi', $dataUpdate);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
}

	