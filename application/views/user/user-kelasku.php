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
                  <div class="p-3 border-bottom text-right">
                     <a href="<?= site_url('tanitrainer') ?>" class="text-success">Ikut Kelas Lainnya<i class="fa fa-arrow-right ml-2"></i></a>
                  </div>
                  <div class="p-3 border-bottom">
                     <div class="table-responsive box-table mt-0">
                        <table class="table table-bordered mb-0">
                           <thead>
                              <tr>
                                 <th class="text-center" width="5%">#</th>
                                 <th class="text-center" width="10%">KELAS</th>
                                 <th class="text-center" width="10%">TANGGAL</th>
                                 <th class="text-center" width="10%">STATUS</th>
                                 <th class="text-center" width="10%">AKSI</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $no=1; foreach($kelas->result() as $row): ?>
                              <tr>
                                 <td class="text-center"><?= $no++ ?></td>
                                 <td>
                                    <a href="<?= site_url('tanitrainer/' . $row->flag) ?>" class="make-black">
                                       <img class="order-proposal-image rounded mb-2 mr-3" src="<?= base_url('uploads/tanitrainer/' . $row->img) ?>" style="width: 100px;">
                                       <p class="h6 order-proposal-title"><?= $row->judul ?></p>
                                    </a>
                                 </td>
                                 <td><?= longdate_indo($row->tanggal) ?></td>
                                 <td class="text-center">
                                    <span class="btn btn-sm w-100 <?= ($row->status_kegiatan == 1) ? 'btn-info' : (($row->status_kegiatan == 2) ? 'btn-success' : 'btn-warning') ?>"><?= ($row->status_kegiatan == 1) ? 'Belum Berjalan' : (($row->status_kegiatan == 2) ? 'Berjalan' : 'Selesai') ?></span> 
                                 </td>
                                 <td><button class="btn btn-sm btn-success w-100">PROGRESS</button></td>
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