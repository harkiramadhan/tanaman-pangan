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
            <div class="bg-white rounded shadow-sm py-3 sidebar-fix">
                  <div class="dropdown-menu-show">
                        <a class="dropdown-item py-2" href="<?= site_url('user') ?>">Profil</a>
                        <a class="dropdown-item py-2 active" href="<?= site_url('user/data') ?>">Data Pertanian</a>
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
                     <form action="<?= site_url('user/saveData') ?>" method="POST">
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Nama Lembaga<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="nama_kelembagaan" class="form-control font-weight-bold text-muted" value="<?= $user->nama_kelembagaan ?>" placeholder="Isi Nama Lembaga" required>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Kategori Lembaga<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <select class="form-control" name="kelembagaan_id" required>
                                 <option value=""> Pilih Kelembagaan</option>
                                 <?php foreach($lembaga->result() as $l){ ?>
                                    <option <?= ($user->kelembagaan_id == $l->id) ? 'selected' : '' ?> value="<?= $l->id ?>"> <?= $l->kelembagaan ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Lahan Dikelola<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <div class="input-group input-group-sm mb-0">
                                 <input type="text" name="lahan_yg_dikelola" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?= $user->lahan_yg_dikelola ?>">
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
                              <select class="form-control js-example-basic-multiple" name="komoditas_id[]" multiple="multiple">
                                 <?php 
                                    foreach($komoditas->result() as $k){ 
                                       $cek = $this->db->get_where('user_komoditas', [
                                          'user_id' => $this->session->userdata('userid'),
                                          'komoditas_id' => $k->id
                                       ]);
                                 ?>
                                    <option <?= ($cek->num_rows() > 0) ? 'selected' : '' ?> value="<?= $k->id ?>"> <?= $k->komoditas ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Rata<sup class="">2</sup> Produksi Tahunan<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <div class="input-group input-group-sm mb-0">
                                 <input type="text" name="rata_produksi_tahun" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?= $user->rata_produksi_tahun ?>">
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
                                 <input type="text" name="rata_produksi_bulan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?= $user->rata_produksi_bulan ?>">
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
                              <select class="form-control js-example-basic-multiple" name="kategori_olahan_id[]" multiple="multiple">
                                 <?php 
                                    foreach($kategori_olahan->result() as $ko){ 
                                       $cekOlahan = $this->db->get_where('user_kategori_olahan', [
                                          'user_id' => $this->session->userdata('userid'),
                                          'kategori_olahan_id' => $ko->id
                                       ]);
                                 ?>
                                    <option <?= ($cekOlahan->num_rows() > 0) ? 'selected' : '' ?> value="<?= $ko->id ?>"> <?= ucfirst($ko->kategori_olahan) ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Jenis Olahan<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="jenis_olahan" class="form-control font-weight-bold text-muted" value="<?= $user->jenis_olahan ?>" placeholder="Tulis Jenis olahan">
                           </div>
                        </div>

                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Produksi Olahan Bulanan<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <div class="input-group input-group-sm mb-0">
                                 <input type="text" name="produksi_olahan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?= $user->produksi_olahan ?>">
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
                              <input type="text" name="jenis_pupuk" class="form-control font-weight-bold text-muted" value="<?= $user->jenis_pupuk ?>" placeholder="Tulis Jenis pupuk">
                           </div>
                        </div>


                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Jenis Pestisida<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="jenis_pestisida" class="form-control font-weight-bold text-muted" value="<?= $user->jenis_pestisida ?>" placeholder="Tulis Jenis Pestisida">
                           </div>
                        </div>

                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Jenis Alsintan<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="jenis_aisintan" class="form-control font-weight-bold text-muted" value="<?= $user->jenis_aisintan ?>" placeholder="Tulis Jenis Alsintan">
                           </div>
                        </div>
                        
                        <div class="row d-flex align-items-center form-group border-bottom">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0 align-top">Penjualan<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <?php 
                                 foreach($penjualan->result() as $p){ 
                                    $cekPenjualan = $this->db->get_where('user_penjualan', [
                                       'user_id' => $this->session->userdata('userid'),
                                       'penjualan_id' => $p->id
                                    ]);
                              ?>
                                 <div class="form-check mb-2">
                                    <input class="form-check-input" <?= ($cekPenjualan->num_rows() > 0) ? 'checked' : '' ?> name="penjualan_id[]" type="checkbox" id="inlineCheckbox<?= $p->id ?>" value="<?= $p->id ?>">
                                    <label class="form-check-label" for="inlineCheckbox<?= $p->id ?>"> <?= ucfirst($p->jenis_penjualan) ?></label>
                                 </div>
                              <?php } ?>
                           </div>
                        </div>
                        
                        <div class="row d-flex align-items-center form-group border-bottom">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0 align-top">Tertarik<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <?php 
                                 foreach($ketertarikan->result() as $kt){ 
                                    $cekKetertarikan = $this->db->get_where('user_tertarik', [
                                       'user_id' => $this->session->userdata('userid'),
                                       'ketertarikan_id' => $kt->id
                                    ]);
                              ?>
                                 <div class="form-check mb-2">
                                    <input class="form-check-input" <?= ($cekKetertarikan->num_rows() > 0) ? 'checked' : '' ?> name="ketertarikan_id[]" type="checkbox" id="inlineCheckbox<?= $kt->id ?>" value="<?= $kt->id ?>">
                                    <label class="form-check-label" for="inlineCheckbox<?= $kt->id ?>"> <?= ucfirst($kt->jenis_ketertarikan) ?></label>
                                 </div>
                              <?php } ?>
                           </div>
                        </div>

                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Menjual Produk<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="menjual_produk" class="form-control font-weight-bold text-muted" value="<?= $user->menjual_produk ?>" placeholder="Tulis">
                           </div>
                        </div>


                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Membutuhkan Produk<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="membutuhkan_produk" class="form-control font-weight-bold text-muted" value="<?= $user->membutuhkan_produk ?>" placeholder="Tulis ">
                           </div>
                        </div>


                        <div class="row d-flex align-items-center form-group">
                           <div class="col-md-4">
                              <p class="text-muted font-weight-bold mb-0">Keterangan Tambahan<sup class="text-danger">*</sup></p>
                           </div>
                           <div class="col-md-8">
                              <input type="text" name="keterangan" class="form-control font-weight-bold text-muted" value="<?= $user->keterangan ?>" placeholder="Tulis">
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