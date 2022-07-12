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
                            <a>
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
                                <li class="nav-link active"><a data-toggle="tab" href="#menu">Pemesanan</a></li>
                                <li class="nav-link"><a data-toggle="tab" href="#menu1">Konfirmasi</a></li>
                                <li class="nav-link"><a data-toggle="tab" href="#menu2">Selesai</a></li>
                                <li class="nav-link"><a data-toggle="tab" href="#menu3">Dibatalkan</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="menu" class="tab-pane fade in active">
                                <div class="page-main-content">
                                    <h3 class="custom_blog_title">
                                        Pemesanan
                                    </h3>
                                    <div class="shoppingcart-content table-responsive">

                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Bukti Bayar</th>
                                                    <th>Nama</th>
                                                    <th>Tgl Mulai</th>
                                                    <th>Tgl Selesai</th>
                                                    <th>Tgl Booking</th>
                                                    <th>Total</th>
                                                    <th>Upload</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($pesan as $item) {

                                                ?>
                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <a href="#">
                                                                <img style="max-width:150px;" src="<?= base_url() ?>assets/upload/<?= $item['bukti_bayar'] ?>" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                            </a>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['nama'] ?>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['tgl_mulai'] ?>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['tgl_selesai'] ?>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['tgl_booking'] ?>
                                                        </td>
                                                        <td class="product-price" data-title="Price">
                                                            <span class="woocommerce-Price-amount amount">
                                                                <?= $this->format_rupiah->format($item['total']) ?>
                                                            </span>
                                                        </td>
                                                        <td>



                                                            <span>
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class="btn btn-secondary" data-toggle='modal' data-target='#upload-modal' onclick="SetUpload('<?= $item['id_sewa'] ?>');">Upload</button>

                                                                    <button type="button" class="btn btn-secondary" data-toggle='modal' data-target='#edit-modal' onclick="SetInput('<?= $item['id_sewa'] ?>');">Detail</button>
                                                                </div>
                                                            </span>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="modal  bd-example-modal-lg fade" id="upload-modal">
                                <div class="modal-dialog modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Pemesanan</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= base_url() ?>home/uploadBukti" enctype="multipart/form-data" accept-charset="utf-8">
                                                <input type="text" name="id_sewa" id="id_sewa" hidden />
                                                <input name="image" type="file" id="select_file" onchange="form.submit()">

                                                <button type="button" value="batal" name="action" data-dismiss="modal" class="button btn-continue-shopping" style="float: right">EXIT</button>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal  bd-example-modal-lg fade" id="edit-modal">
                                <div class="modal-dialog modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Pemesanan</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="spinner-border" role="status" id="loading">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="employees" class="table primary-table-bordered">

                                                    </table>
                                                </div>
                                                <form method="POST" action="<?= base_url() ?>superadmin/updatePemesanan">
                                                    <input type="text" name="id_sewa" id="id_sewa" hidden></input>

                                                    <button type="button" value="batal" name="action" data-dismiss="modal" class="button btn-continue-shopping" style="float: right">EXIT</button>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="page-main-content">
                                    <h3 class="custom_blog_title">
                                        Konfirmasi
                                    </h3>
                                    <div class="shoppingcart-content table-responsive">

                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Bukti Bayar</th>
                                                    <th>Nama</th>
                                                    <th>Tgl Mulai</th>
                                                    <th>Tgl Selesai</th>
                                                    <th>Tgl Booking</th>
                                                    <th>Total</th>
                                                    <th>Upload</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($proses as $item) {

                                                ?>
                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <a href="#">
                                                                <img style="max-width:150px;" src="<?= base_url() ?>assets/upload/<?= $item['bukti_bayar'] ?>" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                            </a>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['nama'] ?>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['tgl_mulai'] ?>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['tgl_selesai'] ?>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['tgl_booking'] ?>
                                                        </td>
                                                        <td class="product-price" data-title="Price">
                                                            <span class="woocommerce-Price-amount amount">
                                                                <?= $this->format_rupiah->format($item['total']) ?>
                                                            </span>
                                                        </td>
                                                        <td>

                                                            <form method="post" action="<?= base_url() ?>home/uploadBukti" enctype="multipart/form-data" accept-charset="utf-8">
                                                                <input type="text" name="id_sewa" value="<?= $item['id_sewa'] ?>" hidden />
                                                                <input name="image" type="file" id="select_file" style="display: none;" onchange="form.submit()">
                                                                <span>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-secondary" data-toggle='modal' data-target='#edit-modal' onclick="SetInput('<?= $item['id_sewa'] ?>');">Detail</button>
                                                                    </div>
                                                                </span>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3 class="custom_blog_title">
                                    Selesai
                                </h3>
                                <div class="shoppingcart-content table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Bukti Bayar</th>
                                                <th>Nama</th>
                                                <th>Tgl Mulai</th>
                                                <th>Tgl Selesai</th>
                                                <th>Tgl Booking</th>
                                                <th>Total</th>
                                                <th>Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($selesai as $item) {

                                            ?>
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="#">
                                                            <img style="max-width:150px;" src="<?= base_url() ?>assets/upload/<?= $item['bukti_bayar'] ?>" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                        </a>
                                                    </td>
                                                    <td class="product-name" data-title="Product">
                                                        <?= $item['nama'] ?>
                                                    </td>
                                                    <td class="product-name" data-title="Product">
                                                        <?= $item['tgl_mulai'] ?>
                                                    </td>
                                                    <td class="product-name" data-title="Product">
                                                        <?= $item['tgl_selesai'] ?>
                                                    </td>
                                                    <td class="product-name" data-title="Product">
                                                        <?= $item['tgl_booking'] ?>
                                                    </td>
                                                    <td class="product-price" data-title="Price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <?= $this->format_rupiah->format($item['total']) ?>
                                                        </span>
                                                    </td>
                                                    <td>

                                                        <form method="post" action="<?= base_url() ?>home/uploadBukti" enctype="multipart/form-data" accept-charset="utf-8">
                                                            <input type="text" name="id_sewa" value="<?= $item['id_sewa'] ?>" hidden />
                                                            <input name="image" type="file" id="select_file" style="display: none;" onchange="form.submit()">
                                                            <span>
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class="btn btn-secondary" data-toggle='modal' data-target='#edit-modal' onclick="SetInput('<?= $item['id_sewa'] ?>');">Detail</button>
                                                                </div>
                                                            </span>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <div class="page-main-content">
                                    <h3 class="custom_blog_title">
                                        Dibatalkan
                                    </h3>
                                    <div class="shoppingcart-content table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Bukti Bayar</th>
                                                    <th>Nama</th>
                                                    <th>Tgl Mulai</th>
                                                    <th>Tgl Selesai</th>
                                                    <th>Tgl Booking</th>
                                                    <th>Total</th>
                                                    <th>Upload</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($batal as $item) {

                                                ?>
                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <a href="#">
                                                                <img style="max-width:150px;" src="<?= base_url() ?>assets/upload/<?= $item['bukti_bayar'] ?>" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                            </a>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['nama'] ?>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['tgl_mulai'] ?>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['tgl_selesai'] ?>
                                                        </td>
                                                        <td class="product-name" data-title="Product">
                                                            <?= $item['tgl_booking'] ?>
                                                        </td>
                                                        <td class="product-price" data-title="Price">
                                                            <span class="woocommerce-Price-amount amount">
                                                                <?= $this->format_rupiah->format($item['total']) ?>
                                                            </span>
                                                        </td>
                                                        <td>

                                                            <form method="post" action="<?= base_url() ?>home/uploadBukti" enctype="multipart/form-data" accept-charset="utf-8">
                                                                <input type="text" name="id_sewa" value="<?= $item['id_sewa'] ?>" hidden />
                                                                <input name="image" type="file" id="select_file" style="display: none;" onchange="form.submit()">
                                                                <span>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-secondary" data-toggle='modal' data-target='#edit-modal' onclick="SetInput('<?= $item['id_sewa'] ?>');">Detail</button>
                                                                    </div>
                                                                </span>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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
    // api url
    function SetInput(id_sewa) {
        document.getElementById('id_sewa').value = id_sewa;
        var api_url =
            "<?= base_url() ?>home/api?catid=" + id_sewa;
        async function getapi(url) {

            // Storing response
            const response = await fetch(url);

            // Storing data in form of JSON
            var data = await response.json();
            console.log(data);
            if (response) {
                hideloader();
            }
            show(data);
        }
        getapi(api_url);

        function hideloader() {
            document.getElementById('loading').style.display = 'none';
        }
        // Function to define innerHTML for HTML table
        function show(data) {
            let tab =
                `<thead class="thead-primary">
                            <tr>
                                <th>Item</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>sub total</th>
                            </tr>
                        </thead>
                        <tbody>`;

            // Loop to access all rows
            for (let r of data) {
                tab += `<tr>
        <td>${r.nama_inventory} </td>
        <td>${r.harga}</td>
        <td>${r.jumlah}</td>
        <td>${r.sub_total}</td>		
        </tr>`;
            }
            // Setting innerHTML as tab variable
            document.getElementById("employees").innerHTML = tab + "</tbody>";
        }
    }

    function setInput1(id_inventory) {
        document.getElementById('id_inventory1').value = id_inventory;
    }

    function SetUpload(id_sewa) {
        document.getElementById('id_sewa').value = id_sewa;


    }
</script>