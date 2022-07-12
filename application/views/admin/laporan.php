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
                <h2 class="text-black font-w600">Laporan</h2>
                <p class="mb-0">Admin Dashboard</p>

            </div>
            <div class="input-group mb-3 col-md-6">
                <input type="text" class="form-control" placeholder=" Cari disini...">
                <div class="input-group-append mr-2">
                    <button class="btn btn-primary" type="button"><i class="flaticon-381-search-2"></i></button>
                </div>
                <a data-toggle="modal" data-target="#addOrderModal" type="button" class="btn btn-rounded btn-danger"><span class="btn-icon-left text-danger"><i class="fa fa-file-pdf-o color-danger"></i>
                    </span>EXPORT PDF</a>
            </div>
        </div>
        <!-- Add Order -->
        <div class="modal  bd-example-modal-lg fade" id="addOrderModal">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Tanggal</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url() ?>admin/pdf">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="text-black font-w500">Dari Tanggal</label>
                                        <input name="tgl_mulai" class="datepicker-default form-control" id="datepicker">
                                    </div>
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <label class="text-black font-w500">Sampai Tanggal</label>
                                        <input name="tgl_selesai" class="datepicker-default form-control" id="datepicker">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                        </form>
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
                                <th>Item</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Tanggal Booking</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($laporan as $u) {
                                echo "<tr>
                                            <td>" . $no . "</td>
                                            <td>" . $u['nama_penyewa'] . "</td>
                                            <td>" . $u['nama'] . "</td>
                                            <td>" . $u['harga'] . "</td>
                                            <td>" . $u['jumlah'] . "</td>
                                            <td>" . $u['tgl_mulai'] . "</td>
                                            <td>" . $u['tgl_selesai'] . "</td>
                                            <td>" . $u['tgl_booking'] . "</td>
                                            <td>" . $u['sub_total'] . "</td>";


                                $no++;
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>TOTAL</b></td>
                                <td><?= $this->format_rupiah->format($total) ?></td>
                            </tr>
                        </tfoot class='mb-2'>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->