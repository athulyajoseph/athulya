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
			<th>Action</th>
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
			<td>
				<a id="<?php echo $files[$i]; ?>" class="delete_dir" href="#">Delete</a>
			</td>
		</tr>	
		<?php $i++;} ?>
		
	</tbody>
</table>
</form>
<input type="hidden" name="Path" id="path" value="">
</body>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			$('.delete_dir').click(function () {
				// $('#path').val($(this).attr('href'));
				$.ajax({
		            url:"removeDirectoryOrFile",    //the page containing php script
		            type: "post",    //request type,
		            // dataType: 'json',
		            data: {path: $(this).attr('id')},
		            success:function(result){
		                console.log(result.abc);
		            }
		        });


			})
		    $('#example').DataTable( {
		        searching: false,
		    } );
		} );

	</script>

</html>
