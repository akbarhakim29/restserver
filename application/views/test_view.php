<html>
<head>
<title>
Test Date Picker	
</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("Asset/Datetimepicker/jquery.datetimepicker.css");?>">
		<script src="<?php echo base_url("Asset/Datetimepicker/jquery.js")?>"></script>
		<script src="<?php echo base_url("Asset/Datetimepicker/jquery.datetimepicker.js")?>"></script>
		
</head>
<body>
	<h3>Date Time</h3>
	<form action="<?php echo site_url("test_cont/hasil") ?>" method="GET" role="form">
	<h3>START</h3><br />
	<input type="text" id="date_timepicker_start" name="dateawal"/>
	<h3>END</h3>
	<input type="text" id="date_timepicker_end" name="dateakhir"/>
	<input type="submit" name="tekan"/>
	</form>
</body>
<script type="text/javascript">
					jQuery(function(){
					 jQuery('#date_timepicker_start').datetimepicker({
					  onShow:function( ct ){
					   this.setOptions({
					    maxDate:jQuery('#date_timepicker_end').val()?jQuery('#date_timepicker_end').val():false
					   })
					  }
					  
					 });
					 jQuery('#date_timepicker_end').datetimepicker({
					  onShow:function( ct ){
					   this.setOptions({
					    //minDate:jQuery('#date_timepicker_start').val()?jQuery('#date_timepicker_start').val():false
					   })
					  }
					 
					 });
					});

		</script>
</html>