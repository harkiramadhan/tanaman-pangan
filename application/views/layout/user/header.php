<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Gurdeep singh osahan">
      <meta name="author" content="Gurdeep singh osahan">
      <title><?= $title ?> - Propaktani</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="http://app3.pertanian.go.id/propaktani/portal/assets/img/logo_login.png">
      <!-- Bootstrap core CSS -->
      <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome-->
      <link href="<?= base_url() ?>assets/vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- Material Design Icons -->
      <link href="<?= base_url() ?>assets/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css">
      <!-- Slick -->
      <link href="<?= base_url() ?>assets/vendor/slick-master/slick/slick.css" rel="stylesheet" type="text/css">
      <!-- Lightgallery -->
      <link href="<?= base_url() ?>assets/vendor/lightgallery-master/dist/css/lightgallery.min.css" rel="stylesheet">
      <!-- Select2 CSS -->
      <link href="<?= base_url() ?>assets/vendor/select2/css/select2-bootstrap.css" />
      <link href="<?= base_url() ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light topbar static-top shadow-sm bg-white osahan-nav-top px-0">
         <div class="container">
            <!-- Sidebar Toggle (Topbar) -->
            <a class="navbar-brand" href="index.html"><img src="http://app3.pertanian.go.id/propaktani/portal/assets/img/logo_login.png" alt=""></a>
            <!-- Topbar Search -->
            <!-- <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
               <div class="input-group">
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
               
               <li class="nav-item dropdown no-arrow no-caret dropdown-user">
                  <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="<?= base_url() ?>assets/images/user/s4.png"></a>
                  <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                     <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="<?= base_url() ?>assets/images/user/s4.png">
                        <div class="dropdown-user-details">
                           <div class="dropdown-user-details-name">Askbootstrap</div>
                           <div class="dropdown-user-details-email">iamosahan@gmail.com</div>
                        </div>
                     </h6>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="account.html">
                        <div class="dropdown-item-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                              <circle cx="12" cy="12" r="3"></circle>
                              <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                           </svg>
                        </div>
                        Account
                     </a>
                     <a class="dropdown-item" href="#">
                        <div class="dropdown-item-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                              <polyline points="16 17 21 12 16 7"></polyline>
                              <line x1="21" y1="12" x2="9" y2="12"></line>
                           </svg>
                        </div>
                        Logout
                     </a>
                  </div>
               </li>
            </ul>
         </div>
      </nav>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white osahan-nav-mid px-0 border-top shadow-sm">
         <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link active" href="about.html">Beranda</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.html">Tani Trainer</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.html">Jejaring</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact.html">Publikasi</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact.html">FAQ</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact.html">Tentang Kami</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact.html">Pilih Bahasa</a>
                  </li>
               </ul>
            </div>
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link">
                  <img class="country-flag img-fluid" src="<?= base_url() ?>assets/images/flag/india.png">
                  <span>English</span>
                  </a>
               </li>
            </ul>
         </div>
      </nav>