<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Toko</h5>
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
        <form action="<?= base_url('mua/toko/update/'.$toko->id) ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Toko</label>
                        <input type="text" name="nama_toko" class="form-control" value="<?= $toko->nama_toko ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Banner Toko</label>
                        <input type="file" name="banner_toko" class="form-control">
                        <img src="<?= base_url($toko->banner_toko) ?>" width="70" class="mt-2">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Deskripsi Toko</label>
                        <textarea name="deskripsi_toko" id="editor" class="form-control"><?= $toko->deskripsi_toko ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= site_url('mua/toko') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>