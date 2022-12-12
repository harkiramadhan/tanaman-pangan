		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-12 mb-3">
					<div class="card pb-0 px-2">
						<div class="card-header pb-0">
						<h6 class="mb-0">STATISTIK DATA JEJARING</h6>
						</div>
						<div class="card-body p-3 pb-2">
							<div class="row">
								<?php 
									foreach($role->result() as $r){ 
										$count = $this->M_User->getByRole($r->id)->num_rows();
								?>
									<div class="col-xl-3 col-sm-6 mb-3">
										<div class="card">
											<div class="card-body p-3">
												<div class="row">
													<div class="col-8">
														<div class="numbers">
															<p class="text-sm mb-0 text-uppercase font-weight-bold"></p>
															<h3 class="font-weight-bold"><?= $count ?></h3>
														</div>
													</div>
													<div class="col-4 text-end">
														<img src="<?= base_url('assets/images/thumbnail/role/' . $r->icon) ?>" alt="" style="width: 40px;">
													</div>
												</div>
												<p class="mb-0 text-sm font-weight-bold"><?= $r->role ?></p>
												<a class="mb-0 icon-move-right text-danger font-italic" href="#" style="font-size: 14px;">Selengkapnya 
													<i class="fa fa-arrow-right ms-3" aria-hidden="true"></i>
												</a>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>