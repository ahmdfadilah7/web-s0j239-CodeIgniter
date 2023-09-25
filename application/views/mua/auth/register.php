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
                                <h2 class="text-center">Register Make Up Artist</h2>
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
                                <form action="<?= base_url('mua/proses_register') ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="nama" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">No Telepon</label>
                                                <input type="number" name="no_telp" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Jenis Kelamin</label>
                                                <select name="jns_kelamin" class="form-control">
                                                    <option value=" ">- Pilih -</option>
                                                    <option value="0">Wanita</option>
                                                    <option value="1">Pria</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Foto</label>
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-4">
                                                <label for="" class="form-label">Alamat</label>
                                                <textarea name="alamat" id="editor" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                        Register
                                    </button>
                                    <a href="<?=base_url('mua/login')?>" class="btn btn-outline-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                        Sign in
                                    </a>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector( '#editor' ))
            .catch(error => {
                console.error( error );
            } );
    </script>
</body>

</html>
