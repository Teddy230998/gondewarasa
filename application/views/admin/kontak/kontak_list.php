<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Kontak</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                <?php
                    foreach ($kontak_data as $kontak)
                    { ?>
                    <tr><td>Alamat Kontak</td><td><?php echo $kontak->alamat_kontak; ?></td></tr>
                    <tr><td>Email Kontak</td><td><?php echo $kontak->email_kontak; ?></td></tr>
                    <tr><td>Telepon Kontak</td><td><?php echo $kontak->telepon_kontak; ?></td></tr>
                    <tr><td></td><td>
                    <a href="<?php echo (site_url('kontak/update/'.$kontak->id_kontak));?>" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <!-- <i class="fas fa-info-circle"></i> -->
                    </span>
                    <span class="text">Edit</span>
                  </a>    
                </td></tr>
                <?php
                    }
                ?>
                </table>
              </div>
            </div>
          </div>

        </div>
