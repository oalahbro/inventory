<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="card-body">
            <?php
            error_reporting(0);
            echo  $info;
            ?>
        </div>
        <div class="form-head align-items-center d-flex mb-sm-4 mb-3">

            <div class="mr-auto">
                <h2 class="text-black font-w600">Pesanan Dikonfirmasi</h2>
                <p class="mb-0">Admin Dashboard</p>

            </div>
            <form class="input-group mb-3 col-md-4" method="POST" action="<?= base_url() ?>admin/searchKonf">
                <input type="text" name="query" class="form-control" placeholder=" Cari disini...">
                <div class="input-group-append mr-2">
                    <button class="btn btn-primary" type="submit"><i class="flaticon-381-search-2"></i></button>
                </div>
            </form>
        </div>

        <div class="modal  bd-example-modal-lg fade" id="edit-modal">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Pemesanan>
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
                            <form method="POST" action="<?= base_url() ?>admin/updateKonfpemesanan">
                                <input type="text" name="id_sewa" id="id_sewa" hidden></input>
                                <div class="form-group mt-2">
                                    <button type="submit" value="selesai" name="action" class="btn btn-primary">SELESAI</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive card-table">
                    <table id="example5" class="display dataTablesCard white-border table-responsive-xl">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Tanggal Booking</th>
                                <th style="width:  8.33%">Bukti Bayar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($konf_pemesanan as $u) {
                                echo "<tr>
                                            <td>" . $no . "</td>
                                            <td>" . $u['nama'] . "</td>
                                            <td>" . $u['tgl_mulai'] . "</td>
                                            <td>" . $u['tgl_selesai'] . "</td>
                                            <td>" . $u['tgl_booking'] . "</td>
                                            <td >
                                            <div class='lightgallery' class='row'>
                                            <a href='" . base_url() . "assets/upload/" . $u['bukti_bayar'] . "' data-exthumbimage='" . base_url() . "assets/upload/" . $u['bukti_bayar']  . "' data-src='" . base_url() . "assets/upload/" . $u['bukti_bayar']  . "'class='col-lg-3 col-md-6 mb-4' >
                                            <img src='" . base_url() . "assets/upload/" . $u['bukti_bayar'] . "' style='width:60%;' />
                                            </a>
                                            </div>
                                            </td><td><span class='badge badge-outline-primary'><i class='fa fa-circle text-primary mr-1'></i>Terkonfirmasi</span></td>
                                            <td> 
                                            <div class='d-flex'>
                                                <a href='#' class='btn btn-primary shadow btn-xs sharp mr-1' data-toggle='modal' data-target='#edit-modal' onClick=\"SetInput('" . $u['id_sewa'] . "')\"><i class='fa fa-check'></i></a>

                                                <a href='#' class='btn btn-danger shadow btn-xs sharp' data-toggle='modal' data-target='#delete-modal' onClick=\"setInput1('" . $u['id_inventory'] . "')\"><i class='fa fa-trash'></i></a>
                                            </div>";


                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
<script type="text/javascript">
    // api url
    function SetInput(id_sewa) {
        document.getElementById('id_sewa').value = id_sewa;
        var api_url =
            "<?= base_url() ?>admin/api?catid=" + id_sewa;
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
</script>