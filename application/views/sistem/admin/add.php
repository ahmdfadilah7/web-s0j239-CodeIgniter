<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Tambah Administrator</h5>
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
        <form action="<?= base_url('sistem/admin/store') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Level</label>
                        <input type="text" name="level" class="form-control" value="Administrator" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('sistem/admin') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>