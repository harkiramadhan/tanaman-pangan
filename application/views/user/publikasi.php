
      <!-- Inner Header -->
      <section class="py-5 bg-dark inner-header">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <h1 class="mt-0 mb-3 text-white">Publikasi</h1>
                  <div class="breadcrumbs">
                     <p class="mb-0 text-white"><a class="text-white" href="<?= site_url('') ?>">Home</a>  /  <span class="text-success">Publikasi</span></p>
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
                                    Pilih Jenis Publikasi <i class="mdi mdi-chevron-down float-right"></i>
                                    </a>
                                 </h6>
                              </div>
                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                 <div class="filters-card-body card-shop-filters">
                                    <?php foreach($kategori->result() as $kt){ ?>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" name="kategori_id[]" class="custom-control-input" id="cb<?= $kt->id ?>">
                                          <label class="custom-control-label" for="cb<?= $kt->id ?>">  <?= $kt->kategori ?></label>
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
                           <p class="mb-2">463 Publikasi Tersedia</p>
                           <div class="sorting d-flex align-items-center">
                              <p>Tampilkan</p>
                              <select class="custom-select custom-select-sm border-0 shadow-sm ml-2" id="order">
                                 <option value="Semua"> Semua</option>
                                 <option value="Terbaru"> Terbaru</option>
                                 <option value="A-Z"> A-Z</option>
                              </select>
                           </div>
                        </div>
                        <h3>Daftar Seluruh Publikasi</h3>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col">
                        <div class="box shadow-sm rounded bg-white mb-3">
                           <?php foreach($data->result() as $row): ?>
                           <?php if($row->link): ?>
                              <a href="<?= $row->link ?>" target="__BLANK">
                           <?php else: ?>
                              <a href="<?= base_url('publikasi/' . $row->flag) ?>">
                           <?php endif; ?>
                              <div class="box-body d-flex p-3 border-bottom">
                                 <?php if($row->cover_img): ?>
                                    <img class="img-fluid rounded mb-auto" src="<?= base_url('uploads/publikasi/' . $row->cover_img) ?>" alt="" style="height: 130px; width: 130px;">
                                 <?php else: ?>
                                    <img class="img-fluid rounded mb-auto" src="<?= base_url('assets/images/l3.png') ?>" alt="" style="height: 130px; width: 130px;">
                                 <?php endif; ?>
                                 <div class="d-flex flex-column align-items-top job-item-header pb-2 ml-3">
                                       <div class="mb-3">
                                          <div class="text-truncate text-info text-uppercase">
                                             <i class="<?= $row->icon ?> mr-2"></i><?= $row->kategori ?>
                                          </div>
                                          <h6 class="font-weight-bold text-dark my-1"><?= $row->judul ?></h6>
                                          <div class="text-gray-900"><?= longdate_indo($row->tanggal) ?></div>
                                       </div>
                                       <a href="<?= site_url('publikasi/' . $row->flag) ?>" class="mt-auto text-danger">
                                          <span class="d-lg-inline d-none">Selengkapnya</span> <i class="fa fa-arrow-right ml-3"></i>
                                       </a>
                                 </div>
                              </div>
                           </a>
                           <?php endforeach; ?>
                        </div>
                    </div>
                  </div>
                  <div class="footer-pagination text-center">
                     <nav class="mb-0 mt-0" aria-label="Page navigation example">
                        <ul class="pagination mb-0">
                           <li class="page-item">
                              <a class="page-link" href="<?= ($page > 1) ? site_url('publikasi?page=' . $previous) : '#' ?>" aria-label="Previous">
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
                                 <a class="page-link" href="<?= site_url('publikasi?page=' . $i) ?>"><?= $i ?></a>
                              </li>
                           <?php endfor; ?>
                           <li class="page-item">
                              <a class="page-link" href="<?= ($page < $count) ? site_url('publikasi?page=' . $next) : '#' ?>" aria-label="Next">
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