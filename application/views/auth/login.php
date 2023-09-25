<section class="login_section layout_padding-bottom layout_padding-top d-flex align-items-center justify-content-center">
    <div class="box w-50">
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
                    <form action="<?= base_url('authcontroller/proses_login') ?>" method="post" class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Login
                            </h2>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="btn-box">
                            <button type="submit" class="btn1">
                                Login
                            </button>
                            <a href="<?= base_url('register') ?>" class="btn2">
                                Register
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>