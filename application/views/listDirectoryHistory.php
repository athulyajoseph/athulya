<!DOCTYPE html>
<html>
<head>
	<title>List Diretory</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>
</head>
<body>
<form method="POST" action="<?php echo base_url(); ?>index.php/welcome/listDirectory">
	<input type="text" name="search_box" value="<?php echo $searchbox; ?>">
	<input type="submit" name="search" value="Search">
<table id="example">
	<thead>
		<tr>
			<th>Sl. No.</th>
			<th>Path</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=0 ;foreach ($files as $file) { ?>
		<tr>
			<td> 
				<?php echo $i; ?>
			</td>
			<td>
				<?php echo $files[$i]; ?>
			</td>
			
		</tr>	
		<?php $i++;} ?>
		
	</tbody>
</table>
</form>
</body>

</html>
