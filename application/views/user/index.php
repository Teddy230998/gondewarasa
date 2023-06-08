    <section class="home-slider owl-carousel img" style="height: 50rem">

      <div class="slider-item" style="background-image: url(<?php echo base_url(); ?>user/slider/kuning.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <span class="subheading">Sangar Gondewarasa</span>
              <p class="mb-4 mb-md-5">Sanggar Tari Tradisional Sunda</p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(<?php echo base_url(); ?>user/slider/6.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-9 col-sm-15 text-center ftco-animate">
              <span class="subheading">Kelas Tari</span>
              <p class="mb-4 mb-md-5">lomba tari Gondewarasa</p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(<?php echo base_url(); ?>user/slider/8.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <span class="subheading">Oki Wulandari,S.sn</span>
              <p class="mb-4 mb-md-5">Pendiri Sanggar Gondewarasa</p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section" style="background-color: whitesmoke;">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4" style="color: black"><b>Berita</b></h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
          </div>
        </div>
        <div class="row d-flex">
          <?php
          $hasil3 = $this->db->query("SELECT * from agenda");
          foreach ($hasil3->result() as $agenda) {
          ?>
            <div class="col-md-4 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
                <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url(); ?>user/agenda/<?php echo $agenda->foto_agenda ?>');">
                </a>
                <div class="text py-4 d-block">
                  <div class="meta">
                    <div><a><span class="icon-calendar"> <?php echo $agenda->tgl_agenda ?></span> | <?php echo $agenda->waktu_agenda ?> </a></div>
                    <div><a><?php echo $agenda->tempat_agenda ?></a></div>
                  </div>
                  <h3 class="heading mt-2"><a href="<?php echo base_url(); ?>berita/" style="color: black"><?php echo $agenda->judul_agenda ?></a></h3>
                  <!-- <p><?php // echo $agenda->isi_agenda 
                          ?></p> -->
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <section class="ftco-gallery">
        <div class="container-wrap">
          <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
              <h2 class="mb-4" style="color: black"><b>Galeri Foto</b></h2>
              <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            </div>
          </div>
          <div class="row no-gutters">
            <?php
            $hasil = $this->db->query("SELECT * from foto");
            foreach ($hasil->result() as $foto) {
            ?>
              <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(<?php echo base_url(); ?>user/galeri/<?php echo $foto->foto_galeri; ?>);">
                  <div class="icon mb-4 d-flex align-items-center justify-content-center">
                    <span class="icon-search"></span>
                  </div>
                </a>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </section>
      <section class="ftco-gallery">
        <div class="container-wrap">
          <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
              <h2 class="mb-4" style="color: black"><b>Galeri Video</b></h2>
              <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            </div>
          </div>
          <div class="row no-gutters">
            <?php
            $hasil = $this->db->query("SELECT * from video");
            foreach ($hasil->result() as $video) {
            ?>
              <div class="col-md-3 ftco-animate">
                <iframe src="<?php echo $video->link_video ?>" frameborder="0" allowfullscreen></iframe>
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
    </section>