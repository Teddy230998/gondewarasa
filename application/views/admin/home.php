<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>


  <!-- Content Row -->

  <?php
  // Query untuk menghitung jumlah baris dari tabel Sewa Produk
  $query1 = "SELECT COUNT(*) AS total_rows FROM sewa_produk";
  $result1 = $this->db->query($query1);
  $row1 = $result1->row();
  $total_rows1 = $row1->total_rows;

  // Query untuk menghitung jumlah baris dari tabel sewa jasa
  $query2 = "SELECT COUNT(*) AS total_rows FROM sewa_jasa";
  $result2 = $this->db->query($query2);
  $row2 = $result2->row();
  $total_rows2 = $row2->total_rows;

  // Query untuk menghitung jumlah baris dari tabel Keuangan
  $query3 = "SELECT COUNT(*) AS total_rows, SUM(biaya) AS total_biaya FROM pembayaran";
  $result3 = $this->db->query($query3);
  $row3 = $result3->row();
  $total_rows3 = $row3->total_rows;
  $total_biaya = $row3->total_biaya;

  // Query untuk menghitung jumlah baris dari tabel admin
  $query4 = "SELECT COUNT(*) AS total_rows FROM sewa_jasa";
  $result4 = $this->db->query($query4);
  $row4 = $result4->row();
  $total_rows4 = $row4->total_rows;
  ?>


  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->

        <div class="card-header py-2">
          <div class="row">
            <div class="col-md-3">
              <div class="bg-info p-3 rounded-top">
                <h2 class="text-white"><?php echo $total_rows1 ?></h2>
                <p class="text-white">Total Sewa Kostum</p>
              </div>
              <div>
                <!-- <p class="text-center bg-dark rounded-bottom text-white">More Info</p> -->
              </div>
            </div>
            <div class="col-md-3">
              <div class="bg-success p-3 rounded-top">
                <h2 class="text-white"><?php echo $total_rows2 ?></h2>
                <p class="text-white">Total Sewa Jasa Upacara Adat</p>
              </div>
              <div>
                <!-- <p class="text-center bg-dark rounded-bottom text-white">More Info</p> -->
              </div>
            </div>
            <div class="col-md-3">
              <div class="bg-warning p-3 rounded-top">
                <h2 class="text-white"><?php echo $total_rows2 ?></h2>
                <p class="text-white">Laporan Keuangan</p>
              </div>
              <div>
                <p class="text-center bg-dark rounded-bottom text-white">Total Biaya: <?php echo $total_biaya ?></p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="bg-danger p-3 rounded-top">
                <h2 class="text-white"><?php echo $total_rows4 ?></h2>
                <p class="text-white">Total User Login</p>
              </div>
              <div>
                <!-- <p class="text-center bg-dark rounded-bottom text-white">More Info</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>