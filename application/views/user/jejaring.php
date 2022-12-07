<input type="hidden" id="page" value="<?= ($this->input->get('page', TRUE)) ? $this->input->get('page', TRUE) : 1 ?>">
<!-- Inner Header -->
<section class="py-5 bg-dark inner-header">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1 class="mt-0 mb-3 text-white">Temukan Jejaringmu</h1>
            <div class="breadcrumbs">
               <p class="mb-0 text-white"><a class="text-white" href="<?= site_url('') ?>">Home</a> / <span class="text-success">Jejaring</span></p>
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
                     <p class="">Anda ingin?</p>
                  </div>
                  <div class="sorting d-flex align-items-center ml-3" style="width: 200px !important;">
                     <select class="custom-select custom-select-sm border-0 shadow-sm ml-2 mr-2" style="width: 200px !important;" id="-komoditas">
                        <option value="" selected disabled>Pilih</option>
                        <option value="semua"> Membeli</option>
                        <option value="semua"> Menjual</option>
                     </select>
                  </div>
               </div>

               <!-- Untuk menjual -->
               <!-- <h3 class="d-lg-block d-none">Tawarkan komoditasmu kepada jejaring berikut.</h3> -->

               <!-- Untuk membeli produk -->
               <h3 class="d-lg-block d-none">Hubungi segera mereka, untuk kesediaan barang.</h3>

            </div>

            <div class="col-lg-6 col-12">
               <div class="sorting-div d-flex align-items-center justify-content-">
                  <div class="sorting d-flex align-items-center ml-lg-auto ml-0 d-lg-block d-none">
                     <p>Berdasarkan</p>
                  </div>
                  <div class="sorting d-flex align-items-center ml-3">
                     <select class="custom-select custom-select-sm border-0 shadow-sm ml-2 mr-2" style="width: 200px !important;" id="select-komoditas">
                        <option value="" selected disabled>Komoditas</option>
                        <option value="semua"> Semua</option>
                        <?php foreach($komoditas->result() as $k){ ?>
                           <option <?= ($this->input->get('komoditasid', TRUE) == $k->id) ? 'selected' : '' ?> value="<?= $k->id ?>"> <?= ucwords(ucfirst($k->komoditas)) ?></option>
                        <?php } ?>
                     </select>
                     <select class="custom-select custom-select-sm border-0 shadow-sm ml-2 mr-2" style="width: 200px !important;" id="select-role">
                        <option value="" selected disabled>Peran</option>
                        <option value="semua">Semua</option>
                        <?php foreach($role->result() as $r){ ?>
                           <option <?= ($this->input->get('roleid', TRUE) == $r->id) ? 'selected' : '' ?> value="<?= $r->id ?>"> <?= $r->role ?></option>
                        <?php } ?>
                     </select>
                     <select class="custom-select custom-select-sm border-0 shadow-sm ml-2 mr-2" style="width: 200px !important;" id="select-prov">
                        <option value="" selected disabled>Wilayah</option>
                        <option value="semua">Semua</option>
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
         <div class="row">

            <?php 
               foreach($data->result() as $row): 
                  $komoditasUser = $this->M_Komoditas->getByUser($row->id);
            ?>
               <div class="col-lg-4 col-md-6 col-12">
                  <a href="<?= site_url('jejaring/' . $row->id) ?>">
                     <?php if($row->cover_img): ?>
                        <img class="img-fluid" src="<?= base_url('uploads/cover/' . $row->cover_img) ?>" />
                     <?php else: ?>
                        <img class="img-fluid" src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" />
                     <?php endif; ?>
                  </a>
                  <div class="inner-slider">
                     <div class="inner-wrapper">
                        <div class="d-flex align-items-center">
                           <span class="seller-image">
                              <img class="img-fluid"src="<?= base_url('uploads/profile/' . $row->img) ?>" alt='' />
                           </span>
                           <span class="seller-name">
                              <a href="<?= site_url('jejaring/' . $row->id) ?>" class="mb-1"><?= $row->nama ?></a>
                           </span>
                        </div>
                        <span class="badge badge-warning"><?= $row->role ?></span>
                        <h3 class="mb-1"><?= $row->keterangan ?></h3>
                        <h3 class="mb-2 mt-0 font-weight-bold">
                           Komoditas dijual:
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