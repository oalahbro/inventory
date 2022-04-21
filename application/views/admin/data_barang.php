<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="form-head align-items-center d-flex mb-sm-4 mb-3">
			<div class="mr-auto">
				<h2 class="text-black font-w600">Data Barang</h2>
				<p class="mb-0">Super Admin Dashboard</p>
			</div>
			<div>
				<a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">+Tambah Barang</a>
				<a href="index.html" class="btn btn-outline-primary"><i class="las la-calendar-plus scale5 mr-3"></i>Filter Date</a>
			</div>
		</div>
		<!-- Add Order -->
		<div class="modal fade" id="addOrderModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Barang</h5>
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label class="text-black font-w500">Nama</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label class="text-black font-w500">ID</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label class="text-black font-w500">Deskripsi</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label class="text-black font-w500">Tahun</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label class="text-black font-w500">Jumlah</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label class="text-black font-w500">Harga</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label class="text-black font-w500">Image</label>
								<input type="file" id="file" accept="image/*">
							</div>
							<!-- <div class="form-group">
										<label class="text-black font-w500">Date Check In</label>
										<input type="date" class="form-control">
									</div> -->
							<div class="form-group">
								<button type="button" class="btn btn-primary">CREATE</button>
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
								<th>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="checkAll" required="">
										<label class="custom-control-label" for="checkAll"></label>
									</div>
								</th>
								<th>ID</th>
								<!-- <th>Date Check In</th> -->
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
							<tr>
								<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
										<label class="custom-control-label" for="customCheckBox2"></label>
									</div>
								</td>
								<td>1</td>
								<!-- <td>26/02/2020, 12:42 AM</td> -->
								<td>Meja Guru</td>
								<td>qwerty</td>
								<td>2010</td>
								<!-- <td>
											<span class="badge badge-outline-primary">
												<i class="fa fa-circle text-primary mr-1"></i>
												New Patient
											</span>
										</td> -->
								<td>50</td>
								<td></td>
								<td>Rp. 12.000</td>
								<td>
									<div class="d-flex">
										<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
										<a href="#" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
										<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
									</div>
				</div>
			</div>
		</div>
		</td>
		</tr>
		<tr>
			<td>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="customCheckBox3" required="">
					<label class="custom-control-label" for="customCheckBox3"></label>
				</div>
			</td>
			<td>2</td>
			<!-- <td>26/02/2020, 12:42 AM</td> -->
			<td>Kursi Guru</td>
			<td>qwerty</td>
			<td>2009</td>
			<!-- <td>
											<span class="badge badge-info light">
												<i class="fa fa-circle text-info mr-1"></i>
												Recovered
											</span>
										</td> -->
			<td>10</td>
			<td></td>
			<td>Rp.10.000</td>
			<td>
				<!-- <div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Accept Patient</a>
													<a class="dropdown-item" href="#">Reject Order</a>
													<a class="dropdown-item" href="#">View Details</a>
												</div>
											</div> -->
				<div class="d-flex">
					<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
					<a href="#" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
					<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="customCheckBox4" required="">
					<label class="custom-control-label" for="customCheckBox4"></label>
				</div>
			</td>
			<td>3</td>
			<!-- <td>26/02/2020, 12:42 AM</td> -->
			<td>Meja Siswa</td>
			<td>qwerty</td>
			<td>2012</td>
			<!-- <td>
											<span class="badge badge-info light">
												<i class="fa fa-circle text-info mr-1"></i>
												Recovered
											</span>
										</td> -->
			<td>20</td>
			<td></td>
			<td>Rp.10.000</td>
			<td>
				<!-- <div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Accept Patient</a>
													<a class="dropdown-item" href="#">Reject Order</a>
													<a class="dropdown-item" href="#">View Details</a>
												</div>
											</div> -->
				<div class="d-flex">
					<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
					<a href="#" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
					<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="customCheckBox5" required="">
					<label class="custom-control-label" for="customCheckBox5"></label>
				</div>
			</td>
			<td>4</td>
			<!-- <td>26/02/2020, 12:42 AM</td> -->
			<td>Kursi Siswa</td>
			<td>qwerty</td>
			<td>2010</td>
			<!-- <td>
											<span class="badge badge-warning light">
												<i class="fa fa-circle text-warning mr-1"></i>
												In Treatment
											</span>
										</td> -->
			<td>15</td>
			<td></td>
			<td>Rp.10.000</td>
			<td>
				<!-- <div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Accept Patient</a>
													<a class="dropdown-item" href="#">Reject Order</a>
													<a class="dropdown-item" href="#">View Details</a>
												</div>
											</div> -->
				<div class="d-flex">
					<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
					<a href="#" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
					<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
				</div>
			</td>
		</tr>
		<tr>
			<!-- <td>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheckBox6" required="">
												<label class="custom-control-label" for="customCheckBox6"></label>
											</div>
										</td> -->
			<!-- <td>#P-00012</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Alexia Kev</td>
										<td>Dr. Samantha</td>
										<td>Allergies & Asthma</td>
										<td>
											<span class="badge badge-warning light">
												<i class="fa fa-circle text-warning mr-1"></i>
												In Treatment
											</span>
										</td> -->
			<!-- <td>AB-002</td>
										<td>
											<div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Accept Patient</a>
													<a class="dropdown-item" href="#">Reject Order</a>
													<a class="dropdown-item" href="#">View Details</a>
												</div>
											</div>
										</td>												
									</tr>
									<tr>
										<td>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheckBox7" required="">
												<label class="custom-control-label" for="customCheckBox7"></label>
											</div>
										</td>
										<td>#P-00016</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Brian Lucky</td>
										<td>Not Assigned Yet</td>
										<td>Cold & Flu</td>
										<td>
											<span class="badge badge-outline-primary">
												<i class="fa fa-circle text-primary mr-1"></i>
												New Patient
											</span>
										</td>
										<td>AB-005</td>
										<td>
											<div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Accept Patient</a>
													<a class="dropdown-item" href="#">Reject Order</a>
													<a class="dropdown-item" href="#">View Details</a>
												</div>
											</div>
										</td>												
									</tr>
									<tr>
										<td>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheckBox8" required="">
												<label class="custom-control-label" for="customCheckBox8"></label>
											</div>
										</td>
										<td>#P-00019</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Eddy Cusuma</td>
										<td>Dr. Samantha</td>
										<td>Dental Care</td>
										<td>
											<span class="badge badge-warning light">
												<i class="fa fa-circle text-warning mr-1"></i>
												In Treatment
											</span>
										</td>
										<td>AB-005</td>
										<td>
											<div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Accept Patient</a>
													<a class="dropdown-item" href="#">Reject Order</a>
													<a class="dropdown-item" href="#">View Details</a>
												</div>
											</div>
										</td>												
									</tr>
									<tr>
										<td>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheckBox9" required="">
												<label class="custom-control-label" for="customCheckBox9"></label>
											</div>
										</td>
										<td>#P-000110</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Frank Azire</td>
										<td>Dr. David Lee</td>
										<td>Allergies & Asthma</td>
										<td>
											<span class="badge badge-outline-primary">
												<i class="fa fa-circle text-primary mr-1"></i>
												New Patient
											</span>
										</td>
										<td>AB-005</td>
										<td>
											<div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Accept Patient</a>
													<a class="dropdown-item" href="#">Reject Order</a>
													<a class="dropdown-item" href="#">View Details</a>
												</div>
											</div>
										</td>												
									</tr>
									<tr>
										<td>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheckBox321" required="">
												<label class="custom-control-label" for="customCheckBox321"></label>
											</div>
										</td>
										<td>#P-00013</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Andrew Stevano</td>
										<td>Dr. Marcus Jr</td>
										<td>Dental Care</td>
										<td>
											<span class="badge badge-warning light">
												<i class="fa fa-circle text-warning mr-1"></i>
												In Treatment
											</span>
										</td>
										<td>AB-005</td>
										<td>
											<div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Accept Patient</a>
													<a class="dropdown-item" href="#">Reject Order</a>
													<a class="dropdown-item" href="#">View Details</a>
												</div>
											</div>
										</td>												
									</tr>
									<tr>
										<td>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheckBox32" required="">
												<label class="custom-control-label" for="customCheckBox32"></label>
											</div>
										</td>
										<td>#P-00013</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Andrew Stevano</td>
										<td>Dr. Marcus Jr</td>
										<td>Dental Care</td>
										<td>
											<span class="badge badge-warning light">
												<i class="fa fa-circle text-warning mr-1"></i>
												In Treatment
											</span>
										</td>
										<td>AB-005</td>
										<td>
											<div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Accept Patient</a>
													<a class="dropdown-item" href="#">Reject Order</a>
													<a class="dropdown-item" href="#">View Details</a>
												</div>
											</div>
										</td>												
									</tr>
									<tr>
										<td>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheckBox31" required="">
												<label class="custom-control-label" for="customCheckBox31"></label>
											</div>
										</td>
										<td>#P-00013</td>
										<td>26/02/2020, 12:42 AM</td>
										<td>Andrew Stevano</td>
										<td>Dr. Marcus Jr</td>
										<td>Dental Care</td>
										<td>
											<span class="badge badge-warning light">
												<i class="fa fa-circle text-warning mr-1"></i>
												In Treatment
											</span>
										</td>
										<td>AB-005</td>
										<td>
											<div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Accept Patient</a>
													<a class="dropdown-item" href="#">Reject Order</a>
													<a class="dropdown-item" href="#">View Details</a>
												</div>
											</div>
										</td>												 -->
		</tr>
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