<!DOCTYPE html>
<html>

<head>
	<title>Upload Image di Codeigniter</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<h3>Pilih gambar dari komputer Anda dan klik upload</h3>
	<?php echo @$error; ?>
	<?php echo form_open_multipart('superadmin/addInventory'); ?>
	<?php echo "<input type='file' name='image' size='20' />"; ?>
	<?php echo "<input type='submit' name='submit' value='upload' /> "; ?>
	<?php echo "</form>" ?>
</body>
</body>

</html>