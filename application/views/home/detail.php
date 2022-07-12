<div class="main-content main-content-details single no-sidebar">
    <div class="container">
        <?php
        foreach ($planet['result'] as $new) {
        ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a>Home</a>
                            </li>
                            <li class="trail-item">
                                <a>Ruang</a>
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
                                <div class="price">
                                    <span><?= $this->format_rupiah->format($new['harga']) ?></span>
                                </div>
                                <div class="product-details-description">
                                    <ul>
                                        <li>Jumlah : <?= $new['jumlah'] ?></li>
                                        <li>Tahun : <?= date('d-M-Y', strtotime($new['tahun'])) ?></li>

                                    </ul>
                                </div>
                                <form action="<?= base_url() ?>home/addCart" method="POST">
                                    <div class="quantity-add-to-cart">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="number" name="jumlah" min="1" max="<?= $new['jumlah'] ?>" value="1" title="Qty" class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <input type="number" name="harga" value="<?= $new['harga'] ?>" hidden />
                                        <input type="number" name="id_inventory" value="<?= $new['id_inventory'] ?>" hidden />
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
                    </ul>
                    <div class="tab-container">
                        <div id="product-descriptions" class="tab-panel active">
                            <p style="font: size 50px;"><b>
                                    <?= $new['deskripsi'] ?></b>
                            </p>
                        </div>
                    </div>
                </div>
                <div style="clear: left;"></div>
                </div>
            </div>
    </div>
</div>
</div>