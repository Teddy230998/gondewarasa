<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Foto <?php echo $button ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                    <label for="varchar">Keterangan Galeri <?php echo form_error('ket_galeri') ?></label>
                    <input type="text" class="form-control" name="ket_galeri" id="ket_galeri" placeholder="Ket Galeri" value="<?php echo $ket_galeri; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Foto Galeri <?php echo form_error('foto_galeri') ?></label>
                    <br>
                    <?php
                    if($button=='Update'){?>
                        <input type="file" class="form" name="foto_galeri" id="foto_galeri" placeholder="Foto Galeri" value="<?php echo $foto_galeri; ?>" />
                        <input type="hidden" name="old_image" value="<?php echo $foto_galeri ?>" />
                        <br>
                        <br>
                        <img class="img-thumbnail" width='100' src="<?php echo base_url()?>user/galeri/<?php echo $foto_galeri ?>">
                    <?php }else{ ?>
                    <input type="file" class="form" name="foto_galeri" id="foto_galeri" placeholder="Foto Galeri" value="<?php echo $foto_galeri; ?>" />
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="date">Tgl input Galeri <?php echo form_error('tglinput_galeri') ?></label>
                    <?php 
                    if($button=='Create'){
                        $tglinput_galeri = date("Y/m/d");
                    }else{
                        $tglinput_galeri = $tglinput_galeri;
                    }
                    ?>
                    <input type="text" class="form-control" name="tglinput_galeri" id="tglinput_galeri" placeholder="Tglinput Galeri" value="<?php echo $tglinput_galeri; ?>" readonly />
                </div>
                <?php 
                    if($button=='Create'){
                        $liatdata=$this->db->query("SELECT * FROM foto");
                        $idsementara=$liatdata->num_rows()+1;
                        $id_galeri="$idsementara";
                        $id_galeri=substr($id_galeri,-8);
                        ?>
                        <input type="hidden" name="id_galeri" value="<?php echo $id_galeri; ?>" /> 
                        <?php
                    }else{
                        ?>
                    <input type="hidden" name="id_galeri" value="<?php echo $id_galeri; ?>" /> <?php
                    }
                    ?>
                <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text"><?php echo $button ?></span>
                </button>
                <a href="<?php echo site_url('admin/foto') ?>" class="btn btn-danger">Cancel</a>
            </form>
            </div>
            </div>
          </div>

        </div>