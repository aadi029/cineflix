<?php
	//Include function file
	require_once('lib/functions.php');
	$db = new class_functions();
	
	$res_edit_id	=	"";
	if(isset($_GET['edit_id']))
	{
		$res_edit_id	=	$_GET['edit_id'];
		$_SESSION['edit_id']	=	$res_edit_id;
	}
	
	$edit_id	=	$_SESSION['edit_id'];
	
	if(isset($_POST['submit_btn']))
	{
		echo $var_full_name = 	$_POST['full_name'];
		echo $var_email_id	= 	$_POST['address'];
		echo $var_mobile_number = $_POST['mobile_no'];
		echo $var_dob 		= 	$_POST['dob'];
		
		echo $var_password	=	$_POST['password'];
		echo $var_gender 	= 	$_POST['gender'];
	
		echo $profile_photo = 	"-";
	
		$db->update_user_account($var_full_name,$var_email_id, $var_mobile_number,$var_dob,$var_time,$var_password,$profile_photo,$var_gender,$var_city,$edit_id);

		
	}
	
	$users_data = array();
	$users_data = $db->get_users_data_from_id($edit_id);
	
	//print_r($users_data);
	
	
	if(!empty($users_data))
	{
	

			$res_id			=	$users_data['id'];
	        $res_full_name	=	$users_data['full_name'];
			$res_email_id	=	$users_data['email_id'];
			$res_mobile_number	=	$users_data['mobile_no'];
			$res_dob		=	$users_data['dob'];
			
			$res_password	=	$users_data['password'];
			$res_profile_photo	=	$users_data['profile_photo'];
			$res_gender		=	$users_data['gender'];
	
	
			$res_date		=	$users_data['date'];
			$res_time		=	$users_data['time'];
	}
	else 
	{
		echo "no data found";
	}
	
	
?>


<html>
<head>
<title>sign-in</title>


	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-utilities.css"/>
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>

	
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.js"></script>

	
</head>
<body>

<div class="container">
  <div class="row">
    
      
    </div>
    <div class="col">
    <?php 
	require_once('header.php');
?><!-- close of header -->
  
	<br />
	<br />
	<br />
  
	<center> 
<div class="cstm_form_container">
  <h1 style="text-align:center; color:white;">Create Account</h1>
	  
	  <br />
	  <div class="alert alert-success" role="alert">
		  Your account created successully
		</div>
	
		<form action="signin.php" method="POST" enctype="multipart/form-data">
	
		<div class="mb-3 label_val">
		  <label for="exampleFormControlInput1" class="form-label">Full Name:</label>
		  <input type="text" class="form-control" id="exampleFormControlInput1" required placeholder="Enter Full Name" name="full_name" value="<?php echo $res_full_name ?>" />
		</div>
		
		<div class="mb-3 label_val" >
		  <label for="exampleFormControlInput2" class="form-label">Email address:</label>
		  <input type="email" name="address" class="form-control" id="exampleFormControlInput2" required placeholder="name@example.com"  value="<?php echo $res_email_id?>">
		</div>
		
		<label class="label_val">Enter Mobile Number :</label>
	<input type="number" class="form-control" name="mobile_number"  placeholder="Enter Mobile Number" required  value="<?php echo $res_mobile_number ?>" />

	<br />
	
	<label class="label_val">Enter DOB:</label>
	<input type="date" class="form-control" name="dob" required   value="<?php echo $res_dob ?>"/>
	
	<br />
	
	
	<label class="label_val">Enter Password:</label>
	<input type="password" required class="form-control" name="password" placeholder="Enter password"  value="<?php echo $res_password ?>" />
	
	<br />
	
	<label class="label_val">Select Profile Photo:</label>
	<input type="file" class="form-control" name="picture"  value="<?php echo $res_profile_photo ?>"/>

	<br />
	
	<label class="label_val">Select Gender:</label>
	<div class="label_val">
	<input type="radio" name="gender" required  value="Male" />Male
	<br />
	<input type="radio" name="gender" required checked value="Female" />Female
	</div>
	<br />
	

	  <br />
	  <center><input type="submit" class="btn btn-warning" name="submit_btn" value="Update my Account"></center>
	  
	  </form>
	  </div>
</center>

<br />
	<br />
	<br />

<div><!-- footer -->
<?php
require_once('footer.php');
?><!-- close of footer -->




	 
    </div><!-- Close of grid -->
    </div>
  </div>
</div>

</body>
</html>