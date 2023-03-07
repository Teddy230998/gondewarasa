<section class="ftco-section" style="background-color: whitesmoke;">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4"style="color: black"><b>Jasa</b></h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            
          </div>
        </div>
    		<div class="row">
			<?php
					$hasil= $this->db->query("SELECT * from jasa");
					foreach($hasil->result() as $jasa){
					?>
    			<div class="col-md-3 text-center ftco-animate">
      			<div class="menu-wrap">
      				<a href="#" class="menu-img img mb-4" style="background-image: url(<?php echo base_url(); ?>user/produk_dan_jasa/<?php echo $jasa->foto_jasa; ?>);"></a>
      				<div class="text">
      					<h3><a href="#"style="color: black"><?php echo $jasa->nama;?></a></h3>
      					<p><?php echo $jasa->deskripsi;?></p>
      					<p class="price"><span><?php echo 'Rp. '.number_format($jasa->harga)?></span></p>
      					<p><a href="<?php echo site_url() ?>login" class="btn btn-white btn-outline-black"style="color: gray">Sewa</a></p>
      				</div>
      			</div>
      		</div>
      		<?php 
					} 
		?>
    		</div>
    	</div>
    </section>
