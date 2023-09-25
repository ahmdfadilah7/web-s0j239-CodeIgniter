<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="<?=base_url($setting->favicon_website)?>" type="image/x-icon">

    <title>
        <?= $setting->nama_website ?>
    </title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.css" />
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?=base_url()?>assets/css/responsive.css" rel="stylesheet" />
</head>

<body>
    
    <!-- Header -->
    <?php include('partials/header.php'); ?>
    <!-- End Header -->

    <!-- Content -->
    <?php $this->load->view($view); ?>
    <!-- End Content -->

    <!-- info section -->

    <section class="info_section  layout_padding2-top">
        <div class="social_container">
            <div class="social_box">
                <a href="<?= $setting->facebook ?>" target="_blank">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="<?= $setting->twitter ?>" target="_blank">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="<?= $setting->instagram ?>" target="_blank">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="<?= $setting->youtube ?>" target="_blank">
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="info_container ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 text-center">
                        <h6>
                            <?= $setting->nama_website ?>
                        </h6>

                        <?= $setting->alamat ?>

                    </div>                    
                    <div class="col-md-6 col-lg-6 text-center">
                        <h6>
                            CONTACT US
                        </h6>
                        <div class="info_link-box">
                            <div>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span><?= $setting->no_telp ?></span>
                            </div>
                            <div>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span><?= $setting->email ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer section -->
        <footer class=" footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="<?=base_url()?>"><?= $setting->nama_website ?></a>
                </p>
            </div>
        </footer>
        <!-- footer section -->

    </section>

    <!-- end info section -->

    <!-- Modal -->
    <div class="modal fade" id="addcartModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('cart/store') ?>" method="post">
                        <div class="form-group">
                            <label for="" class="form-label">Make Up Artist</label>
                            <input type="hidden" name="mua_id" id="muaId">
                            <input type="text" name="nama_mua" id="namaMua" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Package</label>
                            <input type="hidden" name="paket_id" id="paketId">
                            <input type="text" name="nama_paket" id="namaPaket" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Price (RP)</label>
                            <input type="text" name="harga_paket" id="hargaPaket" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Pembayaran</label>
                            <select name="rekening_id" class="form-control">
                                <option value=" ">- Pilih -</option>
                                <?php
                                    foreach ($rekening->result() as $row) {
                                ?>
                                    <option value="<?= $row->id ?>"><?= $row->bank.' - '.$row->nama_rekening.' - '.$row->no_rekening ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>                    
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="invoiceModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('cart/pembayaran') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="form-label">Invoice</label>
                            <input type="hidden" name="invoice_id" id="invoiceId">
                            <input type="text" name="kode_invoice" id="kodeInvoice" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Total (RP)</label>
                            <input type="text" name="total" id="total" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Upload Bukti Pembayaran</label>
                            <input type="file" name="bukti_pembayaran" class="form-control">
                        </div>                   
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script src="<?=base_url()?>assets/js/custom.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector( '#editor' ))
            .catch(error => {
                console.error( error );
            } );

        function get_order(id) {
            var url = "<?=base_url('getorder/')?>"+id
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#addcartModal').modal('show')
                    $('#muaId').val(data.mua_id)
                    $('#paketId').val(data.id)
                    $('#namaMua').val(data.nama)
                    $('#namaPaket').val(data.nama_paket)
                    $('#hargaPaket').val(data.harga_paket)
                }
            });
        }

        function get_invoice(id) {
            var url = "<?=base_url('getinvoice/')?>"+id
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#invoiceModal').modal('show')
                    $('#invoiceId').val(data.invoice_id)
                    $('#total').val(data.total)
                    $('#kodeInvoice').val(data.kode_invoice)
                }
            });
        }
    </script>
</body>

</html>