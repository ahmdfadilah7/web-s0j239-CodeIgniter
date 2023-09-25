<!-- slider section -->
<section class="slider_section">
    <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <?php
                    $no = 1;
                    foreach ($slider->result() as $row) {
                ?>
                <div class="carousel-item <?php if($no==1){ echo 'active'; }?>">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="detail-box">
                                    <h1>
                                        <?= $row->judul ?>
                                    </h1>
                                    
                                    <div class="text-justify">
                                        <?= $row->deskripsi ?>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-5 ">
                                <div class="img-box">
                                    <img src="<?=base_url($row->gambar)?>" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $no++;
                    }
                ?>
                
            </div>
            <div class="carousel_btn-box">
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <img src="<?=base_url()?>assets/images/line.png" alt="" />
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- end slider section -->

<!-- shop section -->
<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Make Up Artist
            </h2>
        </div>
        <div class="row">

            <?php
                foreach ($toko->result() as $row) {
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <a href="<?= base_url('mua/detail/'.str_replace(' ', '-', strtolower($row->nama)).'/'.str_replace(' ', '-', strtolower($row->nama_toko))) ?>">
                        <div class="img-box">
                            <img src="<?=base_url($row->banner_toko)?>" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                <?= $row->nama_toko ?>
                            </h6>
                            <h6>
                                <span>
                                    <?= $row->nama ?>
                                </span>
                            </h6>
                        </div>
                    </a>
                </div>
            </div>
            <?php
                }
            ?>
            
        </div>
        <div class="btn-box">
            <a href="<?= base_url('mua') ?>">
                View All Products
            </a>
        </div>
    </div>
</section>
<!-- end shop section -->

<!-- gift section -->
<section class="saving_section layout_padding-bottom">
    <div class="box ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="img_container">
                        <div class="img-box">
                            <img src="<?=base_url($about->gambar)?>" alt="">
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
                        <p>
                            <?= substr($about->deskripsi, 3, 150) ?>...
                        </p>
                        <div class="btn-box">
                            <a href="<?= base_url('about') ?>" class="btn1">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end gift section -->
