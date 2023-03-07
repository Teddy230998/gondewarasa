<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
</div>


<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-12 col-lg-12">
  <?php  ?>
  <form method="post" name="form1" action="?proses=cetak">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      Bulan
      <div class="col-xl-4">
      <select name="bulan" id="bulan"  class="form-control">
      <option value="01">Januari</option>
      <option value="02">Februari</option>
      <option value="03">Maret</option>
      <option value="04">April</option>
      <option value="05">Mei</option>
      <option value="06">Juni</option>
      <option value="07">Juli</option>
      <option value="08">Agustus</option>
      <option value="09">September</option>
      <option value="10">Oktober</option>
      <option value="12">November</option>
      <option value="12">Desember</option>
      </select>
      </div>
      <div class="col-xl-4">
      <select name="tahun" id="tahun" class="form-control">
      <?php
        $mulai= date('Y') - 50;
        for($i = $mulai;$i<$mulai + 100;$i++){
            $sel = $i == date('Y') ? ' selected="selected"' : '';
            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
        }
      ?>
      </select>
      </div>
      <button type="submit" name="submit" class="btn btn-success">Tampilkan</button>        
      <a href="<?php echo base_url(); ?>laporan">Reset Filter</a>
      </form>
      </div>
      <?php
         $proses=$this->input->get('proses',TRUE);
         $bulan=$this->input->post('bulan',TRUE);
         $tahun=$this->input->post('tahun',TRUE);
         if($proses=='cetak'){
         ?> 
      <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>Tanggal</th>
                <th>Uang</th>
                </tr>
                <?php
                   $hasil3= $this->db->query("SELECT * from pembayaran where month(tgl_bayar)='$bulan' AND year(tgl_bayar)='$tahun'");
                   $a=$hasil3->num_rows();
                   if($a==0){
                    echo "<tr><td colspan='2'>Maaf Data Yang anda cari tidak ada</td></tr>";
                   }else{
                   $hasil4= $this->db->query("SELECT *, SUM(biaya) AS jml_byr from pembayaran where month(tgl_bayar)='$bulan' AND year(tgl_bayar)='$tahun'");
                   foreach($hasil4->result() as $lap){
              
                    echo '<tr><td>'.$lap->tgl_bayar.'</td><td>'.$lap->biaya.'</td></tr>';
                   
                  }
                  echo "<tr><td colspan='1'>Total Masukan </td><td>";echo 'Rp. '.number_format($lap->jml_byr).'</td></tr>';
                }
                ?>

                </table>
         <?php }else{
           ?>
            <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>Tanggal</th>
                <th>Uang</th>
                </tr>
           <?php
            $hasil4= $this->db->query("SELECT * from pembayaran ");
            $a=$hasil4->num_rows();
            if($a==0){
             echo "<tr><td colspan='2'><center>Maaf Data Yang anda cari tidak ada</center></td></tr>";
            }else{
            $hasil5= $this->db->query("SELECT *, SUM(biaya) AS jml_byr from pembayaran ");
            foreach($hasil5->result() as $lapo){
             echo '<tr><td>'.$lapo->tgl_bayar.'</td><td>'.$lapo->biaya.'</td></tr>';

           }
           echo "<tr><td colspan='1'>Total Masukan </td><td>";echo 'Rp. '.number_format($lapo->jml_byr).'</td></tr>';
          }
         } ?>
          </table>
    </div>
  </div>

</div>