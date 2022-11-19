
      <div class="main-page pb-5 pt-4">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 left order-2">
                   <ol class="d-lg-flex d-none px-0 py-0 mb-3">
                       <li class="small breadcrumb-item "><a href="<?= site_url('') ?>" class="text-info"><i class="fa fa-home mr-2"></i>Beranda</a></li>
                       <li class="small breadcrumb-item"><a href="<?= site_url('tanitrainer') ?>" class="text-info">Tani Trainer</a></li>
                       <li class="small breadcrumb-item active text-dark text-truncate" aria-current="page"><?= $data->judul ?></li>
                   </ol>
                  <h2 class="p-0"><?= $data->judul ?></h2>
                  <div class="user-info d-flex mb-3 mt-2 small text-dark">
                        <span class="orders-in-queue"><i class="fa fa-calendar mr-2"></i><?= longdate_indo($data->tanggal) ?></span>
                    </div>
                  
                  <div id="description" class="description text-justify">
                     <?= $data->deskripsi ?>
                  </div>
               </div>
               <div class="col-lg-4 right order-lg-2 order-1 mb-3">
                  <div class="sticky">
                     <div class="tab-content p-3">
                        <?php if($data->img): ?>
                           <img class="img-fluid w-100 mb-3 rounded" src="<?= base_url('uploads/tanitrainer/' . $data->img) ?>" alt="Alt" style="height: 200px;">
                        <?php else: ?>
                           <img class="img-fluid w-100 mb-3 rounded" src="<?= base_url('assets/images/list/v5.png') ?>" alt="Alt" style="height: 200px;">
                        <?php endif; ?>
                     <div class="header">
                        <h1><b class="title">Gratis</b></h1>
                        <p class="mb-3">Segera daftarkan dirimu, untuk menjadi perserta Pelatihan Sejuta Petani, Pengelolaan Kesuburan Tanah </p>
                        <button>DAFTAR SEKARANG</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class=" mt-5">
            <div class="view_slider recommended">
               <div class="">
                  <div class="row">
                     <div class="col-lg-12">
                        <h3>Tani Trainer</h3>
                        <div class="view recent-slider recommended-slider">
                           <div>
                              <a href="product-detail.html">
                              <img class="img-fluid" src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" />
                              </a>
                              <div class="inner-slider">
                                 <div class="inner-wrapper">
                                    <div class="d-flex align-items-center">
                                       <span class="seller-name">
                                          <a href="profile.html">Pelatihan Sejuta Petani, Pengelolaan Kesuburan Tanah </a>
                                          <span class="level hint--top level-one-seller">
                                          12 September 2022 - 1 Januari 2023
                                          </span>
                                       </span>
                                    </div>
                                    <h3 class="mb-2">Pelatihan Sejuta Petani dan Penyuluh Vol.3 dengan tema Pemanfaatan KUR untuk Agribisnis.</h3>
                                    <div class="footer">
                                       <a href="#" class="c-btn btn-block c-fill-color-btn">Daftar Pelatihan</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <a href="product-detail.html">
                              <img class="img-fluid" src="http://kagama.co/wp-content/uploads/2018/08/Petani.jpg" />
                              </a>
                              <div class="inner-slider">
                                 <div class="inner-wrapper">
                                    <div class="d-flex align-items-center">
                                       <span class="seller-name">
                                          <a href="profile.html">Pelatihan Sejuta Petani, Pengelolaan Kesuburan Tanah </a>
                                          <span class="level hint--top level-one-seller">
                                          12 September 2022 - 1 Januari 2023
                                          </span>
                                       </span>
                                    </div>
                                    <h3 class="mb-2">Pelatihan Sejuta Petani dan Penyuluh Vol.3 dengan tema Pemanfaatan KUR untuk Agribisnis.</h3>
                                    <div class="footer">
                                       <a href="#" class="c-btn btn-block c-fill-color-btn">Daftar Pelatihan</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <a href="product-detail.html">
                              <img class="img-fluid" src="https://www.suarakeadilan.org/images/2022/02/03/petani.jpg" />
                              </a>
                              <div class="inner-slider">
                                 <div class="inner-wrapper">
                                    <div class="d-flex align-items-center">
                                       <span class="seller-name">
                                          <a href="profile.html">Pelatihan Sejuta Petani, Pengelolaan Kesuburan Tanah </a>
                                          <span class="level hint--top level-one-seller">
                                          12 September 2022 - 1 Januari 2023
                                          </span>
                                       </span>
                                    </div>
                                    <h3 class="mb-2">Pelatihan Sejuta Petani dan Penyuluh Vol.3 dengan tema Pemanfaatan KUR untuk Agribisnis.</h3>
                                    <div class="footer">
                                       <a href="#" class="c-btn btn-block c-fill-color-btn">Daftar Pelatihan</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <a href="product-detail.html">
                              <img class="img-fluid" src="https://geotimes.id/wp-content/uploads/2018/09/petani-indonesia-dan-luar-negeri-ibarat-bumi-dan-langit_1514300885-b-1068x715.jpg" />
                              </a>
                              <div class="inner-slider">
                                 <div class="inner-wrapper">
                                    <div class="d-flex align-items-center">
                                       <span class="seller-name">
                                          <a href="profile.html">Pelatihan Sejuta Petani, Pengelolaan Kesuburan Tanah </a>
                                          <span class="level hint--top level-one-seller">
                                          12 September 2022 - 1 Januari 2023
                                          </span>
                                       </span>
                                    </div>
                                    <h3 class="mb-2">Pelatihan Sejuta Petani dan Penyuluh Vol.3 dengan tema Pemanfaatan KUR untuk Agribisnis.</h3>
                                    <div class="footer">
                                       <a href="#" class="c-btn btn-block c-fill-color-btn">Daftar Pelatihan</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>