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
			'publikasi' => $this->M_Publikasi->getAll(),
			'kategori' => $this->M_Kategori_publikasi->getAll(),
			'ajax' => [
				'publikasi2'
			]
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

	/* Ajax Here */
	function remove($id){
		$publikasi = $this->M_Publikasi->getById($id);

		?>
			<div class="modal-header">
				<h6 class="modal-title" id="modal-title-notification">Hapus Publikasi</h6>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="py-3 text-center">
					<h1><i class="fas fa-bell"></i></h1>
					<h4 class="text-gradient text-danger mt-4">Hapus Publikasi!</h4>
					<div class="text-center">
						<?php if($publikasi->cover_img): ?>
							<img src="<?= base_url('uploads/publikasi/' . $publikasi->cover_img) ?>" class="img-fluid img-center shadow rounded mb-5" style="max-height: 250px" id="image-preview2">
						<?php endif; ?>
					</div>
					<p><?= $publikasi->judul . ' - ' . $publikasi->kategori ?></p>
				</div>
			</div>
			<form action="<?= site_url('admin/publikasi/delete/' . $id) ?>" method="post">
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger w-100 mb-0">HAPUS</button>
					<button data-bs-dismiss="modal" type="button" class="btn btn-transparant shadow-none w-100 mb-0">KEMBALI</button>
				</div>
			</form>
		<?php
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

		$cekFlag = $this->M_Publikasi->getByFlag(strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE))));
		if(@$cekFlag->id){
			$flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE))). $cekFlag->id;
		}else{
			$flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE)));
		}

		$dataInsert = [
			'cover_img' => $filename,
			'judul' => $this->input->post('judul', TRUE),
			'flag' => $flag,
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

		$cekFlag = $this->M_Publikasi->getByFlag(strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE))), $id);
		if(@$cekFlag->id){
			$flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE))). $cekFlag->id;
		}else{
			$flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE)));
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

	function delete($id){
		$publikasi = $this->M_Publikasi->getById($id);

		if($publikasi->cover_img != NULL){
			@unlink('./uploads/publikasi/' . @$publikasi->cover_img);
		}
		$this->db->where('id', $id)->delete('publikasi');
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Hapus");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Hapus");
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
}

	