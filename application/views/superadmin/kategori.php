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
                <h2 class="text-black font-w600">Kategori</h2>
                <p class="mb-0">Super Admin Dashboard</p>

            </div>
            <div>
                <a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">+Tambah Kategori</a>
            </div>
        </div>
        <!-- Add Order -->
        <div class="modal fade" id="addOrderModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="input-group search-area d-lg-inline-flex d-none">
                        <input type="text" class="form-control" placeholder="Search here...">
                        <div class="input-group-append">
                            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                        </div>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url() ?>superadmin/addKategori">
                            <div class="form-group">
                                <label class="text-black font-w500">Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="edit-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Admin</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url() ?>superadmin/editKategori">
                            <div class="form-group">
                                <input type="hidden" id="id_kategori" name="id_kategori">
                                <label class="text-black font-w500">Kategori</label>
                                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" required>
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
                        <h4 class="modal-title" id="custom-width-modalLabel">DATA PENGGUNA</h4>
                    </div>

                    <form action="<?php echo base_url() . 'superadmin/hapusKategori'; ?>" method="post" class="form-horizontal" role="form">
                        <div class="modal-body">
                            <h4>Konfirmasi</h4>
                            <p>Apakah anda yakin ingin menghapus data ini ?</p>
                            <div class="form-group">
                                <input type="hidden" id="id_kategori1" name="id_kategori1">
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
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kategori as $u) {
                                echo "<tr>
                                            <td>" . $no . "</td>
                                            <td>" . $u['nama_kategori'] . "</td>";
                                echo "<td>
                                <div class='d-flex'>
                                    <a href='#' class='btn btn-primary shadow btn-xs sharp mr-1' data-toggle='modal' data-target='#edit-modal' onClick=\"SetInput('" . $u['id_kategori'] . "','" . $u['nama_kategori'] .  "')\"><i class='fa fa-pencil'></i></a>
                                    
                                    <a href='#' class='btn btn-danger shadow btn-xs sharp' data-toggle='modal' data-target='#delete-modal' onClick=\"setInput1('" . $u['id_kategori'] . "')\"><i class='fa fa-trash'></i></a>
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
    let asu = level;

    function SetInput(id_kategori, nama_kategori) {
        document.getElementById('id_kategori').value = id_kategori;
        document.getElementById('nama_kategori').value = nama_kategori;


    }

    function setInput1(id_kategori) {
        document.getElementById('id_kategori1').value = id_kategori;
    }
</script>