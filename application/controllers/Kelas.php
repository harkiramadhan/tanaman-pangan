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
			'laporan' => $this->M_Kelas->getLaporan($this->session->userdata('userid'), $id)
        ];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-kelasku-detail', $var);
		$this->load->view('layout/user/footer', $var);
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
				'desc' => $this->input->post('desc', TRUE)
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
}