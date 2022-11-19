<?php

class Tanitrainer extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Tanitrainer'
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
			'title' => "Admin Tanitrainer",
			'tanitrainer' => $this->M_Tanitrainer->getAll()
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/tanitrainer', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function add(){
		$var = [
			'title' => "Tambah Tani Trainer",
			'ajax' => [
				'tanitrainer'
			]
		];
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/tanitrainer-add', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function detail($id){
        $var = [
			'title' => "Detail Tanitrainer",
			'data' => $this->M_Tanitrainer->getById($id),
			'ajax' => [
				'tanitrainer'
			]
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/tanitrainer-detail', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	/* Action Here! */
	function create(){
		$filename = NULL;
		$config['upload_path'] = './uploads/tanitrainer';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/tanitrainer/'); 
        }

		$cekFlag = $this->M_Tanitrainer->getByFlag(strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE))));
		if(@$cekFlag->id){
			$flag = strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE))). $cekFlag->id;
		}else{
			$flag = strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE)));
		}
		
		$dataInsert = [
			'img' => $filename,
			'judul' => $this->input->post('judul', TRUE),
			'flag' => $flag,
			'tanggal' => $this->input->post('tanggal', TRUE),
			'deskripsi' => $this->input->post('deskripsi', TRUE),
			'status' => $this->input->post('status', TRUE)
		];
		$this->db->insert('tanitrainer', $dataInsert);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}

		redirect('admin/tanitrainer');
	}

	function update($id){
		$data = $this->M_Tanitrainer->getById($id);
		
		$config['upload_path'] = './uploads/tanitrainer';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
			if($data->img != NULL){
				@unlink('./uploads/tanitrainer/' . @$data->img);
			}

            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/tanitrainer/'); 
        }else{
			$filename = $data->img;
		}

		$cekFlag = $this->M_Tanitrainer->getByFlag(strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE))), $id);
		if(@$cekFlag->id){
			$flag = strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE))). $cekFlag->id;
		}else{
			$flag = strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE)));
		}

		$dataUpdate = [
			'img' => $filename,
			'judul' => $this->input->post('judul', TRUE),
			'flag' => $flag,
			'tanggal' => $this->input->post('tanggal', TRUE),
			'deskripsi' => $this->input->post('deskripsi', TRUE),
			'status' => $this->input->post('status', TRUE)
		];
		$this->db->where('id', $id)->update('tanitrainer', $dataUpdate);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
}

	