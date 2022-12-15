<div class="profile-cover text-center">
   <?php if($jejaring->cover_img): ?>
      <img class="img-fluid w-100" src="<?= base_url('uploads/cover/' . $jejaring->cover_img) ?>" alt="" style="height: 250px; object-fit: cover;">
   <?php else: ?>
      <img class="img-fluid w-100" src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" alt="" style="height: 250px; object-fit: cover;">
   <?php endif; ?>
</div>
<div class="bg-white shadow-sm-bottom">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="d-flex align-items-center py-3">
               <div class="profile-left">
                  <ol class="breadcrumb bg-white px-0 py-0 mb-3">
                     <li class="breadcrumb-item small"><a href="<?= site_url('') ?>" class="text-info"><i class="fa fa-home mr-2"></i>Beranda</a></li>
                     <li class="breadcrumb-item small"><a href="<?= site_url('jejaring') ?>" class="text-info">Jejaring</a></li>
                     <li class="breadcrumb-item small active" aria-current="page"><?= $jejaring->nama_kelembagaan ?></li>
                  </ol>
                  <h5 class="font-weight-bold text-dark mb-1 mt-0"><?= $jejaring->nama_kelembagaan ?></h5>
                  <p class="mb-0 text-muted"><a class="mr-2 font-weight-bold" href="#"> <i class="fa fa-map mr-1"></i> <?= "Kel." . ucfirst(strtolower($jejaring->kelurahan)) . ", Kec." . ucfirst(strtolower($jejaring->kecamatan)).". " . ucfirst(strtolower($jejaring->kota)) ." - ". ucfirst(strtolower($jejaring->provinsi))?></a></p>
               </div>
               <div class="profile-right ml-auto">
                  <a href="<?= $jejaring->maps ?>" class="btn btn-light mr-1 text-success" target="__BLANK"> &nbsp; Lokasi &nbsp; </a>
                  <a href="https://api.whatsapp.com/send/?phone=<?= $jejaring->hp ?>&text&type=phone_number&app_absent=0" class="btn btn-success text-white" target="__BLANK"> &nbsp; <i class="fa fa-whatsapp fa-lg mr-1" aria-hidden="true"></i> Hubungi Sekarang &nbsp; </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="py-4">
   <div class="container">
      <div class="row">
         <!-- Main Content -->
         <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="box shadow-sm rounded bg-white mb-3">
               <div class="box-title border-bottom p-3">
                  <h6 class="m-0 font-weight-bold">Tentang Kami</h6>
               </div>
               <div class="box-body px-3 pt-2 pb-1">
                  <p class="text-justify mb-2">
                     <?= $jejaring->deskripsi ?>
                  </p>
               </div>
            </div>
            <div class="box shadow-sm rounded bg-white mb-3">
               <div class="box-title border-bottom p-3">
                  <h6 class="m-0 font-weight-bold">Biodata Lengkap</h6>
               </div>
               <div class="box-body">
                  <table class="table table-borderless mb-0">
                     <tbody>
                        <tr class="border-bottom">
                           <th class="p-3" width="40%;">Lembaga</th>
                           <td class="p-3"><?= $jejaring->nama_kelembagaan ?></td>
                        </tr>
                        <tr class="border-bottom">
                           <th class="p-3" width="40%;">Kategori Lembaga</th>
                           <td class="p-3"><?= $jejaring->kelembagaan ?></td>
                        </tr>
                        <tr class="border-bottom">
                           <th class="p-3">No HP</th>
                           <td class="p-3"><?= $jejaring->hp ?></td>
                        </tr>
                        <tr class="border-bottom">
                           <th class="p-3">Alamat</th>
                           <td class="p-3"><?= $jejaring->alamat ?></td>
                        </tr>
                        <tr class="border-bottom">
                           <th class="p-3">Nama PJ</th>
                           <td class="p-3"><?= $jejaring->nama ?></td>
                        </tr>
                        <tr class="border-bottom">
                           <th class="p-3">Komoditas</th>
                           <td class="p-3"><?php 
                              if($komoditas->num_rows() > 0):
                                 $copy = $komoditas->result();
                                 foreach($komoditas->result() as $k){
                                    echo $k->komoditas;
                                    if(next($copy)){
                                       echo ", ";
                                    }
                                 }
                              else:
                                 echo " - ";
                              endif;
                           ?></td>
                        </tr>
                        
                        <?php if($jejaring->lahan_yg_dikelola): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Lahan</th>
                              <td class="p-3"><?= ($jejaring->lahan_yg_dikelola) ? $jejaring->lahan_yg_dikelola : ' - ' ?> Hektar</td>
                           </tr>
                        <?php endif; ?>
                        
                        <?php if($jejaring->rata_produksi_tahun): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Produksi</th>
                              <td class="p-3"><?= ($jejaring->rata_produksi_tahun) ? $jejaring->rata_produksi_tahun : ' - ' ?> Kg <sup class="text-danger">/tahun</sup></td>
                           </tr>
                        <?php endif; ?>
                        
                        <?php if($jejaring->rata_produksi_bulan): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Kebutuhan</th>
                              <td class="p-3"><?= ($jejaring->rata_produksi_bulan) ? $jejaring->rata_produksi_bulan : ' - ' ?> Kg <sup class="text-danger">/bulan</sup></td>
                           </tr>
                        <?php endif; ?>
                        
                        <?php if($jejaring->menjual_produk): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Menjual Produk</th>
                              <td class="p-3"><?= ($jejaring->menjual_produk) ? $jejaring->menjual_produk : ' - ' ?></td>
                           </tr>
                        <?php endif; ?>
                        
                        <?php if($jejaring->produk_dijual_bulanan): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Produk Dijual</th>
                              <td class="p-3"><?= ($jejaring->produk_dijual_bulanan) ? $jejaring->produk_dijual_bulanan : ' - ' ?> Kg <sup class="text-danger">/bulan</sup></td>
                           </tr>
                        <?php endif; ?>
                        
                        <?php if($jejaring->membutuhkan_produk): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Membutuhkan Produk</th>
                              <td class="p-3"><?= ($jejaring->membutuhkan_produk) ? $jejaring->membutuhkan_produk : ' - ' ?></td>
                           </tr>
                        <?php endif; ?>
                        
                        <?php if($jejaring->produk_dibutuhkan_bulanan): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Produk Dibutuhkan</th>
                              <td class="p-3"><?= ($jejaring->produk_dibutuhkan_bulanan) ? $jejaring->produk_dibutuhkan_bulanan : ' - ' ?> Kg <sup class="text-danger">/bulan</sup></td>
                           </tr>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>

            <div class="box shadow-sm rounded bg-white mb-3">
               <div class="box-title border-bottom p-3">
                  <h6 class="m-0 font-weight-bold">Olahan</h6>
               </div>
               <div class="box-body">
                  <table class="table table-borderless mb-0">
                     <tbody>
                        <?php if($kategori_olahan->num_rows() > 0): ?>
                           <tr class="border-bottom">
                              <th class="p-3" width="40%;">Kategori</th>
                              <td class="p-3"><?php 
                                 if($kategori_olahan->num_rows() > 0):
                                    $copyOlahan = $kategori_olahan->result();
                                    foreach($kategori_olahan->result() as $o){
                                       echo ucfirst($o->kategori_olahan);
                                       if(next($copyOlahan)){
                                          echo ", ";
                                       }
                                    }
                                 else:
                                    echo " - ";
                                 endif;
                              ?></td>
                           </tr>
                        <?php endif; ?>
                        
                        <?php if($jejaring->jenis_olahan): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Jenis</th>
                              <td class="p-3"><?= ($jejaring->jenis_olahan) ? $jejaring->jenis_olahan : ' - ' ?></td>
                           </tr>
                        <?php endif; ?>
                        
                        <?php if($jejaring->rata_produksi_bulan): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Produksi</th>
                              <td class="p-3"><?= ($jejaring->rata_produksi_bulan) ? $jejaring->rata_produksi_bulan : ' - ' ?> Kg <sup class="text-danger">/bulan</sup></td>
                           </tr>
                        <?php endif; ?>
                        
                        <?php if($jejaring->jenis_pupuk): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Pupuk</th>
                              <td class="p-3"><?= ($jejaring->jenis_pupuk) ? $jejaring->jenis_pupuk : ' - ' ?></td>
                           </tr>
                        <?php endif; ?>
                        
                        <?php if($jejaring->jenis_pestisida): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Pestisida</th>
                              <td class="p-3"><?= ($jejaring->jenis_pestisida) ? $jejaring->jenis_pestisida : ' - ' ?></td>
                           </tr>
                        <?php endif; ?>
                        
                        <?php if($jejaring->jenis_aisintan): ?>
                           <tr class="border-bottom">
                              <th class="p-3">Alsintan</th>
                              <td class="p-3"><?= ($jejaring->jenis_aisintan) ? $jejaring->jenis_aisintan : ' -' ?></td>
                           </tr>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </main>
         <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
            <div class="box mb-3 shadow-sm rounded border-dark bg-white profile-box text-center">
               <div class="px-3 py-3">
                  <span class="badge badge-warning mb-3 w-100 py-1 text-uppercase">Petani/Produsen Pangan</span>
                  <?php if($jejaring->img): ?>
                     <img src="<?= base_url('uploads/profile/' . $jejaring->img) ?>" class="img-fluid border border-dark rounded-circle" style="height: 100px; width: 100px; object-fit: cover;" alt="Responsive image">
                  <?php else: ?>
                     <img src="https://static.vecteezy.com/system/resources/thumbnails/007/684/509/small/alphabet-letters-initials-monogram-logo-tp-pt-t-and-p-free-vector.jpg" class="img-fluid border border-dark rounded-circle" style="height: 100px; width: 100px; object-fit: cover;" alt="Responsive image">
                  <?php endif; ?>
               </div>
               <div class="p-3 border-top border-bottom">
                  <h6 class="font-weight-bold text-dark mb-2 mt-0"><?= $jejaring->nama ?></h6>
                  <p class="mb-0 text-muted"><?= $jejaring->alamat . ", Kel." . ucfirst(strtolower($jejaring->kelurahan)) . ", Kec." . ucfirst(strtolower($jejaring->kecamatan)).". " . ucfirst(strtolower($jejaring->kota)) ." - ". ucfirst(strtolower($jejaring->provinsi))?></p>
               </div>
               <div class="p-3">
                  <div class="d-flex align-items-top mb-2">
                     <p class="mb-0 text-muted">Whatsapp</p>
                     <p class="font-weight-bold text-dark mb-0 mt-0 ml-auto"><?= $jejaring->hp ?></p>
                  </div>
                  <div class="d-flex align-items-top mb-2">
                     <p class="mb-0 text-muted">Instagram</p>
                     <p class="font-weight-bold text-dark mb-0 mt-0 ml-auto"><?= ($jejaring->instagram) ? '@' . $jejaring->instagram : ' - ' ?></p>
                  </div>
                  <div class="d-flex align-items-top mb-2">
                     <p class="mb-0 text-muted">Facebook</p>
                     <p class="font-weight-bold text-dark mb-0 mt-0 ml-auto"><?= ($jejaring->facebook) ? '@' . $jejaring->facebook : ' - ' ?></p>
                  </div>
                  <div class="d-flex align-items-top mb-2">
                     <p class="mb-0 text-muted">Youtube</p>
                     <p class="font-weight-bold text-dark mb-0 mt-0 ml-auto"><?= ($jejaring->youtube) ? '@' . $jejaring->youtube : ' - ' ?></p>
                  </div>
                  <div class="d-flex align-items-top mb-2">
                     <p class="mb-0 text-muted">Tiktok</p>
                     <p class="font-weight-bold text-dark mb-0 mt-0 ml-auto"><?= ($jejaring->tiktok) ? '@' . $jejaring->tiktok : ' - ' ?></p>
                  </div>
               </div>
            </div>

            <div class="box shadow-sm">
               
            </div>
            
            <div class="box shadow-sm rounded bg-white mb-3">
               <div class="box-title border-bottom p-3 d-flex align-items-center">
                  <h6 class="m-0">Galleri</h6>
                  <a class="ml-auto text-info" href="#">Selengkapnya <i class="fa fa-arrow-right ml-2"></i></a>
               </div>
               <div class="box-body p-3">
                  <p class="mb-2 font-weight-bold">Tampak Depan</p>
                     <?php if($jejaring->cover_img): ?>
                        <img class="img-fluid w-100 mb-1" src="<?= base_url('uploads/cover/' . $jejaring->cover_img) ?>" alt="" style="object-fit: cover; height: 70px; border-radius: 10px;">
                     <?php else: ?>
                        <img class="img-fluid w-100 mb-1" src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" alt="" style="object-fit: cover; height: 70px; border-radius: 10px;">
                     <?php endif; ?>
                  <p class="mt-2 mb-2 font-weight-bold">Foto Lainnya</p>
                  <div class="gallery-box-main">
                     <div class="gallery-box">
                        <?php foreach($gallery->result() as $g): ?>
                           <img class="img-fluid" src="<?= base_url('uploads/gallery/' . $g->img) ?>" alt="" style="object-fit: cover; height: 70px;">
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center">
               <img src="<?= base_url() ?>assets/images/job1.png" class="img-fluid" alt="Responsive image">
               <div class="p-3 border-bottom">
                  <h6 class="font-weight-bold text-dark">Osahan Solutions</h6>
                  <p class="mb-0 text-muted">Looking for talent?</p>
               </div>
               <div class="p-3">
                  <button type="button" class="btn btn-outline-success pl-4 pr-4"> POST A JOB </button>
               </div>
            </div>
         </aside>
         <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
            <div class="d-flex flex-column mb-3">
                     
               <!-- Membutuhkan Produk -->
   
               <div class="border rounded p-2 px-3 bg-white mr-1 mb-2 d-flex flex-column w-100 shadow-sm">
                  <a href="http://localhost/tanaman-pangan/jejaring/71" class="mb-2 font-weight-normal text-dark text-xs">Membutuhkan</a>
                  <img class="img-fluid rounded mb-2" src="http://localhost/tanaman-pangan/assets/images/placeholder/main-placeholder-propaktani.png" style="object-fit: cover; height: 60px;">
                  <div class="d-flex">
                     <h4 class="mb-0 p-2 bg-dark rounded text-white position-relative" style="font-size: 18px !important;">12<span class="badge badge-pill py-1 badge-info position-absolute" style="top: -5px; right: -6px; font-size: 8px;">kg</span></h4>
                     <p class="mb-0 mt-0 ml-2 font-weight-normal p-0 text-xs">
                        Kacang Kemasan                                 </p>
                  </div>
               </div>
   
               <!-- Membutuhkan Produk -->
               
               <div class="border rounded p-2 px-3 bg-white mr-1 mb-2 d-flex flex-column w-100 shadow-sm">
                  <a href="http://localhost/tanaman-pangan/jejaring/71" class="mb-2 font-weight-normal text-dark text-xs">Menjual</a>
                  <img class="img-fluid rounded mb-2" src="http://localhost/tanaman-pangan/assets/images/placeholder/main-placeholder-propaktani.png" style="object-fit: cover; height: 60px;">
                  <div class="d-flex">
                     <h4 class="mb-0 p-2 bg-dark rounded text-white position-relative" style="font-size: 18px !important;">12<span class="badge badge-pill py-1 badge-info position-absolute" style="top: -5px; right: -6px; font-size: 8px;">kg</span></h4>
                     <p class="mb-0 mt-0 ml-2 font-weight-normal p-0 text-xs">
                        Kacang Kemasan                                 </p>
                  </div>
               </div>
   
            </div>
            <div class="box shadow-sm rounded bg-white mb-3">
               <div class="box-title border-bottom p-3">
                  <h6 class="m-0">Data Lainnya
                  </h6>
               </div>
               <div class="box-body">
                  <div class="linked-accounts px-3 py-2 border-bottom">
                     <h6 class="font-weight-bold">Penjualan</h6>
                     <ul>
                        <?php 
                           if($penjualan->num_rows() > 0):
                              foreach($penjualan->result() as $p): ?>
                                 <li class="mb-1"><i class="fa fa-check-circle mr-2 text-info" aria-hidden="true"></i><span class="text"><?= $p->jenis_penjualan ?></span></li>
                        <?php 
                              endforeach; 
                           else:
                              echo " - ";
                           endif;
                        ?>
                     </ul>
                  </div>
                  <div class="linked-accounts px-3 py-2">
                     <h6 class="font-weight-bold">Tertarik</h6>
                     <ul>
                        <?php 
                           if($tertarik->num_rows() > 0):
                              foreach($tertarik->result() as $t): ?>
                           <li class="mb-1"><i class="fa fa-check-circle mr-2 text-info" aria-hidden="true"></i><span class="text"><?= $t->jenis_ketertarikan ?></span></li>
                        <?php 
                              endforeach; 
                           else:
                              echo " - ";
                           endif;
                        ?>
                     </ul>
                  </div>
               </div>
            </div>

            <div class="box shadow-sm rounded bg-white mb-3">
               <div class="box-title border-bottom p-3 d-flex align-items-center">
                  <h6 class="m-0">Kelas Tani</h6>
                  <a class="ml-auto text-info" href="#">Selengkapnya <i class="fa fa-arrow-right ml-2"></i></a>
               </div>
               <a href="job-profile.html">
                  <div class="border-bottom rounded bg-white job-item p-3 mb-0">
                     <img class="img-fluid w-100 mb-3 rounded" src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" alt="" style="height: 80px; width: auto; object-fit: cover;">
                     <div class="d-flex align-items-center job-item-header">
                        <div class="overflow-hidden mr-2">
                           <!-- text-truncate -->
                           <h6 class="font-weight-bold text-dark mb-0">Pelatihan Sejuta Petani, Pengelolaan Kesuburan Tanah</h6>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
         </aside>
      </div>
   </div>
</div>