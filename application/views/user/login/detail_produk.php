<section class="ftco-about d-md-flex">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <br>
                <h2 class="mb-4">Detail Produk</h2>
                <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>

            </div>
        </div>
        <div class="row">
            <div class="one-half img" style="background-image: url(<?php echo base_url(); ?>user/produk_dan_jasa/<?php echo $foto ?>);"></div>

            <div class="one-half ftco-animate">
                <div class="heading-section ftco-animate ">
                    <h2 class="mb-4"> <?php echo $judul; ?> </h2>
                </div>
                <div>
                    <p><?php echo $deskripsi; ?></p>
                    <p class="price"><span style="color: yellow"><?php echo 'Rp. ' . number_format($harga) ?></span></p>
                    <p><a href="<?php echo site_url('user_login/form_produk/' . $id_produk) ?>" class="btn btn-white btn-outline-white">Sewa</a></p>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>