<div class="container-fluid py-4"><div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header pb-4 border-bottom">
				<div class="row">
					<div class="col-6 d-flex align-items-center">
						<h6 class="mb-0">DETAIL TANI TRAINER</h6>
					</div>
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="#" enctype="multipart/form-data">
					<div class="row">
            <div class="col-lg-12">
              <div class="mb-3 mt-2 text-center">										
                  <p>Gambar Cover</p>
                  <img src="http://localhost/tax-session/uploads/pelatihan/b6bf8464f52f204a2220dd05ef6c341f.jpg" class="img-fluid img-center shadow rounded" style="max-height: 250px" id="image-preview">
              </div>

              <div class="form-group">
                  <label class="form-control-label" for="input-gambar">Upload Cover
                  <span class="text-danger">*</span></label>
                  <div class="mb-3">
                      <input class="form-control" type="file" name="file" id="image-source" onchange="previewImage()">
                  </div>
              </div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Judul Tanitrainer <span class="text-danger">*</span></label>
								<input type="text" name="judulTanitrainer" class="form-control" placeholder="Judul Tanitrainer" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Tanggal Tanitrainer <span class="text-danger">*</span></label>
								<input type="date" name="tanggalTanitrainer" class="form-control" placeholder="Tanggal Tanitrainer" required="">
							</div>

              <div>
                <label class="form-control-label" for="input-nama">Deskripsi Tanitrainer <span class="text-danger">*</span></label>
                <div class="rounded" id="editor">

                </div>
              </div>

            </div>
						<div class="col-12 mt-3 d-grid">
							<button type="submit" class="btn bg-gradient-dark mb-0">SIMPAN</button>
							<button type="button" class="btn btn-link mb-0 text-secondary mt-2">KEMBALI</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form>
              <div class="row d-flex align-items-center form-group">
                  <div class="col-md-4">
                  <p class="text-muted font-weight-bold mb-0">Password Baru</p>
                  </div>
                  <div class="col-md-8">
                  <input type="password" name="new-pass" class="form-control font-weight-bold text-muted">
                  </div>
              </div>
              <div class="text-right">
                  <button class="btn btn-success w-100 mb-0">SIMPAN</button>
                  <button class="btn btn-transparant shadow-none w-100 mb-0">KEMBALI</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>