<?php

class Tanitrainer extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Tanitrainer',
			'M_Role'
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
			'tanitrainer' => $this->M_Tanitrainer->getAll(),
			'ajax' => [
				'tanitrainer2'
			]
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/tanitrainer', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function add(){
		$var = [
			'title' => "Tambah Tani Trainer",
			'role' => $this->M_Role->getAll(),
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
			'role' => $this->M_Role->getAll(),
			'ajax' => [
				'tanitrainer'
			]
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/tanitrainer-detail', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	/* Ajax Here! */
	function remove($id){
		$data = $this->M_Tanitrainer->getById($id);

		?>
			<div class="modal-header">
				<h6 class="modal-title" id="modal-title-notification">Hapus Tani Trainer</h6>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="py-3 text-center">
					<h1><i class="fas fa-bell"></i></h1>
					<h4 class="text-gradient text-danger mt-4">Hapus Tani Trainer!</h4>
					<div class="text-center">
						<?php if($data->img): ?>
							<img src="<?= base_url('uploads/tanitrainer/' . $data->img) ?>" class="img-fluid img-center shadow rounded mb-5" style="max-height: 250px" id="image-preview2">
						<?php endif; ?>
					</div>
					<p><?= $data->judul ?></p>
				</div>
			</div>
			<form action="<?= site_url('admin/tanitrainer/delete/' . $id) ?>" method="post">
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger w-100 mb-0">HAPUS</button>
					<button data-bs-dismiss="modal" type="button" class="btn btn-transparant shadow-none w-100 mb-0">KEMBALI</button>
				</div>
			</form>
		<?php
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
			$flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE))). $cekFlag->id;
		}else{
			$flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE)));
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
			$tanitrainerid = $this->db->insert_id();
			$roleid = $this->input->post('role_id[]', TRUE);
			if(count($roleid) > 0){
				foreach($roleid as $row){
					$this->db->insert('tanitrainer_role', [
						'tanitrainer_id' => $tanitrainerid,
						'role_id' => $row
					]);
				}
			}

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
			$flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE))). $cekFlag->id;
		}else{
			$flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE)));
		}

		$roleid = $this->input->post('role_id[]', TRUE);
		if(count($roleid) > 0){
			$this->db->where('tanitrainer_id', $id)->delete('tanitrainer_role');
			foreach($roleid as $row){
				$this->db->insert('tanitrainer_role', [
					'tanitrainer_id' => $id,
					'role_id' => $row
				]);
			}
		}else{
			$this->db->where('tanitrainer_id', $id)->delete('tanitrainer_role');
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

	function delete($id){
		$data = $this->M_Tanitrainer->getById($id);

		if($data->img != NULL){
			@unlink('./uploads/tanitrainer/' . @$data->img);
		}	
		$this->db->where('id', $id)->delete('tanitrainer');
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Hapus");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Hapus");
		}

		redirect($_SERVER['HTTP_REFERER']);	
	}
}

	