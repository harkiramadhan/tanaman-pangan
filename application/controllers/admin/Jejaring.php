<?php

class Jejaring extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Jejaring',
			'M_Wilayah',
			'M_Komoditas',
			'M_Penjualan',
			'M_Kategori_olahan',
			'M_Ketertarikan',
			'M_User',
			'M_Role',
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
	
	public function index(){
        $var = [
			'title' => 'Beranda Jejaring',
			'jejaring' => $this->M_Jejaring->getAll()
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/jejaring', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	function add(){
		$var = [
			'title' => 'Tambah Jejaring',
			'provinsi' => $this->M_Wilayah->getProvinsi(),
			'lembaga' => $this->db->get('kelembagaan'),
			'komoditas' => $this->M_Komoditas->getAll(),
			'penjualan' => $this->M_Penjualan->getAll(),
			'kategori_olahan' => $this->M_Kategori_olahan->getAll(),
			'ketertarikan' => $this->M_Ketertarikan->getAll(),
			'role' => $this->M_Role->getAll(),
			'ajax' => [
				'profil'
			]
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/jejaring-add', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function detail($id){
        $var = [
			'title' => 'Detail Jejaring',
			'jejaring' => $this->M_Jejaring->getByUserid($id),
			'provinsi' => $this->M_Wilayah->getProvinsi(),
			'lembaga' => $this->db->get('kelembagaan'),
			'komoditas' => $this->M_Komoditas->getAll(),
			'penjualan' => $this->M_Penjualan->getAll(),
			'kategori_olahan' => $this->M_Kategori_olahan->getAll(),
			'ketertarikan' => $this->M_Ketertarikan->getAll(),
			'role' => $this->M_Role->getAll(),
			'ajax' => [
				'profil'
			]
		];
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/jejaring-detail', $var);
		$this->load->view('layout/admin/footer', $var);
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

	/* Action Here */
	function create(){
		$config['upload_path'] = './uploads/profile';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('file')){
            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename, './uploads/profile/'); 
        }else{
			$filename = NULL;
		}

		$config['upload_path'] = './uploads/cover';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config, 'cover');
		if($this->cover->do_upload('cover_img')){
			$coverData = $this->cover->data();
			$coverName = $coverData['file_name'];
			$this->resizeImage($coverName, './uploads/cover/');
		}else{
			$coverName = NULL;
		}

		$dataInsert = [
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
			'menjual_produk' => $this->input->post('menjual_produk', TRUE),
			'membutuhkan_produk' => $this->input->post('membutuhkan_produk', TRUE),
			'produk_dijual_bulanan' => $this->input->post('produk_dijual_bulanan', TRUE),
			'produk_dibutuhkan_bulanan' => $this->input->post('produk_dibutuhkan_bulanan', TRUE),
			'keterangan' => $this->input->post('keterangan', TRUE)
		];
		$this->db->insert('user', $dataInsert);
		if($this->db->affected_rows() > 0){
			$userid = $this->db->insert_id();

			$penjualan = $this->input->post('penjualan_id[]', TRUE);
			if(count($penjualan) > 0){
				foreach($penjualan as $p){
					$this->db->insert('user_penjualan', [
						'user_id' => $userid,
						'penjualan_id' => $p
					]);
				}
			}

			$ketertarikan = $this->input->post('ketertarikan_id[]', TRUE);
			if(count($ketertarikan) > 0){
				foreach($ketertarikan as $kt){
					$this->db->insert('user_tertarik', [
						'user_id' => $userid,
						'ketertarikan_id' => $kt
					]);
				}
			}

			$kategori_olahan = $this->input->post('kategori_olahan_id[]', TRUE);
			if(count($kategori_olahan) > 0){
				foreach($kategori_olahan as $ko){
					$this->db->insert('user_kategori_olahan', [
						'user_id' => $userid,
						'kategori_olahan_id' => $ko
					]);
				}
			}

			$komoditas = $this->input->post('komoditas_id[]', TRUE);
			if(count($komoditas) > 0){
				foreach($komoditas as $k){
					$this->db->insert('user_komoditas', [
						'user_id' => $userid,
						'komoditas_id' => $k
					]);
				}
			}

			$this->session->set_userdata('success', "Data Berhasil Di Simpan");
			redirect('admin/jejaring/' . $userid);
		}else{
			$this->session->set_userdata('error', "Data Gagal Di Simpan");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function save($userid){
		$user = $this->M_User->getById($userid);
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
			'menjual_produk' => $this->input->post('menjual_produk', TRUE),
			'membutuhkan_produk' => $this->input->post('membutuhkan_produk', TRUE),
			'produk_dijual_bulanan' => $this->input->post('produk_dijual_bulanan', TRUE),
			'produk_dibutuhkan_bulanan' => $this->input->post('produk_dibutuhkan_bulanan', TRUE),
			'keterangan' => $this->input->post('keterangan', TRUE)
		];
		$this->db->where('id', $userid)->update('user', $dataUpdate);
		if($this->db->affected_rows() > 0){
			$this->session->set_userdata('success', "Data Berhasil Di Simpan");
		}else{
			$this->session->set_userdata('error', "Data Gagal Di Simpan");
		}

		$penjualan = $this->input->post('penjualan_id[]', TRUE);
		if(count($penjualan) > 0){
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
		if(count($ketertarikan) > 0){
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
		if(count($kategori_olahan) > 0){
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
		if(count($komoditas) > 0){
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

	function changePassword($userid){
		$pass = $this->input->post('new-pass', TRUE);
		$passValid = $this->input->post('new-pass-valid', TRUE);

		if($pass == $passValid){
			$this->db->where('id', $userid)->update('user', [
				'password' => $pass
			]);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
}	