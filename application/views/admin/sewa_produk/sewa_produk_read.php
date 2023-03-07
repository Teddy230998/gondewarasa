<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Detail Pembayaran</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                <?php
                      $hasil= $this->db->query("SELECT * from sewa_produk where id_sp='$id_sewa'");
                      foreach($hasil->result() as $produk){
                        $id_produk=$produk->id_produk;
                        $h= $this->db->query("SELECT * from produk where id_produk='$id_produk'");
					              foreach($h->result() as $j){
					            ?>
                         <tr><td>Nama Produk</td><td><?php echo $j->judul; ?></td></tr>
                    <?php 
                    } 
                }
		            ?>
                <tr><td>Biaya</td><td><?php echo $biaya; ?></td></tr>
                <tr><td>Bukti Pembayaran</td><td><img width='100' src="<?= base_url()?>user/bukti/<?php echo $foto ?>"></td></tr>
                <tr><td>Tanggal Bayar</td><td><?php echo $tgl_bayar; ?></td></tr>
                    <tr><td></td><td>
                    <a href="<?php echo site_url('sewa_produk') ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">

                    </span>
                    <span class="text">Cancel</span>
                  </a>    
                </td></tr>
                </table>
              </div>
            </div>
          </div>

        </div>