<?php
   $pengaturan = $this->db->get_where('pengaturan', ['id' => 1])->row();
?>
      <!-- footer -->
      <footer class="bg-white border-top">
         <div class="container">
            <div class="d-flex justify-content-between">
               <div class="footer-list">
                  <h2>Program</h2>
                  <ul class="list">
                     <li><a href="<?= site_url('tanitrainer') ?>">Tani Trainer</a></li>
                     <li><a href="<?= site_url('jejaring') ?>"><?= ($this->session->userdata('lang') == 'EN') ? 'Network' : 'Jejaring' ?></a></li>
                     <li><a href="<?= site_url('publikasi') ?>"><?= ($this->session->userdata('lang') == 'EN') ? 'Publication' : 'Publikasi Media' ?></a></li>
                  </ul>
               </div>
               <div class="footer-list">
                  <h2><?= ($this->session->userdata('lang') == 'EN') ? 'Role' : 'Peran' ?></h2>
                  <ul class="list">
                     <?php 
                        $roleList = $this->db->get('role');
                        foreach($roleList->result() as $rl){
                     ?>
                        <li><a href="<?= site_url('jejaring?page=1&&roleid=' . $rl->id) ?>"><?= ($this->session->userdata('lang') == 'EN') ? $rl->role_en : $rl->role ?></a></li>
                     <?php } ?>
                  </ul>
               </div>
               <div class="footer-list">
                  <h2><?= ($this->session->userdata('lang') == 'EN') ? 'Publication' : 'Publikasi' ?></h2>
                  <ul class="list">
                     <?php
                        $publikasiList = $this->db->get('kategori_publikasi');
                        foreach($publikasiList->result() as $pl){
                     ?>
                        <li><a href="<?= site_url('publikasi?ids['. $pl->id .']='. $pl->id .'&page=1&order=Terbaru') ?>"><?= ($this->session->userdata('lang') == 'EN') ? $pl->kategori_en : $pl->kategori ?></a></li>
                     <?php } ?>
                  </ul>
               </div>
               <div class="footer-list">
                  <h2><?= ($this->session->userdata('lang') == 'EN') ? 'Social Media' : 'Sosial Media' ?></h2>
                  <ul class="list">
                     <li>
                        <a target="__BLANK" href="<?= $pengaturan->facebook_link ?>">Facebook</a>
                     </li>
                     <li>
                        <a target="__BLANK" href="<?= $pengaturan->instagram_link ?>">Instagram</a>
                     </li>
                     <li>
                        <a target="__BLANK" href="<?= $pengaturan->youtube_link ?>">Youtube</a>
                     </li>
                     <li>
                        <a target="__BLANK" href="<?= $pengaturan->tiktok_link ?>">Tiktok</a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="copyright">
               <div class="logo">
                  <a href="<?= site_url() ?>">
                     <img src="http://app3.pertanian.go.id/propaktani/portal/assets/img/logo_login.png">
                  </a>
               </div>
               <p class="text-center" >© Copyright <?= date('Y') ?> Tanaman Pangan. All Rights Reserved</p>
               <ul class="social">
                  <li>
                     <a target="__BLANK" href="<?= $pengaturan->facebook_link ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  </li>
                  <!-- <li>
                     <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  </li> -->
                  <li>
                     <a target="__BLANK" href="<?= $pengaturan->instagram_link ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                  </li>
                  <li>
                     <a target="__BLANK" href="<?= $pengaturan->tiktok_link ?>"><i class="fa fa-tiktok" aria-hidden="true"></i></a>
                  </li>
               </ul>
            </div>
         </div>
      </footer>
      <!-- footer-->
      <!-- Bootstrap core JavaScript -->
      <script>
         var baseUrl = '<?= site_url() ?>'
      </script>
      <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
      <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
      <!-- Contact form JavaScript -->
      <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <script src="<?= base_url('assets/js/jqBootstrapValidation.js') ?>"></script>
      <script src="<?= base_url('assets/js/contact_me.js') ?>"></script>
      <!-- Slick -->
      <script src="<?= base_url('assets/vendor/slick-master/slick/slick.js') ?>" type="text/javascript" charset="utf-8"></script>
      <!-- lightgallery -->
      <script src="<?= base_url('assets/vendor/lightgallery-master/dist/js/lightgallery-all.min.js') ?>"></script>
      <!-- select2 Js -->
      <script src="<?= base_url('assets/vendor/select2/js/select2.min.js') ?>"></script>
      

      <!-- Main Quill library -->
      <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
      
      <!-- Custom -->
      <script src="<?= base_url('assets/js/custom.js') ?>"></script>
      <?php 
         if(@$ajax) {
               foreach(@$ajax as $a){
                  echo "<script src='".base_url('assets/js/custom/' . $a).".js'></script>";
               }
         }
               
      ?>
   </body>
</html>