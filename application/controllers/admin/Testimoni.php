<?php
class Testimoni extends CI_Controller{
    function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Testimoni'
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
			'title' => 'Testimoni Landing Page',
			'testimoni' => $this->M_Testimoni->getAll(),
			'ajax' => [
				'testimoni'
			]
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/landingpage-testimoni', $var);
		$this->load->view('layout/admin/footer', $var);
    }

    /* Action Here! */
    function create(){
        $config['upload_path'] = './uploads/testimoni';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/testimoni/'); 
        }

        $dataInsert = [
            'img' => $filename,
            'nama' => $this->input->post('nama', TRUE),
            'jabatan' => $this->input->post('jabatan', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'status' => $this->input->post('status', TRUE),
        ];
        $this->db->insert('testimoni', $dataInsert);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('suecces', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_flashdata('error', "Data Gagal Di Simpan");
		}
		
		redirect($_SERVER['HTTP_REFERER']);
    }
}