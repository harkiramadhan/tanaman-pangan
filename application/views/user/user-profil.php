<section class="pt-3">
   <div class="container">
         <ol class="breadcrumb px-0 py-0 mb-3" style="background: #f0f2f5;" >
            <li class="breadcrumb-item small"><a href="#" class="text-info"><i class="fa fa-home mr-2"></i>Beranda</a></li>
            <li class="breadcrumb-item small"><a href="#" class="text-info">Akun</a></li>
            <li class="breadcrumb-item small active" aria-current="page">Profil Saya</li>
         </ol>
   </div>
</section>
<section class="pb-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 mb-3">
            <div class="bg-white rounded shadow-sm py-3 sidebar-fix">
                  <div class="dropdown-menu-show">
                        <a class="dropdown-item py-2 active" href="<?= site_url('user') ?>">Profil</a>
                        <a class="dropdown-item py-2" href="<?= site_url('user/data') ?>">Data Pertanian</a>
                        <a class="dropdown-item py-2" href="<?= site_url('user/password') ?>">Kata Sandi</a>
                  </div>
               </div>
         </div>
         <div class="col-lg-9">
            <div class="bg-white rounded shadow-sm sidebar-page-right">
               <div>
                  <div class="p-3 border-bottom text-right">
                     <a href="account.html" class="text-success">Tinjau Profil<i class="fa fa-arrow-right ml-2"></i></a>
                  </div>
                  <div class="p-3 border-bottom">
                     <form action="<?= site_url('user/saveProfile') ?>" method="POST">
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Penanggung Jawab<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="nama" class="form-control font-weight-bold text-muted" value="<?= $user->nama ?>" placeholder="Isi Nama Lengkap" required>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">No HP/WA<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="hp" class="form-control font-weight-bold text-muted" value="<?= $user->hp ?>" required>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Alamat<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="alamat" class="form-control font-weight-bold text-muted" value="<?= $user->alamat ?>" placeholder="Tulis Jalan, Perumahan, No, RT/RW" required>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Provinsi<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <select class="form-control" name="prov" id="select-prov" required>
                                 <option value=""> Pilih Provinsi</option>
                                 <?php foreach($provinsi->result() as $p): ?>
                                    <option <?= ($user->prov == $p->prov_id) ? 'selected' : '' ?> value="<?= $p->prov_id ?>"> <?= ucwords(strtolower($p->prov_name)) ?></option>
                                 <?php endforeach; ?>
                              </select>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Kabupaten/Kota<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <select class="form-control" name="kab_kota" id="select-kab" <?php ($user->kab_kota) ? '' : 'disabled' ?>>
                                 <option value=""> Pilih Kabupaten / Kota</option>
                                 <?php 
                                    if($user->kab_kota): 
                                       $kabupaten = $this->M_Wilayah->getKabupatenByProv($user->prov)->result();
                                       foreach($kabupaten as $k){
                                 ?>
                                    <option value="<?= $k->city_id ?>" <?= ($user->kab_kota == $k->city_id) ? 'selected' : '' ?>> <?= ucwords(strtolower($k->city_name)) ?></option>
                                 <?php }; endif; ?>
                              </select>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Kecamatan<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <select class="form-control" name="kec" id="select-kec" <?php ($user->kec) ? '' : 'disabled' ?>>
                                 <option value=""> Pilih Kecamatan</option>
                                 <?php
                                    if($user->kec):
                                       $kecamatan = $this->M_Wilayah->getKecamatanByKab($user->kab_kota)->result();
                                       foreach($kecamatan as $kc){
                                 ?>
                                    <option value="<?= $kc->dis_id ?>" <?= ($user->kec == $kc->dis_id) ? 'selected' : '' ?>> <?= ucwords(strtolower($kc->dis_name)) ?></option>
                                 <?php }; endif; ?>
                              </select>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Desa/Kelurahan<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <select class="form-control" name="desa_kel" id="select-kel" <?php ($user->desa_kel) ? '' : 'disabled' ?>>
                                 <option value=""> Pilih Kelurahan</option>
                                 <?php 
                                    if($user->desa_kel):
                                       $kelurahan = $this->M_Wilayah->getKelurahanByKec($user->kec)->result();
                                       foreach($kelurahan as $kl){
                                 ?>
                                    <option value="<?= $kl->subdis_id ?>" <?= ($kl->subdis_id == $user->desa_kel) ? 'selected' : '' ?>> <?= ucwords(strtolower($kl->subdis_name)) ?></option>
                                 <?php }; endif; ?>
                              </select>
                           </div>
                        </div>
                        <div class="text-right">
                           <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>