<!DOCTYPE html>
<html lang="en">

<!-- tanajil/gridproducts_bannerslider.html  21 Nov 2019 03:34:59 GMT -->

<head>
    <title>SMAN 1 BARAT -Peminjaman Ruang dan Barang</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/admin/images/sma.png" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightbox.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.scrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mobile-menu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link href="<?= base_url(); ?>assets/admin/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="productsgrid-page">
    <header class="header style7">
        <div class="container">
            <div class="main-header">
                <div class="row">
                    <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                        <div class="logo">
                            <a href="index-2.html">
                                <img src="<?php echo base_url(); ?>assets/images/sma.png" alt="img" style="height: 80px, width:80%">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                        <div class="block-search-block">
                            <form class="form-search form-search-width-category">
                                <div class="form-content">
                                    <div class="category">
                                        <select title="cate" data-placeholder="All Categories" class="chosen-select" tabindex="1">
                                            <option value="United States">Accessories</option>
                                            <option value="United Kingdom">Interior</option>
                                            <option value="Afghanistan">Performance</option>
                                            <option value="Aland Islands">Sofas</option>
                                            <option value="Albania">New Arrivals</option>
                                            <option value="Algeria">Storage</option>
                                        </select>
                                    </div>
                                    <div class="inner">
                                        <input type="text" class="input" name="s" value="" placeholder="Search here">
                                    </div>
                                    <button class="btn-search" type="submit">
                                        <span class="icon-search"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                        <div class="header-control">

                            <div class="block-account block-header tanajil-dropdown">
                                <a href="javascript:void(0);" data-tanajil="tanajil-dropdown">
                                    <span class="flaticon-user"></span>
                                </a>
                                <div class="header-account tanajil-submenu">
                                    <div class="header-user-form-tabs">
                                        <ul class="tab-link">
                                            <li class="active">
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">Login</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">Register</a>
                                            </li>
                                        </ul>
                                        <div class="tab-container">
                                            <div id="header-tab-login" class="tab-panel active">
                                                <form method="post" class="login form-login">
                                                    <p class="form-row form-row-wide">
                                                        <input type="email" placeholder="Email" class="input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" class="input-text" placeholder="Password">
                                                    </p>
                                                    <p class="form-row">
                                                        <label class="form-checkbox">
                                                            <input type="checkbox" class="input-checkbox">
                                                            <span>
                                                                Remember me
                                                            </span>
                                                        </label>
                                                        <input type="submit" class="button" value="Login">
                                                    </p>
                                                    <p class="lost_password">
                                                        <a href="#">Lost your password?</a>
                                                    </p>
                                                </form>
                                            </div>
                                            <div id="header-tab-rigister" class="tab-panel">
                                                <form method="post" class="register form-register">
                                                    <p class="form-row form-row-wide">
                                                        <input type="email" placeholder="Email" class="input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" class="input-text" placeholder="Password">
                                                    </p>
                                                    <p class="form-row">
                                                        <input type="submit" class="button" value="Register">
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="menu-bar mobile-navigation menu-toggle" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav-container">
            <div class="container">
                <div class="header-nav-wapper main-menu-wapper">
                    <div class="vertical-wapper block-nav-categori">
                        <div class="block-title">
                            <span class="icon-bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="text">Home</span>
                        </div>
                        <div class="block-content verticalmenu-content">
                            <ul class="tanajil-nav-vertical vertical-menu tanajil-clone-mobile-menu">
                                <li class="menu-item">
                                    <a href="<?= base_url() ?>Home/ruang" class="tanajil-menu-item-title" title="Ruang">Ruang</a>
                                </li>
                                <li class="menu-item">
                                    <a title="Barang" href="<?= base_url() ?>Home/barang" class="tanajil-menu-item-title">Barang</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="header-nav">
                        <div class="container-wapper">
                            <ul class="tanajil-clone-mobile-menu tanajil-nav main-menu " id="menu-main-menu">

                                <li class="menu-item">
                                    <a href="about.html" class="tanajil-menu-item-title" title="About">Tentang Kami</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="header-device-mobile">
        <div class="wapper">
            <div class="item mobile-logo">
                <div class="logo">
                    <a href="#">
                        <img src="<?php echo base_url(); ?>assets/images/rent.png" alt="img">
                    </a>
                </div>
            </div>
            <div class="item item mobile-search-box has-sub">
                <a href="#">
                    <span class="icon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                </a>
                <div class="block-sub">
                    <a href="#" class="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div class="header-searchform-box">
                        <form class="header-searchform">
                            <div class="searchform-wrap">
                                <input type="text" class="search-input" placeholder="Enter keywords to search...">
                                <input type="submit" class="submit button" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item mobile-settings-box has-sub">
                <a href="#">
                    <span class="icon">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </span>
                </a>
                <div class="block-sub">
                    <a href="#" class="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div class="block-sub-item">
                        <h5 class="block-item-title">Currency</h5>
                        <form class="currency-form tanajil-language">
                            <ul class="tanajil-language-wrap">
                                <li class="active">
                                    <a href="#">
                                        <span>
                                            English (USD)
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>
                                            French (EUR)
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>
                                            Japanese (JPY)
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item menu-bar">
                <a class=" mobile-navigation  menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </div>
    </div>