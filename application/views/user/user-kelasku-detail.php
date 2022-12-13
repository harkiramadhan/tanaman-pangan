<section class="pt-3">
   <div class="container">
         <ol class="breadcrumb px-0 py-0 mb-3" style="background: #f0f2f5;" >
            <li class="breadcrumb-item small"><a href="<?= site_url('') ?>" class="text-info"><i class="fa fa-home mr-2"></i>Beranda</a></li>
            <li class="breadcrumb-item small"><a href="<?= site_url('kelas') ?>" class="text-info">Kelas</a></li>
            <li class="breadcrumb-item small active" aria-current="page">Kelas Saya</li>
         </ol>
   </div>
</section>
<section class="pb-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 mb-3">
            <div class="bg-white rounded shadow-sm py-3 sidebar-fix">
                  <div class="dropdown-menu-show">
                        <a class="dropdown-item py-2 <?= ($this->uri->segment(1) == 'kelas') ? 'active' : '' ?>" href="<?= site_url('kelas') ?>">Kelas Saya</a>
                        <a class="dropdown-item py-2 <?= ($this->uri->segment(1) == 'gallery') ? 'active' : '' ?>" href="<?= site_url('gallery') ?>">Galeri</a>
                  </div>
               </div>
         </div>
         <div class="col-lg-9">
            <div class="bg-white rounded shadow-sm sidebar-page-right">
                <div>
                    <div class="p-3 border-bottom text-left">
                        <a href="<?= site_url('kelas') ?>" class="text-success"><i class="fa fa-arrow-left mr-2"></i>Kembali ke Daftar Kelas</a>
                    </div>
                    <div class="p-3 border-bottom">
                        <div class="row p-0 mb-2">
                            <div class="col-8">
                                <p class="mb-1">Update progress kelas</p>
                                <h6 class="font-weight-bold"><?= $kelas->judul ?></h6>
                            </div>
                            <div class="col-4 text-right">
                                <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#exampleModal">KABAR <i class="fa fa-plus ml-1" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="table-responsive box-table mt-0">
                            <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th width="5%"></th>
                                    <th class="text-center" width="20%">LAPORAN</th>
                                    <th class="text-center" width="5%">TANGGAL</th>
                                    <th class="text-center" width="5%">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($laporan->result() as $row): ?>
                                <tr>
                                    <td class="text-center">
                                        <img class="order-proposal-image rounded" src="<?= base_url('uploads/laporan/' . $row->img) ?>" style="max-width: 200px; height: 100px;  object-fit: cover;">
                                    </td>
                                    <td>
                                        <!-- Nampilin judul bold -->
                                        <p class="font-weight-bold mb-2">
                                            <?= $row->judul ?>
                                        </p>

                                        <!-- Lalu deskripsi font regular -->
                                        <p class="font-weight-regular mb-0">
                                            <?= $row->desc ?>
                                        </p>
                                    </td>
                                    <td><?= date_indo($row->tanggal) ?></td>
                                    <td>
                                        <div class="btn-group w-100" role="group" aria-label="Basic example">

                                            <button class="btn btn-sm btn-success w-100 btn-edit" data-id="<?= $row->id ?>">UBAH</button>
                                            <a href="<?= site_url('kelas/remove/' . $row->id) ?>" class="btn btn-sm btn-danger w-100 ml-1 btn-remove" data-id="<?= $row->id ?>">HAPUS</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</section>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('kelas/createLaporan') ?>" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="tanitrainer_id" value="<?= $this->uri->segment(2) ?>">
                <div class="modal-body">
                    <div class="text-center">
                        <img src="" class="img-fluid img-center shadow rounded mb-4 d-none" style="max-height: 250px" id="image-preview">
                    </div>
                    <div class="row d-flex align-items-center form-group">
                        <div class="col-md-4">
                            <p class="text-muted font-weight-bold mb-0">Upload Foto Terbaru<sup class="text-danger">*</sup></p>
                        </div>
                        <div class="col-md-8">
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" id="image-source" aria-describedby="inputGroupFileAddon04" onchange="previewImage()">
                                <label class="custom-file-label" for="image-source">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center form-group">
                        <div class="col-md-4">
                            <p class="text-muted font-weight-bold mb-0">Judul Update<sup class="text-danger">*</sup></p>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="judul" class="form-control font-weight-bold text-muted" value="" required="">
                        </div>
                    </div>

                    <div class="row d-flex align-items-center form-group">
                        <div class="col-md-4">
                            <p class="text-muted font-weight-bold mb-0">Tanggal Update<sup class="text-danger">*</sup></p>
                        </div>
                        <div class="col-md-8">
                            <input type="date" name="tanggal" class="form-control font-weight-bold text-muted" value="" required="">
                        </div>
                    </div>

                    <div class="row d-flex align-items-center form-group">
                        <div class="col-md-4">
                            <p class="text-muted font-weight-bold mb-0">Berita Update<sup class="text-danger">*</sup></p>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" id="" rows="3" name="desc"></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content edit-content">
            
        </div>
    </div>
</div>