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
                                Shopping Cart
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="main-content-cart main-content col-sm-12">
                        <h3 class="custom_blog_title">
                            Shopping Cart
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
                                            foreach ($planet['result'] as $item) {

                                            ?>
                                                <tr class="cart_item">
                                                    <td class="product-remove">
                                                        <a href="#" class="remove"></a>
                                                    </td>
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
        </main>
    </div>
    <footer class="footer style7">
        <div class="container">
            <div class="container-wapper">
                <div class="row">
                    <div class="box-footer col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="widget-box">
                            <div class="single-img">
                                <a href="index-2.html"><img src="assets/images/logo-light.png" alt="img"></a>
                            </div>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#"><span class="flaticon-placeholder"></span>45 Grand Central Terminal New
                                        York,NY 1017 United State USA</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#"><span class="fa fa-phone"></span>(+123) 456 789 - (+123) 666 888</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#"><span class="fa fa-envelope-o"></span>Contact@yourcompany.com</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#"><span class="flaticon-clock"></span>Mon-Sat 9:00pm - 5:00pm Sun : Closed</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-6 col-md-6 col-lg-2">
                        <div class="tanajil-custommenu default">
                            <h2 class="widgettitle">Quick Menu</h2>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#">New arrivals</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Life style</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Interior</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Lighting</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Wheels</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-6 col-md-6 col-lg-2">
                        <div class="tanajil-custommenu default">
                            <h2 class="widgettitle">Information</h2>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#">FAQs</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Track Order</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Delivery</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Contact Us</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Return</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="tanajil-newsletter style1">
                            <div class="newsletter-head">
                                <h3 class="title">Newsletter</h3>
                            </div>
                            <div class="newsletter-form-wrap">
                                <div class="list">
                                    Get notified of new products, limited releases, and more.
                                </div>
                                <input type="email" class="input-text email email-newsletter" placeholder="Your email letter">
                                <button class="button btn-submit submit-newsletter">SUBSCRIBE</button>
                            </div>
                        </div>
                        <div class="tanajil-socials">
                            <ul class="socials">
                                <li>
                                    <a href="#" class="social-item" target="_blank">
                                        <i class="icon fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-item" target="_blank">
                                        <i class="icon fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-item" target="_blank">
                                        <i class="icon fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 border-custom">
                        <span></span>
                    </div>
                </div>
                <div class="footer-end">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="coppyright">
                                <a href="templateshub.net">Templateshub</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="tanajil-payment">
                                <img src="assets/images/payments.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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