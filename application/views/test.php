<html lang="en">

<head>
	<script src="script.js"></script>
	<link rel="stylesheet" href="style.css" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
</head>

<body>
	<!-- Here a loader is created which 
             loads till response comes -->
	<div class="d-flex justify-content-center">
		<div class="spinner-border" role="status" id="loading">
			<span class="sr-only">Loading...</span>
		</div>
		<div class="spinner-border" role="status" id="bom">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<h1>Registered Employees</h1>
	<?php foreach ($data as $dat) {
		echo "
                 <a href='#' data-toggle='modal' data-target='#edit-modal' onClick=\"SetInput('" . $dat['id_kategori'] . "')\">DOOM</a>

                 ";
	}
	?>
	<!-- table for showing data -->
	<table id="employees"></table>
</body>
<script>
	// api url
	function SetInput(id_kategori) {
		var api_url =
			"<?= base_url() ?>home/api?catid=" + id_kategori;
		async function getapi(url) {

			// Storing response
			const response = await fetch(url);

			// Storing data in form of JSON
			var data = await response.json();
			console.log(data);
			if (response) {
				hideloader();
			}
			show(data);
		}
		getapi(api_url);

		function hideloader() {
			document.getElementById('loading').style.display = 'none';
		}
		// Function to define innerHTML for HTML table
		function show(data) {
			let tab =
				`<tr>
		<th>Name</th>
		<th>Office</th>
		<th>Position</th>
		<th>Salary</th>
		</tr>`;

			// Loop to access all rows
			for (let r of data) {
				tab += `<tr>
	<td>${r.username} </td>
	<td>${r.nama_kategori}</td>
	<td>${r.nama}</td>
	<td>${r.jumlah}</td>		
</tr>`;
			}
			// Setting innerHTML as tab variable
			document.getElementById("employees").innerHTML = tab;
		}
	}
</script>

</html>