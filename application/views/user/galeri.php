<section class="ftco-gallery" style="background-color: whitesmoke;">
    	<div class="container-wrap">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4"style="color: black"><b>Galeri Foto</b></h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
          </div>
        </div>
    		<div class="row no-gutters">
			<?php
				$hasil= $this->db->query("SELECT * from foto");
				foreach($hasil->result() as $foto){
				?>
							<div class="col-md-3 ftco-animate">
								<a href="" class="gallery img d-flex align-items-center" style="background-image: url(<?php echo base_url(); ?>user/galeri/<?php echo $foto->foto_galeri; ?>);">
									<div class=" mb-4 d-flex align-items-center justify-content-center">
									<!-- <span class="icon-search"></span> -->
								</div>
								</a>
							</div>
							<?php 
					} 
				?>
					
                </div>
            </div>
    </section>
    <section class="ftco-gallery" style="background-color: whitesmoke;">
    	<div class="container-wrap">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4"style="color: black"><b>Galeri Video</b></h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
          </div>
        </div>
    		<div class="row no-gutters">
			<?php
					$hasil= $this->db->query("SELECT * from video");
					foreach($hasil->result() as $video){
					?>
								<div class="col-md-3 ftco-animate">
					<iframe src="<?php echo $video->link_video?>" frameborder="0" allowfullscreen></iframe>
									<!-- <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(<?php echo base_url(); ?>user/galeri/<?php echo $foto->foto_galeri; ?>);"> -->
										<!-- <div class="icon mb-4 d-flex align-items-center justify-content-center">
										<span class="icon-search"></span>
						</div> -->
									</a>
								</div>
								<?php 
						} 
					?>
					
                </div>
            </div>
    </section>