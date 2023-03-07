<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Jasa</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
                <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
                <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
                <tr><td>Foto</td><td><img width='100' src="<?= base_url()?>user/produk_dan_jasa/<?php echo $foto_jasa ?>"></td></tr>
                <tr><td>Tgl Input</td><td><?php echo $tgl_input; ?></td></tr>
                    <tr><td></td><td>
                    <a href="<?php echo site_url('admin/jasa') ?>" class="btn btn-danger btn-icon-split">
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