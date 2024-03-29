<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Super Admin Dashboard</title>
    <link href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="<?php echo base_url(); ?>assets/admin/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="<?php echo base_url(); ?>assets/admin/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/pickadate/themes/default.date.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/admin/images/sma.png">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/chartist/css/chartist.min.css">
    <!-- Datatable -->
    <link href="<?php echo base_url(); ?>assets/admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?= base_url() ?>superadmin" class="brand-logo" widthh="80px">
                <img class="logo-abbr" src="<?= base_url() ?>assets/admin/images/sma.png" alt="">
                <!-- <img class="logo-compact" src="<?= base_url() ?>assets/admin/images/logo-text.png" alt="">
                <img class="brand-title" src="<?= base_url() ?>assets/admin/images/logo-text.png" alt=""> -->

            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>


        </div>

        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->

        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">

            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <?php $foto = $this->mymodel->getProfil(); ?>
                                    <img src="<?= base_url() ?>assets/upload/<?= $foto[0]['image'] ?>" class="img-fluid rounded-circle" width="20" alt="" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="<?= base_url() ?>superadmin/profil" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="<?= base_url() ?>login/logout" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <div class="ml-5">
                    <h3><?= $this->session->userdata('username') ?></h3>
                    <?php if ($this->session->userdata('level') == 1) {
                        echo "<p>Superadmin</p>";
                    } else {
                        echo "<p>Admin</p>";
                    } ?>

                </div>
                <ul class="metismenu" id="menu">
                    <li><a href="<?= base_url() ?>superadmin" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-layer-1"></i>
                            <span class="nav-text">MASTER DATA</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url() ?>superadmin/kategori">Kategori</a></li>
                            <li><a href="<?= base_url() ?>superadmin/data_admin">Data User</a></li>
                            <li><a href="<?= base_url() ?>superadmin/data_penyewa">Data Penyewa</a></li>
                            <li><a href="<?= base_url() ?>superadmin/getInventory">Data Inventori</a></li>
                        </ul>
                    </li>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-album-2"></i>
                            <span class="nav-text">SEWA</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url() ?>superadmin/getPemesanan">Pemesanan</a></li>
                            <li><a href="<?= base_url() ?>superadmin/getKonfpemesanan">Pesanan Dikonfirmasi</a></li>
                            <li><a href="<?= base_url() ?>superadmin/getPesananSelesai">Pesanan Selesai</a></li>
                            <li><a href="<?= base_url() ?>superadmin/getPesananDibatalkan">Pesanan Dibatalkan</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-notepad"></i>
                            <span class="nav-text">Laporan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url() ?>superadmin/getLaporan">Keuangan</a></li>
                            <li><a href="<?= base_url() ?>superadmin/getLapstock">Stock</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="copyright">
                    <p><strong>Super Admin Dashboard</strong> © 2022 All Rights Reserved</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->