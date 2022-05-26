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
							<div class="form-group">
								<button type="button" class="btn btn-primary">CREATE</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Profile Datatable</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<div id="example3_wrapper" class="dataTables_wrapper no-footer">
								<div id="example3_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example3"></label></div>
								<table id="example3" class="display min-w850 dataTable no-footer" role="grid" aria-describedby="example3_info">
									<thead>
										<tr role="row">
											<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 35px;"></th>
											<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 75.6721px;">Name</th>
											<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 97.1803px;">Department</th>
											<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" style="width: 56.0164px;">Gender</th>
											<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Education: activate to sort column ascending" style="width: 82.8197px;">Education</th>
											<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending" style="width: 57.9508px;">Mobile</th>
											<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 127.869px;">Email</th>
											<th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Joining Date: activate to sort column ascending" style="width: 96.0164px;">Joining Date</th>
											<th class="sorting_desc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 56.0164px;" aria-sort="descending">Action</th>
										</tr>
									</thead>
									<tbody>

										<tr role="row" class="odd">
											<td class=""><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
											<td>Tiger Nixon</td>
											<td>Architect</td>
											<td>Male</td>
											<td>M.COM., P.H.D.</td>
											<td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
											<td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
											<td>2011/04/25</td>
											<td class="sorting_1">
												<div class="d-flex">
													<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr>
										<tr role="row" class="even">
											<td class=""><img class="rounded-circle" width="35" src="images/profile/small/pic2.jpg" alt=""></td>
											<td>Garrett Winters</td>
											<td>Accountant</td>
											<td>Female</td>
											<td>M.COM., P.H.D.</td>
											<td><a href="javascript:void(0);"><strong>987 654 3210</strong></a></td>
											<td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
											<td>2011/07/25</td>
											<td class="sorting_1">
												<div class="d-flex">
													<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr>
										<tr role="row" class="odd">
											<td class=""><img class="rounded-circle" width="35" src="images/profile/small/pic3.jpg" alt=""></td>
											<td>Ashton Cox</td>
											<td>Junior Technical</td>
											<td>Male</td>
											<td>B.COM., M.COM.</td>
											<td><a href="javascript:void(0);"><strong>(123) 4567 890</strong></a></td>
											<td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
											<td>2009/01/12</td>
											<td class="sorting_1">
												<div class="d-flex">
													<a href="#" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
													<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr>
										<tr role="row" class="even">
											<td class=""><img class="rounded-circle" width="35" src="images/profile/small/pic4.jpg" alt=""></td>
											<td>Cedric Kelly</td>
											<td>Developer</td>
											<td>Male</td>
											<td>B.COM., M.COM.</td>
											<td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
											<td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
											<td>2012/03/29</td>
											<td class="sorting_1">
												<div class="d-flex">
													<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr>
										<tr role="row" class="odd">
											<td class=""><img class="rounded-circle" width="35" src="images/profile/small/pic5.jpg" alt=""></td>
											<td>Airi Satou</td>
											<td>Accountant</td>
											<td>Female</td>
											<td>B.A, B.C.A</td>
											<td><a href="javascript:void(0);"><strong>987 654 3210</strong></a></td>
											<td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
											<td>2008/11/28</td>
											<td class="sorting_1">
												<div class="d-flex">
													<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr>
										<tr role="row" class="even">
											<td class=""><img class="rounded-circle" width="35" src="images/profile/small/pic6.jpg" alt=""></td>
											<td>Brielle Williamson</td>
											<td>Specialist</td>
											<td>Male</td>
											<td>B.COM., M.COM.</td>
											<td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
											<td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
											<td>2012/12/02</td>
											<td class="sorting_1">
												<div class="d-flex">
													<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr>
										<tr role="row" class="odd">
											<td class=""><img class="rounded-circle" width="35" src="images/profile/small/pic7.jpg" alt=""></td>
											<td>Herrod Chandler</td>
											<td>Sales Assistant</td>
											<td>Female</td>
											<td>B.A, B.C.A</td>
											<td><a href="javascript:void(0);"><strong>987 654 3210</strong></a></td>
											<td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
											<td>2012/08/06</td>
											<td class="sorting_1">
												<div class="d-flex">
													<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr>
										<tr role="row" class="even">
											<td class=""><img class="rounded-circle" width="35" src="images/profile/small/pic8.jpg" alt=""></td>
											<td>Rhona Davidson</td>
											<td>Integration</td>
											<td>Male</td>
											<td>B.TACH, M.TACH</td>
											<td><a href="javascript:void(0);"><strong>(123) 4567 890</strong></a></td>
											<td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
											<td>2010/10/14</td>
											<td class="sorting_1">
												<div class="d-flex">
													<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr>
										<tr role="row" class="odd">
											<td class=""><img class="rounded-circle" width="35" src="images/profile/small/pic9.jpg" alt=""></td>
											<td>Colleen Hurst</td>
											<td>Javascript Developer</td>
											<td>Female</td>
											<td>B.A, B.C.A</td>
											<td><a href="javascript:void(0);"><strong>(123) 4567 890</strong></a></td>
											<td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
											<td>2009/09/15</td>
											<td class="sorting_1">
												<div class="d-flex">
													<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr>
										<tr role="row" class="even">
											<td class=""><img class="rounded-circle" width="35" src="images/profile/small/pic10.jpg" alt=""></td>
											<td>Sonya Frost</td>
											<td>Software Engineer</td>
											<td>Male</td>
											<td>B.COM., M.COM.</td>
											<td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
											<td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
											<td>2008/12/13</td>
											<td class="sorting_1">
												<div class="d-flex">
													<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
								<div class="dataTables_paginate paging_simple_numbers" id="example3_paginate"><a class="paginate_button previous disabled" aria-controls="example3" data-dt-idx="0" tabindex="0" id="example3_previous">Previous</a><span><a class="paginate_button current" aria-controls="example3" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="example3" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="example3" data-dt-idx="3" tabindex="0">3</a></span><a class="paginate_button next" aria-controls="example3" data-dt-idx="4" tabindex="0" id="example3_next">Next</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>