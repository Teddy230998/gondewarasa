<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Foto</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                <tr><td>Ket Galeri</td><td><?php echo $ket_galeri; ?></td></tr>
                <tr><td>Foto Galeri</td><td><img width='100' src="<?= base_url()?>user/galeri/<?php echo $foto_galeri ?>"></td></tr>
                <tr><td>Tglinput Galeri</td><td><?php echo $tglinput_galeri; ?></td></tr>
                    <tr><td></td><td>
                    <a href="<?php echo site_url('foto') ?>" class="btn btn-danger btn-icon-split">
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