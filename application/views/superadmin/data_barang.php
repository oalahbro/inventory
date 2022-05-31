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
				<h2 class="text-black font-w600">Data Barang</h2>
				<p class="mb-0">Super Admin Dashboard</p>

			</div>
			<div>
				<a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">+Tambah Data Barang</a>
				<a href="index.html" class="btn btn-outline-primary"><i class="las la-calendar-plus scale5 mr-3"></i>Filter Date</a>
			</div>
		</div>
		<!-- Add Order -->
		<div class="modal  bd-example-modal-lg fade" id="addOrderModal">
			<div class="modal-dialog modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Data Barang</h5>
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="<?= base_url() ?>superadmin/addAdmin">
							<div class="form-group">
								<label class="text-black font-w500">Nama</label>
								<input type="text" name="nama" class="form-control" required>
								<label class="text-black font-w500">Deskripsi</label>
								<div class="form-group">
									<textarea class="form-control" rows="4" id="comment"></textarea>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<label class="text-black font-w500">Tahun</label>
										<input type="text" class="form-control" placeholder="Tahun">
									</div>
									<div class="col-sm-6 mt-2 mt-sm-0">
										<label class="text-black font-w500">Jumlah</label>
										<input type="text" class="form-control" placeholder="Jumlah">
									</div>
								</div>
								<label class="text-black font-w500">Image</label>
								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" class="custom-file-input">
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
								<input type="text" id="username" name="username" class="form-control" required>
								<label class="text-black font-w500">Password</label>
								<input type="password" id="password" name="password" class="form-control">
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
								<button type="submit" class="btn btn-primary">SUBMIT</button>
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
								<th>Deskripsi</th>
								<th>Tahun</th>
								<th>Jumlah</th>
								<th>Image</th>
								<th>Harga</th>
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
                                    <a href='#' class='btn btn-primary shadow btn-xs sharp mr-1' data-toggle='modal' data-target='#edit-modal' onClick=\"SetInput('" . $u['id_admin'] . "','" . $u['username'] .  "','" . $u['level'] . "','" . $u['status'] . "')\"><i class='fa fa-pencil'></i></a>
                                    
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
	let asu = level;

	function SetInput(id_admin, username, level, status) {
		document.getElementById('id_admin').value = id_admin;
		document.getElementById('username').value = username;
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
</script>