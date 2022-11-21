<?php
class Banners extends CI_Controller {
    function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Banners'
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
			'title' => 'Landing Page',
			'banners' => $this->M_Banners->getAll(),
			'ajax' => [
				'banners'
			]
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/landingpage-banners', $var);
		$this->load->view('layout/admin/footer', $var);
    }

	/* Ajax Here! */
	function edit($id){
		$banners = $this->M_Banners->getById($id);
		?>
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="modalTambahBanner">Edit Banner</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/banners/update/' . $id) ?>" enctype="multipart/form-data" method="POST">
					<div class="text-center">
						<?php if($banners->img): ?>
							<img src="<?= base_url('uploads/banners/' . $banners->img) ?>" class="img-fluid img-center shadow rounded mb-5" style="max-height: 250px" id="image-preview2">
						<?php else: ?>
							<img src="" class="img-fluid img-center shadow rounded d-none" style="max-height: 250px" id="image-preview2">
						<?php endif; ?>
					</div>

					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Judul</p>
						</div>
						<div class="col-md-8">
							<input type="text" name="judul" class="form-control font-weight-bold text-muted" value="<?= $banners->judul ?>">
						</div>
					</div>

					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Gambar</p>
						</div>
						<div class="col-md-8">
							<input class="form-control" type="file" name="img" id="image-source2" value="<?= base_url('uploads/banners/' . $banners->img) ?>" onchange="previewImage2()">
						</div>
					</div>

					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Link</p>
						</div>
						<div class="col-md-8">
							<input type="text" name="link" class="form-control font-weight-bold text-muted" value="<?= $banners->link ?>">
						</div>
					</div>

					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
							<p class="text-muted font-weight-bold mb-0">Status</p>
						</div>
						<div class="col-md-8">
							<select class="form-control form-control-alternative me-3" name="status">
								<option value="" selected="" disabled>Pilih</option>
								<option <?= ($banners->status == 1) ? 'selected' : '' ?> value="1">Aktif</option>
								<option <?= ($banners->status == 2) ? 'selected' : '' ?> value="2">Draft</option>
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

	/* Action Here! */
	function create(){
		$config['upload_path'] = './uploads/banners';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/banners/'); 
        }

		$dataInsert = [
			'judul' => $this->input->post('judul', TRUE),
			'link' => $this->input->post('link', TRUE),
			'status' => $this->input->post('status', TRUE),
			'img' => $filename
		];
		$this->db->insert('banners', $dataInsert);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('suecces', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	function update($id){
		$banners = $this->M_Banners->getById($id);

		$config['upload_path'] = './uploads/banners';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
			if($banners->img != NULL){
				@unlink('./uploads/banners/' . @$banners->img);
			}

            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/banners/'); 
        }else{
			$filename = $banners->img;
		}

		$dataInsert = [
			'judul' => $this->input->post('judul', TRUE),
			'link' => $this->input->post('link', TRUE),
			'status' => $this->input->post('status', TRUE),
			'img' => $filename
		];
		$this->db->where('id', $id)->update('banners', $dataInsert);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('suecces', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
}