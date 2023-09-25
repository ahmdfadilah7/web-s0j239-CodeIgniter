<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Make Up Artist</h5>
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
        <form action="<?= base_url('mua/profile/update/'.$mua->id) ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?= $mua->nama ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $mua->email ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">No Telepon</label>
                        <input type="number" name="no_telp" class="form-control" value="<?= $mua->no_telp ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <select name="jns_kelamin" class="form-control">
                            <option value=" ">- Pilih -</option>
                            <option value="0" <?php if($mua->jns_kelamin=='0') { echo 'selected'; } ?>>Wanita</option>
                            <option value="1" <?php if($mua->jns_kelamin=='1') { echo 'selected'; } ?>>Pria</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control">
                        <img src="<?=base_url($mua->foto)?>" width="70" class="mt-2">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $mua->username ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                        <i class="text-danger">* Isi jika ingin mengganti password.</i>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="editor"><?= $mua->alamat ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('mua/profile') ?>" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>