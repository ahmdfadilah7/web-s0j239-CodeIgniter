<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Toko</h5>
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

            if ($toko->num_rows() == 0) {
        ?>

            <a href="<?= site_url('mua/toko/add') ?>" class="btn btn-primary"><i class="ti ti-plus"></i></a>
        <?php
            }
        ?>
        <div class="table-responsive mt-4">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Banner Toko</th>
                        <th>Deskripsi Toko</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($toko->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->nama_toko ?></td>
                            <td>
                                <img src="<?= base_url($row->banner_toko) ?>" width="70">
                            </td>
                            <td>
                                <?php 
                                    if (strlen($row->deskripsi_toko) > 70) {
                                        echo substr($row->deskripsi_toko, 0, 70);
                                    } else {
                                        echo $row->deskripsi_toko;
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?=base_url('mua/toko/edit/'.$row->id)?>" class="btn btn-primary btn-sm"><i class="ti ti-edit"></i></a>
                                <!-- <a href="<?=base_url('mua/toko/delete/'.$row->id)?>" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a> -->
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