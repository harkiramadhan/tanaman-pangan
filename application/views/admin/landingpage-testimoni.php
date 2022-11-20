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
                                <!-- <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr> -->

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

	<!-- Modal -->
	<div class="modal fade" id="modalTambahTestimoni" tabindex="-1" aria-labelledby="modalTambahTestimoni" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="modalTambahTestimoni">Tambah Testimoni</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="#" method="POST">
					<img src="" class="img-fluid img-center shadow rounded d-none" style="max-height: 250px" id="image-preview">
					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
						<p class="text-muted font-weight-bold mb-0">Gambar</p>
						</div>
						<div class="col-md-8">
							<input class="form-control" type="file" name="" id="image-source" onchange="previewImage()">
						</div>
					</div>
					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
						<p class="text-muted font-weight-bold mb-0">Nama</p>
						</div>
						<div class="col-md-8">
							<input type="text" name="" class="form-control font-weight-bold text-muted">
						</div>
					</div>
					<div class="row d-flex align-items-center form-group">
						<div class="col-md-4">
						<p class="text-muted font-weight-bold mb-0">Jabatan</p>
						</div>
						<div class="col-md-8">
							<input type="text" name="" class="form-control font-weight-bold text-muted">
						</div>
					</div>
					<div class="row d-flex align-items-center form-group mt-2">
						<div class="col-md-4">
						<p class="text-muted font-weight-bold mb-0">Deskripsi</p>
						</div>
						<div class="col-md-8">
							<input type="text" name="" class="form-control font-weight-bold text-muted">
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