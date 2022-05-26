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
                <h2 class="text-black font-w600">Admin</h2>
                <p class="mb-0">Super Admin Dashboard</p>

            </div>
            <div>
                <a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">+Tambah Admin</a>
                <a href="index.html" class="btn btn-outline-primary"><i class="las la-calendar-plus scale5 mr-3"></i>Filter Date</a>
            </div>
        </div>
        <!-- Add Order -->
        <div class="modal fade" id="addOrderModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Admin</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url() ?>superadmin/addAdmin">
                            <div class="form-group">
                                <label class="text-black font-w500">Username</label>
                                <input type="text" name="username" class="form-control">
                                <label class="text-black font-w500">Password</label>
                                <input type="password" name="password" class="form-control">
                                <label class="text-black font-w500">Level</label>
                                <select class="form-control default-select" name="level">
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
                                <button type="submit" class="btn btn-primary">CREATE</button>
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
                        <form method="post" action="<?= base_url() ?>superadmin/editAdmin">
                            <div class="form-group">
                                <input type="hidden" id="id_admin" name="id_admin">
                                <label class="text-black font-w500">Username</label>
                                <input type="text" id="username" name="username" class="form-control">
                                <label class="text-black font-w500">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                                <label class="text-black font-w500">Level</label>
                                <select class="form-control default-select" id="level" name="level" required>
                                    <option></option>
                                    <option value="1">Superadmin</option>
                                    <option value="2">Admin</option>
                                </select>
                                <label class="text-black font-w500">Status</label>
                                <select class="form-control default-select" id="status" name="status" required>
                                    <option></option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">SUBMIT</button>
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
                                            <td>" . $u['username'] . "</td>";
                                if ($u['level'] == 1) {
                                    echo "<td>Superadmin</td>";
                                } else {
                                    echo "<td>Admin</td>";
                                }
                                if ($u['status'] == 1) {
                                    echo "<td><span class='badge light badge-success'>Aktif</span></td>";
                                } else {
                                    echo "<td><span class='badge light badge-danger'>Nonaktif</span></td>";
                                }
                                echo "<td>
                                <div class='d-flex'>
                                    <a href='#' class='btn btn-primary shadow btn-xs sharp mr-1' data-toggle='modal' data-target='#edit-modal' onClick=\"SetInput('" . $u['id_admin'] . "','" . $u['username'] .  "','" . $u['password'] . "','" . $u['level'] . "')\"><i class='fa fa-pencil'></i></a>
                                    <a href='#' class='btn btn-info shadow btn-xs sharp mr-1'><i class='fa fa-eye'></i></a>
                                    <a href='#' class='btn btn-danger shadow btn-xs sharp' onClick=\"setInput1('" . $u->id_admin . "')\"><i class='fa fa-trash'></i></a>
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
    function SetInput(id_admin, username, level) {
        document.getElementById('id_admin').value = id_admin;
        document.getElementById('username').value = username;
        document.getElementById('level').value = level;

    }

    function setInput1(id_admin) {
        document.getElementById('id_admin1').value = id_admin;
    }
</script>