<section class="pt-3">
   <div class="container">
         <ol class="breadcrumb px-0 py-0 mb-3" style="background: #f0f2f5;" >
            <li class="breadcrumb-item small"><a href="<?= site_url('') ?>" class="text-info"><i class="fa fa-home mr-2"></i>Beranda</a></li>
            <li class="breadcrumb-item small"><a href="#" class="text-info">Akun</a></li>
            <li class="breadcrumb-item small active" aria-current="page">Data Pertanian</li>
         </ol>
   </div>
</section>
<section class="pb-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 mb-3">
            <div class="bg-white rounded shadow-sm pb-3 sidebar-fix">
                  <div class="dropdown-menu-show">
                     <a class="dropdown-item py-3 active" href="<?= site_url('user/pengaturan') ?>">
                        <div class="bg-dark rounded py-2 px-2 text-center text-white text-uppercase font-weight-bold" >Atur Kesediaan</div>
                     </a>
                     <a class="dropdown-item py-2" href="<?= site_url('user') ?>">Profil</a>
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

                  <?php if(
                     $user->role_id != 8 &&
                     $user->role_id != 9
                  ): ?>
                     <div class="py-3 border-bottom">
                        <form action="<?= site_url('user/save') ?>" method="POST" enctype="multipart/form-data" method="POST">
                           <div class="row d-flex align-items-center form-group px-3">
                              <div class="col-md-4">
                                 <p class="text-muted font-weight-bold mb-0 align-top">Status<sup class="text-danger">*</sup></p>
                              </div>
                              <div class="col-md-8 d-inline-block">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="status" type="checkbox" id="inlineCheckbox1" <?= ($user->status == 1) ? 'checked' : '' ?> value="1">
                                    <label class="form-check-label" for="inlineCheckbox1"> Menjual</label>
                                 </div>
                              </div>
                           </div>

                           <div class="row d-flex align-items-center form-group px-3">
                              <div class="col-md-4">
                                 <p class="text-muted font-weight-bold mb-0">Menjual Produk<sup class="text-danger">*</sup></p>
                              </div>
                              <div class="col-md-8">
                                 <input type="text" name="menjual_produk" class="form-control font-weight-bold text-muted" value="<?= $user->menjual_produk ?>" placeholder="Tulis">
                              </div>
                           </div>

                           <div class="row d-flex align-items-center form-group px-3">
                              <div class="col-md-4">
                                 <p class="text-muted font-weight-bold mb-0">Stok Produk<sup class="text-danger">*</sup></p>
                              </div>
                              <div class="col-md-8">
                                 <div class="input-group input-group-sm mb-0">
                                    <input type="text" name="produk_dijual_bulanan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?= $user->produk_dijual_bulanan ?>">
                                    <div class="input-group-append">
                                       <span class="input-group-text" id="inputGroup-sizing-sm">Kg</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row d-flex align-items-center form-group px-3">
                              <div class="col-md-4">
                                 <p class="text-muted font-weight-bold mb-0">Upload Foto Produk<sup class="text-danger">*</sup></p>
                              </div>
                              <div class="col-md-8">
                                 <div class="custom-file">
                                    <input type="file" name="img_jual" class="custom-file-input" id="image-source" aria-describedby="inputGroupFileAddon04" onchange="previewImage()">
                                    <label class="custom-file-label" for="image-source">Choose file</label>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="row d-flex align-items-center form-group px-3">
                              <div class="col-md-4">
                              </div>
                              <div class="col-md-8">
                                 <?php if(@$user->produk_jual): ?>
                                    <img src="<?= base_url('uploads/produk/' . $user->produk_jual) ?>" class="img-fluid mt-2 rounded mb-4" alt="Responsive image" style="width: 100px; height: 100px; object-fit: cover;" id="image-preview">
                                 <?php else: ?>
                                    <img src="http://localhost/tanaman-pangan/assets/images/placeholder/square-placeholder-propaktani.png" class="img-fluid mt-2 rounded mb-4" alt="Responsive image" style="width: 100px; height: 100px; object-fit: cover;" id="image-preview">
                                 <?php endif; ?>
                              </div>
                           </div>
                           
                           <hr class="margin-bottom">

                           <div class="row d-flex align-items-center form-group px-3">
                              <div class="col-md-4">
                                 <p class="text-muted font-weight-bold mb-0 align-top">Status<sup class="text-danger">*</sup></p>
                              </div>
                              <div class="col-md-8 d-inline-block">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="status" type="checkbox" id="inlineCheckbox1" <?= ($user->status == 1) ? 'checked' : '' ?> value="1">
                                    <label class="form-check-label" for="inlineCheckbox1"> Membutuhkan</label>
                                 </div>
                              </div>
                           </div>

                           <div class="row d-flex align-items-center form-group px-3">
                              <div class="col-md-4">
                                 <p class="text-muted font-weight-bold mb-0">Membutuhkan Produk<sup class="text-danger">*</sup></p>
                              </div>
                              <div class="col-md-8">
                                 <input type="text" name="membutuhkan_produk" class="form-control font-weight-bold text-muted" value="<?= $user->membutuhkan_produk ?>" placeholder="Tulis ">
                              </div>
                           </div>

                           <div class="row d-flex align-items-center form-group px-3">
                              <div class="col-md-4">
                                 <p class="text-muted font-weight-bold mb-0">Volume dibutuhkan<sup class="text-danger">*</sup></p>
                              </div>
                              <div class="col-md-8">
                                 <div class="input-group input-group-sm mb-0">
                                    <input type="text" name="produk_dibutuhkan_bulanan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?= $user->produk_dibutuhkan_bulanan ?>">
                                    <div class="input-group-append">
                                       <span class="input-group-text" id="inputGroup-sizing-sm">Kg</span>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="row d-flex align-items-center form-group px-3">
                              <div class="col-md-4">
                                 <p class="text-muted font-weight-bold mb-0">Upload Foto Produk<sup class="text-danger">*</sup></p>
                              </div>
                              <div class="col-md-8">
                                 <div class="custom-file">
                                    <input type="file" name="img_butuh" class="custom-file-input" id="image-source2" aria-describedby="inputGroupFileAddon04" onchange="previewImage2()">
                                    <label class="custom-file-label" for="image-source">Choose file</label>
                                 </div>
                              </div>
                           </div>
                           
                           
                           <div class="row d-flex align-items-center form-group px-3">
                              <div class="col-md-4">
                              </div>
                              <div class="col-md-8">
                                 <?php if(@$user->produk_butuh): ?>
                                    <img src="<?= base_url('uploads/produk/' . $user->produk_butuh) ?>" class="img-fluid mt-2 rounded mb-4" alt="Responsive image" style="width: 100px; height: 100px; object-fit: cover;" id="image-preview2">
                                 <?php else: ?>
                                    <img src="http://localhost/tanaman-pangan/assets/images/placeholder/square-placeholder-propaktani.png" class="img-fluid mt-2 rounded mb-4" alt="Responsive image" style="width: 100px; height: 100px; object-fit: cover;" id="image-preview2">
                                 <?php endif; ?>
                              </div>
                           </div>
                           
                           <div class="text-right px-3">
                              <button class="btn btn-success">Simpan Perubahan</button>
                           </div>
                        </form>
                     </div>
                  <?php else: ?>
                     <div class="card">
                        <div class="card-body text-center">
                           <h5 class="card-title"><strong>Menu tidak terbuka untuk peran yang anda pilih</strong></h5>
                        </div>
                     </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>