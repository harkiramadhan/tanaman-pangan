
      <div class="bg-dark pt-5 pb-5">
         <div class="container">
            <div class="row">
               <div class="text-center mx-auto my-4">
                  <!-- Title -->
                  <div class="mb-4">
                     <h1 class="display-4 text-white mb-0">Apa yang bisa <span class="font-weight-bold">kami bantu?</span></h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="py-5">
         <div class="container mx-auto col-md-8">
            <div class="row">
               <!-- Main Content -->
               <div class="col-md-12">
                  <div id="syncingAccordion">
                     <?php $no=1; foreach($faq->result() as $f){ ?>
                        <div class="box shadow-sm rounded bg-white mb-2">
                           <div id="syncingHeadingOne<?= $f->id ?>">
                              <h5 class="mb-0">
                                 <button class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3" data-toggle="collapse" data-target="#syncingCollapseOne<?= $f->id ?>" aria-expanded="false" aria-controls="syncingCollapseOne<?= $f->id ?>">
                                    <?= $f->question ?>
                                    <span class="card-btn-arrow">
                                    <span class="mdi mdi-chevron-down"></span>
                                    </span>
                                 </button>
                              </h5>
                           </div>
                           <div id="syncingCollapseOne<?= $f->id ?>" class="collapse <?= ($no == 1) ? 'show' : '' ?>" aria-labelledby="syncingHeadingOne<?= $f->id ?>" data-parent="#syncingAccordion">
                              <div class="card-body border-top p-3 text-muted"><?= $f->answer ?></div>
                           </div>
                        </div>
                     <?php $no++; } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div>
         <div class="get-started">
            <div class="content">
               <h2>Ada pertanyaan lebih?</h2>
               <p>Klik tombol berikut, untuk konsultasi lebih lenjut mengenai program kami</p>
               <a href="#" class="c-btn c-fill-color-btn"><i class="fa fa-whatsapp mr-3"></i>Hubungi Sekarang</a>
            </div>
         </div>
      </div>