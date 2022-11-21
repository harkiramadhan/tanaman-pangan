<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header pb-4">
					<div class="row">
						<div class="col d-flex align-items-center">
							<h6 class="mb-0">DAFTAR TESTIMONI</h6>
						</div>
						<div class="col-4 text-end d-flex align-content-center align-items-center justify-content-end">
							<button class="btn bg-gradient-dark mb-0 d-flex justify-content-center align-content-center align-items-center"  data-bs-toggle="modal" data-bs-target="#modalTambahTestimoni">
								<i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
								<span class="d-lg-inline d-none">Testimoni</span>
							</button>
						</div>
					</div>
				</div>
				<div class="card-body px-0 pt-0 pb-0">
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0 display" id="example" style="width:100%">
							<thead class="bg-light opacity-5">
								<tr>
									<th class="text-uppercase text-dark text-xxs text-center font-weight-bolder opacity-10" width="1px">#</th>
									<th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Testimoni</th>
									<th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Status</th>
									<th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<!-- Jika ada data -->
								<?php if($testimoni->num_rows() > 0): ?>
									<?php $no=1; foreach($testimoni->result() as $row){ ?>
										<tr>
											<td class="align-top text-center text-sm"><?= $no++ ?></td>
											<td>
												<div class="d-flex px-2 py-1">
													<div>
														<!-- Foto orang testimoni -->
														<img src="<?= base_url('uploads/testimoni/' . $row->img) ?>" class="avatar avatar-sm me-3" alt="user1">
													</div>
													<div class="d-flex flex-column justify-content-center">
														<h6 class="mb-0 text-sm"><?= $row->nama ?></h6>
														<p class="small text-xs text-secondary mb-0"><?= $row->jabatan ?></p>
													</div>
												</div>
											</td>
											<td class="align-top text-center text-sm">
												<span class="badge badge-sm <?= ($row->status == 1) ? 'bg-gradient-success' : 'bg-gradient-danger' ?>"><?= ($row->status == 1) ? 'Aktif' : 'Draft' ?></span> 
											</td>
											<td class="align-top">
												<div class="ms-auto text-center">
													<button type="button" class="btn btn-link btn-sm py-0 text-danger px-2 mb-0 btn-remove" data-id=""><i class="far fa-trash-alt" aria-hidden="true"></i></button>
													<button type="button" class="btn btn-link btn-sm py-0 text-info px-2 mb-0 btn-edit" data-id="<?= $row->id ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
												</div>
											</td>
										</tr>
									<?php } ?>
								<?php else: ?>
									<!-- Jika tidak ada data sama sekali -->
									<tr>
										<td colspan="4" class="text-center py-4 mb-0">Data masih kosong</td>
									</tr>
								<?php endif; ?>
                            </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalTambahTestimoni" tabindex="-1" aria-labelledby="modalTambahTestimoni" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="modalTambahTestimoni">Tambah Testimoni</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= site_url('admin/testimoni/create') ?>" method="POST" enctype="multipart/form-data">
						<img src="" class="img-fluid img-center shadow rounded d-none" style="max-height: 250px" id="image-preview">
						<div class="row d-flex align-items-center form-group">
							<div class="col-md-4">
								<p class="text-muted font-weight-bold mb-0">Gambar</p>
							</div>
							<div class="col-md-8">
								<input class="form-control" type="file" name="img" id="image-source" onchange="previewImage()">
							</div>
						</div>
						<div class="row d-flex align-items-center form-group">
							<div class="col-md-4">
								<p class="text-muted font-weight-bold mb-0">Nama</p>
							</div>
							<div class="col-md-8">
								<input type="text" name="nama" class="form-control font-weight-bold text-muted" required>
							</div>
						</div>
						<div class="row d-flex align-items-center form-group">
							<div class="col-md-4">
								<p class="text-muted font-weight-bold mb-0">Jabatan</p>
							</div>
							<div class="col-md-8">
								<input type="text" name="jabatan" class="form-control font-weight-bold text-muted" required>
							</div>
						</div>
						<div class="row d-flex align-items-center form-group mt-2">
							<div class="col-md-4">
								<p class="text-muted font-weight-bold mb-0">Deskripsi</p>
							</div>
							<div class="col-md-8">
								<textarea name="deskripsi" class="form-control font-weight-bold text-muted" cols="30" rows="5" required></textarea>
							</div>
						</div>
						<div class="row d-flex align-items-center form-group">
							<div class="col-md-4">
								<p class="text-muted font-weight-bold mb-0">Status</p>
							</div>
							<div class="col-md-8">
								<select class="form-control form-control-alternative me-3" name="status" required>
									<option value="" selected="">Pilih</option>
									<option value="1">Aktif</option>
									<option value="2">Draft</option>
								</select>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-dark w-100 mb-0">SIMPAN</button>
							<button type="button" class="btn btn-transparant shadow-none w-100 mb-0">KEMBALI</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>