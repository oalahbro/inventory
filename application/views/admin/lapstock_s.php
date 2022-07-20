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
        <form class="row align-items-end  mb-2" method="POST" action="<?= base_url() ?>superadmin/searchLapstock">

            <div class="col">
                <label class="text-black font-w500">Kategori</label>
                <select class="form-control" name="kategori" onchange="sub()">
                    <?php if (!$this->input->post('kategori')) {
                        echo "<option value='' selected hidden>Semua Kategori</option>'";
                    } else {

                    ?>
                        <option value="<?= $this->input->post('kategori') ?>" selected hidden><?= $kategoris[0]['nama_kategori'] ?></option>
                    <?php } ?>
                    <option value="">Semua Kategori</option>
                    <?php foreach ($kategori as $cat) {
                        echo "<option value=" . $cat["id_kategori"] . ">" . $cat["nama_kategori"] . "</option>";
                    } ?>
                </select>
            </div>

            <div class="col">
                <label class="text-black font-w500">Stock</label>
                <select class="form-control" name="stock" onchange="sub()">
                    <?php
                    if ($this->input->post('stock') == 1) {
                        echo "<option value='" . $this->input->post('stock') . "' selected hidden>Dipinjam</option>'";
                    } elseif ($this->input->post('stock') == 2) {
                        echo "<option value='" . $this->input->post('stock') . "' selected hidden>Tersedia</option>'";
                    } else {
                        echo "<option value='' selected hidden>Semua</option>'";
                    } ?>

                    <option value="">Semua</option>
                    <option value="1">Dipinjam</option>
                    <option value="2">Tersedia</option>
                </select>
            </div>
            <button class="btn btn-primary" name="submit" id="filter" value="filter" type="sumbit" hidden></button>
            <div class="col">
                <div class="input-group">
                    <input type="text" class="form-control" name="query" placeholder=" Cari disini...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" name="submit" value="search" type="sumbit"><i class="flaticon-381-search-2"></i></button>
                    </div>
                </div>

            </div>
            <div class="col-md-2">
                <!-- <a data-toggle="modal" data-target="#addOrderModal" type="button" class="btn btn-block btn-rounded btn-danger"><span class="btn-icon-left text-danger"><i class="fa fa-file-pdf-o color-danger"></i>
                    </span>EXPORT</a> -->
                <button type="submit" class="btn btn-block btn-rounded btn-danger" name="submit" value="export" type="sumbit">
                    <span class="btn-icon-left text-danger"><i class="fa fa-file-pdf-o color-danger"></i>
                    </span>EXPORT
                </button>
            </div>


        </form>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive card-table">
                    <table id="example5" class="display dataTablesCard white-border table-responsive-xl">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Nama Admin</th>
                                <th>Tahun</th>
                                <th>Jumlah</th>
                                <th>Tersedia</th>
                                <th>Dipinjam</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($laporan as $u) {
                                echo "<tr>
                                            <td>" . $no . "</td>
                                            <td>" . $u['nama'] . "</td>
                                            <td>" . $u['username'] . "</td>
                                            <td>" . $u['tahun'] . "</td>
                                            <td>" . $jum = $u['jumlah'] + $u['dipinjam'] . "</td>
                                            <td>" . $u['jumlah'] . "</td>
                                            <td>" . $u['dipinjam'] . "</td>
                                            <td>" . $this->format_rupiah->format($u['harga']) . "</td>
                                            <td>" . $u['nama_kategori'] . "</td></tr>";


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
                                <!-- <td><?= $this->format_rupiah->format($total) ?></td> -->
                            </tr>
                        </tfoot class='mb-2'>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
        if (mulai > selesai) {
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
<!--**********************************
            Content body end
        ***********************************-->