<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header pb-4">
					<div class="row">
						<div class="col d-flex flex-column">
							<h6 class="mb-0">DAFTAR JEJARING</h6>
              <p class="text-sm text-mute mb-0">Pelatihan Sejuta Petani, Pengelolaan Kesuburan Tanah</p>
						</div>
						<div class="col-4 text-end d-flex align-content-end align-items-end justify-content-end">
                <a class="btn bg-gradient-dark mb-0 d-flex justify-content-start align-content-center align-items-center" href="http://localhost/tanaman-pangan/admin/jejaring/add">
                  <i class="fas fa-download me-lg-3 me-0" aria-hidden="true"></i>
                  <span class="d-lg-inline d-none">Unduh Data</span>
                </a>
							</div>
						</div>
					</div>
					<div class="card-body px-0 pt-0 pb-0">
						<div class="table-responsive p-0" style="max-height: 800px">
							<table class="table align-items-center mb-0 display" id="example" style="width:100%">
								<thead class="bg-light opacity-5">
									<tr>
										<th class="text-uppercase text-dark text-xxs text-center font-weight-bolder opacity-10" width="1px">#
										</th>
										<th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Pelatihan</th>
										<th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-10">PROGRESS</th>
										<th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Aksi</th>
									</tr>
								</thead>
								<tbody>
                  <!-- Jika ada data pelatihan -->
                  <tr class="table-data" data-type="7">
                    <td class="align-top text-center text-sm">1</td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                            <img src="https://demos.creative-tim.com/argon-dashboard/assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">Alfian Rahmatullah</h6>
                          <p class="small text-xs text-secondary mb-0">Penyedia Alsintan</p>
                        </div>
                      </div>
                    </td>
                    <td class="align-top text-center text-sm">
                        <button type="button" class="btn btn-outline-success btn-sm py-1 px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalProgress">8 Laporan</button>
                        <button type="button" class="btn btn-outline-dark btn-sm py-1 px-2 mb-0 disabled" data-id="5">Tidak Ada</button>
                    </td>
                    <td class="align-top">
                      <div class="ms-auto text-center">
                        <a class="btn btn-success btn-sm py-1 px-2 mb-0" href=""><i class="fa fa-whatsapp me-2" aria-hidden="true"></i>Hubungi</a>
                        <a class="btn btn-dark btn-sm py-1 px-2 mb-0" href=""><i class="fa fa-user me-2" aria-hidden="true"></i>Profil</a>
                      </div>
                    </td>
                  </tr>


									<!-- Jika tidak ada data sama sekali -->
									<tr>
										<td colspan="4" class="text-center py-4 mb-0">Data masih kosong</td>
									</tr>
                </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>



    <div class="modal fade" id="modalProgress" tabindex="-1" aria-labelledby="modalProgress" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header flex-column align-items-start">
              <h1 class="modal-title fs-5" id="modalFAQ">Progress Kelas</h1>
              <p class="mb-0">Pelatihan Sejuta Petani, Pengelolaan Kesuburan Tanah</p>
          </div>
          <div class="modal-body">
            <div class="card d-flex flex-column p-3 shadow-0 border mb-3">
              <h6 class="mb-0 text-sm">Alfian Rahmatullah</h6>
              <p class="small text-xs text-secondary mb-0">Penyedia Alsintan</p>
            </div>
            <div class="card d-flex flex-row p-3 shadow-0 border mb-3">
              <div class="">
                <img class="order-proposal-image rounded" src="http://localhost/tanaman-pangan/uploads/laporan/94b8a16f1c41e7758612c8bc6cbe7731.jpeg" style="max-width: 200px; height: 100px;  object-fit: cover;">
              </div>
              <div class="ms-3">
                <h6 class="mb-0">Launching Propaktani</h6>
                <p class="text-muted text-sm mb-2">14 Desember 2022</p>
                <p class="font-weight-regular mb-0 text-sm text-justify">
                  Program ini nantinya akan fokus dalam 3 hal, yang pertama adalah dalam pengadaan pelatiha tani trainer yang bertujuan nantinya para petani bisa lebih berkembang. Selanjutnya adalah jejaring, dimana antara petani, gapoktan atau elemen yang lain bisa bertemu di program jejaring. Terahir adalah publikasi informasi penting tentnag program.                                        
                </p>
              </div>
            </div>

            <div class="card d-flex flex-row p-3 shadow-0 border mb-3">
              <div class="">
                <img class="order-proposal-image rounded" src="http://localhost/tanaman-pangan/uploads/laporan/94b8a16f1c41e7758612c8bc6cbe7731.jpeg" style="max-width: 200px; height: 100px;  object-fit: cover;">
              </div>
              <div class="ms-3">
                <h6 class="mb-0">Launching Propaktani</h6>
                <p class="text-muted text-sm mb-2">14 Desember 2022</p>
                <p class="font-weight-regular mb-0 text-sm text-justify">
                  Program ini nantinya akan fokus dalam 3 hal, yang pertama adalah dalam pengadaan pelatiha tani trainer yang bertujuan nantinya para petani bisa lebih berkembang. Selanjutnya adalah jejaring, dimana antara petani, gapoktan atau elemen yang lain bisa bertemu di program jejaring. Terahir adalah publikasi informasi penting tentnag program.                                        
                </p>
              </div>
            </div>

            <button data-bs-dismiss="modal" type="button" class="btn btn-outline-dark shadow-none w-100 mb-0">KEMBALI</button>
          </div>
        </div>
      </div>
    </div>