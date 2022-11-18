<div class="container-fluid py-4"><div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header pb-4 border-bottom">
				<div class="row">
					<div class="col-6 d-flex align-items-center">
						<h6 class="mb-0">DETAIL PUBLIKASI</h6>
					</div>
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="<?= site_url('admin/publikasi/create') ?>" enctype="multipart/form-data">
					<div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3 mt-2 text-center">										
                                <p>Gambar Cover</p>
                                <img src="" class="img-fluid img-center shadow rounded d-none" style="max-height: 250px" id="image-preview">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-gambar">Upload Cover
                                <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input class="form-control" type="file" name="cover_img" id="image-source" onchange="previewImage()">
                                </div>
                            </div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Judul Publikasi <span class="text-danger">*</span></label>
								<input type="text" name="judul" class="form-control" placeholder="Judul Publikasi" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Tanggal Publikasi <span class="text-danger">*</span></label>
								<input type="date" name="tanggal" class="form-control" placeholder="Tanggal Publikasi" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Kategori Publikasi <span class="text-danger">*</span></label>
								<select name="kategori_id"class="form-control" required>
                                    <option value=""> Kategori Publikasi</option>
                                    <?php foreach($kategori->result() as $k){ ?>
                                        <option value="<?= $k->id ?>">  <?= $k->kategori ?></option>
                                    <?php } ?>
                                </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Link Sumber <span class="text-danger">*</span></label>
                                <p class="text-sm bg-warning text-white p-1 rounded px-2 font-italic">Jika link diisi, publikasi akan diarahkan langsung sesuai dengan link yang dicantumkan</p>								
                                <input type="text" name="link" class="form-control" placeholder="Tulis link sumber" >
							</div>

                            <div class="form-group">
                            <label class="form-control-label" for="input-nama">Deskripsi Publikasi <span class="text-danger">*</span></label>
                                <input type="hidden" name="deskripsi" id="deskripsi" value="">
                                <div class="rounded" id="editor">

                                </div>
                            </div>

                            <div class="form-group">
								<label class="form-control-label" for="input-nama">Status <span class="text-danger">*</span></label>
                                <select name="status" id="" class="form-control" required>
                                    <option value=""> Status Publikasi</option>
                                    <option value="1"> Aktif</option>
                                    <option value="2"> Draft</option>
                                </select>
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