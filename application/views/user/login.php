<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(<?php echo base_url(); ?>user/slider/12.jpg);" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="justify-content-center">
      <div class="col-md-12">
        <div class="col-lg-12 d-flex mb-sm-12 ftco-animate">
          <div class="staff">
            <h3 class="mb-12 text-center">Login</h3>
            <form action="<?php echo site_url('User_login/aksi_login') ?>" method="post" class="appointment-form">
              <div class="d-md-flex">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email" name="email">
                </div>
              </div>
              <div class="d-me-flex">
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
              </div>
              <div class="d-me-flex">
                <div class="form-group">
                  <p>Jika Belum Punya Akun, Silahkan <a href="#" data-toggle="modal" data-target="#logoutModal">Daftar</a></p>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary py-3 px-4">
              </div>
            </form>
          </div>
        </div>
</section>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: black">Daftar</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="background-color: black; color: white">
        <form action="<?php echo site_url('Home/daftar_action') ?>" method="post">
          <div class="form-group">
            <label for="varchar">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required />
          </div>
          <div class="form-group">
            <label for="varchar">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
          </div>
          <div class="form-group">
            <label for="varchar">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
          </div>
          <div class="form-group">
            <label for="varchar">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required></textarea>
          </div>
          <div class="form-group">
            <label for="varchar">No Hp</label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" required />
          </div>
          <?php
          $liatdata = $this->db->query("SELECT * FROM user");
          $idsementara = $liatdata->num_rows() + 1;
          $id_user = "$idsementara";
          $id_user = substr($id_user, -8);
          ?>
          <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" value="register" class="btn btn-primary">Daftar</button>
      </div>
    </div>
  </div>
</div>