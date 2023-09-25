<section class="contact_section layout_padding">
    <div class="container px-0">
        <div class="heading_container ">
            <h2 class="">
                Contact Us
            </h2>
        </div>
    </div>
    <div class="container container-bg">
        <div class="row">
            <div class="col-lg-7 col-md-6 px-0">
                <div class="map_container">
                    <div class="map-responsive">
                        <iframe
                            src="<?= $setting->google_map ?>"
                            width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <h3 class="m-3"><?= $setting->nama_website ?></h3>
                <div class="d-flex m-3">
                    <i class="fa fa-map-marker pr-3"></i>
                    <?= $setting->alamat ?>
                </div>
                <div class="d-flex m-3">
                    <i class="fa fa-envelope pr-3"></i>
                    <?= $setting->email ?>
                </div>
                <div class="d-flex m-3">
                    <i class="fa fa-phone pr-3"></i>
                    <span><?= $setting->no_telp ?></span>
                </div>
            </div>
        </div>
    </div>
</section>