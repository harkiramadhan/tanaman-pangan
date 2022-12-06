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

	function detail(){
        $var = [
            'title' => "Dahboard Detail Kelas",
            'user' => $this->M_User->getById($this->session->userdata('userid')),
			'kelas' => $this->M_Kelas->getByUser($this->session->userdata('userid')),
        ];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-kelasku-detail', $var);
		$this->load->view('layout/user/footer', $var);
    }
}