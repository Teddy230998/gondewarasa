<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Profil</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="varchar">Judul <?php echo form_error('judul') ?></label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Isi Profil <?php echo form_error('isi_profil') ?></label>
                        <textarea class="form-control" name="isi_profil" id="isi_profil" placeholder="Isi Profil"><?php echo $isi_profil; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Foto Profil <?php echo form_error('foto_profil') ?></label>
                        <br>
                        <input type="file" class="form" name="foto_profil" id="foto_profil" placeholder="Foto Profil" value="<?php echo $foto_profil; ?>" />
                        <input type="hidden" name="old_image" value="<?php echo $foto_profil ?>" />
                        <br>
                        <br>
                        <img class="img-thumbnail" width='100' src="<?php echo base_url()?>user/slider/<?php echo $foto_profil ?>">
                    </div>
                    <input type="hidden" name="id_profil" value="<?php echo $id_profil; ?>" /> 
                    <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text"><?php echo $button ?></span>
                </button>
                <a href="<?php echo site_url('admin/profil') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
            </div>
          </div>

        </div>