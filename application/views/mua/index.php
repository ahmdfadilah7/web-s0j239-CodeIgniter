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
        <div class="mt-3">
            <?= $this->pagination->create_links() ?>
        </div>
    </div>
</section>
<!-- end shop section -->