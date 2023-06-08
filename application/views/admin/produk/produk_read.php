<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Produk</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <td>Judul</td>
            <td><?php echo $judul; ?></td>
          </tr>
          <tr>
            <td>Deskripsi</td>
            <td><?php echo $deskripsi; ?></td>
          </tr>
          <tr>
            <td>Stok</td>
            <td><?php echo $stok; ?></td>
          </tr>
          <tr>
            <td>Harga</td>
            <td><?php echo $harga; ?></td>
          </tr>
          <tr>
            <td>Foto</td>
            <td><img width='100' src="<?= base_url() ?>user/produk_dan_jasa/<?php echo $foto ?>"></td>
          </tr>
          <tr>
            <td>Tanggal Input</td>
            <td><?php echo $tglinput; ?></td>
          </tr>
          <tr>
            <td></td>
            <td>
              <a href="<?php echo site_url('admin/produk') ?>" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">

                </span>
                <span class="text">Cancel</span>
              </a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

</div>