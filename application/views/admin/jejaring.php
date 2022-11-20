<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header pb-4">
					<div class="row">
						<div class="col d-flex align-items-center">
							<h6 class="mb-0">DAFTAR JEJARING</h6>
						</div>
						<div class="col-4 text-end d-flex align-content-center align-items-center justify-content-center">
							<select class="form-control form-control-alternative me-3" id="sortBulanAgenda">
								<option value="semua" selected>Pilih Peran</option> 
								<option value="1">Petani/Produsen Pangan Segar</option>
								<option value="2">Usaha Olahan Pangan</option>
								<option value="3">Offtaker Pangan Segar/Olahan</option>
							</select>
							<a class="btn bg-gradient-dark mb-0 d-flex justify-content-center align-content-center align-items-center" href="<?= site_url('admin/jejaring/detail') ?>">
								<i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
								<span class="d-lg-inline d-none">Jejaring</span>
							</a>
							</div>
						</div>
					</div>
					<div class="card-body px-0 pt-0 pb-0">
						<div class="table-responsive p-0">
							<table class="table align-items-center mb-0 display" id="example" style="width:100%">
								<thead class="bg-light opacity-5">
									<tr>
										<th class="text-uppercase text-dark text-xxs text-center font-weight-bolder opacity-10" width="1px">#
										</th>
										<th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Pelatihan</th>
										<th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Status</th>
										<th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										foreach($jejaring->result() as $row){ 
									?>
										<!-- Jika ada data pelatihan -->
										<tr>
											<td class="align-top text-center text-sm"><?= $no++ ?></td>
											<td>
												<div class="d-flex px-2 py-1">
													<div>
														<?php if($row->img): ?>
															<img src="<?= base_url('uploads/profile/' . $row->img) ?>" class="avatar avatar-sm me-3" alt="user1">
														<?php else: ?>
															<img src="https://demos.creative-tim.com/argon-dashboard/assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
														<?php endif; ?>
													</div>
													<div class="d-flex flex-column justify-content-center">
														<h6 class="mb-0 text-sm"><?= $row->nama ?></h6>
														<p class="small text-xs text-secondary mb-0"><?= $row->role ?></p>
													</div>
												</div>
											</td>
											<td class="align-top text-center text-sm">
												<span class="badge badge-sm bg-gradient-success">Aktif</span> 
											</td>
											<td class="align-top">
												<div class="ms-auto text-center">
													<a class="btn btn-link btn-sm py-0 text-info px-2 mb-0" href="<?= site_url('jejaring/' . $row->id) ?>" target="__BLANK"><i class="far fa-eye" aria-hidden="true"></i></a>
													<button type="button" class="btn btn-link btn-sm py-0 text-danger px-2 mb-0 btn-remove" data-id="5"><i class="far fa-trash-alt" aria-hidden="true"></i></button>
													<a class="btn btn-link btn-sm py-0 text-dark px-2 mb-0" href="<?= site_url('admin/jejaring/' . $row->id) ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
												</div>
											</td>
										</tr>
									<?php } ?>

										<!-- Jika tidak ada data sama sekali -->

										<tr>
											<td colspan="4" class="text-center py-4 mb-0">

											Data masih kosong

											</td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	


	<div class="modal fade" id="modal-remove" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
		<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
			<div class="modal-content remove-content">

			</div>
		</div>
	</div>