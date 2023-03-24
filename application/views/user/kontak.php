
    <section class="ftco-appointment"style="background-color: whitesmoke;">
			<div class="overlay"></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-6 d-flex align-self-stretch">
    				<img src="<?= base_url()?>user/logo/sanggar.jpg" alt="">
    			</div>
	    		<div class="col-md-6 appointment ftco-animate">
                <div class="col-md-12 mb-4">
	              <h2 class="h4" style="color: black"><b>Kontak</b></h2>
				</div>
				<?php
				$kontak_data = $this->db->query("SELECT * from kontak");
				foreach ($kontak_data->result() as $kontak)
				{ ?>
	            <div class="col-md-12 mb-3">
	              <p><span>Address:</span> <?php echo $kontak->alamat_kontak; ?> </p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Phone:</span> <?php echo $kontak->telepon_kontak; ?> </a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email:</span> <?php echo $kontak->email_kontak; ?> </a></p>
				</div>
				<?php }?>
    		</div>
    	</div>
    </section>