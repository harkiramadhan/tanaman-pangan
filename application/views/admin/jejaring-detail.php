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
				<form method="post" action="#" enctype="multipart/form-data">
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
								<input type="text" name="kategorilembaga" class="form-control" placeholder="Kategori Lembaga" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Lahan Dikelola <span class="text-danger">*</span></label>
								<input type="text" name="lahandikelola" class="form-control" placeholder="Lahan Dikelola" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Komoditas <span class="text-danger">*</span></label>
								<input type="text" name="komoditas" class="form-control" placeholder="Komoditas" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Rata2 Produksi Tahunan <span class="text-danger">*</span></label>
								<input type="text" name="produksitahunan" class="form-control" placeholder="Rata2 Produksi Tahunan" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Kategori Olahan <span class="text-danger">*</span></label>
								<input type="text" name="kategoriolahan" class="form-control" placeholder="Kategori Olahan" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Olahan <span class="text-danger">*</span></label>
								<input type="text" name="jenisolahan" class="form-control" placeholder="Jenis Olahan" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Produksi Olahan Bulanan <span class="text-danger">*</span></label>
								<input type="text" name="produksiolahanbulanan" class="form-control" placeholder="Produksi Olahan Bulanan" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Pupuk <span class="text-danger">*</span></label>
								<input type="text" name="jenispupuk" class="form-control" placeholder="Jenis Pupuk" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Pestisida <span class="text-danger">*</span></label>
								<input type="text" name="jenispestisida" class="form-control" placeholder="Jenis Pestisida" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Jenis Alsintan <span class="text-danger">*</span></label>
								<input type="text" name="jenisalsintan" class="form-control" placeholder="Jenis Alsintan" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Menjual Produk <span class="text-danger">*</span></label>
								<input type="text" name="menjualproduk" class="form-control" placeholder="Menjual Produk" required="">
							</div>

							<div class="form-group">
								<label class="form-control-label" for="input-nama">Menjual Produk <span class="text-danger">*</span></label>
								<input type="text" name="menjualproduk" class="form-control" placeholder="Menjual Produk" required="">
							</div>

							<div class="form-group">
                                <label class="form-control-label" for="input-nama">Penjualan <span class="text-danger">*</span></label>
                                <div class="form-check mb-2 ms-1">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                   <label class="form-check-label" for="inlineCheckbox1">Dalam Kabupaten/Kota</label>
                                </div>
                                <div class="form-check mb-2 ms-1">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                   <label class="form-check-label" for="inlineCheckbox1">Antar Kabupaten/Kota</label>
                                </div>
                                <div class="form-check mb-2 ms-1">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                   <label class="form-check-label" for="inlineCheckbox1">Antar Provinsi</label>
                                </div>
                                <div class="form-check mb-2 ms-1">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                   <label class="form-check-label" for="inlineCheckbox1">Expor</label>
                                </div>                                
							</div>

                            <div class="form-group">
                                <label class="form-control-label" for="input-nama">Tertarik <span class="text-danger">*</span></label>
                                <div class="form-check mb-2 ms-1">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                   <label class="form-check-label" for="inlineCheckbox1">Jual Produk Segar</label>
                                </div>
                                <div class="form-check mb-2 ms-1">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                   <label class="form-check-label" for="inlineCheckbox1">Jual Produk Olahan</label>
                                </div>
                                <div class="form-check mb-2 ms-1">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                   <label class="form-check-label" for="inlineCheckbox1">Jual Saprodi</label>
                                </div>
                                <div class="form-check mb-2 ms-1">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                   <label class="form-check-label" for="inlineCheckbox1">Beli Produk Segar</label>
                                </div>
                                <div class="form-check mb-2 ms-1">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                   <label class="form-check-label" for="inlineCheckbox1">Beli Produk Olahan</label>
                                </div>
                                <div class="form-check mb-2 ms-1">
                                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                   <label class="form-check-label" for="inlineCheckbox1">Beli Saprodi</label>
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