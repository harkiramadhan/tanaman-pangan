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
                  <div class="row p-3 border-bottom">
                     <div class="col">
                        <span class="badge badge-warning mb-0 py-2 px-2 text-uppercase"><?= $user->role ?></span>
                     </div>
                     <div class="col text-right">
                        <a href="<?= site_url('jejaring/' . $user->id) ?>" class="text-success" target="__BLANK">Tinjau Profil<i class="fa fa-arrow-right ml-2"></i></a>
                     </div>
                  </div>
                  <div class="p-3 border-bottom">
                     <form action="<?= site_url('user/saveProfile') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-md-6 col-12 text-center">
                              <p class="text-muted font-weight-bold mb-2">Foto Profil</p>
                              <?php if($user->img): ?>
                                 <img src="<?= base_url('uploads/profile/' . $user->img) ?>" class="img-fluid mt-2 rounded-circle mb-4" alt="Responsive image" style="width: 100px; height: 100px; object-fit: cover;" id="image-preview">
                              <?php else: ?>
                                 <img src="https://public-assets.envato-static.com/assets/common/icons-buttons/default-user-2962fd43ee315eafee8bfc08f02fee84687beb0499de44e5ab2873399944b0fe.jpg" class="img-fluid mt-2 rounded-circle mb-4" alt="Responsive image" style="width: 100px; height: 100px; object-fit: cover;" id="image-preview">
                              <?php endif; ?>
                           </div>
                           <div class="col-md-6 col-12 text-center">
                              <p class="text-muted font-weight-bold mb-2">Gambar Cover</p>
                                 <?php if($user->cover_img): ?>
                                    <img src="<?= base_url('uploads/cover/' . $user->cover_img) ?>" class="img-fluid mt-2 rounded mb-4" alt="Responsive image" style="width: 200px; height: 100px; object-fit: cover;" id="image-preview2">
                                 <?php else: ?>
                                    <img src="https://public-assets.envato-static.com/assets/common/icons-buttons/default-user-2962fd43ee315eafee8bfc08f02fee84687beb0499de44e5ab2873399944b0fe.jpg" class="img-fluid mt-2 rounded-circle mb-4" alt="Responsive image" style="width: 100px; height: 100px; object-fit: cover;" id="image-preview2">
                                 <?php endif; ?>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Upload Foto<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <div class="custom-file">
                                 <input type="file" name="file" class="custom-file-input" id="image-source" aria-describedby="inputGroupFileAddon04" onchange="previewImage()">
                                 <label class="custom-file-label" for="image-source">Choose file</label>
                              </div>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Upload Gambar Cover<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <div class="custom-file">
                                 <input type="file" name="cover_img" class="custom-file-input" id="image-source2" aria-describedby="#" onchange="previewImage2()">
                                 <label class="custom-file-label" for="image-source">Choose file</label>
                              </div>
                           </div>
                        </div>
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
                              <p class="text-muted font-weight-bold mb-0">Peran</p>
                           </div>
                           <div class="col-md-8">
                              <select class="form-control" name="role_id" required>
                                 <option value=""> Pilih Peran</option>
                                 <?php foreach($role->result() as $r): ?>
                                    <option <?= ($user->role_id == $r->id) ? 'selected' : '' ?> value="<?= $r->id ?>"> <?= $r->role ?></option>
                                 <?php endforeach; ?>
                              </select>
                           </div>
                        </div>

                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Google Maps <sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="maps" class="form-control font-weight-bold text-muted" value="<?= $user->maps ?>" placeholder="Tambahkan link maps" required>
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

                        <!-- FORM ALAMAT -->
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
                        <!-- FORM ALAMAT END -->


                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Deskripsi<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="hidden" name="deskripsi" id="deskripsi" value="<?= $user->deskripsi ?>">
                              <div class="rounded" id="editor">

                              </div>
                           </div>
                        </div>

                        <!-- SOSMED START -->

                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Facebook</p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="facebook" class="form-control font-weight-bold text-muted" value="<?= $user->facebook ?>" placeholder="Link profil facebookmu">
                           </div>
                        </div>

                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Instagram</p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="instagram" class="form-control font-weight-bold text-muted" value="<?= $user->instagram ?>" placeholder="Link profil Instagrammu">
                           </div>
                        </div>

                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Tiktok</p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="tiktok" class="form-control font-weight-bold text-muted" value="<?= $user->tiktok ?>" placeholder="Link profil Tiktokmu">
                           </div>
                        </div>

                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Youtube</p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="youtube" class="form-control font-weight-bold text-muted" value="<?= $user->youtube ?>" placeholder="Link profil Youtubemu">
                           </div>
                        </div>

                        <!-- SOSMED END -->

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