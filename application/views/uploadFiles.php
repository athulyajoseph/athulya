<!DOCTYPE html>
<html>
<head>
	<title>List Diretory</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>
</head>
<body>
	<form method="POST" action="<?php echo base_url(); ?>index.php/welcome/do_upload" enctype="multipart/form-data" >
		<input type="file" name="file" id="file">
		<input type="submit" name="" value="Upload">
	</form>
</body>
</html>
