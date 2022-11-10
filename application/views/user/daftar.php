
      <!-- Login -->
      <div class="bg-white">
         <div class="container">
            <div class="row justify-content-center align-items-start d-flex pt-5 pb-5">
               <div class="col-lg-4 mx-auto">
                  <div class="osahan-login py-0">
                     <div class="text-center mb-4">
                        <!-- <a href="index.html"><img src="http://app3.pertanian.go.id/propaktani/portal/assets/img/logo_login.png" alt=""></a> -->
                        <h5 class="font-weight-bold">Hallo,</h5>
                        <p class="text-muted">Daftarkan diri kamu untuk mendapatkan jejaring yang lebih luas</p>
                     </div>
                     <form action="<?= site_url('auth/register') ?>" method="POST">
                        <div class="form-group">
                           <label class="mb-1">Nama</label>
                           <div class="position-relative icon-form-control">
                              <i class="mdi mdi-account position-absolute"></i>
                              <input type="text" name="nama" class="form-control" required>
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="mb-1">No HP/WA</label>
                           <div class="position-relative icon-form-control">
                              <i class="mdi mdi-phone position-absolute"></i>
                              <input type="number" name="hp" class="form-control" required>
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="mb-1">Password</label>
                           <div class="position-relative icon-form-control">
                              <i class="mdi mdi-key-variant position-absolute"></i>
                              <input type="password" name="password" class="form-control" required>
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="mb-1">Ulangi Password</label>
                           <div class="position-relative icon-form-control">
                              <i class="mdi mdi-key-variant position-absolute"></i>
                              <input type="password" name="validate_password" class="form-control" required>
                           </div>
                        </div>
                        
                        <div class="form-group">
                           <label class="mb-1">Peran</label>
                           <select name="role_id" class="form-control" required>
                              <option selected disabled>Pilih ...</option>
                              <?php foreach($role->result() as $rr){ ?>
                                 <option value="<?= $rr->id ?>"><?= $rr->role ?></option>
                              <?php } ?>
                           </select>
                        </div>

                        <div class="form-group">
                           <label class="mb-1">Komoditas Pangan</label>
                           <select class="form-control js-example-basic-multiple" name="komoditas_id[]" multiple="multiple" required>
                              <option value="" disabled>Pilih Komoditas</option>
                              <?php foreach($komoditas->result() as $kr){ ?>
                                 <option value="<?= $kr->id ?>"><?= $kr->komoditas ?></option>
                              <?php } ?>
                           </select>
                        </div>
                        
                        <button class="btn btn-success btn-block text-uppercase" type="submit"> Daftar </button>
                        
                        <div class="text-center mt-3 border-top pt-3">
                           <p class="small text-muted">Sudah memiliki akun?</p>
                           <a href="<?= site_url('') ?>" type="button" class="btn btn-outline-secondary btn-block">MASUK SEKARANG</a>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Login -->