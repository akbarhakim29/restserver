<html>
	<head>
		<title></title>
		<script src="<?php echo base_url("Asset/Datatables/media/js/jquery.js")?>"></script>
		<script src="<?php echo base_url("Asset/Datatables/media/js/jquery.dataTables.js")?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("Asset/Datatables/media/css/jquery.dataTables.css");?>">
	</head>
	<body>
		<?php  foreach($query as $key ):
			echo $key->ID."<br />";
			echo $key->KECEPATAN_ANGIN."<br />";
			echo $key->ARAH_ANGIN."<br />";
			echo $key->CURAH_HUJAN."<br />";
			echo $key->SUHU."<br />";
			echo $key->KELEMBABAN."<br />";
			echo $key->WAKTU."<br />";
			echo $key->JAM."<br />";
			echo $key->DATE_TIME."<br />";
			
			
			endforeach; 
			?>
		<table id="jsontable" class="display table table-bordered" cellspacing="0" width="100%">
		<thead>
		<tr>
		<th>ID</th>
		<th>KECEPATAN ANGIN</th>
		<th>ARAH ANGIN</th>
		<th>CURAH HUJAN.</th>
		<th>SUHU</th>
		<th>KELEMBABAN</th>
		<th>WAKTU</th>
		<th>JAM</th>
		<th>DATE_TIME</th>
		</tr>
		</thead>
		
		<tfoot>
		<tr>
		<th>ID</th>
		<th>KECEPATAN ANGIN</th>
		<th>ARAH ANGIN</th>
		<th>CURAH HUJAN.</th>
		<th>SUHU</th>
		<th>KELEMBABAN</th>
		<th>WAKTU</th>
		<th>JAM</th>
		<th>DATE_TIME</th>
		</tr>
		</tfoot>
		</table>
	</body>
	
	<script>
		$(document).ready(function() {
    			$('#jsontable').dataTable( {
        		"ajax": '#result'
    } );
} );
		
	</script>
	
</html>