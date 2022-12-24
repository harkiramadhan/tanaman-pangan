<?php
   $pengaturan = $this->db->get_where('pengaturan', ['id' => 1])->row();
?>

<!-- Begin Page Content -->
<section class="py-3 homepage-search-block position-relative">
   <div class="container">
      <div class="slider mt-0">
         <div id="aniimated-thumbnials" class="slider-for slick-slider-single">
            <?php foreach($banners->result() as $b): ?>
               <a href="<?= $b->link ?>">
                  <img class="img-fluid" src="<?= base_url('uploads/banners/' . $b->img) ?>" alt="<?= $b->judul ?>" style="height: auto !important; width: 100% !important; object-fit: cover;" />
               </a>
            <?php endforeach; ?>
         </div>
         <div class="slider-nav slick-slider-single">
            
         </div>
      </div>
   </div>
</section>

<div class="market-wrapper bg-white border-bottom">
   <div class="container">
      <div class="row  py-3 shadow-none patner-slider">
         <?php foreach($partner->result() as $pt): ?>
            <div class="col justify-items-center">
               <img class="mx-auto" src="<?= base_url('uploads/partner/' . $pt->img) ?>" alt="<?= $pt->judul ?>" style="height: 40px; width: auto;">
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>

<!--    about section -->
<div class="market-wrapper py-2 bg-white border-bottom">
   <div class="container">
      <!-- <h2 class="text-center">Explore the marketplace</h2> -->
      <ul class="categories-list mb-0 statistic-slider">
         <?php 
            foreach($role->result() as $r): 
               $countRole = $this->M_Role->countByRole($r->id);
         ?>
         <li>
            <a href="<?= site_url('jejaring?page=1&komoditasid=&provid=&roleid=' . $r->id) ?>">
               <img src="<?= base_url('assets/images/thumbnail/role/' . $r->icon) ?>" alt="<?= $r->role ?>" loading="lazy">
               <span class="h4 mb-4"><?= $countRole ?></span>
               <br class="my-2">
               <span><?= $r->role ?></span>
            </a>
         </li>
         <?php endforeach; ?>
      </ul>
   </div>
</div>

