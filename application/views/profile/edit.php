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
                    <form action="<?= base_url('profile/update') ?>" method="POST" class="detail-box" enctype="multipart/form-data">
                        <div class="heading_container">
                            <h2>
                                Edit Profile
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $profile->nama ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= $profile->email ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="" class="form-label">No Telepon</label>
                                    <input type="number" name="no_telp" class="form-control" value="<?= $profile->no_telp ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Jenis Kelamin</label>
                                    <select name="jns_kelamin" class="form-control">
                                        <option value=" ">- Pilih -</option>
                                        <option value="0" <?php if($profile->jns_kelamin=='0') { echo 'selected'; } ?>>Wanita</option>
                                        <option value="1" <?php if($profile->jns_kelamin=='1') { echo 'selected'; } ?>>Pria</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Foto</label>
                                    <input type="file" name="foto" class="form-control">
                                    <img src="<?=base_url($profile->foto)?>" width="70" class="mt-2">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="editor" class="form-control"><?= $profile->alamat ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" value="<?= $profile->username ?>">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                    <i class="text-danger">* Isi jika ingin mengganti password.</i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-box">
                                    <button type="submit" class="btn1">
                                        Simpan
                                    </button>
                                    <a href="<?= base_url('profile') ?>" class="btn2">
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>