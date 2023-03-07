<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">User <?php echo $button ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">Nama user <?php echo form_error('nama_user') ?></label>
                    <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="nama_user" value="<?php echo $nama_user; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Email <?php echo form_error('email') ?></label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Password <?php echo form_error('password') ?></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Alamat <?php echo form_error('alamat_user') ?></label>
                    <input type="text" class="form-control" name="alamat_user" id="alamat_user" placeholder="alamat_user" value="<?php echo $alamat_user; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
                </div>
                <?php 
                    if($button=='Create'){
                        $liatdata=$this->db->query("SELECT * FROM user");
                        $idsementara=$liatdata->num_rows()+1;
                        $id_user="$idsementara";
                        $id_user=substr($id_user,-8);
                        ?>
                        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
                        <?php
                    }else{
                        ?>
                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> <?php
                    }
                    ?>
                <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text"><?php echo $button ?></span>
                </button>
                <a href="<?php echo site_url('admin/user') ?>" class="btn btn-danger">Cancel</a>
            </form>
            </div>
            </div>
          </div>

        </div>