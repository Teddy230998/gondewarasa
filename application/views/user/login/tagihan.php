<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <h2 class="mb-4">Tagihan</h2>
        <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>

      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <?php
        $username = $this->session->userdata('email');
        $a = $this->db->query('select * from user where email="' . $username . '"');
        foreach ($a->result() as $a) {
          $id_user = $a->id_user;
        }
        ?>
        <p>A. Jasa</p>
        <div class="pricing-entry d-flex ftco-animate">
          <table class="table table-striped" style="font-size: 14px; color: black">
            <thead class="thead-dark">
              <tr>
                <th scope="col"></th>
                <th scope="col">Nama Jasa</th>
                <th scope="col">Biaya</th>
                <th scope="col">Status</th>
                <th scope='col'>Bukti Transaksi</th>
                <?php
                // $query2=$this->db->query('SELECT * from sewa_jasa where id_user="'.$id_user.'"');
                // foreach($query2->result() as $query2){
                //   $id_sj=$query2->id_sj;
                //   $query3=$this->db->query('SELECT * from pembayaran where id_sewa="'.$id_sj.'"');
                //   $b=$query3->num_rows();  
                //   }

                ?>
              </tr>
            </thead>
            <tbody style="color:white">
              <?php
              echo '<form action="' . site_url('user_login/bayaran') . '" method="post" enctype="multipart/form-data">';
              $query4 = $this->db->query('SELECT * from sewa_jasa inner join jasa on sewa_jasa.id_jasa=jasa.id_jasa where id_user="' . $id_user . '"');
              $no = 1;
              foreach ($query4->result() as $query4) {
                echo "<tr><td><input type='radio' name='id_sewa' value='$query4->id_sj' checked></td>";
                echo "<td>" . $query4->nama . "</td>";
                echo "<td><input type='hidden' name='biaya' value='$query4->harga'>" . 'Rp. ' . number_format($query4->harga) . "</td>";
                $tglbayar = date("Y/m/d");
                echo "<input type='hidden' name='tgl_bayar' value='$tglbayar'>";
                echo "<input type='hidden' name='status' value='1'>";
                $query3 = $this->db->query("SELECT * from pembayaran where id_sewa Like 'J%' AND id_sewa='$query4->id_sj'");
                $b = $query3->num_rows();
                if ($b == NULL) {
                  echo "<td><span class='badge badge-warning'>Belum Bayar</span></td>";
                  echo "<td><input type='file' name='foto' id='foto'/></td>";
                  echo "<td><button type='submit' class='btn btn-primary'" . 'onclick="javasciprt: return confirm(\'Apakah anda yakin ?\')"' . ">Kirim</button></td></tr>";
                } else if ($b != NULL) {
                  $query6 = $this->db->query('SELECT * from pembayaran where id_sewa="' . $query4->id_sj . '"');
                  foreach ($query6->result() as $query6) {
                    if ($query6->status == 1) {
                      echo "<td><span class='badge badge-warning'>Sudah bayar tunggu notifikasi dari admin</span></td>";
              ?>
                      <td><img width='100' src="<?= base_url() ?>user/bukti/<?php echo $query6->foto ?>"></td>
                      </tr>";
                    <?php
                    } else {
                      echo "<td><span class='badge badge-warning'>Sewa sudah dinotifikasi</span></td>";
                    ?>
                      <td><img width='100' src="<?= base_url() ?>user/bukti/<?php echo $query6->foto ?>"></td>
                      </tr>";
              <?php
                    }
                  }
                }
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-3">
        <div class="pricing-entry d-flex ftco-animate">
          <table class="table table-striped" style="font-size: 14px; color: black;">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Pembayaran</th>
              </tr>
            </thead>
            <tbody style="color:white">
              <tr>
                <td>Silahkan melanjutkan ke proses transaksi pembayaran</td>
              </tr>
              <tr>
                <td><span class='badge badge-warning'>BCA</span></td>
              </tr>
              <tr>
                <td>1111 1111111 1</td>
              </tr>
              <tr>
                <td><span class='badge badge-warning'>BRI</span></td>
              </tr>
              <tr>
                <td>2222 2222222 2</td>
              </tr>
              </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <?php
          $username = $this->session->userdata('email');
          $a = $this->db->query('select * from user where email="' . $username . '"');
          foreach ($a->result() as $a) {
            $id_user1 = $a->id_user;
          }
          ?>
          <p>B. Produk</p>
          <div class="pricing-entry d-flex ftco-animate">
            <table class="table table-striped" style="font-size: 14px; color: black;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Biaya</th>
                  <th scope="col">Status</th>
                  <th scope='col'>Bukti Transaksi</th>
                </tr>
              </thead>
              <tbody style="color:white">
                <?php
                echo '<form action="' . site_url('user_login/bayaran') . '" method="post" enctype="multipart/form-data">';
                $query9 = $this->db->query('SELECT * from sewa_produk inner join produk on sewa_produk.id_produk=produk.id_produk where id_user="' . $id_user1 . '"');
                $no = 1;
                foreach ($query9->result() as $query9) {
                  echo "<tr><td><input type='radio' name='id_sewa' value='$query9->id_sp' checked></td>";
                  "<td>" . $query9->id_sp . "</td>";
                  echo "<td>" . $query9->judul . "</td>";
                  echo "<td><input type='hidden' name='biaya' value='$query9->biaya'>" . 'Rp. ' . number_format($query9->biaya) . "</td>";

                  $query8 = $this->db->query("SELECT * from pembayaran where id_sewa Like 'P%' AND id_sewa='$query9->id_sp'");
                  $c = $query8->num_rows();
                  if ($c == NULL) {
                    echo "<td><span class='badge badge-warning'>Belum Bayar</span></td>";
                    echo "<td><input type='file' name='foto' id='foto'/></td>";
                    echo "<td><button type='submit' class='btn btn-primary'>Kirim</button></td></tr>";
                  } else if ($c != NULL) {
                    $query10 = $this->db->query("SELECT * from pembayaran where id_sewa Like 'P%' AND id_sewa='$query9->id_sp'");
                    foreach ($query10->result() as $query10) {
                      if ($query10->status == 1) {
                        echo "<td><span class='badge badge-warning'>Sudah bayar tunggu notifikasi dari admin</span></td>";
                ?>
                        <td><img width='100' src="<?= base_url() ?>user/bukti/<?php echo $query10->foto ?>"></td>
                        </tr>";
                      <?php
                      } else {
                        echo "<td><span class='badge badge-warning'>Sewa sudah dinotifikasi</span></td>";
                      ?>
                        <td><img width='100' src="<?= base_url() ?>user/bukti/<?php echo $query10->foto ?>"></td>
                        </tr>";
                <?php
                      }
                    }
                  }
                  $no++;
                }
                ?>
                </tr>
                </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-3">
          <div class="pricing-entry d-flex ftco-animate">
            <table class="table table-striped" style="font-size: 14px; color: black;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Ketentuan Pembayaran</th>
                </tr>
              </thead>
              <tbody style="color:white">
                <tr>
                  <td>Transfer sejumlah biaya sesuai dengan total Bayar yang di atas</td>
                </tr>
                <tr>
                  <td>Pastikan Anda memasukan nominal sesuai dengan biaya yang tertera</td>
                </tr>
                <tr>
                  <td> Ambil dan simpan bukti transaksi pembayaran Anda, kemudian foto atau scan dan kirim ke form Kirim Registrasi</td>
                </tr>
                </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>