<section class="ftco-about d-md-flex" style="background-color: whitesmoke;">
<?php
      $profil_data = $this->db->query("SELECT * from profil");
      foreach ($profil_data->result() as $profil)
      { ?>
    	<div class="one-half img">
        <img src="<?= base_url()?>user/logo/sanggar.jpg" alt="">
      </div>
      
      <div class="one-half ftco-animate">
        <div class="heading-section ftco-animate ">
          <h2 class="mb-4" style="color: black"><b> <?php echo $profil->judul; ?></b> </h2>
        </div>
        <div>
  				<p><?php echo $profil->isi_profil; ?></p>
  			</div>
      </div>
      <?php }?>
    </section>
