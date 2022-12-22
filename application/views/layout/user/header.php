
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Membangun Jejaring Hulu Hilir Pasar (JHHP), menghubungkan antara petani & pelaku usaha pertanian agar lebih maju dan berkembang.">
      <meta name="author" content="Direktur Jendral Tanaman Pangan Kementrian Pertanian">
      <title><?= $title ?> - Propaktani</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="http://app3.pertanian.go.id/propaktani/portal/assets/img/logo_login.png">
      <!-- Bootstrap core CSS -->
      <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
      
      <!-- Font Awesome Icons -->
      <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
      
      <!-- Material Design Icons -->
      <link href="<?= base_url('assets/vendor/icons/css/materialdesignicons.min.css') ?>" media="all" rel="stylesheet" type="text/css">
      <!-- Slick -->
      <link href="<?= base_url('assets/vendor/slick-master/slick/slick.css') ?>" rel="stylesheet" type="text/css">
      <!-- Lightgallery -->
      <link href="<?= base_url('assets/vendor/lightgallery-master/dist/css/lightgallery.min.css') ?>" rel="stylesheet">
      <!-- Select2 CSS -->
      <link href="<?= base_url('assets/vendor/select2/css/select2-bootstrap.css') ?>" />
      <link href="<?= base_url('assets/vendor/select2/css/select2.min.css') ?>" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
      <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
      
      <!-- Quill Assets CDN -->
      <!-- Theme included stylesheets -->
      <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

   </head>
   <body>
      <div class="sticky-top">

         <nav class="navbar navbar-expand-lg navbar-light topbar shadow-sm bg-white osahan-nav-top px-0">
            <div class="container">
               <!-- Sidebar Toggle (Topbar) -->
               <a class="navbar-brand" href="<?= site_url() ?>"><img src="http://app3.pertanian.go.id/propaktani/portal/assets/img/logo_login.png" alt=""></a>
               <div class="d-flex flex-column">
                  <h6 class="mb-0 font-weight-bold">Propaktani</h6>
                  <p class="mb-0 text-muted d-lg-block d-none" style="font-size: 10px;">Membangun Jejaring Petani Pelaku Usahatani</p>
               </div>
               
               <!-- Topbar Search -->
               <!-- <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                  <div class="input-group">c
                     <input type="text" class="form-control bg-white small" placeholder="Find Services..." aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                        <button class="btn btn-success" type="button">
                        <i class="fa fa-search fa-sm"></i>
                        </button>
                     </div>
                  </div>
               </form> -->
               
               <!-- Topbar Navbar -->
               <ul class="navbar-nav align-items-center ml-auto">
                  <?php if($this->session->userdata('masuk') == TRUE): ?>
                     <a href="<?= site_url('kelas') ?>" class="btn btn-outline-success btn-lg font-weight-bold ml-2">Kelas Saya</a>            
                     <li class="nav-item dropdown no-arrow no-caret dropdown-user ml-2">
                        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <?php if($user->img): ?>
                              <img class="img-fluid" src="<?= base_url('uploads/profile/' . $user->img) ?>">
                           <?php else: ?>
                              <img class="img-fluid" src="<?= base_url('assets/images/user/s4.png') ?>">
                           <?php endif; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                           <h6 class="dropdown-header d-flex align-items-center">
                              <?php if($user->img): ?>
                                 <img class="dropdown-user-img" src="<?= base_url('uploads/profile/' . $user->img) ?>">
                              <?php else: ?>
                                 <img class="dropdown-user-img" src="<?= base_url('assets/images/user/s4.png') ?>">
                              <?php endif; ?>
                              <div class="dropdown-user-details">
                                 <div class="dropdown-user-details-name"><?= $user->nama ?></div>
                                 <div class="dropdown-user-details-email bg-warning rounded text-dark p-1 mt-1"><?= $user->role ?></div>
                              </div>
                           </h6>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="<?= site_url('user/pengaturan') ?>">
                              <div class="dropdown-item-icon">
                                 <i class="fa fa-cog mr-2 text-dark" style=""></i>
                              </div>
                              Atur Jual Beli
                           </a>
                           <a class="dropdown-item" href="<?= site_url('user') ?>">
                              <div class="dropdown-item-icon">
                                 <i class="fa fa-user mr-2 text-dark" style=""></i>
                              </div>
                              Detail Akun Saya
                           </a>
                           <a class="dropdown-item text-danger" href="<?= site_url('logout') ?>">
                              <div class="dropdown-item-icon">
                                 <i class="fa fa-sign-out mr-2 text-danger" style=""></i>
                              </div>
                              Keluar
                           </a>
                        </div>
                     </li>
                  <?php else: ?>
                     <a href="<?= site_url('masuk') ?>" class="btn btn-outline-success btn-lg font-weight-bold">Masuk</a>
                     <a href="<?= site_url('daftar') ?>" class="btn btn-success btn-lg font-weight-bold ml-2">Daftar</a>    
                  <?php endif; ?>
               </ul>
            </div>
         </nav>
         <!-- Navigation -->
         <nav class="navbar navbar-expand-lg navbar-light bg-white top osahan-nav-mid px-0 border-top shadow-sm">
            <div class="container">
               <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(1) == '') ? 'active' : '' ?>" href="<?= site_url('') ?>">Beranda</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(1) == 'jejaring') ? 'active' : '' ?>" href="<?= site_url('jejaring') ?>"><i class="fa fa-users mr-2" style="color: #2CDD9B;"></i>Jejaring</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(1) == 'tanitrainer') ? 'active' : '' ?>" href="<?= site_url('tanitrainer') ?>">Tani Trainer</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(1) == 'publikasi') ? 'active' : '' ?>" href="<?= site_url('publikasi') ?>">Publikasi</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(1) == 'faq') ? 'active' : '' ?>" href="<?= site_url('faq') ?>">FAQ</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(1) == 'tentangkami') ? 'active' : '' ?>" href="<?= site_url('tentangkami') ?>">Tentang Kami</a>
                     </li>
                  </ul>
               </div>
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="<?= site_url('language') ?>">
                        <?php if($this->session->userdata('lang') == 'EN'): ?>
                           <img class="country-flag img-fluid" src="<?= base_url('assets/images/flag/uk.png') ?>">
                           <span>English</span>
                        <?php else: ?>
                           <img class="country-flag img-fluid" src="<?= base_url('assets/images/flag/id.png') ?>">
                           <span>Indonesia</span>
                        <?php endif; ?>
                     </a>
                  </li>
               </ul>
            </div>
         </nav>
      </div>