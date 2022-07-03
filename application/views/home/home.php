<style>
    .nav-pills>li.active>a,
    .nav-pills>li.active>a:focus,
    .nav-pills>li.active>a:hover {

        background-color: #bf1b1b !important;
    }
</style>
<div class="main-content main-content-product no-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index-2.html">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            <?= $title ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="banner-shop banner-slider owl-slick equal-container" data-slick='{"autoplay":true, "autoplaySpeed":10000, "arrows":false, "dots":true, "infinite":true, "speed":800, "rows":1}'>
                        <div class="item-banner style1">
                            <div class="inner equal-element">
                                <div class="banner-content style1">
                                    <h4 class="tanajil-subtitle">Start ur weekend off right!</h4>
                                    <h3 class="title">Flash Sale Up To<br /> 15% Off</h3>
                                    <span class="when-code">When Use Code: <span class="code">TANAJIL</span></span>
                                    <button class="button button-now">shop now</button>
                                </div>
                            </div>
                        </div>
                        <div class="item-banner style2 ">
                            <div class="inner equal-element">
                                <div class="banner-content style2">
                                    <h3 class="title">Superior cars</h3>
                                    <span class="description">Enjoy an entirely new level of <br /> driving experience</span>
                                    <span class="hot-price">Hot Price: <span class="price-number">$250.00</span></span>
                                    <button class="button button-now">shop now</button>
                                    <button class="button button-view">View all</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="custom_blog_title">
                        <?= $title ?>
                    </h3>
                    <div class="main-content-cart main-content col-sm-12">
                        <div class="shop-top-control">
                            <ul class="select-form nav nav-pills nav-justified">
                                <li class="nav-link active"><a data-toggle="tab" href="#home">All Inventory</a></li>
                                <li class="nav-link"><a data-toggle="tab" href="#menu1">Barang</a></li>
                                <li class="nav-link"><a data-toggle="tab" href="#menu2">Ruang</a></li>
                            </ul>
                        </div>
                        <div class="tab-content card pt-5">
                            <div id="home" class="tab-pane fade in active">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    <?php
                                    foreach ($planet['get'] as $new) {
                                    ?>
                                        <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                            <div class="product-inner equal-element" style="min-height: 350px;">
                                                <div class="product-top">
                                                </div>
                                                <div class="product-thumb">
                                                    <div class="thumb-inner">
                                                        <a href="<?= base_url() . 'home/detail?vhid=' . $new['id_inventory'] ?>">
                                                            <img src="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" alt="img" style="height: 200px;">
                                                        </a>
                                                        <div class="thumb-group">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <div class="yith-wcwl-add-button">
                                                                    <a href="#">Add to Wishlist</a>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="button quick-wiew-button">Quick View</a>
                                                            <div class="loop-form-add-to-cart">
                                                                <button class="single_add_to_cart_button button">Add to cart
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5 class="product-name product_title">
                                                        <a href="#"><?= $new['nama'] ?></a>
                                                    </h5>
                                                    <div class="group-info">
                                                        <div class="stars-rating">
                                                            <div class="star-rating">
                                                                <span class="star-3"></span>
                                                            </div>
                                                            <div class="count-star">
                                                                (3)
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            <del>
                                                                $65
                                                            </del>
                                                            <ins>
                                                                <?= $this->format_rupiah->format($new['harga']) ?>
                                                            </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div id="menu1" class="tab-pane fade">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    <?php
                                    foreach ($barang as $new) {
                                    ?>
                                        <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                            <div class="product-inner equal-element" style="min-height: 350px;">
                                                <div class="product-top">
                                                </div>
                                                <div class="product-thumb">
                                                    <div class="thumb-inner">
                                                        <a href="<?= base_url() . 'home/detail?vhid=' . $new['id_inventory'] ?>">
                                                            <img src="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" alt="img" style="height: 200px;">
                                                        </a>
                                                        <div class="thumb-group">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <div class="yith-wcwl-add-button">
                                                                    <a href="#">Add to Wishlist</a>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="button quick-wiew-button">Quick View</a>
                                                            <div class="loop-form-add-to-cart">
                                                                <button class="single_add_to_cart_button button">Add to cart
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5 class="product-name product_title">
                                                        <a href="#"><?= $new['nama'] ?></a>
                                                    </h5>
                                                    <div class="group-info">
                                                        <div class="stars-rating">
                                                            <div class="star-rating">
                                                                <span class="star-3"></span>
                                                            </div>
                                                            <div class="count-star">
                                                                (3)
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            <del>
                                                                $65
                                                            </del>
                                                            <ins>
                                                                <?= $this->format_rupiah->format($new['harga']) ?>
                                                            </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    <?php
                                    foreach ($ruang as $new) {
                                    ?>
                                        <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                            <div class="product-inner equal-element" style="min-height: 350px;">
                                                <div class="product-top">
                                                </div>
                                                <div class="product-thumb">
                                                    <div class="thumb-inner">
                                                        <a href="<?= base_url() . 'home/detail?vhid=' . $new['id_inventory'] ?>">
                                                            <img src="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" alt="img" style="height: 200px;">
                                                        </a>
                                                        <div class="thumb-group">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <div class="yith-wcwl-add-button">
                                                                    <a href="#">Add to Wishlist</a>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="button quick-wiew-button">Quick View</a>
                                                            <div class="loop-form-add-to-cart">
                                                                <button class="single_add_to_cart_button button">Add to cart
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5 class="product-name product_title">
                                                        <a href="#"><?= $new['nama'] ?></a>
                                                    </h5>
                                                    <div class="group-info">
                                                        <div class="stars-rating">
                                                            <div class="star-rating">
                                                                <span class="star-3"></span>
                                                            </div>
                                                            <div class="count-star">
                                                                (3)
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            <del>
                                                                $65
                                                            </del>
                                                            <ins>
                                                                <?= $this->format_rupiah->format($new['harga']) ?>
                                                            </ins>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="pagination clearfix style2">
                                <div class="nav-link">
                                    <a href="#" class="page-numbers"><i class="icon fa fa-angle-left" aria-hidden="true"></i></a>
                                    <a href="#" class="page-numbers">1</a>
                                    <a href="#" class="page-numbers">2</a>
                                    <a href="#" class="page-numbers current">3</a>
                                    <a href="#" class="page-numbers"><i class="icon fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="wrapper-sidebar shop-sidebar">
                    <div class="widget woof_Widget">
                        <div class="widget widget-categories">
                            <h3 class="widgettitle">Categories</h3>
                            <ul class="list-categories">
                                <li>
                                    <input type="checkbox" id="cb1">
                                    <label for="cb1" class="label-text">
                                        New Arrivals
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb2">
                                    <label for="cb2" class="label-text">
                                        Wheels
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb3">
                                    <label for="cb3" class="label-text">
                                        Performance
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb4">
                                    <label for="cb4" class="label-text">
                                        Interior
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb5">
                                    <label for="cb5" class="label-text">
                                        Accessories
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb6">
                                    <label for="cb6" class="label-text">
                                        Lighting
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_filter_price">
                            <h4 class="widgettitle">
                                Price
                            </h4>
                            <div class="price-slider-wrapper">
                                <div data-label-reasult="Range:" data-min="0" data-max="3000" data-unit="$" class="slider-range-price " data-value-min="0" data-value-max="1000">
                                </div>
                                <div class="price-slider-amount">
                                    <span class="from">$45</span>
                                    <span class="to">$215</span>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget-brand">
                            <h3 class="widgettitle">Brand</h3>
                            <ul class="list-brand">
                                <li>
                                    <input id="cb7" type="checkbox">
                                    <label for="cb7" class="label-text">New Arrivals</label>
                                </li>
                                <li>
                                    <input id="cb8" type="checkbox">
                                    <label for="cb8" class="label-text">Wheels</label>
                                </li>
                                <li>
                                    <input id="cb9" type="checkbox">
                                    <label for="cb9" class="label-text">Performance</label>
                                </li>
                                <li>
                                    <input id="cb10" type="checkbox">
                                    <label for="cb10" class="label-text">Interior</label>
                                </li>
                                <li>
                                    <input id="cb11" type="checkbox">
                                    <label for="cb11" class="label-text">Accessories</label>
                                </li>
                                <li>
                                    <input id="cb12" type="checkbox">
                                    <label for="cb12" class="label-text">Lighting</label>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_filter_size">
                            <h4 class="widgettitle">Size</h4>
                            <ul class="list-size">
                                <li>
                                    <a href="#">xs</a>
                                </li>
                                <li>
                                    <a href="#">s</a>
                                </li>
                                <li class="active">
                                    <a href="#">m</a>
                                </li>
                                <li>
                                    <a href="#">l</a>
                                </li>
                                <li>
                                    <a href="#">xl</a>
                                </li>
                                <li>
                                    <a href="#">xxl</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget-color">
                            <h4 class="widgettitle">
                                Color
                            </h4>
                            <div class="list-color">
                                <a href="#" class="color1"></a>
                                <a href="#" class="color2 "></a>
                                <a href="#" class="color3 active"></a>
                                <a href="#" class="color4"></a>
                                <a href="#" class="color5"></a>
                                <a href="#" class="color6"></a>
                                <a href="#" class="color7"></a>
                            </div>
                        </div>
                        <div class="widget widget-tags">
                            <h3 class="widgettitle">
                                Popular Tags
                            </h3>
                            <ul class="tagcloud">
                                <li class="tag-cloud-link">
                                    <a href="#">Repair parts</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="#">Interior</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="#">Body Parts</a>
                                </li>
                                <li class="tag-cloud-link active">
                                    <a href="#">Accessories</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="#">Hot</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="#">Lighting</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="#">Wheels</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget newsletter-widget">
                        <div class="newsletter-form-wrap ">
                            <h3 class="title">Subscribe to Our Newsletter</h3>
                            <div class="subtitle">
                                More special Deals, Events & Promotions
                            </div>
                            <input type="email" class="email" placeholder="Your email letter">
                            <button type="submit" class="button submit-newsletter">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>