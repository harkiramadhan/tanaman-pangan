<!-- Login -->
<div class="bg-white">
   <div class="container">
      <div class="row justify-content-center align-items-start d-flex pt-5 pb-5">
         <div class="col-lg-4 mx-auto">
            <div class="osahan-login py-0">
               <div class="text-center mb-4">
                  <!-- <a href="index.html"><img src="http://app3.pertanian.go.id/propaktani/portal/assets/img/logo_login.png" alt=""></a> -->
                  <h5 class="font-weight-bold">Selamat Datang Kembali</h5>
                  <p class="text-muted">Yuk masuk, untuk kelola akun kamu</p>
               </div>
               <form action="<?= site_url('auth/login') ?>" method="POST">
                  <?php if($this->session->flashdata('error')): ?>
                     <div class="form-group text-center">
                        <h5 class="text-danger"><strong><?= $this->session->flashdata('error') ?></strong></h5>
                     </div>
                  <?php endif; ?>

                  <div class="form-group">
                     <label class="mb-1">No HP/WA</label>
                     <div class="position-relative icon-form-control">
                        <i class="mdi mdi-account position-absolute"></i>
                        <input type="number" name="hp" class="form-control">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="mb-1">Password</label>
                     <div class="position-relative icon-form-control">
                        <i class="mdi mdi-key-variant position-absolute"></i>
                        <input type="password" name="password" class="form-control">
                     </div>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                     <input type="checkbox" class="custom-control-input" id="customCheck1">
                     <label class="custom-control-label" for="customCheck1">Ingat kata santi</label>
                  </div>
                  <button class="btn btn-success btn-block text-uppercase" type="submit"> Masuk </button>
                  
                  <div class="pt-3 d-flex align-item-center">
                     <a href="https://wa.me/<?= $pengaturan->kontak ?>" target="__BLANK">Lupa Password?</a>
                  </div>
                  <div class="text-center mt-3 border-top pt-3">
                     <p class="small text-muted">Belum memiliki akun?</p>
                     <a href="<?= site_url('daftar') ?>" type="button" class="btn btn-outline-secondary btn-block">DAFTAR SEKARANG</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Login -->