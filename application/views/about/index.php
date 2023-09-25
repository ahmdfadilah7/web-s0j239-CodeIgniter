<section class="saving_section layout_padding-bottom layout_padding-top">
    <div class="box ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="img_container">
                        <div class="img-box">
                            <img src="<?= base_url($about->gambar) ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                <?= $about->judul ?>
                            </h2>
                        </div>
                        
                        <?= $about->deskripsi ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>