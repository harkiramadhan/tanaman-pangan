<div class="container-fluid py-4"><div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header pb-4 border-bottom">
				<div class="row">
					<div class="col-6 d-flex align-items-center">
						<h6 class="mb-0">DETAIL <?= $jejaring->nama ?></h6>
					</div>
					<div class="col-6 text-end">
						<button class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-lock" aria-hidden="true"></i><span class="d-lg-inline d-none ms-3">Ganti Password</span></button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="<?= site_url('admin/jejaring/save/' . $jejaring->id) ?>" enctype="multipart/form-data">
					<div class="row">
                        <div class="col-lg-12">
							<div class="row">
								<div class="col-md-6 col-12">
									<div class="mb-3 mt-2 text-center">
										<p>Foto Profil</p>
										<?php if($jejaring->img): ?>
											<img src="<?= base_url('uploads/profile/' . $jejaring->img) ?>" class="img-fluid img-center shadow rounded-circle" style="width: 250px; height: 250px; object-fit: cover;" id="image-preview">
										<?php else: ?>
											<img src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" class="img-fluid img-center shadow rounded-circle" style="width: 250px; height: 250px; object-fit: cover;" id="image-preview">
										<?php endif; ?>
									</div>
								</div>

								<div class="col-md-6 col-12">
									<div class="mb-3 mt-2 text-center">										
										<p>Gambar Cover</p>
										<?php if($jejaring->cover_img): ?>
											<img src="<?= base_url('uploads/cover/' . $jejaring->cover_img) ?>" class="img-fluid img-center shadow rounded" style="max-height: 250px" id="image-preview2">
										<?php else: ?>
											<img src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" class="img-fluid img-center shadow rounded" style="max-height: 250px" id="image-preview2">
										<?php endif; ?>
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
                                    <input class="form-control" type="file" name="cover_img" id="image-source" onchange="previewImage2()">
                                </div>
                            </div>

							<div class="form-group">
                                <label class="form-control-label" for="input-gambar">Peran
                                <span class="text-danger">*</span></label>
                                <div class="mb-3">
									<select class="form-control" name="role_id" required>
									<option value=""> Pilih Peran</option>
									<?php foreach($role->result() as $r): ?>
										<option <?= ($jejaring->role_id == $r->id) ? 'selected' : '' ?> value="<?= $r->id ?>"> <?= $r->role ?></option>
									<?php endforeach; ?>
								</select>
                                </div>
                            </div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">No HP/WA <span class="text-danger">*</span></label>
								<input type="text" name="hp" class="form-control" placeholder="No HP/WA" value="<?= $jejaring->hp ?>" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Alamat <span class="text-danger">*</span></label>
								<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= $jejaring->alamat ?>" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Provinsi <span class="text-danger">*</span></label>
								<select class="form-control" name="prov" id="select-prov" required>
									<option value=""> Pilih Provinsi</option>
									<?php foreach($provinsi->result() as $p): ?>
										<option <?= ($jejaring->prov == $p->prov_id) ? 'selected' : '' ?> value="<?= $p->prov_id ?>"> <?= ucwords(strtolower($p->prov_name)) ?></option>
									<?php endforeach; ?>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Kabupaten/Kota <span class="text-danger">*</span></label>
								<select class="form-control" name="kab_kota" id="select-kab" <?php ($jejaring->kab_kota) ? '' : 'disabled' ?>>
									<option value=""> Pilih Kabupaten / Kota</option>
									<?php 
										if($jejaring->kab_kota): 
										$kabupaten = $this->M_Wilayah->getKabupatenByProv($jejaring->prov)->result();
										foreach($kabupaten as $k){
									?>
										<option value="<?= $k->city_id ?>" <?= ($jejaring->kab_kota == $k->city_id) ? 'selected' : '' ?>> <?= ucwords(strtolower($k->city_name)) ?></option>
									<?php }; endif; ?>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Kecamatan <span class="text-danger">*</span></label>
								<select class="form-control" name="kec" id="select-kec" <?php ($jejaring->kec) ? '' : 'disabled' ?>>
									<option value=""> Pilih Kecamatan</option>
									<?php
										if($jejaring->kec):
										$kecamatan = $this->M_Wilayah->getKecamatanByKab($jejaring->kab_kota)->result();
										foreach($kecamatan as $kc){
									?>
										<option value="<?= $kc->dis_id ?>" <?= ($jejaring->kec == $kc->dis_id) ? 'selected' : '' ?>> <?= ucwords(strtolower($kc->dis_name)) ?></option>
									<?php }; endif; ?>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Desa/Kelurahan <span class="text-danger">*</span></label>
								<select class="form-control" name="desa_kel" id="select-kel" <?php ($jejaring->desa_kel) ? '' : 'disabled' ?>>
									<option value=""> Pilih Kelurahan</option>
									<?php 
										if($jejaring->desa_kel):
										$kelurahan = $this->M_Wilayah->getKelurahanByKec($jejaring->kec)->result();
										foreach($kelurahan as $kl){
									?>
										<option value="<?= $kl->subdis_id ?>" <?= ($kl->subdis_id == $jejaring->desa_kel) ? 'selected' : '' ?>> <?= ucwords(strtolower($kl->subdis_name)) ?></option>
									<?php }; endif; ?>
								</select>
							</div>
                            <br>
                            <h6 class="mb-3">DATA PERTANIAN</h6>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Nama Lembaga <span class="text-danger">*</span></label>
								<input type="text" name="nama_kelembagaan" class="form-control" placeholder="Nama Lembaga" value="<?= $jejaring->nama_kelembagaan ?>" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Kategori Lembaga <span class="text-danger">*</span></label>
								<select class="form-control" name="kelembagaan_id" required>
                                 <option value=""> Pilih Kelembagaan</option>
                                 <?php foreach($lembaga->result() as $l){ ?>
                                    <option <?= ($jejaring->kelembagaan_id == $l->id) ? 'selected' : '' ?> value="<?= $l->id ?>"> <?= $l->kelembagaan ?></option>
                                 <?php } ?>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Lahan Dikelola <span class="text-danger">*</span></label>
								<input type="text" name="lahan_yg_dikelola" class="form-control" placeholder="Lahan Dikelola" value="<?= $jejaring->lahan_yg_dikelola ?>" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Komoditas <span class="text-danger">*</span></label>
								<select class="form-control js-example-basic-multiple" name="komoditas_id[]" multiple="multiple">
                                 <?php 
                                    foreach($komoditas->result() as $k){ 
                                       $cek = $this->db->get_where('user_komoditas', [
                                          'user_id' => $jejaring->id,
                                          'komoditas_id' => $k->id
                                       ]);
                                 ?>
                                    <option <?= ($cek->num_rows() > 0) ? 'selected' : '' ?> value="<?= $k->id ?>"> <?= $k->komoditas ?></option>
                                 <?php } ?>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Rata2 Produksi Tahunan <span class="text-danger">*</span></label>
								<input type="text" name="rata_produksi_tahun" class="form-control" placeholder="Rata2 Produksi Tahunan" value="<?= $jejaring->rata_produksi_tahun ?>" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Kategori Olahan <span class="text-danger">*</span></label>
								<select class="form-control js-example-basic-multiple" name="kategori_olahan_id[]" multiple="multiple">
                                 <?php 
                                    foreach($kategori_olahan->result() as $ko){ 
                                       $cekOlahan = $this->db->get_where('user_kategori_olahan', [
                                          'user_id' => $jejaring->id,
                                          'kategori_olahan_id' => $ko->id
                                       ]);
                                 ?>
                                    <option <?= ($cekOlahan->num_rows() > 0) ? 'selected' : '' ?> value="<?= $ko->id ?>"> <?= ucfirst($ko->kategori_olahan) ?></option>
                                 <?php } ?>
                              </select>
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Olahan <span class="text-danger">*</span></label>
								<input type="text" name="jenis_olahan" class="form-control" placeholder="Jenis Olahan" value="<?= $jejaring->jenis_olahan ?>" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Produksi Olahan Bulanan <span class="text-danger">*</span></label>
								<input type="text" name="produksi_olahan" class="form-control" placeholder="Produksi Olahan Bulanan" value="<?= $jejaring->produksi_olahan ?>" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Pupuk <span class="text-danger">*</span></label>
								<input type="text" name="jenis_pupuk" class="form-control" placeholder="Jenis Pupuk" value="<?= $jejaring->jenis_pupuk ?>" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Pestisida <span class="text-danger">*</span></label>
								<input type="text" name="jenis_pestisida" class="form-control" placeholder="Jenis Pestisida" value="<?= $jejaring->jenis_pestisida ?>" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Alsintan <span class="text-danger">*</span></label>
								<input type="text" name="jenis_aisintan" class="form-control" placeholder="Jenis Alsintan" value="<?= $jejaring->jenis_aisintan ?>" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Menjual Produk <span class="text-danger">*</span></label>
								<input type="text" name="menjual_produk" class="form-control" placeholder="Menjual Produk" value="<?= $jejaring->menjual_produk ?>" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Produk dijual  Bulanan <span class="text-danger">*) Kg</span></label>
								<input type="text" name="produk_dijual_bulanan" class="form-control" placeholder="Produk dijual  Bulanan" value="<?= $jejaring->produk_dijual_bulanan ?>" required="">
							</div>

							<div class="form-group">
                                <label class="form-control-label" for="input-nama">Penjualan <span class="text-danger">*</span></label>
                                <?php 
									foreach($penjualan->result() as $p){ 
										$cekPenjualan = $this->db->get_where('user_penjualan', [
										'user_id' => $jejaring->id,
										'penjualan_id' => $p->id
										]);
								?>
									<div class="form-check mb-2 ms-1">
										<input class="form-check-input" <?= ($cekPenjualan->num_rows() > 0) ? 'checked' : '' ?> name="penjualan_id[]" type="checkbox" id="inlineCheckbox<?= $p->id ?>" value="<?= $p->id ?>">
										<label class="form-check-label" for="inlineCheckbox<?= $p->id ?>"> <?= ucfirst($p->jenis_penjualan) ?></label>
									</div>
								<?php } ?>                             
							</div>

                            <div class="form-group">
                                <label class="form-control-label" for="input-nama">Tertarik <span class="text-danger">*</span></label>
								<?php 
                                 foreach($ketertarikan->result() as $kt){ 
                                    $cekKetertarikan = $this->db->get_where('user_tertarik', [
                                       'user_id' => $jejaring->id,
                                       'ketertarikan_id' => $kt->id
                                    ]);
                              	?>
                                <div class="form-check mb-2 ms-1">
									<input class="form-check-input" <?= ($cekKetertarikan->num_rows() > 0) ? 'checked' : '' ?> name="ketertarikan_id[]" type="checkbox" id="inlineCheckbox<?= $kt->id ?>" value="<?= $kt->id ?>">
									<label class="form-check-label" for="inlineCheckbox<?= $kt->id ?>"> <?= ucfirst($kt->jenis_ketertarikan) ?></label>
								</div>
								<?php } ?>
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