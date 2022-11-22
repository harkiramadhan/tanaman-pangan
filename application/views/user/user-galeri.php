<section class="pt-3">
            <div class="container">
                <ol class="breadcrumb px-0 py-0 mb-3" style="background: #f0f2f5;" >
                    <li class="breadcrumb-item small"><a href="#" class="text-info"><i class="fa fa-home mr-2"></i>Beranda</a></li>
                    <li class="breadcrumb-item small"><a href="#" class="text-info">Kelas</a></li>
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
                            <a class="dropdown-item py-2 <?= ($this->uri->segment(2) == 'kelasku') ? 'active' : '' ?>" href="<?= site_url('user/kelasku') ?>">Kelas Saya</a>
                            <a class="dropdown-item py-2 <?= ($this->uri->segment(2) == 'galeri') ? 'active' : '' ?>" href="<?= site_url('user/galeri') ?>">Galeri</a>
                        </div>
                    </div>
               </div>
               <div class="col-lg-9">
                  <div class="bg-white rounded shadow-sm sidebar-page-right">
                     <div>
                        <div class="p-3 border-bottom text-right">
                           <a href="account.html" class="text-success">Tinjau Profil<i class="fa fa-arrow-right ml-2"></i></a>
                        </div>
                        <div class="p-3 border-bottom">

                            <div class="p-0 border-bottom text-right">
                                <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#exampleModal">TAMBAH <i class="fa fa-plus ml-1"></i></button>
                            </div>

                           <div class="table-responsive box-table mt-0">
                              <table class="table table-bordered mb-0">
                                 <thead>
                                    <tr>
                                       <th class="text-center" width="1%">#</th>
                                       <th class="text-center" width="30%">GAMBAR</th>
                                       <th class="text-center" width="10%">AKSI</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td class="text-center">1</td>
                                       <td>
                                          <a href="#" class="make-black">
                                             <img class="order-proposal-image rounded" src="https://asset.kompas.com/crops/ScXltG26qzSypU8o2xMryodhDnM=/0x0:1000x667/750x500/data/photo/2020/01/29/5e30e9bc69af5.jpg" style="max-width: 200px; height: 100px;  object-fit: cover;">
                                          </a>
                                       </td>
                                       <td><button class="btn btn-sm btn-danger w-100">HAPUS</button></td>
                                    </tr>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" enctype="multipart/form-data" method="POST">
                            <div class="text-center">
                                <img src="http://localhost/tanaman-pangan/uploads/kegiatan/98e037f95d3ac98f125c15778e176209.jpg" class="img-fluid img-center shadow rounded mb-4" style="max-height: 250px" id="image-preview2">
                            </div>
                            <div class="row d-flex align-items-center form-group">
                                <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Upload Foto<sup class="text-danger">*</sup></p>
                                </div>
                                <div class="col-md-8">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="image-source" aria-describedby="inputGroupFileAddon04" onchange="previewImage()">
                                        <label class="custom-file-label" for="image-source">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                        <button type="button" class="btn btn-success">SIMPAN</button>
                    </div>
                </div>
            </div>
        </div>