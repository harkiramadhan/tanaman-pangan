
      <div class="main-page pb-5 pt-4">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 left">
                   <ol class="d-lg-flex d-none px-0 py-0 mb-3">
                       <li class="small breadcrumb-item "><a href="<?= site_url('') ?>" class="text-info"><i class="fa fa-home mr-2"></i>Beranda</a></li>
                       <li class="small breadcrumb-item"><a href="<?= site_url('publikasi') ?>" class="text-info">Publikasi</a></li>
                       <li class="small breadcrumb-item active text-dark text-truncate" aria-current="page"><?= $data->judul ?></li>
                   </ol>
                  <h2 class="p-0"><?= $data->judul ?></h2>
                  <div class="user-info d-flex mb-3 mt-2 small text-dark">
                     <span class="orders-in-queue"><i class="fa fa-calendar mr-2"></i><?= longdate_indo($data->tanggal) ?></span>
                  </div>
                  
                  <?php if($data->cover_img): ?>
                     <img class="img-fluid w-100 mb-4 rounded" src="<?= base_url('uploads/publikasi/' . $data->cover_img) ?>" alt="Alt" style="height: 300px;">
                  <?php else: ?>
                     <img class="img-fluid w-100 mb-4 rounded" src="<?= base_url('assets/images/list/v5.png') ?>" alt="Alt" style="height: 300px;">
                  <?php endif; ?>
                  <div id="description" class="description text-justify">
                     <?= $data->deskripsi ?>
                  </div>
               </div>
               <?php if(@$latest->id && ($data->id != @$latest->id)): ?>
               <div class="col-lg-4 right">
                  <div class="sticky">
                    <div class="tab-content p-0">
                        <div class="box-title border-bottom p-3">
                           <h6 class="m-0">Publikasi Terbaru</h6>
                        </div>
                        <a href="<?= site_url('publikasi/' . $latest->flag) ?>">
                           <div class="d-flex flex-row align-items-top job-item-header pb-2 border-bottom p-3">
                              <?php if($data->cover_img): ?>
                                 <img class="img-fluid rounded mb-auto mr-3" src="<?= base_url('uploads/publikasi/' . $latest->cover_img) ?>" alt="" style="height: 50px; width: 50px;">
                              <?php else: ?>
                                 <img class="img-fluid rounded mb-auto mr-3" src="<?= base_url('assets/images/list/v5.png') ?>" alt="" style="height: 50px; width: 50px;">
                              <?php endif; ?>
                              <div class="mb-0">
                                 <p class="font-weight-bold text-dark mb-1 mt-0"><?= $latest->judul ?></p>
                                 <div class="text-gray-900"><?= longdate_indo($latest->tanggal) ?></div>
                              </div>
                           </div>
                        </a>
                        <div class="box-title border-bottom p-3 text-center">
                           <a class="ml-auto text-info" href="<?= site_url('publikasi/' . $latest->flag) ?>"><?= ($this->session->userdata('lang') == 'EN') ? 'Read More' : 'Selengkapnya'  ?> <i class="fa fa-arrow-right ml-2"></i></a>
                        </div>
                    </div>
                  </div>
               </div>
               <?php endif; ?>
            </div>
         </div>
         <div class="container mt-5">
            
            <div class="view_slider recommended">
               <div class="">
                  <div class="row">
                     <div class="col-lg-12">
                        <h3>Tani Trainer</h3>
                        <div class="view recent-slider recommended-slider">
                           <?php foreach($tanitrainer->result() as $row): ?>
                           <div>
                              <a href="<?= site_url('tanitrainer/' . $row->flag) ?>">
                                 <?php if($row->img): ?>
                                    <img class="img-fluid" src="<?= base_url('uploads/tanitrainer/' . $row->img) ?>" style="height: 170px;  object-fit: cover;"/>
                                 <?php else: ?>
                                    <img class="img-fluid" src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" style="height: 170px;  object-fit: cover;"/>
                                 <?php endif; ?>
                              </a>
                              <div class="inner-slider">
                                 <div class="inner-wrapper">
                                    <div class="d-flex align-items-center">
                                       <span class="seller-name">
                                          <a href="profile.html"><?= $row->judul ?> </a>
                                          <span class="level hint--top level-one-seller"><?= longdate_indo($row->tanggal) ?></span>
                                       </span>
                                    </div>
                                    <h3 class="mb-2"><?= mb_strimwidth($row->deskripsi, 0, 200, "...") ?></h3>
                                    <div class="footer">
                                       <a href="<?= site_url('tanitrainer/' . $row->flag) ?>" class="c-btn btn-block c-fill-color-btn">Daftar Pelatihan</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php endforeach; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>