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
                                Cart
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="main-content-cart main-content col-sm-12">
                        <h3 class="custom_blog_title">
                            Cart
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

                                        <?php if (!$result) {
                                            echo '<tbody>
                                            <tr class="cart_item">
                                            <td class="product-thumbnail"></td>
                                            <td class="product-thumbnail"></td>
                                            <td class="product-thumbnail"></td>
                                            <td class="product-name" data-title="Price">
                                            <span class="woocommerce-Price-amount amount">
                                                <h3 class="text-danger"><b>Tidak Ada Item</b></h3>
                                            </span>
                                        </td>

                                            </tr>
                                        </tbody>';
                                        } else { ?>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($result as $item) {

                                                ?>
                                                    <tr class="cart_item">
                                                        <td class="product-remove">
                                                            <a href="#" class="remove" data-toggle='modal' data-target='#delete-modal' <?= "onClick=\"setInput1('" . $item['id_sewa_detail'] . "','" . $item['nama_inventory'] .  "','" . $item['sub_total'] .  "')\"" ?>></a>
                                                        </td>
                                                        <td class="product-thumbnail">
                                                            <a href="#">
                                                                <img src="<?= base_url() ?>assets/upload/<?= $item['image'] ?>" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                            </a>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <a href="<?= base_url() ?>home/detail?vhid=<?= $item['id_inventory'] ?>" class="title"><?= $item['nama_inventory'] ?></a>
                                                            <?php if ($item['status_qty'] == 0) {
                                                                echo '<span class="text-danger"><b>Tidak Tersedia</b></span>';
                                                            } else {
                                                                echo '<span class="text-success"><b>Tersedia</b></span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="product-quantity" data-title="Quantity">
                                                            <div class="quantity">
                                                                <div class="control">
                                                                    <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                                    <input type="number" id="count<?= $no ?>" name="jumlah" min="1" value="<?= $item['jumlah'] ?>" title="Qty" class="input-qty qty" size="4" <?= "onChange=\"update('" . $item['id_sewa_detail'] . "','" . $item['jumlah'] .  "','" . $item['id_inventory'] . "','" . $no .  "')\"" ?>>
                                                                    <?php if ($item['status_qty'] == 0) {
                                                                        echo '<a href="#" class="btn-number qtyplus quantity-plus" style="pointer-events: none; cursor: default;">+</a>';
                                                                    } else {
                                                                        echo '<a href="#" class="btn-number qtyplus quantity-plus">+</a>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="product-price" data-title="Price">
                                                            <span class="woocommerce-Price-amount amount">
                                                                <?= $this->format_rupiah->format($item['sub_total']) ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php $no++;
                                                } ?>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </form>

                                <div class="control-cart">
                                    <a href="<?= base_url() ?>home/pesan">
                                        <button class=" button btn-cart-to-checkout">
                                            Checkout
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width:30%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="custom-width-modalLabel">CART</h4>
                    </div>

                    <form action="<?php echo base_url() . 'home/delCart'; ?>" method="post" class="form-horizontal" role="form">
                        <div class="modal-body">
                            <h4>Konfirmasi</h4>
                            <p>Apakah anda yakin ingin menghapus
                                <a id="name"></a> ?
                            </p>
                            <div class="form-group">
                                <input type="hidden" id="id_inventory1" name="id_inventory1">
                                <input type="hidden" id="sub_total1" name="sub_total1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    <form method="POST" action="<?= base_url() ?>home/updateQty" hidden>
        <input type="text" name="id_sewa_detail" id="id_sw" />
        <input type="text" name="jumlah" id="jum" />
        <input type="text" name="id_inventory" id="id_inv" />
        <input type="text" id="no" hidden />
        <button type="submit" id="up"></button>
    </form>
    <a href="#" class="backtotop">
        <i class="fa fa-angle-double-up"></i>
    </a>
</body>
<script type="text/javascript">
    function setInput1(id_inventory, nama, harga) {

        document.getElementById('name').innerText = nama;
        document.getElementById('id_inventory1').value = id_inventory;
        document.getElementById('sub_total1').value = harga;
    }

    function update(id_sw, jum, id_inv, no) {
        let h = document.getElementById('id_sw').value = id_sw;
        let i = document.getElementById('jum').value = jum;
        let j = document.getElementById('id_inv').value = id_inv;
        let k = document.getElementById('no').value = no;
        let l = document.getElementById('count' + k).value
        document.getElementById('jum').value = l
        console.log(l)
        setTimeout(function() {
            document.getElementById('up').click()
        }, 800);
    }
</script>