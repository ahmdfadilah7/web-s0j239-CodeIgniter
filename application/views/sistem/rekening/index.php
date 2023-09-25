<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Rekening</h5>
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

        <a href="<?= site_url('sistem/rekening/add') ?>" class="btn btn-primary"><i class="ti ti-plus"></i></a>
        <div class="table-responsive mt-4">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Rekening</th>
                        <th>No Rekening</th>
                        <th>Bank</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($rekening->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->nama_rekening ?></td>
                            <td><?= $row->no_rekening ?></td>
                            <td><?= $row->bank ?></td>
                            <td>
                                <a href="<?=base_url('sistem/rekening/edit/'.$row->id)?>" class="btn btn-primary btn-sm"><i class="ti ti-edit"></i></a>
                                <a href="<?=base_url('sistem/rekening/delete/'.$row->id)?>" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
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