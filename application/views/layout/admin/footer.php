
			<footer class="footer pt-3  ">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-lg-between">
						<div class="col-lg-6 mb-lg-0 mb-4">
							<div class="copyright text-center text-sm text-muted text-lg-start">
								© <script>
									document.write(new Date().getFullYear())
								</script> - Jejaring Propaktani
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</main>
  
	<!--   Core JS Files   -->
	<script>
		var baseUrl = '<?= site_url() ?>'
	</script>
	<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/admin/core/popper.min.js')?>"></script>
	<script src="<?= base_url('assets/js/admin/core/bootstrap.min.js')?>"></script>
	<script src="<?= base_url('assets/js/admin/plugins/perfect-scrollbar.min.js')?>"></script>
	<script src="<?= base_url('assets/js/admin/plugins/smooth-scrollbar.min.js')?>"></script>
	<script src="<?= base_url('assets/js/admin/plugins/chartjs.min.js')?>"></script>
	<script src="<?= base_url('assets/vendor/select2/js/select2.min.js') ?>"></script>
	
	<!-- Main Quill library -->
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

	<script>
		var win = navigator.platform.indexOf('Win') > -1;
		if (win && document.querySelector('#sidenav-scrollbar')) {
		var options = {
			damping: '0.5'
		}
		Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		}
	</script>
	
	<!-- Github buttons -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="<?= base_url('assets/js/admin/argon-dashboard.min.js?v=2.0.4') ?>"></script>

	<?php 
         if(@$ajax) {
               foreach(@$ajax as $a){
                  echo "<script src='".base_url('assets/js/admin/custom/' . $a).".js'></script>";
               }
         }
               
      ?>
</body>

</html>
