<div class="main-content main-content-details single no-sidebar">
    <div class="container">
        <?php
        foreach ($planet as $new) {
        ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="index-2.html">Home</a>
                            </li>
                            <li class="trail-item">
                                <a href="#">Ruang</a>
                            </li>
                            <li class="trail-item trail-end active">
                                <?= $new['nama'] ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <div class="details-product">
                            <div class="details-thumd">
                                <div class="image-preview-container image-thick-box image_preview_container">
                                    <img id="img_zoom" data-zoom-image="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" src="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" alt="img">
                                    <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-preview image-small product_preview">
                                    <div id="thumbnails" class="thumbnails_carousel owl-carousel" data-nav="true" data-autoplay="false" data-dots="false" data-loop="false" data-margin="10" data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}'>
                                        <a href="#" data-image="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" data-zoom-image="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" class="active">
                                            <img src="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" data-large-image="<?php echo base_url(); ?><?php echo base_url(); ?>assets/upload<?= $new['image'] ?>" alt="img">
                                        </a>
                                        <a href="#" data-image="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" data-zoom-image="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>">
                                            <img src="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" data-large-image="<?php echo base_url(); ?>assets/upload<?= $new['image'] ?>" alt="img">
                                        </a>
                                        <a href="#" data-image="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" data-zoom-image="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>">
                                            <img src="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" data-large-image="<?php echo base_url(); ?>assets/upload<?= $new['image'] ?>" alt="img">
                                        </a>
                                        <a href="#" data-image="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" data-zoom-image="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>">
                                            <img src="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" data-large-image="<?php echo base_url(); ?>assets/upload/<?= $new['image'] ?>" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="details-infor">
                                <h1 class="product-title">
                                    <?= $new['nama'] ?>
                                </h1>
                                <!-- <div class="stars-rating">
                                    <div class="star-rating">
                                        <span class="star-5"></span>
                                    </div>
                                    <div class="count-star">
                                        (7)
                                    </div>
                                </div> -->
                                <!-- <div class="availability">
                                    availability:
                                    <a href="#">in Stock</a>
                                </div> -->
                                <div class="price">
                                    <span><?= $this->format_rupiah->format($new['harga']) ?></span>
                                </div>
                                <div class="product-details-description">
                                    <ul>
                                        <li>jumlah <?= $new['jumlah'] ?></li>
                                        <li>Imported</li>
                                        <li>Art.No. 06-7680</li>
                                    </ul>
                                </div>
                                <!-- <div class="variations">
                                    <div class="attribute attribute_color">
                                        <div class="color-text text-attribute">
                                            Color:
                                        </div>
                                        <div class="list-color list-item">
                                            <a href="#" class="color1"></a>
                                            <a href="#" class="color2"></a>
                                            <a href="#" class="color3 active"></a>
                                            <a href="#" class="color4"></a>
                                        </div>
                                    </div>
                                    <div class="attribute attribute_size">
                                        <div class="size-text text-attribute">
                                            Size:
                                        </div>
                                        <div class="list-size list-item">
                                            <a href="#" class="">xs</a>
                                            <a href="#" class="">s</a>
                                            <a href="#" class="active">m</a>
                                            <a href="#" class="">l</a>
                                            <a href="#" class="">xl</a>
                                            <a href="#" class="">xxl</a>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button">
                                            <a href="#">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="size-chart-wrapp">
                                        <div class="btn-size-chart">
                                            <a id="size_chart" href="assets/images/size-chart.jpg" class="fancybox">View
                                                Size Chart</a>
                                        </div>
                                    </div> -->

                                <form action="<?= base_url() ?>home/addCart" method="POST">
                                    <div class="quantity-add-to-cart">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="number" min="1" max="<?= $new['jumlah'] ?>" value="1" title="Qty" class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <input type="text" name="id_inventory" value="<?= $new['id_inventory'] ?>" hidden />
                                        <button type="submit" class="single_add_to_cart_button button">Add to cart</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="tab-details-product">
                    <ul class="tab-link">
                        <li class="active">
                            <a data-toggle="tab" aria-expanded="true" href="#product-descriptions">Descriptions </a>
                        </li>
                        <!-- <li class="">
                            <a data-toggle="tab" aria-expanded="true" href="#information">Information </a>
                        </li> -->
                        <li class="">
                            <a data-toggle="tab" aria-expanded="true" href="#reviews">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-container">
                        <div id="product-descriptions" class="tab-panel active">
                            <p>
                                <?= $new['deskripsi'] ?>
                            </p>
                            <p>
                                <?= $new['deskripsi'] ?>
                            </p>
                        </div>
                        <!-- <div id="information" class="tab-panel">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Size</td>
                                    <td> XS / S / M / L</td>
                                </tr>
                                <tr>
                                    <td>Color</td>
                                    <td>White/ Black/ Teal/ Brown</td>
                                </tr>
                                <tr>
                                    <td>Properties</td>
                                    <td>Colorful Dress</td>
                                </tr>
                            </table>
                        </div> -->
                        <div id="reviews" class="tab-panel">
                            <div class="reviews-tab">
                                <div class="comments">
                                    <h2 class="reviews-title">
                                        1 review for
                                        <span>Eclipse Pendant Light</span>
                                    </h2>
                                    <ol class="commentlist">
                                        <li class="conment">
                                            <div class="conment-container">
                                                <a href="#" class="avatar">
                                                    <img src="<?php echo base_url(); ?>assets/images/avartar.jpg" alt="img">
                                                </a>
                                                <div class="comment-text">
                                                    <div class="stars-rating">
                                                        <div class="star-rating">
                                                            <span class="star-5"></span>
                                                        </div>
                                                        <div class="count-star">
                                                            (1)
                                                        </div>
                                                    </div>
                                                    <p class="meta">
                                                        <strong class="author">Cobus Bester</strong>
                                                        <span>-</span>
                                                        <span class="time">June 7, 2013</span>
                                                    </p>
                                                    <div class="description">
                                                        <p>Simple and effective design. One of my favorites.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                <div class="review_form_wrapper">
                                    <div class="review_form">
                                        <div class="comment-respond">
                                            <span class="comment-reply-title">Add a review </span>
                                            <form class="comment-form-review">
                                                <p class="comment-notes">
                                                    <span class="email-notes">Your email address will not be published.</span>
                                                    Required fields are marked
                                                    <span class="required">*</span>
                                                </p>
                                                <div class="comment-form-rating">
                                                    <label>Your rating</label>
                                                    <p class="stars">
                                                        <span>
                                                            <a class="star-1" href="#"></a>
                                                            <a class="star-2" href="#"></a>
                                                            <a class="star-3" href="#"></a>
                                                            <a class="star-4" href="#"></a>
                                                            <a class="star-5" href="#"></a>
                                                        </span>
                                                    </p>
                                                </div>
                                                <p class="comment-form-comment">
                                                    <label>
                                                        Your review
                                                        <span class="required">*</span>
                                                    </label>
                                                    <textarea title="review" id="comment" name="comment" cols="45" rows="8"></textarea>
                                                </p>
                                                <p class="comment-form-author">
                                                    <label>
                                                        Name
                                                        <span class="">*</span>
                                                    </label>
                                                    <input title="author" id="author" name="author" type="text" value="">
                                                </p>
                                                <p class="comment-form-email">
                                                    <label>
                                                        Email
                                                        <span class="">*</span>
                                                    </label>
                                                    <input title="email" id="email" name="email" type="email" value="">
                                                </p>
                                                <p class="form-submit">
                                                    <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear: left;"></div>
                </div>
            </div>
    </div>
</div>
</div>