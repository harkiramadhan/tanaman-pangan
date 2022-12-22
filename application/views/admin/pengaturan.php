<div class="container-fluid py-4"><div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header pb-4 border-bottom">
				<div class="row">
					<div class="col-6 d-flex align-items-center">
						<h6 class="mb-0">PENGATURAN</h6>
					</div>
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="<?= site_url('admin/pengaturan/save') ?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="form-control-label" for="input-nama">Nomor Customer Service <span class="text-danger">*</span></label>
								<input type="text" name="kontak" value="<?= $data->kontak ?>" class="form-control" placeholder="Nomor Kontak" required="">
							</div>
						</div>

                        <hr class="my-2 border">

						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label" for="input-nama">Instagram <span class="text-danger">*</span></label>
								<input type="text" name="instagram" value="<?= $data->instagram ?>" class="form-control" placeholder="Instagram" required="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label" for="input-nama">Instagram Link<span class="text-danger">*</span></label>
								<input type="text" name="instagram_link" value="<?= $data->instagram_link ?>" class="form-control" placeholder="Instagram" required="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label" for="input-nama">Facebook <span class="text-danger">*</span></label>
								<input type="text" name="facebook" value="<?= $data->facebook ?>" class="form-control" placeholder="Facebook" required="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label" for="input-nama">Facebook Link<span class="text-danger">*</span></label>
								<input type="text" name="facebook_link" value="<?= $data->facebook_link ?>" class="form-control" placeholder="Facebook" required="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label" for="input-nama">Tiktok <span class="text-danger">*</span></label>
								<input type="text" name="tiktok" value="<?= $data->tiktok ?>" class="form-control" placeholder="Tiktok" required="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label" for="input-nama">Tiktok Link<span class="text-danger">*</span></label>
								<input type="text" name="tiktok_link" value="<?= $data->tiktok_link ?>" class="form-control" placeholder="Tiktok" required="">
							</div>
						</div>
                        
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label" for="input-nama">Youtube <span class="text-danger">*</span></label>
								<input type="text" name="youtube" value="<?= $data->youtube ?>" class="form-control" placeholder="Youtube" required="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label" for="input-nama">Youtube Link <span class="text-danger">*</span></label>
								<input type="text" name="youtube_link" value="<?= $data->youtube_link ?>" class="form-control" placeholder="Tiktok" required="">
							</div>
						</div>

						<hr class="my-2 border">
                        
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
</div>