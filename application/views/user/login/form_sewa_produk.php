<style>
  body {
    background-color: #000;
  }

  .form-group label {
    color: #fff;
  }

  .form-control {
    background-color: #222;
    color: #fff;
  }

  .form-control::-webkit-calendar-picker-indicator {
    filter: invert(1);
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
  }

  .btn-primary:hover {
    background-color: #0069d9;
    border-color: #0062cc;
  }
</style>


<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <h2 class="mb-4">Form Sewa Produk</h2>
        <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
        <p class="mt-5">Jika Anda ingin menyewa Produk ini, silakan isi form ini.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p style="color:white; background-color:red;"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></p>
        <br>
        <form action="<?php echo site_url('User_login/Produk_action/' . $id_produk) ?>" method="post">
          <div class="form-group">
            <label for="date">Tanggal Sewa <?php echo form_error('tgl_sewa') ?></label>
            <input type="text" readonly class="form-control" name="tgl_sewa" id="tgl_sewa" placeholder="Tanggal Sewa" value="<?php echo date("Y/m/d"); ?>" />
          </div>
          <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" name="alamat" id="alamat" required><?php echo $alamat; ?></textarea>
          </div>
          <div class="form-group">
            <label for="date">Tanggal Acara <?php echo form_error('tgl_acara') ?></label>
            <input type="date" class="form-control" name="tgl_acara" id="tgl_acara" placeholder="Tanggal Acara" value="<?php echo $tgl_acara; ?>" required />
          </div>
          <div class="form-group">
            <label for="int">Biaya</label>
            <input type="text" readonly name="total" class="form-control" id="b1" onkeyup="sum();" value="<?php echo $biaya; ?>" />
          </div>
          <div class="form-group">
            <label for="date">Jumlah Pesan <?php echo form_error('jml_pesan') ?></label>
            <input type="number" class="form-control" name="jml_pesan" onkeyup="sum();" id="jml_pesan" placeholder="Jumlah Pesan" value="<?php echo $jml_pesan; ?>" />
          </div>
          <div class="form-group">
            <label for="int">Total Biaya <?php echo form_error('biaya') ?></label>
            <input type="text" readonly class="form-control" name="biaya" id="biaya" placeholder="Total Biaya" value="<?php echo $biaya; ?>" />
          </div>
          <input type="hidden" class="form-control" name="id_produk" id="id_produk" placeholder="Id produk" value="<?php echo $id_produk; ?>" />
          <?php
          $email = $this->session->userdata('email');
          $liat = $this->db->query("SELECT * FROM user where email='$email'");
          foreach ($liat->result() as $user) {
          ?>
            <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $user->id_user; ?>" />
          <?php } ?>
          <input type="hidden" class="form-control" name="status" id="status" placeholder="Status" value="1" />
          <?php
          $liatdata = $this->db->query("SELECT * FROM sewa_produk");
          $idsementara = $liatdata->num_rows() + 1;
          $id_sp = "P$idsementara";
          $id_sp = substr($id_sp, -8);
          ?>
          <input type="hidden" class="form-control" name="id_sp" value="<?php echo $id_sp; ?>" />
          <br><br>
          <center>
            <button type="submit" class="btn btn-primary py-3 px-5">Kirim</button>
          </center>
        </form>

        <script>
          function sum() {
            var txtFirstNumberValue = document.getElementById('b1').value;
            var txtSecondNumberValue = document.getElementById('jml_pesan').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
              document.getElementById('biaya').value = result;
            }
          }
        </script>
      </div>
    </div>
</section>

<!-- <script>
  function calculateTotal() {
    var jml_pesan = parseFloat(document.getElementById('jml_pesan').value);
    var biaya = parseFloat(document.getElementById('biaya').value);
    var total = jml_pesan * biaya;
    document.getElementById('biaya').value = total.toFixed(2);
  }
</script> -->