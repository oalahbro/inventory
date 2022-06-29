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
            <div>
                <a href="<?= base_url() ?>superadmin/pdf" type="button" class="btn btn-rounded btn-danger"><span class="btn-icon-left text-danger"><i class="fa fa-file-pdf-o color-danger"></i>
                    </span>EXPORT PDF</a>
            </div>
        </div>
        <!-- Add Order -->
        <!-- <div class="modal  bd-example-modal-lg fade" id="addOrderModal">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Ruang</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url() ?>superadmin/addBarang">
                            <div class="form-group">
                                <label class="text-black font-w500">Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                                <label class="text-black font-w500">Deskripsi</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="deskripsi" rows="4" id="comment"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="text-black font-w500">Tahun</label>
                                        <input name="tahun" class="datepicker-default form-control" id="datepicker">
                                    </div>
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <label class="text-black font-w500">Jumlah</label>
                                        <input type="text" name="jumlah" class="form-control" placeholder="Jumlah">
                                    </div>
                                </div>
                                <label class="text-black font-w500">Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <label class="text-black font-w500">Harga</label>
                                <input type="text" name="harga" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">CREATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="modal  bd-example-modal-lg fade" id="edit-modal">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Barang</h5>
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
                                <div class="form-group mt-2">
                                    <button type="submit" value="konfirmasi" name="action" class="btn btn-primary">KONFORMASI</button>
                                    <button type="submit" value="batal" name="action" class="btn btn-danger">BATAL</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="custom-width-modalLabel">DATA PENGGUNA</h4>
                    </div>

                    <form action="<?php echo base_url() . 'superadmin/delBarang'; ?>" method="post" class="form-horizontal" role="form">
                        <div class="modal-body">
                            <h4>Konfirmasi</h4>
                            <p>Apakah anda yakin ingin menghapus data ini ?</p>
                            <div class="form-group">
                                <input type="hidden" id="id_inventory1" name="id_inventory1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

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
                    </table>
                    <h3>TOTAL : <?= $total ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->