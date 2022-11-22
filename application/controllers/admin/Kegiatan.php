<?php
class Kegiatan extends CI_Controller {
    function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Kegiatan',
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

    function index(){
        $var = [
			'title' => 'Kegiatan Landing Page',
			'kegiatan' => $this->M_Kegiatan->getAll(),
			'kategori' => $this->M_Kategori_publikasi->getAll(),
			'ajax' => [
				'kegiatan'
			]
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/landingpage-kegiatan', $var);
		$this->load->view('layout/admin/footer', $var);
    }

	/* Ajax Here! */
	function edit($id){
		$kegiatan = $this->M_Kegiatan->getById($id);
		$kategori = $this->M_Kategori_publikasi->getAll();
		?>
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="modalTambahTestimoni">Edit Kegiatan</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/kegiatan/update/' . $id) ?>" enctype="multipart/form-data" method="POST">
					<div class="text-center">
						<?php if($kegiatan->img): ?>
							<img src="<?= base_url('uploads/kegiatan/' . $kegiatan->img) ?>" class="img-fluid img-center shadow rounded mb-5" style="max-height: 250px" id="image-preview2">
						<?php else: ?>
							<img src="" class="img-fluid img-center shadow rounded d-none mb-5" style="max-height: 250px" id="image-preview2">
						<?php endif; ?>
					</div>
					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Gambar</p>
						</div>
						<div class="col-md-8">
							<input class="form-control" type="file" name="img" id="image-source2" onchange="previewImage2()">
						</div>
					</div>
					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Kategori</p>
						</div>
						<div class="col-md-8">

							<!-- Kategori disamakan dengan kategori publikasi -->
							<select class="form-control form-control-alternative me-3" name="kategori_id" required>
								<option value="" selected="" disabled>Pilih Kategori</option>
								<?php foreach($kategori->result() as $kt){ ?>
									<option <?= ($kegiatan->kategori_id == $kt->id) ? 'selected' : '' ?> value="<?= $kt->id ?>"> <?= $kt->kategori ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Judul</p>
						</div>
						<div class="col-md-8">
							<input type="text" name="judul" class="form-control font-weight-bold text-muted" value="<?= $kegiatan->judul ?>" required>
						</div>
					</div>
					<div class="row d-flex align-items-center form-group mt-2">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Tanggal</p>
						</div>
						<div class="col-md-8">
							<input type="date" name="tanggal" class="form-control font-weight-bold text-muted" value="<?= $kegiatan->tanggal ?>" required>
						</div>
					</div>
					<div class="row d-flex align-items-center form-group mt-2">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">URL</p>
						</div>
						<div class="col-md-8">
							<input type="text" name="link" class="form-control font-weight-bold text-muted" value="<?= $kegiatan->link ?>" required>
						</div>
					</div>
					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Status</p>
						</div>
						<div class="col-md-8">
							<select class="form-control form-control-alternative me-3" name="status">
								<option value="" selected="" disabled>Pilih</option>
								<option <?= ($kegiatan->status == 1) ? 'selected' : '' ?> value="1">Aktif</option>
								<option <?= ($kegiatan->status == 2) ? 'selected' : '' ?> value="2">Draft</option>
							</select>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-dark w-100 mb-0">SIMPAN</button>
						<button data-bs-dismiss="modal" type="button" class="btn btn-transparant shadow-none w-100 mb-0">KEMBALI</button>
					</div>
				</form>
			</div>
			<script>
				function previewImage2() {
					var element = document.getElementById("image-preview2")
					element.classList.remove("d-none")
					document.getElementById("image-preview2").style.display = "block"

					var oFReader = new FileReader()
					oFReader.readAsDataURL(document.getElementById("image-source2").files[0])
					oFReader.onload = function(oFREvent) {
                        document.getElementById("image-preview2").src = oFREvent.target.result
                    }
				}
			</script>
		<?php
	}

	function remove($id){
		$kegiatan = $this->M_Kegiatan->getById($id);

		?>
			<div class="modal-header">
				<h6 class="modal-title" id="modal-title-notification">Hapus Kegiatan</h6>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="py-3 text-center">
					<h1><i class="fas fa-bell"></i></h1>
					<h4 class="text-gradient text-danger mt-4">Hapus Kegiatan!</h4>
					<div class="text-center">
						<?php if($kegiatan->img): ?>
							<img src="<?= base_url('uploads/kegiatan/' . $kegiatan->img) ?>" class="img-fluid img-center shadow rounded mb-5" style="max-height: 250px" id="image-preview2">
						<?php endif; ?>
					</div>
					<p><?= $kegiatan->judul . ' - ' . $kegiatan->kategori ?></p>
				</div>
			</div>
			<form action="<?= site_url('admin/kegiatan/delete/' . $id) ?>" method="post">
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger w-100 mb-0">HAPUS</button>
					<button data-bs-dismiss="modal" type="button" class="btn btn-transparant shadow-none w-100 mb-0">KEMBALI</button>
				</div>
			</form>
		<?php
	}

	/* Action Here! */
	function create(){
		$config['upload_path'] = './uploads/kegiatan';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/kegiatan/'); 
        }

		$dataInsert = [
			'kategori_id' => $this->input->post('kategori_id', TRUE),
			'judul' => $this->input->post('judul', TRUE),
			'tanggal' => $this->input->post('tanggal', TRUE),
			'link' => $this->input->post('link', TRUE),
			'status' => $this->input->post('status', TRUE),
			'img' => $filename
		];
		$this->db->insert('kegiatan', $dataInsert);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('suecces', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	function update($id){
		$kegiatan = $this->M_Kegiatan->getById($id);
		
		$config['upload_path'] = './uploads/kegiatan';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
			if($kegiatan->img != NULL){
				@unlink('./uploads/kegiatan/' . @$kegiatan->img);
			}

            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/kegiatan/'); 
        }else{
			$filename = $kegiatan->img;
		}

		$dataUpdate = [
			'kategori_id' => $this->input->post('kategori_id', TRUE),
			'judul' => $this->input->post('judul', TRUE),
			'tanggal' => $this->input->post('tanggal', TRUE),
			'link' => $this->input->post('link', TRUE),
			'status' => $this->input->post('status', TRUE),
			'img' => $filename
		];
		$this->db->where('id', $id)->update('kegiatan', $dataUpdate);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('suecces', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	function delete($id){
		$kegiatan = $this->M_Kegiatan->getById($id);
		if($kegiatan->img != NULL){
			@unlink('./uploads/kegiatan/' . @$kegiatan->img);
		}

		$this->db->where('id', $id)->delete('kegiatan');
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('suecces', "Data Berhasil Di Hapus");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Hapus");
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
}