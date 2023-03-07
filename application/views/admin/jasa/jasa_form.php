<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Jasa <?php echo $button ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                    <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </div>
                <div class="form-group">
                    <label for="int">Harga <?php echo form_error('harga') ?></label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="varchar">Foto<?php echo form_error('foto_jasa') ?></label>
                    <br>
                    <?php
                    if($button=='Update'){?>
                        <input type="file" class="form" name="foto_jasa" id="foto_jasa" placeholder="Foto_jasa" value="<?php echo $foto_jasa; ?>" />
                        <br>
                        <br>
                        <img class="img-thumbnail" width='100' src="<?php echo base_url()?>user/produk_dan_jasa/<?php echo $foto_jasa;?>">
                    <?php }else{ ?>
                    <input type="file" class="form" name="foto_jasa" id="foto_jasa" placeholder="Foto_jasa" value="<?php echo $foto_jasa; ?>" />
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="date">Tgl input<?php echo form_error('tgl_input') ?></label>
                    <?php 
                    if($button=='Create'){
                        $tgl_input= date("Y/m/d");
                    }else{
                        $tglinput= $tgl_input;
                    }
                    ?>
                    <input type="text" class="form-control" name="tgl_input" id="tgl_input" placeholder="Tglinput" value="<?php echo $tgl_input; ?>" readonly />
                </div>
                <?php 
                    if($button=='Create'){
                        $liatdata=$this->db->query("SELECT * FROM jasa");
                        $idsementara=$liatdata->num_rows()+1;
                        $id_jasa="$idsementara";
                        $id_jasa=substr($id_jasa,-8);
                        ?>
                        <input type="hidden" name="id_jasa" value="<?php echo $id_jasa; ?>" /> 
                        <?php
                    }else{
                        ?>
                    <input type="hidden" name="id_jasa" value="<?php echo $id_jasa; ?>" /> <?php
                    }
                    ?>
                <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text"><?php echo $button ?></span>
                </button>
                <a href="<?php echo site_url('admin/jasa') ?>" class="btn btn-danger">Cancel</a>
            </form>
            </div>
            </div>
          </div>

        </div>