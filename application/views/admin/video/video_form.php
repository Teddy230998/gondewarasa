<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Video <?php echo $button ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                    <label for="varchar">Keterangan Video <?php echo form_error('ket_video') ?></label>
                    <input type="text" class="form-control" name="ket_video" id="ket_video" placeholder="Ket Video" value="<?php echo $ket_video; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Link Video <?php echo form_error('link_video') ?></label>
                    <input type="text" class="form-control" name="link_video" id="link_video" placeholder="Link Video" value="<?php echo $link_video; ?>" />
                </div>
                <div class="form-group">
                    <label for="date">Tgl input Video <?php echo form_error('tglinput_video') ?></label>
                    <?php 
                    if($button=='Create'){
                        $tglinput_video = date("Y/m/d");
                    }else{
                        $tglinput_video = $tglinput_video;
                    }
                    ?>
                    <input type="text" class="form-control" name="tglinput_video" id="tglinput_video" placeholder="Tglinput video" value="<?php echo $tglinput_video; ?>" readonly />
                </div>
                <?php 
                    if($button=='Create'){
                        $liatdata=$this->db->query("SELECT * FROM video");
                        $idsementara=$liatdata->num_rows()+1;
                        $id_video="$idsementara";
                        $id_video=substr($id_video,-8);
                        ?>
                        <input type="hidden" class="form-control" name="id_video" value="<?php echo $id_video; ?>" /> 
                        <?php
                    }else{
                        ?>
                    <input type="hidden" class="form-control" name="id_video" value="<?php echo $id_video; ?>" /> <?php
                    }
                    ?>
                <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text"><?php echo $button ?></span>
                </button>
                <a href="<?php echo site_url('admin/video') ?>" class="btn btn-danger">Cancel</a>
            </form>
            </div>
            </div>
          </div>

        </div>