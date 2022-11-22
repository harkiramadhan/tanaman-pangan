<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header pb-4">
					<div class="row">
						<div class="col d-flex align-items-center">
							<h6 class="mb-0">DAFTAR PERTANYAAN</h6>
						</div>
						<div class="col-4 text-end d-flex align-content-center align-items-center justify-content-end">
							<button class="btn bg-gradient-dark mb-0 d-flex justify-content-center align-content-center align-items-center"  data-bs-toggle="modal" data-bs-target="#modalFAQ">
								<i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
								<span class="d-lg-inline d-none">Pertanyaan</span>
							</button>
						</div>
					</div>
				</div>
				<div class="card-body px-0 pt-0 pb-2">
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0 display" id="example" style="width:100%">
							<thead class="bg-light opacity-5">
								<tr>
									<th class="text-uppercase text-dark text-xxs text-center font-weight-bolder opacity-10" width="1px">#</th>
									<th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Pertanyaan</th>
                                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Status</th>
									<th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<!-- Jika ada data pelatihan -->
                                <?php if($faq->num_rows() > 0): ?>
                                    <?php $no = 1; foreach($faq->result() as $row){ ?>
                                <tr>
                                    <td class="align-top text-center text-sm"><?= $no++ ?></td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?= $row->question ?></h6>
                                                <p class="small text-xs text-secondary mb-0"><?= $row->answer ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-top text-center text-sm">
										<span class="badge badge-sm <?= ($row->status == 1) ? 'bg-gradient-success' : 'bg-gradient-danger' ?>"><?= ($row->status == 1) ? 'Aktif' : 'Draft' ?></span> 
									</td>
                                    <td class="align-top">
                                        <div class="ms-auto text-center">
                                            <button type="button" class="btn btn-link btn-sm py-0 text-danger px-2 mb-0 btn-remove" data-id="<?= $row->id ?>"><i class="far fa-trash-alt" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-link btn-sm py-0 text-dark px-2 mb-0 btn-edit" data-id="<?= $row->id ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                </tr>

								<!-- Jika tidak ada data sama sekali -->
                                    <?php } ?>
                                <?php else: ?>
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

        <!-- Modal -->
        <div class="modal fade" id="modalFAQ" tabindex="-1" aria-labelledby="modalFAQ" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalFAQ">Tambah Pertanyaan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('admin/faq/create') ?>" method="POST">
                            <div class="row d-flex align-items-center form-group">
                                <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Pertanyaan</p>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="question" class="form-control font-weight-bold text-muted" required>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center form-group">
                                <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Jawaban</p>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="answer" class="form-control font-weight-bold text-muted" required>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center form-group">
                                <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Status</p>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control form-control-alternative me-3" name="status" required>
                                        <option value="" selected="" disabled>Pilih</option>
                                        <option value="1">Aktif</option>
                                        <option value="2">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-dark w-100 mb-0">SIMPAN</button>
                                <button data-bs-dismiss="modal" type="button" class="btn btn-transparant shadow-none w-100 mb-0">KEMBALI</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editFaq" tabindex="-1" aria-labelledby="editFaq" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content edit-content">
                    
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalRemove" tabindex="-1" aria-labelledby="modalRemove" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content remove-content">
                    
                </div>
            </div>
        </div>