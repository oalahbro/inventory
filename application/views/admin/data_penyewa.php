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
				<h2 class="text-black font-w600">Data Penyewa</h2>
				<p class="mb-0">Admin Dashboard</p>

			</div>
			<div>
				<a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">+Tambah Data Penyewa</a>
				<!-- <a href="index.html" class="btn btn-outline-primary"><i class="las la-calendar-plus scale5 mr-3"></i>Filter Date</a> -->
			</div>
		</div>
		<!-- Add Order -->
		<div class="modal  bd-example-modal-lg fade" id="addOrderModal">
			<div class="modal-dialog modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Data Penyewa</h5>
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="<?= base_url() ?>admin/addPenyewa">
							<div class="form-group">
								<label class="text-black font-w500">Nama</label>
								<input type="text" name="nama" class="form-control" required>
								<div class="row">
									<div class="col-sm-6">
										<label class="text-black font-w500">Email</label>
										<input type="text" name="email" class="form-control" placeholder="email@example.com">
									</div>
									<div class="col-sm-6 mt-2 mt-sm-0">
										<label class="text-black font-w500">Password</label>
										<input type="text" name="password" class="form-control" placeholder="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<label class="text-black font-w500">Telepon</label>
										<input type="text" name="telp" class="form-control" placeholder="+62">
									</div>
									<div class="col-sm-6 mt-2 mt-sm-0">
										<label class="text-black font-w500">No.Identitas</label>
										<input type="text" name="no_identitas" class="form-control" placeholder="">
									</div>
								</div>
								<label class="text-black font-w500">Alamat</label>
								<div class="form-group">
									<textarea class="form-control" name="alamat" rows="4" id="comment"></textarea>
								</div>
								<label class="text-black font-w500">Status</label>
								<select class="form-control default-select" name="level" required>
									<option value="1">Staff / Siswa</option>
									<option value="0">Eksternal</option>
								</select>
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
						<h5 class="modal-title">Edit Penyewa</h5>
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="<?= base_url() ?>admin/editPenyewa">
							<div class="form-group">
								<label class="text-black font-w500">Nama</label>
								<input type="text" id="id_penyewa" hidden name="id_penyewa">
								<input type="text" id="nama" name="nama" class="form-control" required>
								<div class="row">
									<div class="col-sm-6">
										<label class="text-black font-w500">Email</label>
										<input type="text" id="email" name="email" class="form-control" placeholder="email@example.com">
									</div>
									<div class="col-sm-6 mt-2 mt-sm-0">
										<label class="text-black font-w500">Password</label>
										<input type="text" name="password" class="form-control" placeholder="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<label class="text-black font-w500">Telepon</label>
										<input type="text" id="telp" name="telp" class="form-control" placeholder="+62">
									</div>
									<div class="col-sm-6 mt-2 mt-sm-0">
										<label class="text-black font-w500">No.Identitas</label>
										<input type="text" id="no_identitas" name="no_identitas" class="form-control" placeholder="">
									</div>
								</div>
								<label class="text-black font-w500">Alamat</label>
								<div class="form-group">
									<textarea class="form-control" id="alamat" name="alamat" rows="4" id="comment"></textarea>
								</div>
								<label class="text-black font-w500">Level</label>
								<select class="form-control" name="level" required>
									<option id="level" hidden></option>
									<option value="1">Staff / Siswa</option>
									<option value="0">Eksternal</option>
								</select>
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

					<form action="<?php echo base_url() . 'admin/hapusPenyewa'; ?>" method="post" class="form-horizontal" role="form">
						<div class="modal-body">
							<h4>Konfirmasi</h4>
							<p>Apakah anda yakin ingin menghapus data ini ?</p>
							<div class="form-group">
								<input type="hidden" id="id_penyewa1" name="id_penyewa1">
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
								<th>Email</th>
								<th>Telepon</th>
								<th>No. Identitas</th>
								<th>Alamat</th>
								<th>Level</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($penyewa as $u) {
								echo "<tr>
                                            <td>" . $no . "</td>
                                            <td>" . $u['nama'] . "</td>
											<td>" . $u['email'] . "</td>
											<td>" . $u['telp'] . "</td>
											<td>" . $u['no_identitas'] . "</td>
											<td>" . $u['alamat'] . "</td>";
								if ($u['level'] == 1) {
									echo "<td><span class='badge badge-outline-success'>Staff / Siswa</span></td>";
								} else {
									echo "<td><span class='badge badge-outline-info'>Eksternal</span></td>";
								}
								echo "<td>
                                <div class='d-flex'>
                                    <a href='#' class='btn btn-primary shadow btn-xs sharp mr-1' data-toggle='modal' data-target='#edit-modal' onClick=\"SetInput('" . $u['id_penyewa'] . "','" . $u['nama'] .  "','" . $u['email'] . "','" . $u['telp'] . "','" . $u['no_identitas'] . "','" . $u['alamat'] . "','" . $u['level'] . "')\"><i class='fa fa-pencil'></i></a>
                                    
                                    <a href='#' class='btn btn-danger shadow btn-xs sharp' data-toggle='modal' data-target='#delete-modal' onClick=\"setInput1('" . $u['id_penyewa'] . "')\"><i class='fa fa-trash'></i></a>
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
	function SetInput(id_penyewa, nama, email, telp, no_identitas, alamat, level) {
		document.getElementById('id_penyewa').value = id_penyewa;
		document.getElementById('nama').value = nama;
		document.getElementById('email').value = email;
		document.getElementById('telp').value = telp;
		document.getElementById('no_identitas').value = no_identitas;
		document.getElementById('alamat').value = alamat;
		if (level == 1) {
			document.getElementById('level').innerText = "Staff / Siswa"
		} else {
			document.getElementById('level').innerText = "Eksternal"
		}

	}

	function setInput1(id_penyewa) {
		document.getElementById('id_penyewa1').value = id_penyewa;
	}
</script>