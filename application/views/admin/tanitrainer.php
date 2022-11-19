<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header pb-4">
					<div class="row">
						<div class="col d-flex align-items-center">
							<h6 class="mb-0">DAFTAR TANI TRAINER</h6>
						</div>
						<div
							class="col-4 text-end d-flex align-content-center align-items-center justify-content-center">
							<select class="form-control form-control-alternative me-3" id="sortBulanAgenda">
								<option value="semua" selected>Pilih Kategori</option>
								<option value="1">Aktif</option>
								<option value="2">Tidak Aktif</option>
							</select>
							<a class="btn bg-gradient-dark mb-0 d-flex justify-content-center align-content-center align-items-center"
								href="<?= site_url('admin/tanitrainer/add') ?>">
								<i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
								<span class="d-lg-inline d-none">Tanitrainer</span>
							</a>
						</div>
					</div>
				</div>
				<div class="card-body px-0 pt-0 pb-2">
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0 display" id="example" style="width:100%">
							<thead class="bg-light opacity-5">
								<tr>
									<th class="text-uppercase text-dark text-xxs text-center font-weight-bolder opacity-10"width="1px">#</th>
									<th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Pelatihan</th>
									<th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Status</th>
									<th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Aksi</th>
								</tr>
							</thead>
							<tbody>

								<!-- Jika ada data pelatihan -->
								<?php 
									$no = 1;
									foreach($tanitrainer->result() as $row){ 
								?>
								<tr>
									<td class="align-top text-center text-sm"><?= $no++ ?></td>
									<td>
										<div class="d-flex px-2 py-1">
											<div>
												<?php if($row->img): ?>
													<img src="<?= base_url('uploads/tanitrainer/' . $row->img) ?>"class="avatar avatar-sm me-3" alt="user1">
												<?php else: ?>
													<img src="https://demos.creative-tim.com/argon-dashboard/assets/img/team-2.jpg"class="avatar avatar-sm me-3" alt="user1">
												<?php endif; ?>
											</div>
											<div class="d-flex flex-column justify-content-start">
												<h6 class="mb-0 text-sm"><?= $row->judul ?></h6>
												<a href="#" class="text-xs font-weight-bold mb-0 mt-1">
                                                    <i class="fa fa-user me-2 text-success" aria-hidden="true"></i>
                                                    <span class="text-dark">200 Peserta</span>
                                                    <i class="fa fa-arrow-right text-success ms-2" aria-hidden="true"></i>
                                                </a>
											</div>
										</div>
									</td>
									<td class="align-top text-center text-sm">
										<span class="badge badge-sm bg-gradient-success"><?= ($row->status == 1) ? 'Aktif' : 'Tidak Aktif' ?></span>
									</td>
									<td class="align-top">
										<div class="ms-auto text-center">
											<a class="btn btn-link btn-sm py-0 text-info px-2 mb-0" href="<?= site_url('tanitrainer/' . $row->flag) ?>" target="__BLANK"><i class="far fa-eye" aria-hidden="true"></i></a>
											<button type="button" class="btn btn-link btn-sm py-0 text-danger px-2 mb-0 btn-remove" data-id="5"><i class="far fa-trash-alt" aria-hidden="true"></i></button>
											<a class="btn btn-link btn-sm py-0 text-dark px-2 mb-0" href="<?= site_url('admin/tanitrainer/' . $row->id) ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="modal-remove" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
		aria-hidden="true">
		<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
			<div class="modal-content remove-content">

			</div>
		</div>
	</div>
