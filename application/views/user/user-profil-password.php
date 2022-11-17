        <section class="pt-3">
            <div class="container">
                <ol class="breadcrumb px-0 py-0 mb-3" style="background: #f0f2f5;" >
                    <li class="breadcrumb-item small"><a href="<?= site_url('') ?>" class="text-info"><i class="fa fa-home mr-2"></i>Beranda</a></li>
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
                            <a class="dropdown-item py-2" href="<?= site_url('user') ?>">Profil</a>
                            <a class="dropdown-item py-2" href="<?= site_url('user/data') ?>">Data Pertanian</a>
                            <a class="dropdown-item py-2 active" href="<?= site_url('user/password') ?>">Kata Sandi</a>
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
                           <form action="<?= site_url('user/changePassword') ?>" method="post">
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">New Password</p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="password" name="new-pass" class="form-control font-weight-bold text-muted">
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Confirm Password</p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="password" name="new-pass-valid" class="form-control font-weight-bold text-muted">
                                    <p class="text-muted pt-2">8 characters or longer. Combine upper and lowercase letters and numbers.</p>
                                 </div>
                              </div>
                              <div class="text-right">
                                 <button type="submit" class="btn btn-success">Save Changes</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>