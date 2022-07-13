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
                <h2 class="text-black font-w600">Data <?= $kat_title[0]['nama_kategori'] ?></h2>
                <p class="mb-0">Admin Dashboard</p>

            </div>
            <div class="input-group mb-3 col-md-6">
                <input type="text" class="form-control" placeholder=" Cari disini...">
                <div class="input-group-append mr-2">
                    <button class="btn btn-primary" type="button"><i class="flaticon-381-search-2"></i></button>
                </div>

                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Kategori
                </button>
                <div class="dropdown-menu">
                    <a class='dropdown-item' href='<?= base_url() ?>admin/getfInventory'>Semua Kategori</a>
                    <?php foreach ($kategori as $cat) {
                        echo "<a class='dropdown-item' href='filter?catid=" . $cat["id_kategori"] . "'>" . $cat["nama_kategori"] . "</a>";
                    } ?>

                </div>

            </div>
        </div>
        <!-- Add Order -->
        <div class="modal  bd-example-modal-lg fade" id="addOrderModal">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah <?= $kat_title[0]['nama_kategori'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url() ?>admin/addInventory">
                            <div class="form-group">
                                <label class="text-black font-w500">Kategori</label>
                                <select class="form-control default-select" name="kategori" required>
                                    <?php foreach ($kategori as $cat) {
                                        echo "<option value=" . $cat["id_kategori"] . "'>" . $cat["nama_kategori"] . "</option>";
                                    } ?>
                                </select>
                                <label class="text-black font-w500">Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                                <label class="text-black font-w500">Deskripsi</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="deskripsi" rows="4" id="comment"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="text-black font-w500">Tahun</label>
                                        <input name="tahun" type="text" class="form-control" placeholder="2017-06-04" id="mdate" required>
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
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal  bd-example-modal-lg fade" id="edit-modal">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data <?= $kat_title[0]['nama_kategori'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>admin/updateInventory" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="form-group">
                                <label class="text-black font-w500">Kategori</label>
                                <select class="form-control" name="kategori" required>
                                    <option id="kategori" hidden></option>"
                                    <?php foreach ($kategori as $cat) {
                                        echo "<option value=" . $cat["id_kategori"] . "'>" . $cat["nama_kategori"] . "</option>";
                                    } ?>
                                </select>
                                <label class="text-black font-w500">Nama</label>
                                <input type="text" id="id_inventory" hidden name="id_inventory">
                                <input type="text" id="nama" name="nama" class="form-control" required>
                                <label class="text-black font-w500">Deskripsi</label>
                                <div class="form-group">
                                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" id="comment"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="text-black font-w500">Tahun</label>
                                        <input type="date" id="tahun" name="tahun" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <label class="text-black font-w500">Jumlah</label>
                                        <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah">
                                    </div>
                                </div>
                                <label class="text-black font-w500">Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input id="img" name="image" type="text">
                                        <input name="image" type="file" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <label class="text-black font-w500">Harga</label>
                                <input type="text" id="hrg" name="harga" class="form-control" placeholder="harga">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="custom-width-modalLabel">DATA <?= $kat_title[0]['nama_kategori'] ?></h4>
                    </div>

                    <form action="<?php echo base_url() . 'admin/delInventory'; ?>" method="post" class="form-horizontal" role="form">
                        <div class="modal-body">
                            <h4>Konfirmasi</h4>
                            <p>Apakah anda yakin ingin menghapus
                                <a id="name"></a> ?
                            </p>
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
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive card-table">
                    <table id="example5" class="display dataTablesCard white-border table-responsive-xl">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Nama Admin</th>
                                <th style="width: 20%">Deskripsi</th>
                                <th>Tahun</th>
                                <th>Jumlah</th>
                                <th>Image</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($ruang as $u) {
                                echo "<tr>
                                            <td>" . $no . "</td>
                                            <td>" . $u['nama'] . "</td>
                                            <td>" . $u['username'] . "</td>
                                            <td>" . substr($u['deskripsi'], 0, 150) . " . . .</td>
                                            <td>" . $u['tahun'] . "</td>
                                            <td>" . $u['jumlah'] . "</td>
                                            <td>
                                            <div class='lightgallery' class='row'>
                                            <a href='" . base_url() . "assets/upload/" . $u['image'] . "' data-exthumbimage='" . base_url() . "assets/upload/" . $u['image'] . "' data-src='" . base_url() . "assets/upload/" . $u['image'] . "'class='col-lg-3 col-md-6 mb-4' >
                                            <img src='" . base_url() . "assets/upload/" . $u['image'] . "' style='width:80%;' />
                                            </a>
                                            </div>
                                            </td>
                                            <td>" . $this->format_rupiah->format($u['harga']) . "</td>
                                            <td>" . $u['nama_kategori'] . "</td>";
                                echo "<td>
                                            <div class='d-flex'>
                                                <a href='#' class='btn btn-primary shadow btn-xs sharp mr-1' data-toggle='modal' data-target='#edit-modal' onClick=\"SetInput('" . $u['id_inventory'] . "','" . $u['nama'] .  "','" . $u['deskripsi'] . "','" . $u['tahun'] . "','" . $u['jumlah'] . "','" . $u['image'] . "','" . $u['harga'] . "','" . $u['nama_kategori'] . "','" . $u['id_kategori'] . "')\"><i class='fa fa-pencil'></i></a>
                                                
                                                <a href='#' class='btn btn-danger shadow btn-xs sharp' data-toggle='modal' data-target='#delete-modal' onClick=\"setInput1('" . $u['id_inventory'] . "','" . $u['nama'] .  "')\"><i class='fa fa-trash'></i></a>
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
    function SetInput(id_inventory, nama, deskripsi, tahun, jumlah, gambar, harga, nama_kat, id_kat) {
        document.getElementById('id_inventory').value = id_inventory;
        document.getElementById('nama').value = nama;
        document.getElementById('deskripsi').value = deskripsi;
        document.getElementById('tahun').value = tahun;
        document.getElementById('jumlah').value = jumlah;
        document.getElementById('img').value = gambar;
        document.getElementById('hrg').value = harga;
        document.getElementById('kategori').value = id_kat;
        document.getElementById('kategori').innerText = nama_kat;
    }

    function setInput1(id_inventory, nama) {

        document.getElementById('name').innerText = nama;
        document.getElementById('id_inventory1').value = id_inventory;
    }
</script>