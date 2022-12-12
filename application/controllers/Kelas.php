<?php
class Kelas extends CI_Controller{
    function __construct(){
		parent::__construct();

		$this->load->model([
			'M_User',
			'M_Kelas'
		]);

        $this->load->library('image_lib');
		if($this->session->userdata('masuk') != TRUE){
			redirect('','refresh');
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
            'title' => "Dahboard User Kelasku",
            'user' => $this->M_User->getById($this->session->userdata('userid')),
			'kelas' => $this->M_Kelas->getByUser($this->session->userdata('userid')),
        ];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-kelasku', $var);
		$this->load->view('layout/user/footer', $var);
    }

	function detail($id){
        $var = [
            'title' => "Dahboard Detail Kelas",
            'user' => $this->M_User->getById($this->session->userdata('userid')),
			'kelas' => $this->M_Kelas->getById($id),
			'laporan' => $this->M_Kelas->getLaporan($this->session->userdata('userid'), $id),
            'ajax' => [
                'detail-kelas'
            ]
        ];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-kelasku-detail', $var);
		$this->load->view('layout/user/footer', $var);
    }

    /* Ajax Here */
    function edit($id){
        $data = $this->M_Kelas->getDetailById($id);
        ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('kelas/updateLaporan/' . $id) ?>" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <div class="text-center">
                        <?php if($data->img): ?>
                            <img src="<?= base_url('uploads/laporan/' . $data->img) ?>" class="img-fluid img-center shadow rounded mb-4" style="max-height: 250px" id="image-preview2">
                        <?php else: ?>
                            <img src="" class="img-fluid img-center shadow rounded mb-4 d-none" style="max-height: 250px" id="image-preview2">
                        <?php endif; ?>
                    </div>
                    <div class="row d-flex align-items-center form-group">
                        <div class="col-md-4">
                            <p class="text-muted font-weight-bold mb-0">Upload Foto Terbaru<sup class="text-danger">*</sup></p>
                        </div>
                        <div class="col-md-8">
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" id="image-source2" aria-describedby="inputGroupFileAddon04" onchange="previewImage2()">
                                <label class="custom-file-label" for="image-source">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center form-group">
                        <div class="col-md-4">
                            <p class="text-muted font-weight-bold mb-0">Judul Update<sup class="text-danger">*</sup></p>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="judul" class="form-control font-weight-bold text-muted" value="<?= $data->judul ?>" required="">
                        </div>
                    </div>

                    <div class="row d-flex align-items-center form-group">
                        <div class="col-md-4">
                            <p class="text-muted font-weight-bold mb-0">Tanggal Update<sup class="text-danger">*</sup></p>
                        </div>
                        <div class="col-md-8">
                            <input type="date" name="tanggal" class="form-control font-weight-bold text-muted" value="<?= $data->tanggal ?>" required="">
                        </div>
                    </div>

                    <div class="row d-flex align-items-center form-group">
                        <div class="col-md-4">
                            <p class="text-muted font-weight-bold mb-0">Berita Update<sup class="text-danger">*</sup></p>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" id="" rows="3" name="desc"><?= $data->desc ?></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </form>
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
        $laporan = $this->M_Kelas->getDetailById($id);
        if($laporan->img != NULL){
            @unlink('./uploads/laporan/' . @$laporan->img);
        }

        $this->db->where('id', $id)->delete('user_laporan');
        if($this->db->affected_rows() > 0){
            $this->session->set_userdata('success', "Data Berhasil Di Hapus");
        }else{
            $this->session->set_userdata('error', "Data Gagal Di Hapus");
        }

        
        redirect($_SERVER['HTTP_REFERER']);
    }

	/* Action Here */
	function createLaporan(){
		$userid = $this->session->userdata('userid');
		$tanitrainerid = $this->input->post('tanitrainer_id', TRUE);
        
        $config['upload_path'] = './uploads/laporan';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if($this->upload->do_upload('img')){
            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/laporan/'); 

            $dataInsert = [
                'user_id' => $userid,
                'tanitrainer_id' => $tanitrainerid,
				'judul' => $this->input->post('judul', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'desc' => $this->input->post('desc', TRUE),
                'img' => $filename
            ];
            $this->db->insert('user_laporan', $dataInsert);
            if($this->db->affected_rows() > 0){
                $this->session->set_userdata('success', "Data Berhasil Di Simpan");
            }else{
                $this->session->set_userdata('error', "Data Gagal Di Simpan");
            }
        }else{
            $this->session->set_userdata('error', "Gambar Belum Di Pilih");
        }

		redirect($_SERVER['HTTP_REFERER']);
	}

    function updateLaporan($id){
        $laporan = $this->M_Kelas->getDetailById($id);

        $config['upload_path'] = './uploads/laporan';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if($this->upload->do_upload('img')){
            if($laporan->img != NULL){
				@unlink('./uploads/laporan/' . @$laporan->img);
			}

            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/laporan/'); 
        }else{
            $filename = $laporan->img;
        }

        $dataUpdate = [
            'judul' => $this->input->post('judul', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE),
            'desc' => $this->input->post('desc', TRUE),
            'img' => $filename
        ];
        $this->db->where('id', $id)->update('user_laporan', $dataUpdate);
        if($this->db->affected_rows() > 0){
            $this->session->set_userdata('success', "Data Berhasil Di Simpan");
        }else{
            $this->session->set_userdata('error', "Data Gagal Di Simpan");
        }

		redirect($_SERVER['HTTP_REFERER']);
    }
}