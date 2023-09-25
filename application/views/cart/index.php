<section class="cart_section">
    <div class="cart_container">
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

                <h2>Keranjang</h2>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Make Up Artist</th>
                                <th>Bank</th>
                                <th>Packages</th>
                                <th>Status</th>
                                <th>Price (RP)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $total = array();
                                $invoice_id = '';
                                foreach ($paket->result() as $row) {
                                    $total[] = $row->harga_paket;
                                    $invoice_id = $row->id;
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_invoice ?></td>
                                    <td><?= $row->nama_mua ?></td>
                                    <td><?= $row->bank.' - '.$row->no_rekening.' - '.$row->nama_rekening ?></td>
                                    <td><?= $row->nama_paket ?></td>
                                    <td>
                                        <?php
                                            if ($row->status == '0') {
                                        ?>
                                            <span class="badge badge-warning">Belum dibayar</span>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td>Rp<?=  number_format($row->harga_paket, 0, ',', '.') ?></td>
                                </tr>
                            <?php
                                $no++;
                                }
                            ?>
                            <tr>
                                <td colspan="6" class="text-center"><b>Total</b></td>
                                <td><b>Rp<?= number_format(array_sum($total), 0, ',', '.') ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <a onclick="get_invoice(<?= $invoice_id ?>)" class="btn btn-primary">Bayar</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>Order</h2>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Bank</th>
                                <th>Make Up Artist</th>
                                <th>Packages</th>
                                <th>Price (RP)</th>
                                <th>Total (RP)</th>
                                <th>Status</th>
                                <th>Tanggal Acara</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $total = array();
                                foreach ($invoice->result() as $row) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_invoice ?></td>
                                    <td><?= $row->bank.' - '.$row->no_rekening.' - '.$row->nama_rekening ?></td>
                                    <td>
                                        <?php
                                            $transaksi = $this->db->query(
                                                "SELECT
                                                    mua.nama, 
                                                    paket.nama_paket, 
                                                    paket.harga_paket 
                                                    FROM transaksi 
                                                    INNER JOIN paket ON transaksi.paket_id=paket.id 
                                                    INNER JOIN mua ON paket.mua_id=mua.id 
                                                    WHERE transaksi.invoice_id = '$row->id'
                                                ");
                                            foreach ($transaksi->result() as $value) {
                                                echo $value->nama.'<br>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            foreach ($transaksi->result() as $value) {
                                                echo $value->nama_paket.'<br>';
                                            }
                                        ?>    
                                    </td>                                    
                                    <td>
                                        <?php
                                            $total = array();
                                            foreach ($transaksi->result() as $value) {
                                                $total[] = $value->harga_paket;
                                                echo 'Rp'.number_format($value->harga_paket, 0, ',', '.').'<br>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        Rp<?= number_format(array_sum($total), 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($row->status == '1') {
                                        ?>
                                            <span class="badge badge-primary">Menunggu Konfirmasi</span>
                                        <?php
                                            } elseif ($row->status == '2') {
                                        ?>
                                            <span class="badge badge-info">Sudah dibayar</span>
                                        <?php
                                            } elseif ($row->status == '3') {
                                        ?>
                                            <span class="badge badge-success">Selesai</span>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if ($row->tgl_acara <> null) {
                                                echo date('d M Y', strtotime($row->tgl_acara)); 
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

    </div>
</section>