<?php
class Gallery extends CI_Controller{
    function __construct(){
		parent::__construct();

		$this->load->model([
			'M_User',
            'M_Gallery'
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
            'title' => "Dahboard User Data Pertanian",
            'user' => $this->M_User->getById($this->session->userdata('userid')),
            'gallery' => $this->M_Gallery->getAll($this->session->userdata('userid')),
            'ajax' => [
                'user-gallery'
            ]
        ];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-galeri', $var);
		$this->load->view('layout/user/footer', $var);
    }

    /* Action Here */
    function create(){
        $userid = $this->session->userdata('userid');
        
        $config['upload_path'] = './uploads/gallery';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/gallery/'); 

            $dataInsert = [
                'user_id' => $userid,
                'img' => $filename
            ];
            $this->db->insert('user_gallery', $dataInsert);
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

    function delete($id){
        $gallery = $this->M_Gallery->getById($id);
        if(@$gallery->img){
            @unlink('./uploads/gallery/' . @$gallery->img);
        }

        $this->db->where('id', $id)->delete('user_gallery');
        if($this->db->affected_rows() > 0){
			$this->session->set_userdata('success', "Data Berhasil Di Hapus");
		}else{
			$this->session->set_userdata('error', "Data Gagal Di Hapus");
		}
		
		redirect($_SERVER['HTTP_REFERER']);
    }
}