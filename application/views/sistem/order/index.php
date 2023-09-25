<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Daftar Order</h5>
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
                        <th>Kode Invoice</th>
                        <th>Nama Pelanggan</th>
                        <th>No Telp/WA</th>
                        <th>Pembayaran</th>
                        <th>Paket</th>
                        <th>Total (RP)</th>
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($invoice->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->kode_invoice ?></td>
                            <td><?= $row->nama ?></td>
                            <td>
                                <a href="https://wa.me/<?= $row->no_telp ?>" target="_blank"><?= $row->no_telp ?></a>    
                            </td>
                            <td><?= $row->bank.' - '.$row->nama_rekening.' - '.$row->no_rekening ?></td>
                            <td>
                                <?php
                                    $invoice_id = $row->id;
                                    $transaksi = $this->db->query(
                                        "SELECT
                                            transaksi.*,
                                            paket.nama_paket,
                                            paket.harga_paket
                                        FROM transaksi
                                        INNER JOIN paket ON transaksi.paket_id=paket.id
                                        WHERE transaksi.invoice_id = '$invoice_id'
                                        "
                                    );
                                    $total = array();
                                    foreach ($transaksi->result() as $value) {
                                        $total[] = $value->harga_paket;
                                        echo $value->nama_paket.'<br>';
                                    }
                                ?>
                            </td>
                            <td>Rp<?= number_format(array_sum($total), 0, ',', '.') ?></td>
                            <td>
                                <?php
                                    if ($row->status=='0') {
                                ?>
                                    <span class="badge bg-warning">Belum dibayar</span>
                                <?php
                                    } elseif ($row->status=='1') {
                                ?>
                                    <span class="badge bg-primary">Menunggu konfirmasi Pembayaran</span>
                                <?php
                                    } elseif ($row->status=='2') {
                                ?>
                                    <span class="badge bg-info">Sudah dibayar</span>
                                <?php
                                    } elseif ($row->status=='3') {
                                ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php
                                    } elseif ($row->status=='4') {
                                ?>
                                    <span class="badge bg-danger">Dibatalkan</span>
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    $bukti_pembayaran = $this->M_data->selectDataWhere('*', 'pembayaran', 'invoice_id', $row->id);
                                    if ($bukti_pembayaran->num_rows() > 0) {
                                ?>
                                <a href="<?= base_url($bukti_pembayaran->row()->bukti_pembayaran) ?>" target="_blank">
                                    <img src="<?= base_url($bukti_pembayaran->row()->bukti_pembayaran) ?>" width="70">
                                </a>
                                <?php
                                    } else {
                                        echo '<i>Tidak ada bukti pembayaran</i>';
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    if ($row->status == '1') {
                                ?>
                                    <a href="<?= base_url('sistem/order/konfirmasi/'.$row->kode_invoice) ?>" class="btn btn-primary btn-sm" title="konfirmasi"><i class="ti ti-check"></i></a>
                                <?php
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