<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
      <link rel="icon" type="image/png" href="http://app3.pertanian.go.id/propaktani/portal/assets/img/logo_login.png">
	<title>
		Dashboard Admin Propaktani
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
</head>

<body class="">
	<main class="main-content mt-0">
		<section>
			<div class="page-header min-vh-100">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
							<div class="card card-plain">
								<div class="card-header pb-0 text-start">
									<img class="w-25 mb-5" src="http://app3.pertanian.go.id/propaktani/portal/assets/img/logo_login.png"
										alt="">
									<h4 class="font-weight-bolder">Akses Admin <br> Propaktani</h4>
									<p class="mb-0">Kelola admin sekarang, </p>
								</div>
								<div class="card-body">
									<form role="form" action="http://localhost/tax-session/admin/auth/action"
										method="post">
										<div class="mb-3">
											<input name="email" type="email" class="form-control form-control-lg"
												placeholder="Email" aria-label="Email">
										</div>
										<div class="mb-3">
											<input name="password" type="password" class="form-control form-control-lg"
												placeholder="Password" aria-label="Password">
										</div>
										<div class="text-center">
											<button type="post"
												class="btn btn-lg bg-primary text-white btn-lg w-100 mt-4 mb-0">MASUK
												SEKARANG</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div
							class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
							<div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
								style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg'); background-size: cover;">
								<span class="mask bg-gradient-primary opacity-6"></span>
								<h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
									currency"</h4>
								<p class="text-white position-relative">The more effortless the writing looks, the more
									effort the writer actually put into the process.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

</body>

</html>
