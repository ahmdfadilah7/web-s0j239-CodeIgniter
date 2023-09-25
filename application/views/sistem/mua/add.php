<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Tambah Make Up Artist</h5>
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
        <form action="<?= base_url('sistem/mua/store') ?>" method="post" enctype="multipart/form-data">
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
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
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
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="editor" ></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('sistem/mua') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>