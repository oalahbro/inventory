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
                <p class="mb-0">Super Admin Dashboard</p>

            </div>
        </div>
        <form class="row align-items-end  mb-2" method="POST" action="<?= base_url() ?>superadmin/searchLaporan">
            <div class="col">
                <label class="text-black font-w500">Kategori</label>
                <input type="date" value="<?= $this->input->post('tgl_mulai') ?>" id="tgl-mulai" name="tgl_mulai" class="form-control" onchange="sub()">
            </div>
            <div class="col">
                <label class="text-black font-w500">Stock</label>
                <input type="date" value="<?= $this->input->post('tgl_selesai') ?>" id="tgl-selesai" name="tgl_selesai" class="form-control" onchange="sub()">
                <button class="btn btn-primary" id="filter" hidden name="submit" value="filter" type="sumbit"><i class="flaticon-381-search-2"></i></button>
            </div>
            <div class="col">
                <div class="input-group">
                    <input type="text" class="form-control" name="query" placeholder=" Cari disini...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" name="submit" value="search" type="sumbit"><i class="flaticon-381-search-2"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-block btn-rounded btn-danger" name="submit" value="export" type="sumbit">
                    <span class="btn-icon-left text-danger"><i class="fa fa-file-pdf-o color-danger"></i>
                    </span>EXPORT
                </button>
            </div>

        </form>
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
                        <form method="post" action="<?= base_url() ?>superadmin/pdf">
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
                                            <td>" . date_format(date_create($u['tgl_mulai']), 'd-M-Y') . "</td>
                                            <td>" . date_format(date_create($u['tgl_selesai']), 'd-M-Y') . "</td>
                                            <td>" . date_format(date_create($u['tgl_booking']), 'd-M-Y') . "</td>
                                            <td>" . $this->format_rupiah->format($u['sub_total']) . "</td>";


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