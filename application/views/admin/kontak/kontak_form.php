<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Kontak</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">Alamat Kontak <?php echo form_error('alamat_kontak') ?></label>
                    <input type="text" class="form-control" name="alamat_kontak" id="alamat_kontak" placeholder="Alamat Kontak" value="<?php echo $alamat_kontak; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Email Kontak <?php echo form_error('email_kontak') ?></label>
                    <input type="text" class="form-control" name="email_kontak" id="email_kontak" placeholder="Email Kontak" value="<?php echo $email_kontak; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Telepon Kontak <?php echo form_error('telepon_kontak') ?></label>
                    <input type="text" class="form-control" name="telepon_kontak" id="telepon_kontak" placeholder="Telepon Kontak" value="<?php echo $telepon_kontak; ?>" />
                </div>
                <input type="hidden" name="id_kontak" value="<?php echo $id_kontak; ?>" /> 
                <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text"><?php echo $button ?></span>
                </button>
                <a href="<?php echo site_url('admin/kontak') ?>" class="btn btn-danger">Cancel</a>
            </form>
            </div>
            </div>
          </div>

        </div>
