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
                            <a class="dropdown-item py-2 active" href="<?= site_url() ?>/user">Profil</a>
                            <a class="dropdown-item py-2" href="<?= site_url() ?>/user/data">Data Pertanian</a>
                            <a class="dropdown-item py-2" href="<?= site_url() ?>/user/password">Kata Sandi</a>
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
                           <form>
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Penanggung Jawab<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control font-weight-bold text-muted" value="Alfian Rahmatullah" placeholder="Isi Nama Lengkap">
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">No HP/WA<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="kontak" class="form-control font-weight-bold text-muted" value="082111209">
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Alamat<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="alamat" class="form-control font-weight-bold text-muted" value="" placeholder="Tulis Jalan, Perumahan, No, RT/RW">
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Provinsi<sup class="text-danger">*</sup></p>
                                </div>
                                 <div class="col-md-8">
                                    <select class="form-control" name="provinsi">
                                       <option>Pilih</option>
                                       <option>Jawa Barat</option>
                                       <option>Jawa Timur</option>
                                       <option>Jawa Tengah</option>
                                       <option>Kalimantan</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Kabupaten/Kota<sup class="text-danger">*</sup></p>
                                </div>
                                 <div class="col-md-8">
                                    <select class="form-control" name="kabupatenkota">
                                       <option>Pilih</option>
                                       <option>Jawa Barat</option>
                                       <option>Jawa Timur</option>
                                       <option>Jawa Tengah</option>
                                       <option>Kalimantan</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Kecamatan<sup class="text-danger">*</sup></p>
                                </div>
                                 <div class="col-md-8">
                                    <select class="form-control" name="kecamatan">
                                       <option>Pilih</option>
                                       <option>Jawa Barat</option>
                                       <option>Jawa Timur</option>
                                       <option>Jawa Tengah</option>
                                       <option>Kalimantan</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Desa/Kelurahan<sup class="text-danger">*</sup></p>
                                </div>
                                 <div class="col-md-8">
                                    <select class="form-control" name="desakelurahan">
                                       <option>Pilih</option>
                                       <option>Jawa Barat</option>
                                       <option>Jawa Timur</option>
                                       <option>Jawa Tengah</option>
                                       <option>Kalimantan</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="text-right">
                                 <button class="btn btn-success">Simpan Perubahan</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>