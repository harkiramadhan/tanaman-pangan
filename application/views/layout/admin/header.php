<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
      <link rel="icon" type="image/png" href="http://app3.pertanian.go.id/propaktani/portal/assets/img/logo_login.png">
	<title>
		<?= $title ?> Dashboard Admin
	</title>
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<!-- Nucleo Icons -->
	<link href="<?= base_url('assets/css/admin/nucleo-icons.css')?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/admin/nucleo-svg.css')?>" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link href="<?= base_url('assets/css/admin/nucleo-svg.css')?>" rel="stylesheet" />
	<!-- CSS Files -->
	<link id="pagestyle" href="<?= base_url('assets/css/admin/argon-dashboard.css')?>" rel="stylesheet" />
      
	<!-- Quill Assets CDN -->
	<!-- Theme included stylesheets -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	<link href="<?= base_url('assets/vendor/select2/css/select2-bootstrap.css') ?>" />
	<link href="<?= base_url('assets/vendor/select2/css/select2.min.css') ?>" rel="stylesheet">
</head>

<body class="g-sidenav-show   bg-gray-100">
	<!-- Alert Code -->
	<?php if($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show position-absolute top-0 end-0 border-0 d-flex me-4 mt-3 ms-4"  role="alert">
		<span class="alert-icon"><i class="fa fa-bell me-2 text-white"></i></span>
		<span class="alert-text text-white mt-0 font-weight-bold"><strong>Berhasil !</strong> - <?= $this->session->flashdata('success') ?></span>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			<i class="fa fa-times position-absolute text-white top-0 pe-2" style="margin-top: 20px; margin-right: 100px;"></i>
		</button>
		</div>
	<?php endif; ?>

	<?php if($this->session->flashdata('error')): ?>
		<div class="alert alert-danger alert-dismissible fade show position-absolute top-3 end-0 border-0 d-flex me-4 mt-5 ms-4"  role="alert">
		<span class="alert-icon"><i class="fa fa-bell me-2 text-white"></i></span>
		<span class="alert-text text-white mt-0 font-weight-bold"><strong>Gagal !</strong> - <?= $this->session->flashdata('error') ?></span>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			<i class="fa fa-times position-absolute text-white top-0 pe-2" style="margin-top: 20px; margin-right: 100px;"></i>
		</button>
		</div>
	<?php endif; ?>
	
	<div class="min-height-300 bg-primary position-absolute w-100"></div>
	<aside
		class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
		id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
				aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-0 text-center" href="<?= site_url('admin/') ?>"
				target="_blank">
				<img src="http://app3.pertanian.go.id/propaktani/portal/assets/img/logo_login.png" class="navbar-brand-img h-100" alt="main_logo">
				<span class="ms-1 font-weight-bold">Propaktani</span>
			</a>
		</div>
		<hr class="horizontal dark mt-0">
		<div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link <?= ($this->uri->segment(2) == NULL || $this->uri->segment(2) == 'admin') ? 'active' : '' ?>" href="<?= site_url('admin') ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fas fa-home text-dark text-lg opacity-10" style="top: 0px;"></i>
						</div>
						<span class="nav-link-text ms-1">Beranda</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($this->uri->segment(2) == 'jejaring') ? 'active' : '' ?>" href="<?= site_url('admin/jejaring') ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fas fa-link text-dark text-lg opacity-10" style="top: 0px;"></i>
						</div>
						<span class="nav-link-text ms-1">Jejaring</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($this->uri->segment(2) == 'publikasi') ? 'active' : '' ?>" href="<?= site_url('admin/publikasi') ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fas fa-video text-dark text-lg opacity-10" style="top: 0px;"></i>
						</div>
						<span class="nav-link-text ms-1">Publikasi</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($this->uri->segment(2) == 'tanitrainer') ? 'active' : '' ?>" href="<?= site_url('admin/tanitrainer') ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fas fa-users text-dark text-lg opacity-10" style="top: 0px;"></i>
						</div>
						<span class="nav-link-text ms-1">Tani Trainer</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($this->uri->segment(2) == 'faq') ? 'active' : '' ?>" href="<?= site_url('admin/faq') ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fas fa-question text-dark text-lg opacity-10" style="top: 0px;"></i>
						</div>
						<span class="nav-link-text ms-1">FAQ</span>
					</a>
				</li>
				<li class="nav-item">
					<a data-bs-toggle="collapse" href="#applicationsExamples" class="nav-link  <?= ($this->uri->segment(2) == 'landingpage') ? 'active' : '' ?>" aria-controls="applicationsExamples" role="button" aria-expanded="false">
					<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
						<i class="fas fa-file text-dark text-lg opacity-10" style="top: 0px;"></i>
					</div>
					<span class="nav-link-text ms-1">Landing Page</span>
					</a>
					<div class="collapse <?= (
							$this->uri->segment(2) == 'banners' || 
							$this->uri->segment(2) == 'partner' ||
							$this->uri->segment(2) == 'testimoni' ||
							$this->uri->segment(2) == 'kegiatan') ? 'show' : '' ?>" id="applicationsExamples" style="">
						<ul class="nav ms-0">
							<li class="nav-item">
								<a class="nav-link py-2 <?= ($this->uri->segment(2) == 'banners') ? 'active' : '' ?>" href="<?= site_url('admin/banners') ?>">
									<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
										<i class="fas fa-images text-dark text-lg opacity-10" style="top: 0px;"></i>
									</div>
									<span class="sidenav-normal"> Banner </span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2 <?= ($this->uri->segment(2) == 'partner') ? 'active' : '' ?> " href="<?= site_url('admin/partner') ?>">
									<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
										<i class="fas fa-handshake text-dark text-lg opacity-10" style="top: 0px;"></i>
									</div>
									<span class="sidenav-normal"> Patner </span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2 <?= ($this->uri->segment(2) == 'testimoni') ? 'active' : '' ?> " href="<?= site_url('admin/testimoni') ?>">
								<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="fas fa-star text-dark text-lg opacity-10" style="top: 0px;"></i>
								</div>
								<span class="sidenav-normal"> Testimoni </span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-2 <?= ($this->uri->segment(2) == 'kegiatan') ? 'active' : '' ?> " href="<?= site_url('admin/kegiatan') ?>">
								<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="fas fa-cog text-dark text-lg opacity-10" style="top: 0px;"></i>
								</div>
								<span class="sidenav-normal"> Kalender Kegiatan </span>
								</a>
							</li>
						</ul>
					</div>
				</li>	
				<li class="nav-item">
					<a class="nav-link <?= ($this->uri->segment(2) == 'pengaturan') ? 'active' : '' ?>" href="<?= site_url('admin/pengaturan') ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fas fa-cog text-dark text-lg opacity-10" style="top: 0px;"></i>
						</div>
						<span class="nav-link-text ms-1">Pengaturan</span>
					</a>
				</li>
			</ul>
		</div>
	</aside>

	<main class="main-content position-relative border-radius-lg ">
		<!-- Navbar -->
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 mt-3 px-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
						<li class="breadcrumb-item text-sm">							
              				<i class="fas fa-home text-white text-lg opacity-10" style="top: 0px;"></i></li>
						<li class="breadcrumb-item text-sm font-weight-bold text-white active" aria-current="page">Beranda</li>
					</ol>
				</nav>

				<div class="collapse justify-content-end navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav justify-content-end">
            
		  <li class="nav-item d-xl-none ps-3 pe-3 d-flex align-items-center pb-1">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user cursor-pointer" aria-hidden="true"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
				<li>
					<a class="dropdown-item border-radius-md" href="http://localhost/tax-session/logout">
					<div class="d-flex py-1">
						<div class="d-flex flex-column justify-content-center">
						<p class="text-sm mb-0">
							<i class="fa fa-sign-out me-2 text-danger" aria-hidden="true"></i>
							<span class="text-dark">Keluar Admin</span>
						</p>
						</div>
					</div>
					</a>
				</li>
              </ul>
            </li>
          </ul>
				</div>
			</div>
		</nav>
		<!-- End Navbar -->