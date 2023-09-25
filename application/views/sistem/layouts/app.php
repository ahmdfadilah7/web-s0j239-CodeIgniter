<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $settings->nama_website ?></title>
    <?php    
        if ($settings->favicon_website <> '') {
    ?>
        <link rel="shortcut icon" type="image/png" href="<?= base_url($settings->favicon_website) ?>" />
    <?php
        }
    ?>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/sistem/css/styles.min.css'); ?>" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- END CSS -->
    <style>
        .text-right {
            text-align: right !important;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="<?= site_url('sistem/dashboardcontroller') ?>" class="text-nowrap logo-img">
                        <?php
                            if ($settings->logo_website <> '') {
                        ?>
                            <img src="<?= base_url($settings->logo_website) ?>" width="70" />
                        <?php
                            }
                        ?>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>

                <!-- Sidebar Navigasi -->
                <?php include('partials/sidebar.php') ?>
                <!-- Sidebar Navigasi -->

            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fs-4 fw-bold" style="margin-right: 10px">
                                        <?= $this->session->userdata('username') ?> 
                                    </span>
                                    <?php
                                        if ($this->session->userdata('foto') <> '') {
                                    ?>
                                        <img src="<?= base_url($this->session->userdata('foto')) ?>" width="35" height="35" class="rounded-circle">
                                    <?php
                                        } else {
                                    ?>
                                        <img src="<?= base_url('assets/images/user-1.jpg') ?>" width="35" height="35" class="rounded-circle">
                                    <?php
                                        }
                                    ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="<?= site_url('sistem/authcontroller/logout') ?>"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">

                <!-- Content -->
                <?php $this->load->view($view) ?>
                <!-- END Content -->

            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="<?= base_url('assets/sistem/libs/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/sistem/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/sistem/js/sidebarmenu.js') ?>"></script>
    <script src="<?= base_url('assets/sistem/js/app.min.js') ?>"></script>
    <script src="<?= base_url('assets/sistem/libs/apexcharts/dist/apexcharts.min.js') ?>"></script>
    <script src="<?= base_url('assets/sistem/libs/simplebar/dist/simplebar.js') ?>"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script src="<?= base_url('assets/sistem/js/dashboard.js') ?>"></script>
    <!-- Javascript -->
    <script>
        ClassicEditor
            .create(document.querySelector( '#editor' ))
            .catch(error => {
                console.error( error );
            } );
    </script>
</body>

</html>
