<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">About Us</h5>
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

            if ($about->num_rows() == 0) {
        ?>
            <a href="<?= site_url('sistem/about/add') ?>" class="btn btn-primary"><i class="ti ti-plus"></i></a>
        <?php
            }
        ?>

        <div class="table-responsive mt-4">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($about->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->judul ?></td>
                            <td>
                                <img src="<?= base_url($row->gambar) ?>" width="70">
                            </td>
                            <td>
                                <?php 
                                    if (strlen($row->deskripsi) > 70) {
                                        echo substr($row->deskripsi, 0, 70);
                                    } else {
                                        echo $row->deskripsi;
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?=base_url('sistem/about/edit/'.$row->id)?>" class="btn btn-primary btn-sm"><i class="ti ti-edit"></i></a>
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