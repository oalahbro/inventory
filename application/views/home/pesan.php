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
    <div class="main-content main-content-checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="index-2.html">Home</a>
                            </li>
                            <li class="trail-item trail-end active">
                                Checkout
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3 class="custom_blog_title">
                Checkout
            </h3>
            <div class="checkout-wrapp">
                <div class="shipping-address-form-wrapp">
                    <div class="shipping-address-form  checkout-form">
                        <div class="row-col-1 row-col">
                            <div class="shipping-address">
                                <h3 class="title-form">
                                    Shipping Address
                                </h3>
                                <form method="POST" action="<?= base_url() ?>home/updateSewa">
                                    <input type="text" name="id_sewa" value="<?= $result[0]['id_sewa'] ?>" hidden />
                                    <input type="text" name="total" value="<?= $total ?>" hidden />
                                    <p class="form-row form-row-first">
                                        <label class="text">Nama </label>
                                        <input title="first" type="text" name="nama" class="form-control form-control-phone" value="<?= $result[0]['nama'] ?>">
                                    </p>
                                    <p class="form-row form-row-last">
                                        <label class="text">Nomor Telp</label>

                                        <input title="last" placeholder="contoh (628111222333)" type="number" name="telp" class="form-control form-control-phone" value="<?= $result[0]['telp'] ?>" required>
                                    </p>
                                    <p class="form-row forn-row-col forn-row-col-1">
                                        <label class="text">Tanggal Mulai</label>
                                        <input type="datetime-local" id="tgl-mulai" name="tgl-mulai" class="form-control form-control-phone" onchange="tgl()">
                                    </p>
                                    <p class="form-row forn-row-col forn-row-col-2">
                                        <label class="text">Tanggal Selesai</label>
                                        <input type="datetime-local" id="tgl-selesai" name="tgl-selesai" class="form-control form-control-phone" onchange="tgl()">
                                    </p>
                            </div>
                        </div>
                        <div class="row-col-2 row-col">
                            <div class="your-order">
                                <h3 class="title-form">
                                    Your Order
                                </h3>
                                <ul class="list-product-order">
                                    <?php foreach ($result as $item) {
                                    ?>
                                        <li class="product-item-order">
                                            <div class="product-thumb">
                                                <a href="#">
                                                    <img src="<?= base_url() ?>assets/upload/<?= $item['image'] ?>" alt="img">
                                                </a>
                                            </div>
                                            <div class="product-order-inner">
                                                <h5 class="product-name">
                                                    <a href="#"><?= $item['nama_inventory'] ?></a>
                                                </h5>
                                                <div class="price">
                                                    <?= $this->format_rupiah->format($item['harga']) ?>
                                                    <span class="count">x<?= $item['jumlah'] ?>/hari</span>
                                                </div>
                                            </div>

                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="order-total">
                                    <span class="title">
                                        Total Price:
                                    </span>
                                    <input type="text" value="<?= $total ?>" id="tot" hidden>
                                    <span class="total-price" id="total">
                                        <?= $this->format_rupiah->format($total) ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="control-cart">
                        <button class="button btn-cart-to-checkout">
                            <a href="<?= base_url() ?>home/cart">Kembali Ke Keranjang</a>
                        </button>
                        <a href="<?= base_url() ?>home/checkout_end">
                            <button type="submit" id="sub" class="button button-payment">
                                Pembayaran
                            </button>
                            </form>
                    </div>
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
</body>

<script type="text/javascript">
    function tgl() {
        let tgl_mulai = new Date(document.getElementById('tgl-mulai').value)
        let mulai = tgl_mulai.toLocaleDateString()
        let tgl_selesai = new Date(document.getElementById('tgl-selesai').value)
        let selesai = tgl_selesai.toLocaleDateString()
        var days = daysdifference(mulai, selesai);

        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }
        if (mulai >= selesai) {
            alert("Tanggal selesai harus lebih dari tanggal mulai!")
            document.getElementById("total").innerHTML = "Rp. 0"
            document.getElementById("sub").disabled = true

        } else {
            if (!days) {
                console.log('is nan')
            } else {
                let tot = document.getElementById('tot').value
                let hari = days * tot
                let rp = rupiah(hari)
                console.log(rupiah(hari))
                document.getElementById("total").innerHTML = rp
                document.getElementById("sub").disabled = false
            }
        }
        console.log(days);


        function daysdifference(firstDate, secondDate) {
            var startDay = new Date(firstDate);
            var endDay = new Date(secondDate);

            var millisBetween = startDay.getTime() - endDay.getTime();
            var days = millisBetween / (1000 * 3600 * 24);

            return Math.round(Math.abs(days));
        }
    }
</script>