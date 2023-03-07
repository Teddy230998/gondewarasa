<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Agenda <?php echo $button ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="varchar">Judul Agenda <?php echo form_error('judul_agenda') ?></label>
                <input type="text" class="form-control" name="judul_agenda" id="judul_agenda" placeholder="Judul Agenda" value="<?php echo $judul_agenda; ?>" />
             </div>
                <div class="form-group">
                    <label for="varchar">Isi Agenda <?php echo form_error('isi_agenda') ?></label>
                    <textarea class="form-control" name="isi_agenda" id="isi_agenda" placeholder="Isi Agenda"><?php echo $isi_agenda; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="varchar">Tempat Agenda <?php echo form_error('tempat_agenda') ?></label>
                    <input type="text" class="form-control" name="tempat_agenda" id="tempat_agenda" placeholder="Tempat Agenda" value="<?php echo $tempat_agenda; ?>" />
                </div>
                <div class="form-group">
                    <label for="date">Tgl Agenda <?php echo form_error('tgl_agenda') ?></label>
                    <input type="date" class="form-control" name="tgl_agenda" id="tgl_agenda" placeholder="Tgl Agenda" value="<?php echo $tgl_agenda; ?>" />
                </div>
                <div class="form-group">
                    <label for="time">Waktu Agenda <?php echo form_error('waktu_agenda') ?></label>
                    <input type="time" class="form-control" name="waktu_agenda" id="waktu_agenda" placeholder="Waktu Agenda" value="<?php echo $waktu_agenda; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Foto Agenda <?php echo form_error('foto_agenda') ?></label>
                    <br>
                    <?php
                    if($button=='Update'){?>
                        <input type="file" class="form" name="foto_agenda" id="foto_agenda" placeholder="Foto agenda" value="<?php echo $foto_agenda; ?>" />
                        <input type="text" name="old_image" value="<?php echo $foto_agenda ?>" />
                        <br>
                        <br>
                        <img class="img-thumbnail" width='100' src="<?php echo base_url()?>user/agenda/<?php echo $foto_agenda ?>">
                    <?php }else{ ?>
                        <input type="file" class="form" name="foto_agenda" id="foto_agenda" placeholder="Foto Agenda" value="<?php echo $foto_agenda; ?>" />
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="date">Tgl input agenda <?php echo form_error('tglinput_agenda') ?></label>
                    <?php 
                    if($button=='Create'){
                        $tglinput_agenda = date("Y/m/d");
                    }else{
                        $tglinput_agenda = $tglinput_agenda;
                    }
                    ?>
                    <input type="text" class="form-control" name="tglinput_agenda" id="tglinput_agenda" placeholder="Tglinput agenda" value="<?php echo $tglinput_agenda; ?>" readonly />
                </div>
                <?php 
                    if($button=='Create'){
                        $liatdata=$this->db->query("SELECT * FROM agenda");
                        $idsementara=$liatdata->num_rows()+1;
                        $id_agenda="$idsementara";
                        $id_agenda=substr($id_agenda,-8);
                        ?>
                        <input type="hidden" name="id_agenda" value="<?php echo $id_agenda; ?>" /> 
                        <?php
                    }else{
                        ?>
                    <input type="hidden" name="id_agenda" value="<?php echo $id_agenda; ?>" /> <?php
                    }
                    ?>
                <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text"><?php echo $button ?></span>
                </button>
                <a href="<?php echo site_url('admin/agenda') ?>" class="btn btn-danger">Cancel</a>
            </form>
            </div>
            </div>
          </div>

        </div>