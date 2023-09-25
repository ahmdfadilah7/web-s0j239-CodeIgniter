<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Profile</h5>
        <?php
            if ($this->session->flashdata('berhasil')) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p><?= $this->session->flashdata('berhasil') ?></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            } elseif ($this->session->flashdata('gagal')) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p><?= $this->session->flashdata('gagal') ?></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            }
        ?>
        
        <div class="table-responsive mt-4">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Foto</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($mua->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->nama ?></td>
                            <td>
                                <img src="<?= base_url($row->foto) ?>" width="70">
                            </td>
                            <td><?= $row->email ?></td>
                            <td>
                                <?php 
                                    if (strlen($row->alamat) > 70) {
                                        echo substr($row->alamat, 0, 70);
                                    } else {
                                        echo $row->alamat;
                                    }
                                ?>
                            </td>
                            <td><?= $row->no_telp ?></td>
                            <td>
                                <?php 
                                    if ($row->jns_kelamin == '0') {
                                        echo 'Wanita';
                                    } else {
                                        echo 'Pria';
                                    }
                                ?>
                            </td>
                            <td><?= $row->username ?></td>
                            <td>
                                <a href="<?=base_url('mua/profile/edit/'.$row->id)?>" class="btn btn-primary btn-sm"><i class="ti ti-edit"></i></a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>