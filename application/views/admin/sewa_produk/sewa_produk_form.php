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
        <h2 style="margin-top:0px">Sewa_produk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Produk <?php echo form_error('id_produk') ?></label>
            <input type="text" class="form-control" name="id_produk" id="id_produk" placeholder="Id Produk" value="<?php echo $id_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Sewa <?php echo form_error('tgl_sewa') ?></label>
            <input type="text" class="form-control" name="tgl_sewa" id="tgl_sewa" placeholder="Tgl Sewa" value="<?php echo $tgl_sewa; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Biaya <?php echo form_error('biaya') ?></label>
            <input type="text" class="form-control" name="biaya" id="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Acara <?php echo form_error('tgl_acara') ?></label>
            <input type="text" class="form-control" name="tgl_acara" id="tgl_acara" placeholder="Tgl Acara" value="<?php echo $tgl_acara; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jml Pesan <?php echo form_error('jml_pesan') ?></label>
            <input type="text" class="form-control" name="jml_pesan" id="jml_pesan" placeholder="Jml Pesan" value="<?php echo $jml_pesan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_sp" value="<?php echo $id_sp; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sewa_produk') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>