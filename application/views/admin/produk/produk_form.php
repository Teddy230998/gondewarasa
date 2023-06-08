<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Produk <?php echo $button ?></h1>

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
                        <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi" value="<?php echo $deskripsi; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Stok <?php echo form_error('stok') ?></label>
                        <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Harga <?php echo form_error('harga') ?></label>
                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Foto<?php echo form_error('foto') ?></label>
                        <br>
                        <?php
                        if ($button == 'Update') { ?>
                            <input type="file" class="form" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
                            <input type="hidden" name="old_image" value="<?php echo $foto ?>" />
                            <br>
                            <br>
                            <img class="img-thumbnail" width='100' src="<?php echo base_url() ?>user/galeri/<?php echo $foto ?>">
                        <?php } else { ?>
                            <input type="file" class="form" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Input<?php echo form_error('tglinput') ?></label>
                        <?php
                        if ($button == 'Create') {
                            $tglinput = date("Y/m/d");
                        } else {
                            $tglinput = $tglinput;
                        }
                        ?>
                        <input type="text" class="form-control" name="tglinput" id="tglinput" placeholder="Tglinput" value="<?php echo $tglinput; ?>" readonly />
                    </div>
                    <?php
                    if ($button == 'Create') {
                        $listdata = $this->db->query("SELECT * FROM produk");
                        $idsementara = $listdata->num_rows() + 1;
                        $id_produk = "$idsementara";
                        $id_produk = substr($id_produk, -8);
                    ?>
                        <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>" />
                    <?php
                    } else {
                    ?>
                        <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>" /> <?php
                                                                                                }
                                                                                                    ?>
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text"><?php echo $button ?></span>
                    </button>
                    <a href="<?php echo site_url('admin/produk') ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>

</div>