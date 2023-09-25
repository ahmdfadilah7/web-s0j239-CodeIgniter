<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Administrator</h5>
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
                        <th>Username</th>
                        <th>Foto</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($admin->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->username ?></td>
                            <td>
                                <img src="<?= base_url($row->foto) ?>" width="70">
                            </td>
                            <td>
                                <?= $row->level ?>
                            </td>
                            <td>
                                <a href="<?=base_url('sistem/admin/edit/'.$row->id)?>" class="btn btn-primary btn-sm"><i class="ti ti-edit"></i></a>
                                <?php
                                    if ($this->session->userdata('level') == 'Superadmin') {
                                        if ($this->session->userdata('id_user') <> $row->id) {
                                ?>
                                    <a href="<?=base_url('sistem/admin/delete/'.$row->id)?>" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
                                <?php
                                        }
                                    }
                                ?>
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