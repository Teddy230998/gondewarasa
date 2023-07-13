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
        <h2 class="mb-4">Form Sewa Jasa</h2>
        <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
        <p class="mt-5">Jika Anda ingin menyewa jasa ini, silakan isi form ini.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p style="color:white; background-color:red;"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></p>
        <br>
        <form action="<?php echo site_url('User_login/jasa_action/' . $id_jasa) ?>" method="post">
          <label for="date">Tanggal Sewa <?php echo form_error('tgl_sewa') ?></label>
          <input type="text" readonly class="form-control" name="tgl_sewa" id="tgl_sewa" placeholder="Tgl Sewa" value="<?php echo date("Y/m/d"); ?>" />
          <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
          <textarea class="form-control" name="alamat" id="alamat" required><?php echo $alamat; ?></textarea>
          <label for="date">Tanggal Acara <?php echo form_error('tgl_acara') ?></label>
          <input type="date" class="form-control" name="tgl_acara" id="tgl_acara" placeholder="Tgl acara" value="<?php echo $tgl_acara; ?>" required />
          <label for="int">Biaya <?php echo form_error('biaya') ?></label>
          <input type="text" readonly class="form-control" name="biaya" id="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>" />
          <input type="hidden" class="form-control" name="id_jasa" id="id_jasa" placeholder="Id Jasa" value="<?php echo $id_jasa; ?>" />
          <?php
          $email = $this->session->userdata('email');
          $liat = $this->db->query("SELECT * FROM user where email='$email'");
          foreach ($liat->result() as $user) {
          ?>
            <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $user->id_user; ?>" />
          <?php } ?>
          <input type="hidden" class="form-control" name="status" id="status" placeholder="status" value="1" />

          <?php
          $liatdata = $this->db->query("SELECT * FROM sewa_jasa");
          $idsementara = $liatdata->num_rows() + 1;
          $id_sj = "J$idsementara";
          $id_sj = substr($id_sj, -8);
          ?>
          <input type="hidden" class="form-control" name="id_sj" value="<?php echo $id_sj; ?>" /><br><br>
          <center>
            <button type="submit" class="btn btn-primary py-3 px-5">Kirim</button>
          </center>
      </div>

    </div>


  </div>
</section>