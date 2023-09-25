<section class="saving_section layout_padding-bottom layout_padding-top">
    <div class="box ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if ($this->session->flashdata('berhasil')) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p><?= $this->session->flashdata('berhasil') ?></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                        } elseif ($this->session->flashdata('gagal')) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p><?= $this->session->flashdata('gagal') ?></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="col-md-5">
                    <div class="img_container">
                        <div class="img-box">
                            <img src="<?= base_url($profile->foto) ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                <?= $profile->nama ?>
                            </h2>
                        </div>
                        
                        <p><?= $profile->username ?></p>
                        <p><?= $profile->email ?></p>
                        <p><?= $profile->no_telp ?></p>
                        <p>
                            <?php 
                                if ($profile->jns_kelamin == '0') {
                                    echo 'Wanita';
                                } else {
                                    echo 'Pria';
                                }
                            ?>
                        </p>
                        <?= $profile->alamat ?>
                        <div class="btn-box">
                            <a href="<?= base_url('profile/edit') ?>" class="btn1">Edit Profile</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>