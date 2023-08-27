<?php
	require_once('lib/functions.php');
	$db = new class_functions();
	
	if(isset($_GET['delete_id']))
	{
		$del_id	=	$_GET['delete_id'];
		
		$db->delete_user_data($del_id);
		
	}
	
	
?>
<html>
<head>

<div class="container">
  <div class="row">
    
      
    </div>
    <div class="col">
	<!--Import/Include CSS files-->
	<title>Report</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-utilities.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>

	<script type="text/javastcript" src="js/bootstrap.js"></script>
	<script type="text/javastcript" src="js/bootstrap.bundle.js"></script>
</head>
<body>

<?php 
	require_once('header.php');
?>
<center>
<br />
	<br />
	<br />
	<h1>Users Report</h1>
	
		<br />
	<br />
	<br />
  
	
	<table class="table table-dark table-striped" border="1" cellspacing="0" cellpadding="5">
		<thead>
			<th>Sr No</th>
			<th>Full Name</th>
			<th>Email ID</th>
			<th>Mobile No</th>
			<th>DOB</th>
			<th>Password</th>
			<th>Profile</th>
			<th>Gender</th>
			<th>Date</th>
			<th>Time</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
		<tbody>
	<?php

	$users_data = array();
	
	$users_data = $db->get_all_users_data();
	
	//print_r($users_data);
	
	if(!empty($users_data))
	{
	
		$counter = 0;
		
		foreach($users_data as $record)
		
		{
			$res_id			=	$users_data[$counter]['id'];
			$res_full_name	=	$users_data[$counter]['full_name'];
			$res_email_id	=	$users_data[$counter]['email_id'];
			$res_mobile_number	=	$users_data[$counter]['mobile_no'];
			$res_dob		=	$users_data[$counter]['dob'];
		
			$res_password	=	$users_data[$counter]['password'];
			$res_profile_photo	=	$users_data[$counter]['profile_photo'];
			$res_gender		=	$users_data[$counter]['gender'];
		
			$res_date		=	$users_data[$counter]['date'];
			$res_time		=	$users_data[$counter]['time'];
		?>
			<tr>
				<td><?php echo $counter + 1; ?></td>
				<td><?php echo $res_full_name; ?></td>
				<td><?php echo $res_email_id; ?></td>
				<td><?php echo $res_mobile_number;  ?></td>
				<td><?php echo $res_dob;  ?></td>
				
				<td><?php echo $res_password;  ?></td>
				<td><?php echo $res_profile_photo;  ?></td>
				<td><?php echo $res_gender;  ?></td>

				<td><?php echo $res_date;  ?></td>
				<td><?php echo $res_time;  ?></td>
				
				<td>
					<a href="edit-record.php?edit_id=<?php echo $res_id; ?>">Update User</a>
				</td>
				
				<td>
					<a href="report.php?delete_id=<?php echo $res_id; ?>">Ristrict User</a>
				</td>
				
			</tr>
		
		<?php
			$counter++;
		}
	}
	else
	{
		echo "No data found";
	}
	if(isset($_GET['excel_export']))
	{
		$filename = "user_report".date('Ymd') . ".xls";			
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");	
		$show_coloumn = false;
		if(!empty($users_data)) {
		  foreach($users_data as $record) {
			if(!$show_coloumn) {
			  // display field/column names in first row
			  echo implode("\t", array_keys($record)) . "\n";
			  $show_coloumn = true;
			}
			echo implode("\t", array_values($record)) . "\n";
		  }
		}
		exit;  
	}
	
	?>
			
		</tbody>
	</table>

<br />
<div class="btn btn-success" >
	<a href="report.php?excel_export" style="color:black; text-decoration:none;">Excel Export</a></div>
		<br />
	<br />
	<br />
	<br />
  
<?php 
	require_once('footer.php');
?>
</center>
</div>
</body>
</html>