<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $settings->nama_website ?></title>
    <link rel="shortcut icon" type="image/png" href="<?=base_url($settings->favicon_website)?>" />
    <link rel="stylesheet" href="<?= base_url('assets/sistem/css/styles.min.css') ?>" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h2 class="text-center">Login</h2>
                                <?php if ($this->session->flashdata('berhasil')) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <p><?= $this->session->flashdata('berhasil') ?></p>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } elseif ($this->session->flashdata('gagal')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <p><?= $this->session->flashdata('gagal') ?></p>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <form action="<?= base_url('sistem/authcontroller/proses_login') ?>" method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                        Sign In
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/sistem/libs/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/sistem/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>
