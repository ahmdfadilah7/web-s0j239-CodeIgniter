<section class="saving_section layout_padding">
    <div class="box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="img-box">
                        <img src="<?= base_url($paket->gambar_paket) ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                <?= $paket->nama_paket ?>
                            </h2>
                            <h6>
                                Rp<?= number_format($paket->harga_paket, 0, ',', '.') ?>
                            </h6>
                        </div>
                        
                        <?= $paket->deskripsi_paket ?>

                        <div class="btn-box">
                            <a onclick="get_order(<?= $paket->id ?>)" class="btn1">
                                Order
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- shop section -->
<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Other Packages
            </h2>
        </div>
        <div class="row">

            <?php
                foreach ($paketothers->result() as $row) {
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <a href="<?= base_url('mua/paket/detail/'.str_replace(' ', '-', strtolower($row->nama)).'/'.str_replace(' ', '-', strtolower($row->nama_paket))) ?>">
                        <div class="img-box">
                            <img src="<?=base_url($row->gambar_paket)?>" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                <?= $row->nama_paket ?>
                            </h6>
                            <h6>
                                <span>
                                    Rp<?= number_format($row->harga_paket, 0, ',', '.') ?>
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
    </div>
</section>
<!-- end shop section -->