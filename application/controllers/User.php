<?php

class User extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Komoditas',
			'M_Role',
			'M_User',
			'M_Wilayah',
			'M_Kelembagaan',
			'M_Penjualan',
			'M_Kategori_olahan',
			'M_Ketertarikan'
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

	public function index(){
		$var = [
			'title' => 'Dashboard User',
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'provinsi' => $this->M_Wilayah->getProvinsi(),
			'role' => $this->M_Role->getAll(),
			'ajax' => [
				'profil'
			]
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-profil', $var);
		$this->load->view('layout/user/footer', $var);
	}

    public function data(){
        $var = [
			'title' => 'Dashboard User Data Pertanian',
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'lembaga' => $this->db->get('kelembagaan'),
			'komoditas' => $this->M_Komoditas->getAll(),
			'penjualan' => $this->M_Penjualan->getAll(),
			'kategori_olahan' => $this->M_Kategori_olahan->getAll(),
			'ketertarikan' => $this->M_Ketertarikan->getAll()
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-profil-data', $var);
		$this->load->view('layout/user/footer', $var);
	}
	
    public function password(){
        $var = [
			'title' => 'Dashboard User Kata Sandi',
			'user' => $this->M_User->getById($this->session->userdata('userid')),
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-profil-password', $var);
		$this->load->view('layout/user/footer', $var);
	}

	public function pengaturan(){
        
        $var = [
			'title' => 'Dashboard User Kata Sandi',
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'ajax' => [
				'setting'
			]
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-profil-jualbeli', $var);
		$this->load->view('layout/user/footer', $var);
	}

	/* Action Here! */
	function saveProfile(){
		$user = $this->M_User->getById($this->session->userdata('userid'));

		$config['upload_path'] = './uploads/profile';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('file')){
			if($user->img != NULL){
				@unlink('./uploads/profile/' . @$user->img);
			}
			
            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/profile/'); 
        }else{
			$filename = $user->img;
		}

		$config['upload_path'] = './uploads/cover';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config, 'cover');
		if($this->cover->do_upload('cover_img')){
			if($user->cover_img != NULL){
				@unlink('./uploads/cover/' . @$user->cover_img);
			}

			$coverData = $this->cover->data();
			$coverName = $coverData['file_name'];
			$this->resizeImage($coverName, './uploads/cover/');
		}else{
			$coverName = $user->cover_img;
		}

		$dataUpdate = [
			'img' => $filename,
			'role_id' => $this->input->post('role_id', TRUE),
			'nama' => $this->input->post('nama', TRUE),
			'hp' => $this->input->post('hp', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
			'prov' => $this->input->post('prov', TRUE),
			'kab_kota' => $this->input->post('kab_kota', TRUE),
			'kec' => $this->input->post('kec', TRUE),
			'desa_kel' => $this->input->post('desa_kel', TRUE),
			'cover_img' => $coverName,
			'maps' => $this->input->post('maps', TRUE),
			'deskripsi' => $this->input->post('deskripsi', TRUE),
			'instagram' => $this->input->post('instagram', TRUE),
			'facebook' => $this->input->post('facebook', TRUE),
			'tiktok' => $this->input->post('tiktok', TRUE),
			'youtube' => $this->input->post('youtube', TRUE),
		];
		$this->db->where('id', $this->session->userdata('userid'))->update('user', $dataUpdate);
		if($this->db->affected_rows() > 0){
			$this->session->set_userdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_userdata('error', "Data Gagal Di Simpan");
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	function saveData(){
		$userid = $this->session->userdata('userid');
		$dataUpdate = [
			'nama_kelembagaan' => $this->input->post('nama_kelembagaan', TRUE),
			'kelembagaan_id' => $this->input->post('kelembagaan_id', TRUE),
			'lahan_yg_dikelola' => $this->input->post('lahan_yg_dikelola', TRUE),
			'rata_produksi_tahun' => $this->input->post('rata_produksi_tahun', TRUE),
			'rata_produksi_bulan' => $this->input->post('rata_produksi_bulan', TRUE),
			'jenis_olahan' => $this->input->post('jenis_olahan', TRUE),
			'produksi_olahan' => $this->input->post('produksi_olahan', TRUE),
			'jenis_pupuk' => $this->input->post('jenis_pupuk', TRUE),
			'jenis_pestisida' => $this->input->post('jenis_pestisida', TRUE),
			'jenis_aisintan' => $this->input->post('jenis_aisintan', TRUE),
			'keterangan' => $this->input->post('keterangan', TRUE),
			'menjual_produk' => $this->input->post('menjual_produk', TRUE),
			'membutuhkan_produk' => $this->input->post('membutuhkan_produk', TRUE),
			'produk_dijual_bulanan' => $this->input->post('produk_dijual_bulanan', TRUE),
			'produk_dibutuhkan_bulanan' => $this->input->post('produk_dibutuhkan_bulanan', TRUE),	
		];
		$this->db->where('id', $userid)->update('user', $dataUpdate);

		$penjualan = $this->input->post('penjualan_id[]', TRUE);
		if(!empty($penjualan)){
			$this->db->where('user_id', $userid)->delete('user_penjualan');
			foreach($penjualan as $p){
				$this->db->insert('user_penjualan', [
					'user_id' => $userid,
					'penjualan_id' => $p
				]);
			}
		}else{
			$this->db->where('user_id', $userid)->delete('user_penjualan');
		}

		$ketertarikan = $this->input->post('ketertarikan_id[]', TRUE);
		if(!empty($ketertarikan)){
			$this->db->where('user_id', $userid)->delete('user_tertarik');
			foreach($ketertarikan as $kt){
				$this->db->insert('user_tertarik', [
					'user_id' => $userid,
					'ketertarikan_id' => $kt
				]);
			}
		}else{
			$this->db->where('user_id', $userid)->delete('user_tertarik');
		}

		$kategori_olahan = $this->input->post('kategori_olahan_id[]', TRUE);
		if(!empty($kategori_olahan)){
			$this->db->where('user_id', $userid)->delete('user_kategori_olahan');
			foreach($kategori_olahan as $ko){
				$this->db->insert('user_kategori_olahan', [
					'user_id' => $userid,
					'kategori_olahan_id' => $ko
				]);
			}
		}else{
			$this->db->where('user_id', $userid)->delete('user_kategori_olahan');
		}

		$komoditas = $this->input->post('komoditas_id[]', TRUE);
		if(!empty($komoditas)){
			$this->db->where('user_id', $userid)->delete('user_komoditas');
			foreach($komoditas as $k){
				$this->db->insert('user_komoditas', [
					'user_id' => $userid,
					'komoditas_id' => $k
				]);
			}
		}else{
			$this->db->where('user_id', $userid)->delete('user_komoditas');
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	function save(){
		$userid = $this->session->userdata('userid');
		$user = $this->M_User->getById($userid);

		/* Upload Produk Jual */
		$config['upload_path'] = './uploads/produk';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img_jual')){
			if($user->produk_jual != NULL){
				@unlink('./uploads/produk/' . @$user->produk_jual);
			}
			
            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/produk/'); 
        }else{
			$filename = $user->produk_jual;
		}

		/* Upload Produk Butuh */
		$config['upload_path'] = './uploads/produk';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config, 'cover');
		if($this->cover->do_upload('img_butuh')){
			if($user->produk_butuh != NULL){
				@unlink('./uploads/produk/' . @$user->produk_butuh);
			}

			$coverData = $this->cover->data();
			$produkButuhName = $coverData['file_name'];
			$this->resizeImage($produkButuhName, './uploads/produk/');
		}else{
			$produkButuhName = $user->produk_butuh;
		}

		$dataUpdate = [
			'status' => $this->input->post('status', TRUE),
			'status_butuh' => $this->input->post('status_butuh', TRUE),
			'menjual_produk' => $this->input->post('menjual_produk', TRUE),
			'membutuhkan_produk' => $this->input->post('membutuhkan_produk', TRUE),
			'produk_dijual_bulanan' => $this->input->post('produk_dijual_bulanan', TRUE),
			'produk_dibutuhkan_bulanan' => $this->input->post('produk_dibutuhkan_bulanan', TRUE),
			'produk_jual' => $filename,
			'produk_butuh' => $produkButuhName
		];
		$this->db->where('id', $userid)->update('user', $dataUpdate);
		redirect($_SERVER['HTTP_REFERER']);
	}

	function changePassword(){
		$pass = $this->input->post('new-pass', TRUE);
		$passValid = $this->input->post('new-pass-valid', TRUE);

		if($pass == $passValid){
			$this->db->where('id', $this->session->userdata('userid'))->update('user', [
				'password' => $pass
			]);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	/* Ajax Here! */
	function getKabupaten(){
		$provid = $this->input->get('provid', TRUE);
		$kabupaten = $this->M_Wilayah->getKabupatenByProv($provid);
		
		?>
			<option value=""> Pilih Kabupaten / Kota</option>
		<?php
		foreach($kabupaten->result() as $row){
			?>
				<option value="<?= $row->city_id ?>"> <?= ucwords(strtolower($row->city_name)) ?></option>
			<?php
		}
	}

	function getKecamatan(){
		$kabid = $this->input->get('kabid', TRUE);
		$kecamatan = $this->M_Wilayah->getKecamatanByKab($kabid);

		?>
			<option value=""> Pilih Kecamatan</option>
		<?php
		foreach($kecamatan->result() as $row){
			?>
				<option value="<?= $row->dis_id ?>"> <?= ucwords(strtolower($row->dis_name)) ?></option>
			<?php
		}
	}

	function getKelurahan(){
		$kecid = $this->input->get('kecid', TRUE);
		$kelurahan = $this->M_Wilayah->getKelurahanByKec($kecid);

		?>
			<option value=""> Pilih Desa/Kelurahan</option>
		<?php
		foreach($kelurahan->result() as $row){
			?>
				<option value="<?= $row->subdis_id ?>"> <?= ucwords(strtolower($row->subdis_name)) ?></option>
			<?php
		}
	}
}