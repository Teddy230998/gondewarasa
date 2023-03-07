<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Profil</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                <?php
                     foreach ($profil_data as $profil)
                    { ?>
                        <tr><td>Judul</td><td><?php echo $profil->judul; ?></td></tr>
                        <tr><td>Isi Profil</td><td><?php echo $profil->isi_profil; ?></td></tr>
                        <tr><td>Foto Profil</td><td><img width='100' src="<?= base_url()?>user/slider/<?php echo $profil->foto_profil ?>"> </td></tr>
                    <tr><td></td><td>
                    <a href="<?php echo (site_url('profil/update/'.$profil->id_profil));?>" class="btn btn-info btn-icon-split">
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