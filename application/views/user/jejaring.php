<input type="hidden" id="page" value="<?= ($this->input->get('page', TRUE)) ? $this->input->get('page', TRUE) : 1 ?>">
<!-- Inner Header -->
<section class="py-5 bg-dark inner-header">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1 class="mt-0 mb-3 text-white"><?= ($this->session->userdata('lang') == 'EN') ? 'Find Your Network' : 'Temukan Jejaringmu' ?></h1>
            <div class="breadcrumbs">
               <p class="mb-0 text-white"><a class="text-white" href="<?= site_url('') ?>">Home</a> / <span class="text-success"><?= ($this->session->userdata('lang') == 'EN') ? 'Network' : 'Jejaring' ?></span></p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Inner Header -->

<div class="main-page best-selling">
   <div class="view_slider recommended pt-5">
      <div class="container mb-0">
         <div class="row">

            <div class="col-lg-6 col-12 ">
               <div class="sorting-div d-flex align-items-center mb-3">
                  <div class="sorting d-flex align-items-center">
                     <!-- <p>Berdasarkan</p> -->
                     <p class=""><?= ($this->session->userdata('lang') == 'EN') ? 'What do you want to?' : 'Anda ingin?' ?></p>
                  </div>
                  <div class="sorting d-flex align-items-center ml-3" style="width: 200px !important;">
                     <select class="custom-select custom-select-sm border-0 shadow-sm ml-2 mr-2" style="width: 200px !important;" id="select-type">
                        <option> <?= ($this->session->userdata('lang') == 'EN') ? 'Choose' : 'Pilih' ?> </option>
                        <option <?= ($this->input->get('type', TRUE) == 2) ? 'selected' : '' ?> value="2"> <?= ($this->session->userdata('lang') == 'EN') ? 'Buy' : 'Membeli' ?> </option>
                        <option <?= ($this->input->get('type', TRUE) == 1) ? 'selected' : '' ?> value="1"> <?= ($this->session->userdata('lang') == 'EN') ? 'Sell' : 'Menjual' ?> </option>
                     </select>
                  </div>
               </div>

               <!-- Untuk menjual -->
               <!-- <h3 class="d-lg-block d-none">Tawarkan komoditasmu kepada jejaring berikut.</h3> -->

               <!-- Untuk membeli produk -->
               <h3 class="d-lg-block d-none"><?= ($this->session->userdata('lang') == 'EN') ? 'Contact them immediately, for the availability of goods' : 'Hubungi segera mereka, untuk kesediaan barang.' ?></h3>

            </div>

            <div class="col-lg-6 col-12 mb-lg-0 mb-3">
               <div class="sorting-div d-flex align-items-center justify-content-">
                  <div class="sorting d-flex align-items-center ml-lg-auto ml-0 d-lg-block d-none">
                     <p><?= ($this->session->userdata('lang') == 'EN') ? 'Based on' : 'Berdasarkan' ?></p>
                  </div>
                  <div class="sorting d-flex align-items-center ml-3">
                     <select class="custom-select custom-select-sm border-0 shadow-sm ml-2 mr-2" style="width: 200px !important;" id="select-komoditas">
                        <option value="" selected disabled><?= ($this->session->userdata('lang') == 'EN') ? 'Commodity' : 'Komoditas' ?></option>
                        <option value="semua"> <?= ($this->session->userdata('lang') == 'EN') ? 'All' : 'Semua' ?></option>
                        <?php foreach($komoditas->result() as $k){ ?>
                           <option <?= ($this->input->get('komoditasid', TRUE) == $k->id) ? 'selected' : '' ?> value="<?= $k->id ?>"> <?= ($this->session->userdata('lang') == 'EN') ? ucwords(ucfirst($k->komoditas_en)) : ucwords(ucfirst($k->komoditas)) ?></option>
                        <?php } ?>
                     </select>
                     <select class="custom-select custom-select-sm border-0 shadow-sm ml-2 mr-2" style="width: 200px !important;" id="select-role">
                        <option value="" selected disabled><?= ($this->session->userdata('lang') == 'EN') ? 'Role' : 'Peran' ?></option>
                        <option value="semua"> <?= ($this->session->userdata('lang') == 'EN') ? 'All' : 'Semua' ?></option>
                        <?php foreach($role->result() as $r){ ?>
                           <option <?= ($this->input->get('roleid', TRUE) == $r->id) ? 'selected' : '' ?> value="<?= $r->id ?>"> <?= ($this->session->userdata('lang') == 'EN') ? $r->role_en : $r->role ?></option>
                        <?php } ?>
                     </select>
                     <select class="custom-select custom-select-sm border-0 shadow-sm ml-2 mr-2" style="width: 200px !important;" id="select-prov">
                        <option value="" selected disabled><?= ($this->session->userdata('lang') == 'EN') ? 'Region' : 'Wilayah'  ?></option>
                        <option value="semua"> <?= ($this->session->userdata('lang') == 'EN') ? 'All' : 'Semua' ?></option>
                        <?php foreach($provinsi->result() as $p){ ?>
                           <option <?= ($this->input->get('provid', TRUE) == $p->prov_id) ? 'selected' : '' ?> value="<?= $p->prov_id ?>"> <?= ucwords(strtolower($p->prov_name)) ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="container">

         <?php if($data->num_rows() > 0): ?>
            <div class="row">
               <?php 
                  foreach($data->result() as $row): 
                     $komoditasUser = $this->M_Komoditas->getByUser($row->id);
               ?>
                  <div class="col-lg-4 col-md-6 col-12">

                     <!-- <span class="badge badge-warning font-weight-bolder mb-2 p-2 position-absolute" style="left: 25px; top: 10px;"><i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i><?= ($row->status == 1) ? 'MENAWARKAN' : 'MEMBUTUHKAN' ?></span> -->
                     <span class="badge badge-warning font-weight-bolder mb-2 p-2 position-absolute text-uppercase" style="left: 25px; top: 10px;"><?= ($this->session->userdata('lang') == 'EN') ? $row->role_en : $row->role ?></span>

                     <!-- <span class="badge badge-warning mb-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?= $row->role ?></span> -->
                     <a href="<?= site_url('jejaring/' . $row->id) ?>">
                        <?php if($row->cover_img): ?>
                           <img class="img-fluid" src="<?= base_url('uploads/cover/' . $row->cover_img) ?>" style="object-fit: cover; height: 200px;"/>
                        <?php else: ?>
                           <img class="img-fluid" src="<?= base_url('assets/images/placeholder/main-placeholder-propaktani.png')?>" style="object-fit: cover; height: 200px;" />
                        <?php endif; ?>
                     </a>
                     <div class="inner-slider">
                        <div class="inner-wrapper">

                           <a href="<?= site_url('jejaring/' . $row->id) ?>" class="mb-3 font-weight-bold text-dark text-xs"><i class="fa fa-user mr-2 text-secondary" aria-hidden="true"></i><?= $row->nama ?></a>

                           <div class="d-flex flex-row mt-2">

                              <!-- Membutuhkan Produk -->
                              
                              <div class="border rounded p-2 mt-1 mr-1 mb-2 d-flex flex-column w-100">
                                 <a href="<?= site_url('jejaring/' . $row->id) ?>" class="mb-1 font-weight-light text-dark text-xs">Menjual</a>
                                 <img class="img-fluid rounded mb-2" src="<?= base_url('assets/images/placeholder/main-placeholder-propaktani.png')?>" style="object-fit: cover; height: 40px;" />
                                 <div class="d-flex">
                                    <h4 class="mb-0 p-2 bg-dark rounded text-white position-relative" style="font-size: 18px !important;"><?= $row->produk_dijual_bulanan ?><span class="badge badge-pill py-1 badge-info position-absolute" style="top: -5px; right: -6px; font-size: 8px;">kg</span></h4>
                                    <p class="mb-0 mt-0 ml-2 font-weight-normal p-0 text-xs">
                                       <?= ucfirst($row->menjual_produk) ?>
                                    </p>
                                 </div>
                              </div>
                           
                              <!-- Membutuhkan Produk -->

                              <div class="border rounded p-2 mt-1 mr-1 mb-2 d-flex flex-column w-100">
                                 <a href="<?= site_url('jejaring/' . $row->id) ?>" class="mb-1 font-weight-light text-dark text-xs">Membutuhkan</a>
                                 <img class="img-fluid rounded mb-2" src="<?= base_url('assets/images/placeholder/main-placeholder-propaktani.png')?>" style="object-fit: cover; height: 40px;" />
                                 <div class="d-flex">
                                    <h4 class="mb-0 p-2 bg-dark rounded text-white position-relative" style="font-size: 18px !important;"><?= $row->produk_dibutuhkan_bulanan ?><span class="badge badge-pill py-1 badge-info position-absolute" style="top: -5px; right: -6px; font-size: 8px;">kg</span></h4>
                                    <p class="mb-0 mt-0 ml-2 font-weight-normal p-0 text-xs">
                                       <?= ucfirst($row->membutuhkan_produk) ?>
                                    </p>
                                 </div>
                              </div>

                           </div>
      
                           <div class="d-flex align-items-center mt-2">
                              <span class="seller-image">
                                 <?php if($row->img): ?>
                                    <img class="img-fluid" src="<?= base_url('uploads/profile/' . $row->img) ?>" style="object-fit: cover;"/>
                                 <?php else: ?>
                                    <img class="img-fluid" src="<?= base_url('assets/images/placeholder/square-placeholder-propaktani.png')?>" style="object-fit: cover;"/>
                                 <?php endif; ?>
                                 <!-- <img class="img-fluid"src="<?= base_url('uploads/profile/' . $row->img) ?>" alt='' /> -->
                              </span>
                           </div>

                           <!-- <h3 class="mb-1"><?= $row->keterangan ?></h3> -->
                           <h3 class="mb-1 mt-0 font-weight-bold">
                              Komoditas <?= ($row->status == 1) ? 'dijual' : 'dibutuhkan' ?>:
                           </h3>
                           <?php foreach($komoditasUser->result() as $ku): ?>
                              <span class="badge border border-2 bg-info text-white p-2 mb-1"><?= $ku->komoditas ?></span>
                           <?php endforeach; ?>
                           
                           <div class="footer mt-2">
                              <a href="<?= $row->maps ?>" class="text-dark" tabindex="0" <?= ($row->maps) ? 'target="__BLANK"' : '' ?>>
                                 <i class="fa fa-map-marker fa-lg  ml-2 mr-3" aria-hidden="true"></i>
                              </a>
                              <a href="https://api.whatsapp.com/send/?phone=<?= $row->hp ?>&text&type=phone_number&app_absent=0" class="text-dark" tabindex="0" target="__BLANK">
                                 <i class="fa fa-whatsapp  fa-lg ml-2 mr-3" aria-hidden="true"></i>
                              </a>

                              <a href="<?= site_url('jejaring/' . $row->id) ?>" class="c-btn btn-block c-fill-color-btn" tabindex="0">CEK PROFIL</a>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         <?php else: ?>
            <div class="card p-5 text-center mb-3">
               Data yang anda cari tidak ada
            </div>
         <?php endif; ?>
         
      </div>
   </div>
   <div class="footer-pagination text-center">
      <nav aria-label="Page navigation example">
         <ul class="pagination">
            <li class="page-item">
               <a class="page-link" href="<?= ($page > 1) ? site_url('jejaring?page=' . $previous) : '#' ?>" aria-label="Previous">
                  <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                  <!--                    <span class="sr-only"></span>-->
               </a>
            </li>
            <?php for($i=1; $i <= $count; $i++): ?>
               <?php if($i == 1 && $this->input->get('page', TRUE) == NULL): ?>
                  <li class="page-item active">
               <?php else: ?>
                  <li class="page-item <?= ($this->input->get('page', TRUE) == $i) ? 'active' : '' ?>">
               <?php endif; ?>
                  <a class="page-link" href="<?= site_url('jejaring?page=' . $i) ?>"><?= $i ?></a>
               </li>
            <?php endfor; ?>
            <li class="page-item">
               <a class="page-link" href="<?= ($page < $count) ? site_url('jejaring?page=' . $next) : '#' ?>" aria-label="Next">
                  <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                  <!--                    <span class="sr-only"></span>-->
               </a>
            </li>
         </ul>
      </nav>
   </div>
</div>