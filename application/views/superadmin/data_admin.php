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
                <h2 class="text-black font-w600">Data User</h2>
                <p class="mb-0">Super Admin Dashboard</p>

            </div>
            <div>
                <a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">+Tambah User</a>
                <!-- <a href="index.html" class="btn btn-outline-primary"><i class="las la-calendar-plus scale5 mr-3"></i>Filter Date</a> -->
            </div>
        </div>
        <!-- Add Order -->
        <div class="modal fade" id="addOrderModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah User</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url() ?>superadmin/addAdmin">
                            <div class="form-group">
                                <label class="text-black font-w500">Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                                <label class="text-black font-w500">Username</label>
                                <input type="text" name="username" class="form-control" required>
                                <label class="text-black font-w500">Password</label>
                                <input type="password" name="password" class="password form-control" onkeyup='check();' />
                                <label class="text-black font-w500">Konfirmasi Password</label>
                                <input type="password" name="cpassword" class="cpassword form-control" onkeyup='check();' />
                                <span class='messages' value=""></span>
                                <br>
                                <label class="text-black font-w500">Level</label>
                                <select class="form-control default-select" name="level" required>
                                    <option value="1">Superadmin</option>
                                    <option value="2">Admin</option>
                                </select>
                                <label class="text-black font-w500">Status</label>
                                <select class="form-control default-select" name="status" required>
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary submit">SIMPAN</button>
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
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url() ?>superadmin/editAdmin">
                            <div class="form-group">
                                <input type="hidden" id="id_admin" name="id_admin">
                                <label class="text-black font-w500">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" required />
                                <label class="text-black font-w500">Username</label>
                                <input type="text" id="username" name="username" class="form-control" required />
                                <label class="text-black font-w500">Password</label>
                                <input type="password" id="password" name="password" class="password form-control" onkeyup='check();' />
                                <label class="text-black font-w500">Konfirmasi Password</label>
                                <input type="password" name="cpassword" id="cpassword" class="cpassword form-control" onkeyup='check();' />
                                <span id='message' value=""></span>
                                <br>
                                <label class="text-black font-w500">Level</label>
                                <select class="form-control" name="level" required>
                                    <option id="level" hidden></option>
                                    <option value="1">Superadmin</option>
                                    <option value="2">Admin</option>
                                </select>
                                <label class="text-black font-w500">Status</label>
                                <select class="form-control" name="status" required>
                                    <option id="status" hidden></option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary button">SIMPAN</button>
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
                        <h4 class="modal-title" id="custom-width-modalLabel">Data User</h4>
                    </div>

                    <form action="<?php echo base_url() . 'superadmin/hapus'; ?>" method="post" class="form-horizontal" role="form">
                        <div class="modal-body">
                            <h4>Konfirmasi</h4>
                            <p>Apakah anda yakin ingin menghapus data ini ?</p>
                            <div class="form-group">
                                <input type="hidden" id="id_admin1" name="id_admin1">
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
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($admin as $u) {
                                echo "<tr>
                                            <td>" . $no . "</td>
                                            <td>" . $u['nama'] . "</td>
                                            <td>" . $u['username'] . "</td>";
                                if ($u['level'] == 1) {
                                    echo "<td><span class='badge badge-rounded badge-dark'>Superadmin</span></td>";
                                } else {
                                    echo "<td><span class='badge badge-rounded badge-light'>Admin</span></td>";
                                }
                                if ($u['status'] == 1) {
                                    echo "<td><span class='badge light badge-success'>Aktif</span></td>";
                                } else {
                                    echo "<td><span class='badge light badge-danger'>Nonaktif</span></td>";
                                }
                                echo "<td>
                                <div class='d-flex'>
                                    <a href='#' class='btn btn-primary shadow btn-xs sharp mr-1' data-toggle='modal' data-target='#edit-modal' onClick=\"SetInput('" . $u['id_admin'] . "','" . $u['nama'] . "','" . $u['username'] .  "','" . $u['level'] . "','" . $u['status'] . "')\"><i class='fa fa-pencil'></i></a>
                                    
                                    <a href='#' class='btn btn-danger shadow btn-xs sharp' data-toggle='modal' data-target='#delete-modal' onClick=\"setInput1('" . $u['id_admin'] . "')\"><i class='fa fa-trash'></i></a>
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
    function SetInput(id_admin, nama, username, level, status) {
        document.getElementById('id_admin').value = id_admin;
        document.getElementById('username').value = username;
        document.getElementById('nama').value = nama;
        document.getElementById('level').value = level;
        document.getElementById('status').value = status;
        if (level == 1) {
            document.getElementById('level').innerText = "Superadmin"
        } else {
            document.getElementById('level').innerText = "Admin"
        }
        if (status == 1) {
            document.getElementById('status').innerText = "Aktif"
        } else {
            document.getElementById('status').innerText = "Nonaktif"
        }

    }

    function setInput1(id_admin) {
        document.getElementById('id_admin1').value = id_admin;
    }
    var check = function() {
        if (document.querySelector('.password').value ==
            document.querySelector('.cpassword').value) {
            document.querySelector('.messages').style.color = 'green';
            document.querySelector('.messages').innerHTML = 'matching';
            document.querySelector('.button').disabled = false;

        } else {
            document.querySelector('.messages').style.color = 'red';
            document.querySelector('.messages').innerHTML = 'not matching';
            document.querySelector('.button').disabled = true;
        }

        if (document.getElementById('password').value ==
            document.getElementById('cpassword').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
            document.querySelector('.button').disabled = false;

        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
            document.querySelector('.button').disabled = true;
        }
    }
</script>