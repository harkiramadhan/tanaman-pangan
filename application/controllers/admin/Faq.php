<?php

class Faq extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Faq'
		]);

		if($this->session->userdata('admin') != TRUE){
			redirect('admin/auth','refresh');
		}
	}

	public function index(){
        $var = [
			'title' => 'FAQ Page',
			'faq' => $this->M_Faq->getAll(),
			'ajax' => [
				'faq'
			]
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/faq', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	/* Ajax Here */
	function edit($id){
		$faq = $this->M_Faq->getById($id);

		?>
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="modalFAQ">Edit Pertanyaan</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/faq/update/' . $id) ?>" method="POST">
					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Pertanyaan</p>
						</div>
						<div class="col-md-8">
							<input type="text" name="question" class="form-control font-weight-bold text-muted" value="<?= $faq->question ?>" required>
						</div>
					</div>
					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Jawaban</p>
						</div>
						<div class="col-md-8">
							<input type="text" name="answer" class="form-control font-weight-bold text-muted" value="<?= $faq->answer ?>" required>
						</div>
					</div>
					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Status</p>
						</div>
						<div class="col-md-8">
							<select class="form-control form-control-alternative me-3" name="status" required>
								<option value="" selected="" disabled>Pilih</option>
								<option <?= ($faq->status == 1) ? 'selected' : '' ?> value="1">Aktif</option>
								<option <?= ($faq->status == 2) ? 'selected' : '' ?> value="2">Draft</option>
							</select>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-dark w-100 mb-0">SIMPAN</button>
						<button data-bs-dismiss="modal" type="button" class="btn btn-transparant shadow-none w-100 mb-0">KEMBALI</button>
					</div>
				</form>
			</div>
		<?php
	}

	/* Action Here */
	function create(){
		$dataInsert = [
			'question' => $this->input->post('question', TRUE),
			'answer'=> $this->input->post('answer', TRUE),
			'status' => $this->input->post('status', TRUE)
		];
		$this->db->insert('faq', $dataInsert);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	function update($id){
		$dataUpdate = [
			'question' => $this->input->post('question', TRUE),
			'answer'=> $this->input->post('answer', TRUE),
			'status' => $this->input->post('status', TRUE)
		];
		$this->db->where('id', $id)->update('faq', $dataUpdate);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
}

