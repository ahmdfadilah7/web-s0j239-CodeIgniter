<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Tambah Paket</h5>
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
        <form action="<?= base_url('mua/paket/store') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Gambar Paket</label>
                        <input type="file" name="gambar_paket" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Harga Paket (RP)</label>
                        <input type="number" name="harga_paket" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Deskripsi Paket</label>
                        <textarea name="deskripsi_paket" id="editor" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('mua/paket') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>