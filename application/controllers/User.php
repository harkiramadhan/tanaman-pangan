<?php

class User extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Komoditas',
			'M_Role',
			'M_User',
			'M_Wilayah'
		]);

		if($this->session->userdata('masuk') != TRUE){
			redirect('','refresh');
		}
	}
	public function index(){
		$var = [
			'title' => 'Dashboard User',
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'provinsi' => $this->M_Wilayah->getProvinsi(),
			'ajax' => [
				'profil'
			]
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-profil', $var);
		$this->load->view('layout/user/footer', $var);
	}

    public function data(){
        $var['title'] = "Dahboard User Data Pertanian";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-profil-data', $var);
		$this->load->view('layout/user/footer', $var);
	}
	
    public function password(){
        $var['title'] = "Dahboard User Data Pertanian";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-profil-password', $var);
		$this->load->view('layout/user/footer', $var);
	}

    public function kelasku(){
        $var['title'] = "Dahboard User Data Pertanian";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-kelasku', $var);
		$this->load->view('layout/user/footer', $var);
	}

	public function galeri(){
        $var['title'] = "Dahboard User Data Pertanian";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-galeri', $var);
		$this->load->view('layout/user/footer', $var);
	}

	/* Ajax Here! */
	function getKabupaten(){
		$provid = $this->input->get('provid', TRUE);
		$kabupaten = $this->M_Wilayah->getKotaByProv($provid);
		
		?>
			<option> Pilih Kabupaten / Kota</option>
		<?php
		foreach($kabupaten->result() as $row){
			?>
				<option value="<?= $row->city_id ?>"> <?= ucwords(strtolower($row->city_name)) ?></option>
			<?php
		}
	}

	function getKecamatan(){
		$kabid = $this->input->get('kabid', TRUE);
		$kecamatan = $this->M_Wilayah->getKabupatenByKota($kabid);

		?>
			<option> Pilih Kecamatan</option>
		<?php
		foreach($kecamatan->result() as $row){
			?>
				<option value="<?= $row->dis_id ?>"> <?= ucwords(strtolower($row->dis_name)) ?></option>
			<?php
		}
	}

	function getKelurahan(){
		$kecid = $this->input->get('kecid', TRUE);
		$kelurahan = $this->M_Wilayah->getKecamatanByKab($kecid);

		?>
			<option> Pilih Desa/Kelurahan</option>
		<?php
		foreach($kelurahan->result() as $row){
			?>
				<option value="<?= $row->subdis_id ?>"> <?= ucwords(strtolower($row->subdis_name)) ?></option>
			<?php
		}
	}
}