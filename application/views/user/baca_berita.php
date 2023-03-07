<section class="ftco-section ftco-degree-bg"style="background-color: whitesmoke;">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-12" style="color: black"><?php echo $judul_agenda ?></h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <a><span class="icon-calendar"> <?php echo $tgl_agenda ?> </span>| <?php echo $waktu_agenda ?> </a> <a><?php echo $tempat_agenda ?></a>
          </div>
          <div class="col-md-12 ftco-animate">
          <p align="center">
              <img width="700" src="<?php echo base_url(); ?>user/agenda/<?php echo $foto_agenda?>" alt="" class="img-fluid">
            </p>
            <p><?php echo $isi_agenda ?></p>
      </div>
        </div>
    </section> <!-- .section -->