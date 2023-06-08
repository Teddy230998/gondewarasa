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
              <a href="<?php echo site_url('home/bacaberita/' . $agenda->id_agenda) ?>" class="block-20" style="background-image: url('<?php echo base_url(); ?>user/agenda/<?php echo $agenda->foto_agenda ?>');">
              </a>
              <div class="text py-4 d-block">
                <div class="meta">
                  <div><a><span class="icon-calendar"> <?php echo $agenda->tgl_agenda ?> </span>| <?php echo $agenda->waktu_agenda ?> </a></div>
                  <div><a><?php echo $agenda->tempat_agenda ?></a></div>
                </div>
                <h3 class="heading mt-2"><a href="<?php echo base_url('home/bacaberita/' . $agenda->id_agenda); ?>" style="color: black"><?php echo $agenda->judul_agenda ?></a></h3>
                <p><?php echo $agenda->isi_agenda ?></p>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
  </section>