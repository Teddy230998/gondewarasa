<a class="nav-link dropdown-toggle" type="submit" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php 
                   $query = $this->db->query("SELECT * FROM pembayaran WHERE status_notif=2");
                   $s=$query->num_rows();
                   if($s>0){
                ?>
                    <span class="badge badge-danger badge-counter count">
                    <?php 
                    echo $s;
                    ?>
                    </span>
                   <?php }else{
                      
                   }?>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts
                </h6>
                <?php 
                if($s>0){
                 $qu = $this->db->query("SELECT * FROM pembayaran WHERE status_notif=0");
                 foreach ($qu->result() as $sewa){
                  $qu1 = $this->db->query("SELECT * FROM pembayaran WHERE status_notif=0 AND id_sewa Like 'J%'");
                  foreach ($qu1->result() as $j){
                ?>
                <a class="dropdown-item d-flex align-items-center">
                  <div class="mr-3">
                  <form action="<?php echo site_url('sewa_jasa/notif') ?>" method="post">
                  <input type="hidden" class="form-control" name="status_notif" value="1" />
                  <input type="hidden" class="form-control" name="id_pem"  value="<?php echo $sewa->id_pem ;?>" />
                    <button class="icon-circle bg-success" type="submit">
                      <i class="fas fa-donate text-white"></i></button></form>
                    </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $sewa->tgl_bayar ?></div>
                    <span class="font-weight-bold">
                    <?php 
                      $qu2 = $this->db->query("SELECT * FROM sewa_jasa inner join jasa on sewa_jasa.id_jasa=jasa.id_jasa inner join user on sewa_jasa.id_user=user.id_user WHERE id_sj='$j->id_sewa'");
                      foreach ($qu2->result() as $j1){
                        echo $j1->nama.'<br> '.$j1->nama_user;
                      }
                    
                    ?><br><?php echo 'Rp. '.number_format($sewa->biaya) ?></span>
                  </div>
                </a>
                 <?php } 
                 $qu3 = $this->db->query("SELECT * FROM pembayaran WHERE status_notif=0 AND id_sewa Like 'P%'");
                 foreach ($qu3->result() as $j2){
                ?>
                <a class="dropdown-item d-flex align-items-center" href="sewa_produk">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $sewa->tgl_bayar ?></div>
                    <span class="font-weight-bold">
                    <?php 
                      $qu2 = $this->db->query("SELECT * FROM sewa_produk inner join produk on sewa_produk.id_produk=produk.id_produk inner join user on sewa_produk.id_user=user.id_user WHERE id_sp='$j->id_sewa'");
                      foreach ($qu2->result() as $j3){
                        echo $j3->judul.'<br> '.$j3->nama_user;
                      }
                    
                    ?><br><?php echo 'Rp. '.number_format($sewa->biaya) ?></span>
                  </div>
                </a>
                    <?php } } }else{ echo '<center><span class="font-weight-bold">Notifikasi tidak ada</center>';}?>
                <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> -->
              </div>
                      
   