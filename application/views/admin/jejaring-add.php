<div class="container-fluid py-4"><div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header pb-4 border-bottom">
				<div class="row">
					<div class="col-6 d-flex align-items-center">
						<h6 class="mb-0">TAMBAH JEJARING</h6>
					</div>
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="<?= site_url('admin/jejaring/create/') ?>" enctype="multipart/form-data">
					<div class="row">
                        <div class="col-lg-12">
							<div class="row">
								<div class="col-md-6 col-12">
									<div class="mb-3 mt-2 text-center">
										<p>Foto Profil</p>
                                        <img src="#" class="img-fluid img-center shadow rounded-circle d-none" style="width: 250px; height: 250px; object-fit: cover;" id="image-preview">
									</div>
								</div>

								<div class="col-md-6 col-12">
									<div class="mb-3 mt-2 text-center">										
										<p>Gambar Cover</p>
                                        <img src="#" class="img-fluid img-center shadow rounded d-none" style="max-height: 250px" id="image-preview2">
									</div>
								</div>
							</div>

                            <h6 class="mb-3">PROFIL JEJARING</h6>

                            <div class="form-group">
                                <label class="form-control-label" for="input-gambar">Foto Profil
                                <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input class="form-control" type="file" name="file" id="image-source" onchange="previewImage()">
                                </div>
                            </div>

							<div class="form-group">
                                <label class="form-control-label" for="input-gambar">Gambar Cover
                                <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input class="form-control" type="file" name="cover_img" id="image-source2" onchange="previewImage2()">
                                </div>
                            </div>

							<div class="form-group">
                                <label class="form-control-label" for="input-gambar">Peran
                                <span class="text-danger">*</span></label>
                                <div class="mb-3">
									<select class="form-control" name="role_id" required>
									<option value=""> Pilih Peran</option>
									<?php foreach($role->result() as $r): ?>
										<option value="<?= $r->id ?>"> <?= $r->role ?></option>
									<?php endforeach; ?>
								</select>
                                </div>
                            </div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Penanggung Jawab <span class="text-danger">*</span></label>
								<input type="text" name="nama" class="form-control" placeholder="Nama Penanggung Jawab" value="" required="">
							</div>
							
							<div class="form-group">
								<label class="form-control-label" for="input-nama">No HP/WA <span class="text-danger">*</span></label>
								<input type="text" name="hp" class="form-control" placeholder="No HP/WA" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Alamat <span class="text-danger">*</span></label>
								<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Provinsi <span class="text-danger">*</span></label>
								<select class="form-control" name="prov" id="select-prov" required>
									<option value=""> Pilih Provinsi</option>
									<?php foreach($provinsi->result() as $p): ?>
										<option value="<?= $p->prov_id ?>"> <?= ucwords(strtolower($p->prov_name)) ?></option>
									<?php endforeach; ?>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Kabupaten/Kota <span class="text-danger">*</span></label>
								<select class="form-control" name="kab_kota" id="select-kab" disabled>
									<option value=""> Pilih Kabupaten / Kota</option>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Kecamatan <span class="text-danger">*</span></label>
								<select class="form-control" name="kec" id="select-kec" disabled>
									<option value=""> Pilih Kecamatan</option>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Desa/Kelurahan <span class="text-danger">*</span></label>
								<select class="form-control" name="desa_kel" id="select-kel" disabled>
									<option value=""> Pilih Kelurahan</option>
								</select>
							</div>

							<div class="row d-flex align-items-center form-group">
								<div class="col-md-4">
									<p class="text-muted font-weight-bold mb-0">Facebook</p>
								</div>
								<div class="col-md-8">
									<input type="text" name="facebook" class="form-control font-weight-bold text-muted" value="" placeholder="Link profil facebookmu">
								</div>
                            </div>

                            <div class="row d-flex align-items-center form-group">
								<div class="col-md-4">
									<p class="text-muted font-weight-bold mb-0">Instagram</p>
								</div>
								<div class="col-md-8">
									<input type="text" name="instagram" class="form-control font-weight-bold text-muted" value="" placeholder="Link profil Instagrammu">
								</div>
                            </div>

                            <div class="row d-flex align-items-center form-group">
								<div class="col-md-4">
									<p class="text-muted font-weight-bold mb-0">Tiktok</p>
								</div>
								<div class="col-md-8">
									<input type="text" name="tiktok" class="form-control font-weight-bold text-muted" value="" placeholder="Link profil Tiktokmu">
								</div>
                            </div>

                            <div class="row d-flex align-items-center form-group">
								<div class="col-md-4">
									<p class="text-muted font-weight-bold mb-0">Youtube</p>
								</div>
								<div class="col-md-8">
									<input type="text" name="youtube" class="form-control font-weight-bold text-muted" value="" placeholder="Link profil Youtubemu">
								</div>
							</div>
                            <br>
                            <h6 class="mb-3">DATA PERTANIAN</h6>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Nama Lembaga <span class="text-danger">*</span></label>
								<input type="text" name="nama_kelembagaan" class="form-control" placeholder="Nama Lembaga" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Kategori Lembaga <span class="text-danger">*</span></label>
								<select class="form-control" name="kelembagaan_id" required>
                                 <option value=""> Pilih Kelembagaan</option>
                                 <?php foreach($lembaga->result() as $l){ ?>
                                    <option value="<?= $l->id ?>"> <?= $l->kelembagaan ?></option>
                                 <?php } ?>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Lahan Dikelola <span class="text-danger">*</span></label>
								<input type="text" name="lahan_yg_dikelola" class="form-control" placeholder="Lahan Dikelola" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Komoditas <span class="text-danger">*</span></label>
								<select class="form-control js-example-basic-multiple" name="komoditas_id[]" multiple="multiple">
                                 <?php 
                                    foreach($komoditas->result() as $k){ 
                                 ?>
                                    <option value="<?= $k->id ?>"> <?= $k->komoditas ?></option>
                                 <?php } ?>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Rata2 Produksi Tahunan <span class="text-danger">*</span></label>
								<input type="text" name="rata_produksi_tahun" class="form-control" placeholder="Rata2 Produksi Tahunan" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Rata2 Produksi Bulanan <span class="text-danger">*</span></label>
								<input type="text" name="rata_produksi_bulan" class="form-control" placeholder="Rata2 Produksi Bulanan" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Kategori Olahan <span class="text-danger">*</span></label>
								<select class="form-control js-example-basic-multiple" name="kategori_olahan_id[]" multiple="multiple">
                                 <?php 
                                    foreach($kategori_olahan->result() as $ko){ 
                                 ?>
                                    <option value="<?= $ko->id ?>"> <?= ucfirst($ko->kategori_olahan) ?></option>
                                 <?php } ?>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Olahan <span class="text-danger">*</span></label>
								<input type="text" name="jenis_olahan" class="form-control" placeholder="Jenis Olahan" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Produksi Olahan Bulanan <span class="text-danger">*</span></label>
								<input type="text" name="produksi_olahan" class="form-control" placeholder="Produksi Olahan Bulanan" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Pupuk <span class="text-danger">*</span></label>
								<input type="text" name="jenis_pupuk" class="form-control" placeholder="Jenis Pupuk" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Pestisida <span class="text-danger">*</span></label>
								<input type="text" name="jenis_pestisida" class="form-control" placeholder="Jenis Pestisida" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Alsintan <span class="text-danger">*</span></label>
								<input type="text" name="jenis_aisintan" class="form-control" placeholder="Jenis Alsintan" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Menjual Produk <span class="text-danger">*</span></label>
								<input type="text" name="menjual_produk" class="form-control" placeholder="Menjual Produk" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Membutuhkan Produk <span class="text-danger">*</span></label>
								<input type="text" name="membutuhkan_produk" class="form-control" placeholder="Menjual Produk" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Produk dibutuhkan  Bulanan <span class="text-danger">*) Kg</span></label>
								<input type="text" name="produk_dibutuhkan_bulanan" class="form-control" placeholder="Produk dijual  Bulanan" value="" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Produk dijual  Bulanan <span class="text-danger">*) Kg</span></label>
								<input type="text" name="produk_dijual_bulanan" class="form-control" placeholder="Produk dijual  Bulanan" value="" required="">
							</div>

							<div class="form-group">
                                <label class="form-control-label" for="input-nama">Penjualan <span class="text-danger">*</span></label>
                                <?php 
									foreach($penjualan->result() as $p){ 
								?>
									<div class="form-check mb-2 ms-1">
										<input class="form-check-input" name="penjualan_id[]" type="checkbox" id="inlineCheckbox<?= $p->id ?>" value="<?= $p->id ?>">
										<label class="form-check-label" for="inlineCheckbox<?= $p->id ?>"> <?= ucfirst($p->jenis_penjualan) ?></label>
									</div>
								<?php } ?>                             
							</div>

                            <div class="form-group">
                                <label class="form-control-label" for="input-nama">Tertarik <span class="text-danger">*</span></label>
								<?php 
                                 foreach($ketertarikan->result() as $kt){ 
                              	?>
                                <div class="form-check mb-2 ms-1">
									<input class="form-check-input" name="ketertarikan_id[]" type="checkbox" id="inlineCheckbox<?= $kt->id ?>" value="<?= $kt->id ?>">
									<label class="form-check-label" for="inlineCheckbox<?= $kt->id ?>"> <?= ucfirst($kt->jenis_ketertarikan) ?></label>
								</div>
								<?php } ?>
                            </div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Keterangan Tambahan <span class="text-danger">*</span></label>
								<input type="text" name="keterangan" class="form-control" placeholder="Tulis" value="" required="">
							</div>

							<input type="hidden" name="deskripsi" id="deskripsi" value="">
							<div class="form-group">
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