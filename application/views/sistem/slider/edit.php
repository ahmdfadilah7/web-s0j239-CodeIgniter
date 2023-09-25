<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Tambah Slider</h5>
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
        <form action="<?= base_url('sistem/slider/update/'.$slider->id) ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="<?= $slider->judul ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                        <img src="<?= base_url($slider->gambar) ?>" width="70" class="mt-2">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="editor" class="form-control"><?= $slider->deskripsi ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('sistem/slider') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>