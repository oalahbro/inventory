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
                <h2 class="text-black font-w600"><?= $title ?></h2>
                <p class="mb-0">Super Admin Dashboard</p>
            </div>
            <?php if ($title === 'pesanan selesai') {
            ?><form class="input-group mb-3 col-md-4" method="POST" action="<?= base_url() ?>superadmin/searchPesananSelesai">
                <?php } else { ?>
                    <form class="input-group mb-3 col-md-4" method="POST" action="<?= base_url() ?>superadmin/searchPesananDibatalkan"> <?php } ?>
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
                        <h5 class="modal-title">Riwayat</h5>
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
                            foreach ($history as $u) {
                                echo "<tr>
                                            <td>" . $no . "</td>
                                            <td>" . $u['nama'] . "</td>
                                            <td>" . date_format(date_create($u['tgl_mulai']), 'd-M-Y') . "</td>
                                            <td>" . date_format(date_create($u['tgl_selesai']), 'd-M-Y') . "</td>
                                            <td>" . date_format(date_create($u['tgl_booking']), 'd-M-Y') . "</td>
                                            <td >
                                            <div class='lightgallery' class='row'>
                                            <a href='" . base_url() . "assets/upload/" . $u['bukti_bayar'] . "' data-exthumbimage='" . base_url() . "assets/upload/" . $u['bukti_bayar']  . "' data-src='" . base_url() . "assets/upload/" . $u['bukti_bayar']  . "'class='col-lg-3 col-md-6 mb-4' >
                                            <img src='" . base_url() . "assets/upload/" . $u['bukti_bayar'] . "' style='width:60%;' />
                                            </a>
                                            </div>
                                            </td>
                                            ";
                                if ($u['status'] == 1) {
                                    echo  "<td><span class='badge badge-outline-primary'><i class='fa fa-circle text-primary mr-1'></i>Terkonfirmasi</span></td>";
                                } elseif ($u['status'] == 2) {
                                    echo  "<td><span class='badge badge-outline-primary'><i class='fa fa-circle text-primary mr-1'></i>Pengajuan</span></td>";
                                } elseif ($u['status'] == 3) {
                                    echo  "<td><span class='badge badge-outline-primary'><i class='fa fa-circle text-primary mr-1'></i>Selesai</span></td>";
                                } elseif ($u['status'] == 0) {
                                    echo  "<td><span class='badge badge-outline-danger'><i class='fa fa-circle text-danger mr-1'></i>Dibatalkan</span></td>";
                                }
                                echo "<td> 
                                            <div class='d-flex'>
                                                <a href='#' class='btn btn-primary shadow btn-xs sharp mr-1' data-toggle='modal' data-target='#edit-modal' onClick=\"SetInput('" . $u['id_sewa'] . "')\"><i class='fa fa-eye'></i></a>
                                            </div></td></tr>";


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
        var api_url =
            "<?= base_url() ?>superadmin/api?catid=" + id_sewa;
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
</script>