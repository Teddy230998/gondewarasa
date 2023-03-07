<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Sewa_jasa <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Jasa <?php echo form_error('id_jasa') ?></label>
            <input type="text" class="form-control" name="id_jasa" id="id_jasa" placeholder="Id Jasa" value="<?php echo $id_jasa; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Biaya <?php echo form_error('biaya') ?></label>
            <input type="text" class="form-control" name="biaya" id="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Sewa <?php echo form_error('tgl_sewa') ?></label>
            <input type="text" class="form-control" name="tgl_sewa" id="tgl_sewa" placeholder="Tgl Sewa" value="<?php echo $tgl_sewa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Selesai <?php echo form_error('tgl_selesai') ?></label>
            <input type="text" class="form-control" name="tgl_selesai" id="tgl_selesai" placeholder="Tgl Selesai" value="<?php echo $tgl_selesai; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Mulai <?php echo form_error('tgl_mulai') ?></label>
            <input type="text" class="form-control" name="tgl_mulai" id="tgl_mulai" placeholder="Tgl Mulai" value="<?php echo $tgl_mulai; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <!-- <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php //echo $status; ?>" /> -->
        </div>
	    <input type="hidden" name="id_sj" value="<?php echo $id_sj; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sewa_jasa') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>