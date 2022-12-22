<input type="hidden" id="page" value="<?= ($this->input->get('page', TRUE)) ? $this->input->get('page', TRUE) : 1 ?>">
<!-- Inner Header -->
<section class="py-5 bg-dark inner-header">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1 class="mt-0 mb-3 text-white">Tani Trainer</h1>
            <div class="breadcrumbs">
               <p class="mb-0 text-white"><a class="text-white" href="<?= site_url('') ?>">Home</a>  /  <span class="text-success">Tani Trainer</span></p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Inner Header -->
<!--   header -->
<section class="py-5 p-list-two">
   <div class="container">
      <div class="row">
         <div class="col-lg-3">
            <div class="filters shadow-sm rounded bg-white mb-4">
               <div class="filters-header border-bottom pl-4 pr-4 pt-3 pb-3">
                  <h5 class="m-0">Filter By</h5>
               </div>
               <div class="filters-body">
                  <div id="accordion">
                     <div class="filters-card border-bottom p-4">
                        <div class="filters-card-header" id="headingOne">
                           <h6 class="mb-0">
                              <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Cocok Untuk <i class="mdi mdi-chevron-down float-right"></i>
                              </a>
                           </h6>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                           <div class="filters-card-body card-shop-filters">
                              <?php foreach($role->result() as $r){ ?>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="ids[]" <?= ($this->input->get('ids['.$r->id.']') == $r->id) ? 'checked' : '' ?> class="custom-control-input filter" id="cb<?= $r->id ?>" value="<?= $r->id ?>">
                                    <label class="custom-control-label" for="cb<?= $r->id ?>"> <?= $r->role ?> </label>
                                 </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-9 view_slider recommended">
            <div class="row">
               <div class="col-lg-12">
                  <div class="sorting-div d-flex align-items-center justify-content-between">
                     <p class="mb-2"><?= $total_data ?> Pelatihan Tersedia</p>
                     <div class="sorting d-flex align-items-center">
                        <p>Tampilkan</p>
                        <select class="custom-select custom-select-sm border-0 shadow-sm ml-2" id="select-status">
                           <option <?= ($this->input->get('status', TRUE) == 'Semua') ? 'selected' : '' ?> value="Semua">Semua</option>
                           <option <?= ($this->input->get('status', TRUE) == 'Aktif') ? 'selected' : '' ?> value="Aktif">Aktif</option>
                           <option <?= ($this->input->get('status', TRUE) == 'Selesai') ? 'selected' : '' ?> value="Selesai">Selesai</option>
                        </select>
                     </div>
                  </div>
                  <h3>Daftar Kelas Tani Trainer</h3>
               </div>
            </div>

            <?php if($data->num_rows() > 0): ?>
               <div class="row">
                  <?php foreach($data->result() as $row){ ?>
                  <div class="col-lg-4">
                     <a href="<?= site_url('tanitrainer/' . $row->flag) ?>">
                        <?php if($row->img): ?>
                           <img class="img-fluid" src="<?= base_url('uploads/tanitrainer/' . $row->img) ?>"  style="height: 170px;  object-fit: cover;"/>
                        <?php else: ?>
                           <img class="img-fluid" src="<?= base_url('assets/images/placeholder/main-placeholder-propaktani.png')?>"  style="height: 170px;  object-fit: cover;"/>
                        <?php endif; ?>
                     </a>
                     <div class="inner-slider">
                           <div class="inner-wrapper">
                              <div class="d-flex align-items-center">
                                 <span class="seller-name">
                                       <a href="<?= site_url('tanitrainer/' . $row->flag) ?>"><?= $row->judul ?> </a>
                                       <span class="level hint--top level-one-seller"><?= longdate_indo($row->tanggal) ?></span>
                                 </span>
                              </div>
                              <h3 class="mb-2"><?= mb_strimwidth($row->deskripsi, 0, 200, "...") ?></h3>
                              <div class="footer">
                                 <a href="<?= site_url('tanitrainer/' . $row->flag) ?>" class="c-btn btn-block c-fill-color-btn">Lihat Kelas</a>
                              </div>
                           </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
            <?php else: ?>
               <div class="card p-5 text-center mb-3">
                  Data yang anda cari tidak ada
               </div>
            <?php endif; ?>

            <div class="footer-pagination text-center">
               <nav class="mb-0 mt-0" aria-label="Page navigation example">
                  <ul class="pagination mb-0">
                     <li class="page-item">
                        <a class="page-link" href="<?= ($page > 1) ? site_url('tanitrainer?page=' . $previous) : '#' ?>" aria-label="Previous">
                           <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                           <!--<span class="sr-only"></span>-->
                        </a>
                     </li>
                     <?php for($i=1; $i <= $count; $i++): ?>
                        <?php if($i == 1 && $this->input->get('page', TRUE) == NULL): ?>
                           <li class="page-item active">
                        <?php else: ?>
                           <li class="page-item <?= ($this->input->get('page', TRUE) == $i) ? 'active' : '' ?>">
                        <?php endif; ?>
                           <a class="page-link" href="<?= site_url('tanitrainer?page=' . $i) ?>"><?= $i ?></a>
                        </li>
                     <?php endfor; ?>
                     <li class="page-item">
                        <a class="page-link" href="<?= ($page < $count) ? site_url('tanitrainer?page=' . $next) : '#' ?>" aria-label="Next">
                           <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                           <!--                    <span class="sr-only"></span>-->
                        </a>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>