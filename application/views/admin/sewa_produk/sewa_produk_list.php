<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sewa Produk</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">

                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-4 text-right">

                </div>
            </div>
            <table class="table table-bordered" style="margin-bottom: 10px">
                <tr>
                    <th>No</th>
                    <th>Tanggal Sewa</th>
                    <th>Biaya</th>
                    <th>Alamat</th>
                    <th>Tanggal Acara</th>
                    <th>Jumlah Pesan</th>
                    <th>Produk</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr><?php
                        $sewa_jasa_data = $this->db->query("SELECT * from sewa_produk inner join produk on sewa_produk.id_produk=produk.id_produk inner join user on sewa_produk.id_user=user.id_user");
                        foreach ($sewa_jasa_data->result() as $sewa_produk) {
                        ?>
                    <tr>
                        <td width="80px"><?php echo ++$start ?></td>
                        <td><?php echo $sewa_produk->tgl_sewa ?></td>
                        <td><?php echo $sewa_produk->biaya ?></td>
                        <td><?php echo $sewa_produk->alamat ?></td>
                        <td><?php echo $sewa_produk->tgl_acara ?></td>
                        <td><?php echo $sewa_produk->jml_pesan ?></td>
                        <td><?php echo $sewa_produk->judul ?></td>
                        <td><?php echo $sewa_produk->nama_user ?></td>
                        <?php
                            $pembayaran_data = $this->db->query("SELECT * from pembayaran where id_sewa='$sewa_produk->id_sp'");
                            $pembayaran = $pembayaran_data->num_rows();
                            if ($pembayaran == NULL) {
                                echo '<td><span class="badge badge-warning">Belum Bayar</span></td>';
                            } elseif ($pembayaran != NULL) {
                                $query7 = $this->db->query("SELECT * from pembayaran where id_sewa='$sewa_produk->id_sp'");
                                foreach ($query7->result() as $query7) {
                                    if ($query7->status == 1) {
                                        echo '<td><span class="badge badge-warning">Sudah bayar menunggu Konfirmasi Admin</span></td>';
                                    } else {
                                        echo '<td><span class="badge badge-warning">Sewa sudah dinotifikasi</span></td>';
                                    }
                                }
                            }
                        ?>
                        <td style="text-align:center" width="200px">
                            <?php
                            echo anchor(site_url('sewa_produk/read/' . $sewa_produk->id_sp), 'Detail Pembayaran');
                            $query8 = $this->db->query("SELECT * from pembayaran where id_sewa='$sewa_produk->id_sp'");
                            foreach ($query8->result() as $query8) {
                                if ($query8->status == 1) {
                                    echo '|';
                                    echo '<form action="' . site_url('sewa_produk/konfirmasi') . '" method="post">';
                                    echo '<input type="hidden" name="status" value="2">';
                                    echo '<input type="hidden" name="id_pem" value="' . $query8->id_pem . '">';
                                    echo '<button type="submit" class="btn btn-success">Konfirmasi</button></form>';
                                }
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                        }
                ?>
            </table>
            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="btn btn-secondary">Total Record : <?php echo $total_rows ?></a>
                </div>
                <div class="col-md-6 text-right">
                    <?php echo $pagination ?>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">

            </div>
        </div>
    </div>

</div>

<!-- <!doctype html>
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
        <h2 style="margin-top:0px">Sewa_produk List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('sewa_produk/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sewa_produk/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                            if ($q <> '') {
                            ?>
                                    <a href="<?php echo site_url('sewa_produk'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                                    ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id User</th>
		<th>Id Produk</th>
		<th>Tgl Sewa</th>
		<th>Biaya</th>
		<th>Alamat</th>
		<th>Tgl Acara</th>
		<th>Jml Pesan</th>
		<th>Status</th>
		<th>Action</th>
            </tr><?php
                    foreach ($sewa_produk_data as $sewa_produk) {
                    ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sewa_produk->id_user ?></td>
			<td><?php echo $sewa_produk->id_produk ?></td>
			<td><?php echo $sewa_produk->tgl_sewa ?></td>
			<td><?php echo $sewa_produk->biaya ?></td>
			<td><?php echo $sewa_produk->alamat ?></td>
			<td><?php echo $sewa_produk->tgl_acara ?></td>
			<td><?php echo $sewa_produk->jml_pesan ?></td>
			<td><?php echo $sewa_produk->status ?></td>
			<td style="text-align:center" width="200px">
				<?php
                        echo anchor(site_url('sewa_produk/read/' . $sewa_produk->id_sp), 'Read');
                        echo ' | ';
                        echo anchor(site_url('sewa_produk/update/' . $sewa_produk->id_sp), 'Update');
                        echo ' | ';
                        echo anchor(site_url('sewa_produk/delete/' . $sewa_produk->id_sp), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                ?>
			</td>
		</tr>
                <?php
                    }
                ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html> -->