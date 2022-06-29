<body class="inblog-page">
    <div class="header-device-mobile">
        <div class="wapper">
            <div class="item mobile-logo">
                <div class="logo">
                    <a href="#">
                        <img src="assets/images/logo.png" alt="img">
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

    <style>
        .nav-pills>li.active>a,
        .nav-pills>li.active>a:focus,
        .nav-pills>li.active>a:hover {

            background-color: #bf1b1b !important;
        }
    </style>
    <div class="site-content">
        <main class="site-main  main-container no-sidebar">
            <div class="container">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="#">
                                <span>
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="trail-item trail-end active">
                            <span>
                                Transaksi
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="main-content-cart main-content col-sm-12">
                        <div class="shop-top-control">
                            <ul class="select-form nav nav-pills nav-justified">
                                <li class="nav-link active"><a data-toggle="tab" href="#menu">Belum Dibayar</a></li>
                                <li class="nav-link"><a data-toggle="tab" href="#home">Pemesanan</a></li>
                                <li class="nav-link"><a data-toggle="tab" href="#menu1">Konfirmasi</a></li>
                                <li class="nav-link"><a data-toggle="tab" href="#menu2">Selesai</a></li>
                                <li class="nav-link"><a data-toggle="tab" href="#menu3">Dibatalkan</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="menu" class="tab-pane fade in active">
                                <div class="page-main-content">
                                    <h3 class="custom_blog_title">
                                        asdf
                                    </h3>
                                    <div class="shoppingcart-content">
                                        <form action="http://tuongnam.com.vn/tanajil/shoppingcart.html" class="cart-form">
                                            <table class="shop_table">
                                                <thead>
                                                    <tr>
                                                        <th class="product-remove"></th>
                                                        <th class="product-thumbnail"></th>
                                                        <th class="product-name"></th>
                                                        <th class="product-price"></th>
                                                        <th class="product-quantity"></th>
                                                        <th class="product-subtotal"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($pesan as $item) {

                                                    ?>
                                                        <tr class="cart_item">
                                                            <td class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="<?= base_url() ?>assets/upload/<?= $item['image'] ?>" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                                </a>
                                                            </td>
                                                            <td class="product-name" data-title="Product">
                                                                <a href="<?= base_url() ?>home/detail?vhid=<?= $item['id_inventory'] ?>" class="title"><?= $item['nama_inventory'] ?></a>
                                                                <!-- <span class="attributes-select attributes-color">Black,</span>
                                                        <span class="attributes-select attributes-size">XXL</span> -->
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <a class="text-danger">Qty </a> : <?= $item['jumlah'] ?>
                                                                </span>
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <?= $this->format_rupiah->format($item['sub_total']) ?>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </form>
                                        <div class="control-cart">
                                            <button class="button btn-continue-shopping">
                                                Continue Shopping
                                            </button>
                                            <button class="button btn-cart-to-checkout">
                                                Checkout
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="home" class="tab-pane fade">
                                <div class="page-main-content">
                                    <h3 class="custom_blog_title">
                                        asdf
                                    </h3>
                                    <div class="shoppingcart-content">
                                        <form action="http://tuongnam.com.vn/tanajil/shoppingcart.html" class="cart-form">
                                            <table class="shop_table">
                                                <thead>
                                                    <tr>
                                                        <th class="product-remove"></th>
                                                        <th class="product-thumbnail"></th>
                                                        <th class="product-name"></th>
                                                        <th class="product-price"></th>
                                                        <th class="product-quantity"></th>
                                                        <th class="product-subtotal"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($pesan as $item) {

                                                    ?>
                                                        <tr class="cart_item">
                                                            <td class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="<?= base_url() ?>assets/upload/<?= $item['image'] ?>" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                                </a>
                                                            </td>
                                                            <td class="product-name" data-title="Product">
                                                                <a href="<?= base_url() ?>home/detail?vhid=<?= $item['id_inventory'] ?>" class="title"><?= $item['nama_inventory'] ?></a>
                                                                <!-- <span class="attributes-select attributes-color">Black,</span>
                                                        <span class="attributes-select attributes-size">XXL</span> -->
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <a class="text-danger">Qty </a> : <?= $item['jumlah'] ?>
                                                                </span>
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <?= $this->format_rupiah->format($item['sub_total']) ?>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </form>
                                        <div class="control-cart">
                                            <button class="button btn-continue-shopping">
                                                Continue Shopping
                                            </button>
                                            <button class="button btn-cart-to-checkout">
                                                Checkout
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="menu1" class="tab-pane fade">
                                <div class="page-main-content">
                                    <h3 class="custom_blog_title">
                                        1232453
                                    </h3>
                                    <div class="shoppingcart-content">
                                        <form action="http://tuongnam.com.vn/tanajil/shoppingcart.html" class="cart-form">
                                            <table class="shop_table">
                                                <thead>
                                                    <tr>
                                                        <th class="product-remove"></th>
                                                        <th class="product-thumbnail"></th>
                                                        <th class="product-name"></th>
                                                        <th class="product-price"></th>
                                                        <th class="product-quantity"></th>
                                                        <th class="product-subtotal"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($proses as $item) {

                                                    ?>
                                                        <tr class="cart_item">
                                                            <td class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="<?= base_url() ?>assets/upload/<?= $item['image'] ?>" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                                </a>
                                                            </td>
                                                            <td class="product-name" data-title="Product">
                                                                <a href="<?= base_url() ?>home/detail?vhid=<?= $item['id_inventory'] ?>" class="title"><?= $item['nama_inventory'] ?></a>
                                                                <!-- <span class="attributes-select attributes-color">Black,</span>
                                                        <span class="attributes-select attributes-size">XXL</span> -->
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <a class="text-danger">Qty </a> : <?= $item['jumlah'] ?>
                                                                </span>
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <?= $this->format_rupiah->format($item['sub_total']) ?>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </form>
                                        <div class="control-cart">
                                            <button class="button btn-continue-shopping">
                                                Continue Shopping
                                            </button>
                                            <button class="button btn-cart-to-checkout">
                                                Checkout
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3 class="custom_blog_title">
                                    edcvgtyhn
                                </h3>
                                <div class="page-main-content">
                                    <div class="shoppingcart-content">
                                        <form action="http://tuongnam.com.vn/tanajil/shoppingcart.html" class="cart-form">
                                            <table class="shop_table">
                                                <thead>
                                                    <tr>
                                                        <th class="product-remove"></th>
                                                        <th class="product-thumbnail"></th>
                                                        <th class="product-name"></th>
                                                        <th class="product-price"></th>
                                                        <th class="product-quantity"></th>
                                                        <th class="product-subtotal"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($batal as $item) {

                                                    ?>
                                                        <tr class="cart_item">
                                                            <td class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="<?= base_url() ?>assets/upload/<?= $item['image'] ?>" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                                </a>
                                                            </td>
                                                            <td class="product-name" data-title="Product">
                                                                <a href="<?= base_url() ?>home/detail?vhid=<?= $item['id_inventory'] ?>" class="title"><?= $item['nama_inventory'] ?></a>
                                                                <!-- <span class="attributes-select attributes-color">Black,</span>
                                                        <span class="attributes-select attributes-size">XXL</span> -->
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <a class="text-danger">Qty </a> : <?= $item['jumlah'] ?>
                                                                </span>
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <?= $this->format_rupiah->format($item['sub_total']) ?>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </form>
                                        <div class="control-cart">
                                            <button class="button btn-continue-shopping">
                                                Continue Shopping
                                            </button>
                                            <button class="button btn-cart-to-checkout">
                                                Checkout
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <div class="page-main-content">
                                    <h3 class="custom_blog_title">
                                        1232453
                                    </h3>
                                    <div class="shoppingcart-content">
                                        <form action="http://tuongnam.com.vn/tanajil/shoppingcart.html" class="cart-form">
                                            <table class="shop_table">
                                                <thead>
                                                    <tr>
                                                        <th class="product-remove"></th>
                                                        <th class="product-thumbnail"></th>
                                                        <th class="product-name"></th>
                                                        <th class="product-price"></th>
                                                        <th class="product-quantity"></th>
                                                        <th class="product-subtotal"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($selesai as $item) {

                                                    ?>
                                                        <tr class="cart_item">
                                                            <td class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="<?= base_url() ?>assets/upload/<?= $item['image'] ?>" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                                </a>
                                                            </td>
                                                            <td class="product-name" data-title="Product">
                                                                <a href="<?= base_url() ?>home/detail?vhid=<?= $item['id_inventory'] ?>" class="title"><?= $item['nama_inventory'] ?></a>
                                                                <!-- <span class="attributes-select attributes-color">Black,</span>
                                                        <span class="attributes-select attributes-size">XXL</span> -->
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <a class="text-danger">Qty </a> : <?= $item['jumlah'] ?>
                                                                </span>
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <?= $this->format_rupiah->format($item['sub_total']) ?>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </form>
                                        <div class="control-cart">
                                            <button class="button btn-continue-shopping">
                                                Continue Shopping
                                            </button>
                                            <button class="button btn-cart-to-checkout">
                                                Checkout
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>

    </div>
    <div class="footer-device-mobile">
        <div class="wapper">
            <div class="footer-device-mobile-item device-home">
                <a href="index-2.html">
                    <span class="icon">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </span>
                    Home
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-wishlist">
                <a href="#">
                    <span class="icon">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </span>
                    Wishlist
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-cart">
                <a href="#">
                    <span class="icon">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        <span class="count-icon">
                            0
                        </span>
                    </span>
                    <span class="text">Cart</span>
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-user">
                <a href="#">
                    <span class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                    Account
                </a>
            </div>
        </div>
    </div>

    <a href="#" class="backtotop">
        <i class="fa fa-angle-double-up"></i>
    </a>
</body>
<script type="text/javascript">
    // function SetInput(id_inventory, nama, deskripsi, tahun, jumlah, gambar, harga, nama_kat, id_kat) {
    //     document.getElementById('id_inventory').value = id_inventory;
    //     document.getElementById('nama').value = nama;
    //     document.getElementById('deskripsi').value = deskripsi;
    //     document.getElementById('tahun').value = tahun;
    //     document.getElementById('jumlah').value = jumlah;
    //     document.getElementById('img').value = gambar;
    //     document.getElementById('hrg').value = harga;
    //     document.getElementById('kategori').value = id_kat;
    //     document.getElementById('kategori').innerText = nama_kat;
    // }

    // function setInput1(id_inventory, nama) {

    //     document.getElementById('name').innerText = nama;
    //     document.getElementById('id_inventory1').value = id_inventory;
    // }
</script>