<div class="border-2 bg-white border-bottom">
   <div class="container py-4">
      <form class="row form-noborder" action="<?= site_url('jejaring') ?>" method="get">
         <div class="col-lg-10 col-12">
            <div class="form-row justify-content-center">
               <div class="col-lg-4 col-md-3 col-sm-12 form-group">
                  <p class="text-dark font-weight-bold mb-2"><?= ($this->session->userdata('lang') == 'EN') ? 'I Want To' : 'Saya Ingin' ?></p>
                  <div class="location-dropdown text-left">
                     <i class="icofont-location-arrow"></i>
                     <select class="custom-select form-control border-0 shadow-sm form-control-lg" name="type">
                        <option> <?= ($this->session->userdata('lang') == 'EN') ? 'Choose' : 'Pilih' ?> </option>
                        <option value="2"> <?= ($this->session->userdata('lang') == 'EN') ? 'Buy' : 'Membeli' ?> </option>
                        <option value="1"> <?= ($this->session->userdata('lang') == 'EN') ? 'Sell' : 'Menjual' ?> </option>
                     </select>
                  </div>
               </div>

               <div class="col-lg-4 col-md-3 col-sm-12 form-group">                     
                  <p class="text-dark font-weight-bold mb-2"><?= ($this->session->userdata('lang') == 'EN') ? 'Commodity' : 'Komoditas' ?></p>
                  <div class="location-dropdown text-left">
                     <i class="icofont-location-arrow"></i>
                     <select class="custom-select form-control border-0 shadow-sm form-control-lg" name="komoditasid">
                     <option> <?= ($this->session->userdata('lang') == 'EN') ? 'Choose' : 'Pilih' ?> </option>
                        <?php foreach($komoditas->result() as $kd){ ?>
                           <option value="<?= $kd->id ?>"> <?= ($this->session->userdata('lang') == 'EN') ? $kd->komoditas_en : $kd->komoditas ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>

               <div class="col-lg-4 col-md-3 col-sm-12 form-group">
                  <p class="text-dark font-weight-bold mb-2"><?= ($this->session->userdata('lang') == 'EN') ? 'Regions' : 'di Wilayah' ?></p>
                  <div class="location-dropdown text-left">
                     <i class="icofont-location-arrow"></i>
                     <select class="custom-select form-control border-0 shadow-sm form-control-lg" name="provid">
                        <option> <?= ($this->session->userdata('lang') == 'EN') ? 'Choose' : 'Pilih' ?> </option>
                        <?php foreach($provinsi->result() as $prov){ ?>
                           <option value="<?= $prov->prov_id ?>"> <?= ucwords(strtolower($prov->prov_name)) ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>

            </div>
         </div>
         <div class="col-lg-2 col-12 col-md-2 col-sm-12 form-group">
            <p class="text-white font-weight-bold mb-2 d-lg-block d-none">*</p>
            <button type="submit"
               class="btn btn-success btn-block btn-gradient shadow-sm"><i
               class="fa fa-search"></i></button>
         </div>
      </form>
   </div>
</div>
   
<div class="container pt-5 pb-5">
   <div class="row">
      <div class="col-12 text-center pt-1 pb-5">
         <img src="<?= base_url('assets/images/storyset/Indonesia_provinces_HDI_2021 1.svg') ?>" class="video-img w-75">
      </div>
   
      <div class="col-md-12">
         <h2 class="mb-3"><?= ($this->session->userdata('lang') == 'EN') ? 'Advantages of' : 'Keuntungan Mendaftar' ?><span class="font-weight-bold text-danger"> Jejaring Hulu Hilir Pasar (JHHP)</span></h2>
         <p class="h6 font-weight-light mb-4"><?= ($this->session->userdata('lang') == 'EN') ? 'Building' : 'Membangun' ?> Jejaring Hulu Hilir Pasar (JHHP),
         <?php if($this->session->userdata('lang') == 'EN'): ?>
            connecting farmers & agricultural business actors so that they are more advanced and developed.
         <?php else: ?>
            menghubungkan antara petani & pelaku usaha pertanian agar lebih maju dan berkembang.
         <?php endif; ?>
         </p>
         <div class="tab-content osahan-table border-0 px-3 pt-1 mb-4">
            <div class="tab-pane active" id="active">
               <div class="about-section">
                  <div class="row align-items-center">
                     <div class="col-md-6">
                        <h2>
                           <?php if($this->session->userdata('lang') == 'EN'): ?>
                              What is your role in the network, what are the benefits, how do you do it?
                           <?php else: ?>
                              Apa peran anda didalam jejaring, Apa Keuntungannya, Bagaimana Caranya?
                           <?php endif; ?>
                        </h2>
                        <ul>
                           <li>
                              <span>
                                 <img src="<?= base_url() ?>assets/images/checkmark.svg">
                                 <?php ($this->session->userdata('lang') == 'EN') ? 'Farmers/Producer: ' : 'Petani/produsen, usaha olahan:' ?>
                              </span>
                              <?php if($this->session->userdata('lang') == 'EN'): ?>
                                 Could promote fresh or processed products, so they are widely known and directly connected with off-takers/consumers without intermediaries.
                              <?php else: ?>
                                 Dapat mempromosikan hasil produk, segar maupun olahan agar dikenal luas dan langsung terhubung dengan offtaker/konsumen tanpa perantara.
                              <?php endif; ?>
                           </li>
                           <li>
                              <span>
                                 <img src="<?= base_url() ?>assets/images/checkmark.svg">
                                 <?php ($this->session->userdata('lang') == 'EN') ? 'Off-takers, exporters: ' : 'Offtaker, eksportir: ' ?>
                              </span>
                              <?php if($this->session->userdata('lang') == 'EN'): ?>
                                 Could look for agricultural products directly from farmers/processing businesses without intermediaries so that they are more competitive in process and market at home and abroad.
                              <?php else: ?>
                                 Dapat mencari produk pertanian langsung dari petani/usaha pengolahan tanpa perantara sehingga lebih kompetitif untuk diolah, dipasarkan di dalam dan luar negeri.
                              <?php endif; ?>
                           </li>
                           <li>
                              <span>
                                 <img src="<?= base_url() ?>assets/images/checkmark.svg">
                                 <?php ($this->session->userdata('lang') == 'EN') ? 'Supplier of seeds, fertilizers, agricultural machinery: ' : 'Penyedia benih, pupuk, alsintan: ' ?>
                              </span>
                              <?php if($this->session->userdata('lang') == 'EN'): ?>
                                 Could publish and offer products directly to farmers/farming employers so that the products are widely known.
                              <?php else: ?>
                                 Dapat mempublikasikan dan menawarkan produk langsung kepada petani/pelaku usaha tani sehingga produk dikenal luas.
                              <?php endif; ?>
                           </li>
                           <li>
                              <span>
                                 <img src="<?= base_url() ?>assets/images/checkmark.svg">
                                 <?php ($this->session->userdata('lang') == 'EN') ? 'Extension Officer, Agricultural Specialist: ' : 'Penyuluh, Pakar Pertanian: ' ?>
                              </span>
                              <?php if($this->session->userdata('lang') == 'EN'): ?>
                                 Role in guiding, assisting and finding solutions to farmers, and agricultural employers.
                              <?php else: ?>
                                 Berperan membimbing, mendampingi dan mencari solusi kepada petani, pelaku usaha pertanian.
                              <?php endif; ?>
                           </li>
                        </ul>
                     </div>
                     <div class="col-md-6 text-right mt-lg-0 mt-5">
                        <img src="<?= base_url() ?>assets/images/storyset/Group 1.png" class="video-img w-100 rounded-lg" style="border-radius: 15px !important;">
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="row">
            <!-- Main Content -->
            <div class="col-md-6 mb-lg-0 mb-3">
               <div class="box shadow-sm rounded bg-white mb-4 h-100">
                  <div class="p-4 d-flex align-items-center">
                     <i class="fa fa-user-plus text-success display-4"></i>
                     <div class="ml-4">
                        <h5 class="font-weight-normal text-dark mb-3 mt-0"><?= ($this->session->userdata('lang') == 'EN') ? 'The Advantage' : 'Keuntungannya' ?></h5>
                        <p class="mb-0 text-muted">
                           <?php if($this->session->userdata('lang') == 'EN'): ?>
                              Connected networks to the sub-district level, unlimited promotion of agricultural products or products, facilitating marketing, cutting the distribution chain, and discussing agrarian developments.
                           <?php else: ?>
                              Terhubung jejaring sampai level kecamatan desa, promosi tanpa batas hasil pertanian atau produk, mempermudah pemasaran memotong rantai distribusi, diskusi seputar perkembangan pertanian
                           <?php endif; ?>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="box shadow-sm rounded bg-white mb-4 h-100">
                  <div class="p-4 d-flex align-items-center">
                     <i class="fa fa-question-circle text-success display-4"></i>
                     <div class="ml-4">
                        <h5 class="font-weight-normal text-dark mb-3 mt-0"><?= ($this->session->userdata('lang') == 'EN') ? 'How To' : 'Bagaimana caranya' ?>
                        </h5>
                        <p class="mb-0 text-muted">
                           <?php if($this->session->userdata('lang') == 'EN'): ?>
                              Sign up to get users, complete your data and profile, promote products, and update developments in the field.
                           <?php else: ?>
                              Daftar untuk mendapatkan user, lengkapi data dan profil anda, promosikan produk, update perkembangan dilapangan. 
                           <?php endif; ?>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="text-center mt-4">
            <a href="<?= site_url('daftar') ?>" class="c-btn c-fill-color-btn" tabindex="0"><?= ($this->session->userdata('lang') == 'EN') ? 'SIGN UP AS NETWORK' : 'DAFTAR MENJADI JEJARING' ?></a>
         </div>
      </div>
   </div>
</div>

<!-- services-->
<div class="services-wrapper bg-white py-5">
   <div class="container">
      <h2><?= ($this->session->userdata('lang') == 'EN') ? 'Find Commodities' : 'Cari Komoditas' ?></h2>
      <div class="row service-slider">
         <?php foreach($komoditas->result() as $k): ?>
         <div class="col">
            <a href="<?= site_url('jejaring?page=1&komoditasid='.$k->id.'&provid=&roleid=') ?>">
               <div class="service">
                  <img class=" border-2" style="height: 200px; object-fit: cover; background-size: cover; background-image: linear-gradient(170deg, rgba(44,221,155,1) 0%, rgba(29,200,204,0) 55%), url('<?= base_url('assets/images/thumbnail/komoditas/' . $k->img) ?>');">
                  <h3 class="h1"><span> <?= ($this->session->userdata('lang') == 'EN') ? $k->komoditas_en : $k->komoditas ?></span></h3>
               </div>
            </a>
         </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>
<!-- services-->

<!-- recent -->
<section class="py-5">
   <div class="view_slider recommended">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <h3>Tani Trainer</h3>
               <div class="view recent-slider recommended-slider">
                  <?php foreach($tanitrainer->result() as $tt): ?>
                     <div>
                        <a href="<?= site_url('tanitrainer/' . $tt->flag) ?>">
                           <img class="img-fluid" src="<?= base_url('uploads/tanitrainer/' . $tt->img) ?>" style="height: 170px;  object-fit: cover;" />
                        </a>
                        <div class="inner-slider">
                           <div class="inner-wrapper">
                              <div class="d-flex align-items-center">
                                 <span class="seller-name">
                                    <a href="<?= site_url('tanitrainer/' . $tt->flag) ?>"><?= $tt->judul ?></a>
                                    <span class="level hint--top level-one-seller"><?= longdate_indo($tt->tanggal) ?></span>
                                 </span>
                              </div>
                              <h3 class="mb-2"><?= mb_strimwidth($tt->deskripsi, 0, 200, "...") ?></h3>
                              <div class="footer">
                                 <a href="<?= site_url('tanitrainer/' . $tt->flag) ?>" class="c-btn btn-block c-fill-color-btn">Daftar Pelatihan</a>
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
</section>
<!--       recent -->

<!-- services-->
<div class="services-wrapper bg-white py-5">
   <div class="container">
      <h2><?= ($this->session->userdata('lang') == 'EN') ? 'Our Important Publication' : 'Publikasi Penting Kami' ?></h2>
      <div class="row service-slider">
         <?php 
            foreach($kategoriPublikasi->result() as $kp): 
               $countPublikasi = $this->M_Publikasi->countByCategory($kp->id);
         ?>
            <div class="col">
               <a href="<?= site_url('publikasi?ids['.$kp->id.']='.$kp->id.'&page=1') ?>">
                  <div class="service">
                     <img class=" border-2" style="height: 200px; object-fit: cover; background-size: cover; background-image: linear-gradient(170deg, rgba(44,221,155,1) 0%, rgba(29,200,204,0.8) 55%), url('<?= base_url('assets/images/thumbnail/publikasi/' . $kp->img) ?>');">
                     <h3 style="top: none !important; bottom: 30px !important;">
                        <i class="<?= $kp->icon ?> fa-1x fa-lg mb-3"></i>
                        <span style="font-size: 24px !important;"><?= ($this->session->userdata('lang') == 'EN') ? $kp->kategori_en : $kp->kategori ?></span>
                        <span class="font-weight-light mt-1"><?= $countPublikasi ?> items</span>
                     </h3>
                  </div>
               </a>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>
<!-- services-->

<div class="guide-wrapper pb-5 bg-white testimonial">
   <div class="container">
      <h2>
         BTS Pro Paktani
         <a href="<?= site_url('/publikasi?ids[1]=1&page=1') ?>" class="ml-auto mb-auto text-info">
            <span class="d-lg-inline d-none"><?= ($this->session->userdata('lang') == 'EN') ? 'Read More' : 'Selengkapnya'  ?></span> <i class="fa fa-arrow-right ml-3"></i>
         </a>
      </h2>
      <div class="row">
         <?php 
            $bts = $this->M_Publikasi->getByCategory(1, 3);
            foreach($bts->result() as $bt){ ?>
               <div class="col-md-4 col-12">
                  <a href="<?= site_url('publikasi/' . $bt->flag ) ?>" class="guide picture-wrapper w-100 border" style="border-radius: 10px;">
                     <img class="mb-2 w-100" style="border-radius: 10px; object-fit: cover; height: 300px; background-image: linear-gradient(160deg, rgba(29,200,204,0.8) 0%, rgba(44,221,155,0.2) 90%), url('https://cdn-image.hipwee.com/wp-content/uploads/2016/04/tumblr_ni07ojSV3L1u8065mo1_1280-750x422.jpg');">
                     <div class="content px-3">
                        <h6 class="mb-0"><?= $bt->judul ?></h6>
                        <p><?= longdate_indo($bt->tanggal) ?></p>
                     </div>
                  </a>
               </div>
         <?php } ?>
      </div>
   </div>
</div>

<!--    about section -->
<div class="container">
   <div class="about-section pt-5">
      <div class="row align-items-center">
         <div class="col-md-6">
            <h1 class="mb-3 p-0">Tani Trainer :<span class="font-weight-bold text-danger"></span></h1>
            <p class="h6 font-weight-light mb-4"> <?= ($this->session->userdata('lang') == 'EN') ? 'Building' : 'Membangun' ?> Jejaring Hulu Hilir Pasar (JHHP), 
               <?php if($this->session->userdata('lang') == 'EN'): ?>
                  connecting farmers & agricultural business actors so that they are more advanced and developed.
               <?php else: ?>
                  menghubungkan antara petani & pelaku usaha pertanian agar lebih maju dan berkembang.
               <?php endif; ?>
            </p>
            <h2> 
               <?php if($this->session->userdata('lang') == 'EN'): ?>
                  What is the material, what are the advantages, how do you do it?
               <?php else: ?>
                  Apa materinya, Apa keuntungannya, bagaimana caranya ?
               <?php endif; ?>
            </h2>
            <ul>
               <li><span><img src="<?= base_url('assets/images/checkmark.svg') ?>"><?= ($this->session->userdata('lang') == 'EN') ? 'Cultivation training materials' : ' Materi pelatihan budidaya ' ?>:</span>
                  <?php if($this->session->userdata('lang') == 'EN'): ?>
                     Agriculture, especially food crops, produces organic fertilizers, natural pesticides, cultivation techniques, seeds, and pest control.
                  <?php else: ?>
                     Pertanian khususnya tanaman pangan membuat pupuk organik, pestisida alami, teknik budidaya, perbenihan, pengendalian hama.
                  <?php endif; ?>
               </li>
               <li><span><img src="<?= base_url('assets/images/checkmark.svg') ?>"><?= ($this->session->userdata('lang') == 'EN') ? 'Post-harvest material' : ' Materi pasca panen ' ?>:</span>
                  <?php if($this->session->userdata('lang') == 'EN'): ?>
                     What about good post-harvest handling, mechanization to reduce yield losses, and how to improve product quality.
                  <?php else: ?>
                     Bagaimana penanganan pasca panen yang baik, mekanisasi mengurangi susut hasil, bagimana meningkatkan kualitas produk.
                  <?php endif; ?>
               </li>
               <li><span><img src="<?= base_url('assets/images/checkmark.svg') ?>"><?= ($this->session->userdata('lang') == 'EN') ? 'Downstream material' : ' Materi hilirisasi ' ?>:</span>
                  <?php if($this->session->userdata('lang') == 'EN'): ?>
                     How to make various kinds of processed products made from attractive agricultural products with high selling value.
                  <?php else: ?>
                     Bagaimana membuat berbagai macam produk olahan berbahan dasar produk pertanian yang menarik dan mempunyai nilai jual tinggi.
                  <?php endif; ?>
               </li>
               <li><span><img src="<?= base_url('assets/images/checkmark.svg') ?>"><?= ($this->session->userdata('lang') == 'EN') ? 'Not only theory from competent trainers but direct practice on the ground' : ' Tidak hanya teori dari pelatih yang kompeten, tetapi langsung praktek di lahan' ?></span>
                  <?php if($this->session->userdata('lang') == 'EN'): ?>
                     After the training, developments will be guided, monitored, and evaluated in each region to become independent agricultural business actors and join the JHHP Network.
                  <?php else: ?>
                     Pasca pelatihan, akan dibimbing, dimonitor dan dievaluasi perkembangannya di masing-masing daerah sehingga akan menjadi pelaku usaha pertanian yang mandiri serta tergabung dalam Jejaring JHHP.
                  <?php endif; ?>
               </li>
            </ul>
         </div>
         <div class="col-md-6">
            <img src="<?= base_url('assets/images/video.svg') ?>" class="video-img w-100">
         </div>
      </div>
   </div>
</div>


<!-- testimonials -->
<?php foreach($testimoni->result() as $ts){ ?>
<div class="testi-wrap pt-5 pb-4">
   <div class="container">
      <div class="testimonial">
         <div class="video-modal">
            <div class="">
               <img src="<?= base_url('uploads/testimoni/' . $ts->img) ?>">
            </div>
         </div>
         <div class="text-content">
            <p>"<?= $ts->deskripsi ?>"</p>
            <h4 class="font-weight-light mb-0 p-0"><?= $ts->nama?></h4>
            <span class="font-weight-bold"><?= $ts->jabatan?></span>
            <!-- <img alt="Company logo" src="<?= base_url() ?>assets/images/haerfest-logo.png" loading="lazy"> -->
         </div>
      </div>
   </div>
</div>
<?php } ?>
<!--       testimonials -->


<div class="services-wrapper py-4">
   <div class="container">
      <div class="box shadow-sm rounded bg-white mb-3">
         <div class="box-title border-bottom p-3">
            <h6 class="m-0"><i class="fa fa-calendar mr-3"></i><?php ($this->session->userdata('lang') == 'EN') ? 'Activity Calendar' : 'Kalender Kegiatan' ?></h6>
         </div>
         <div class="box-body p-0">
            <?php foreach($kegiatan->result() as $kg): ?>
            <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
               <div class="dropdown-list-image mr-3 d-lg-flex d-none align-items-center bg-danger justify-content-center rounded-circle text-white"><i class="<?= $kg->icon ?>"></i></div>
               <div class="font-weight-bold mr-3">
                  <div class="text-truncate"><?= $kg->judul ?></div>
                  <div class="small"><?= longdate_indo($kg->tanggal) ?></div>
               </div>
               <a href="#" class="ml-auto mb-auto text-info">
                  <span class="d-lg-inline d-none"><?= ($this->session->userdata('lang') == 'EN') ? 'Read More' : 'Selengkapnya'  ?></span> <i class="fa fa-arrow-right ml-3"></i>
               </a>
            </div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</div>

<div class="container pb-5">
   <div id="syncing">
         <!-- Title -->
      <div class="mb-3 mt-4">
         <h4 class="font-weight-semi-bold"><?php ($this->session->userdata('lang') == 'EN') ? 'FAQs' : 'FAQ' ?></h4>
      </div>
      <!-- End Title -->
      <!-- Syncing Accordion -->
      <div id="syncingAccordion">
         <?php $no=1; foreach($faq->result() as $f): ?>
         <!-- Card -->
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
         <!-- End Card -->
         <?php $no++; endforeach; ?>
      </div>
      <!-- End Syncing Accordion -->
   </div>
</div>

<!-- get started -->
<div>
   <div class="get-started">
      <div class="content">
         <h2><?= ($this->session->userdata('lang') == 'EN') ? 'Any Further Questions?' : 'Ada pertanyaan lebih?' ?></h2>
         <p>
            <?php if($this->session->userdata('lang') == 'EN'): ?>
               Click the following button for further consultation about our program
            <?php else: ?>
               Klik tombol berikut, untuk konsultasi lebih lenjut mengenai program kami
            <?php endif; ?>
         </p>
         <a target="__BLANK" href="https://api.whatsapp.com/send/?phone=<?= $pengaturan->kontak ?>" class="c-btn c-fill-color-btn"><i class="fa fa-whatsapp mr-3"></i><?= ($this->session->userdata('lang') == 'EN') ? 'Contact Now': 'Hubungi Sekarang'  ?></a>
      </div>
   </div>
</div>
<!-- get started -->