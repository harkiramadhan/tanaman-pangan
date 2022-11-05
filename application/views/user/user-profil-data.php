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
                            <a class="dropdown-item py-2" href="<?= site_url() ?>/user">Profil</a>
                            <a class="dropdown-item py-2 active" href="<?= site_url() ?>/user/data">Data Pertanian</a>
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
                                    <p class="text-muted font-weight-bold mb-0">Nama Lembaga<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control font-weight-bold text-muted" value="PT Wijaya Kusuma" placeholder="Isi Nama Lembaga">
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Kategori Lembaga<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <select class="form-control" name="kecamatan">
                                       <option>Pilih</option>
                                       <option>Perorangan</option>
                                       <option>PT/CV</option>
                                       <option>Jawa Tengah</option>
                                       <option>Kalimantan</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Lahan Dikelola<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="input-group input-group-sm mb-0">
                                       <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                       <div class="input-group-append">
                                          <span class="input-group-text" id="inputGroup-sizing-sm">Hektar</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Komoditas<sup class="text-danger">*</sup></p>
                                </div>
                                 <div class="col-md-8">
                                    <select class="form-control js-example-basic-multiple" name="states[]" multiple="multiple">
                                       <option value="">Padi</option>
                                       <option value="">Jagung</option>
                                       <option value="">Kedelai</option>
                                       <option value="">Ubi Kayu</option>
                                       <option value="">Ubi Jalar</option>
                                       <option value="">Shorgum</option>
                                       <option value="">Kacang Tanah</option>
                                       <option value="">Kacang Hijau</option>
                                       <option value="">Talas</option>
                                       <option value="">Porang</option>
                                       <option value="">Aneka Umbi Lainnya</option>
                                       <option value="">Aneka Kacang Lainnya</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Rata<sup class="">2</sup> Produksi Tahunan<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="input-group input-group-sm mb-0">
                                       <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                       <div class="input-group-append">
                                          <span class="input-group-text" id="inputGroup-sizing-sm">Kg</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Rata<sup class="">2</sup> Kebutuhan Bulanan<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="input-group input-group-sm mb-0">
                                       <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                       <div class="input-group-append">
                                          <span class="input-group-text" id="inputGroup-sizing-sm">Kg</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="row d-flex align-items-center form-group">
                                <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Kategori Olahan<sup class="text-danger">*</sup></p>
                                </div>
                                 <div class="col-md-8">
                                 <select class="form-control js-example-basic-multiple" name="states[]" multiple="multiple">
                                       <option value="">Makanan</option>
                                       <option value="">Jagung</option>
                                       <option value="">Kedelai</option>
                                       <option value="">Ubi Kayu</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Jenis Olahan<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="alamat" class="form-control font-weight-bold text-muted" value="" placeholder="Tulis Jenis olahan">
                                 </div>
                              </div>

                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Produksi Olahan Bulanan<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="input-group input-group-sm mb-0">
                                       <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                       <div class="input-group-append">
                                          <span class="input-group-text" id="inputGroup-sizing-sm">Kg</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Jenis Pupuk<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="alamat" class="form-control font-weight-bold text-muted" value="" placeholder="Tulis Jenis pupuk">
                                 </div>
                              </div>


                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Jenis Pestisida<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="alamat" class="form-control font-weight-bold text-muted" value="" placeholder="Tulis Jenis Pestisida">
                                 </div>
                              </div>

                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Jenis Alsintan<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="alamat" class="form-control font-weight-bold text-muted" value="" placeholder="Tulis Jenis Alsintan">
                                 </div>
                              </div>
                              
                              <div class="row d-flex align-items-center form-group border-bottom">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0 align-top">Penjualan<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="form-check mb-2">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                       <label class="form-check-label" for="inlineCheckbox1">Dalam Kabupaten/Kota</label>
                                    </div>
                                    <div class="form-check mb-2">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                       <label class="form-check-label" for="inlineCheckbox1">Antar Kabupaten/Kota</label>
                                    </div>
                                    <div class="form-check mb-2">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                       <label class="form-check-label" for="inlineCheckbox1">Antar Provinsi</label>
                                    </div>
                                    <div class="form-check mb-2">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                       <label class="form-check-label" for="inlineCheckbox1">Expor</label>
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="row d-flex align-items-center form-group border-bottom">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0 align-top">Tertarik<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="form-check mb-2">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                       <label class="form-check-label" for="inlineCheckbox1">Jual Produk Segar</label>
                                    </div>
                                    <div class="form-check mb-2">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                       <label class="form-check-label" for="inlineCheckbox1">Jual Produk Olahan</label>
                                    </div>
                                    <div class="form-check mb-2">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                       <label class="form-check-label" for="inlineCheckbox1">Jual Saprodi</label>
                                    </div>
                                    <div class="form-check mb-2">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                       <label class="form-check-label" for="inlineCheckbox1">Beli Produk Segar</label>
                                    </div>
                                    <div class="form-check mb-2">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                       <label class="form-check-label" for="inlineCheckbox1">Beli Produk Olahan</label>
                                    </div>
                                    <div class="form-check mb-2">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                       <label class="form-check-label" for="inlineCheckbox1">Beli Saprodi</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Menjual Produk<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="alamat" class="form-control font-weight-bold text-muted" value="" placeholder="Tulis">
                                 </div>
                              </div>


                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Membutuhkan Produk<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="alamat" class="form-control font-weight-bold text-muted" value="" placeholder="Tulis ">
                                 </div>
                              </div>


                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Keterangan Tambahan<sup class="text-danger">*</sup></p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="alamat" class="form-control font-weight-bold text-muted" value="" placeholder="Tulis">
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