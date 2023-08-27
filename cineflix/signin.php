<?php
	//Include the function file
	require_once('lib/functions.php');
	$db = new class_functions();

	if(isset($_POST['submit_btn']))
	{
		 $var_full_name = 	$_POST['full_name'];
		 $var_email_id	= 	$_POST['address'];
		 $var_mobile_number = $_POST['mobile_number'];
		 $var_dob 		= 	$_POST['dob'];
		 $var_password	=	$_POST['password'];
		 $var_gender 	= 	$_POST['gender'];
		 $var_system_captcha	=	$_POST['system_captcha'];
		$var_user_captcha	=	$_POST['user_captcha'];
		
	
		
	
		
		
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
   <div>
	  <div>
	  
		 
	
<?php

if(isset($_POST['submit_btn']))
	{
		 $var_full_name = 	$_POST['full_name'];
		 $var_email_id	= 	$_POST['address'];
		 $var_mobile_number = $_POST['mobile_number'];
		 $var_dob 		= 	$_POST['dob'];
		 $var_password	=	$_POST['password'];
		 $var_gender 	= 	$_POST['gender'];
		 $var_system_captcha	=	$_POST['system_captcha'];
		$var_user_captcha	=	$_POST['user_captcha'];
		
	
		
	
		
		
	

	if($var_system_captcha==$var_user_captcha)
		{
		
		
		$valid_formats = array("jpg","png","gif","bmp","jpeg","JPEG","JPG","BMP","PNG","GIF");

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{	
	
	$name 				= 	$_FILES['picture']['name'];
	$size 				= 	$_FILES['picture']['size'];
	echo $profile_photo = $name;
	
	if(strlen($name))
		{				
			list($txt, $ext) = explode(".", $name);
			
			if(in_array($ext,$valid_formats))
			{
				$tmp = $_FILES['picture']['tmp_name'];
				
				$img_Dir = "profile_photos/";
				
				if(!file_exists($img_Dir))
				{
					mkdir($img_Dir);
				}
				
				if(move_uploaded_file($tmp,$img_Dir.$name))
				{
					
				}
				else
				{
					?>
					<br />
	 
	  <div class="alert alert-danger" role="alert">
				<?php	
				$image_error	=	"failed" ;
					echo "Image Uploaded Failed You Have To Update Your Profile";
				}	
				?> </div><?php
			}
			else
			{
				?>
					<br />
	 
	  <div class="alert alert-danger" role="alert">
				<?php	
				$image_error	= "Invalid file format ";
					echo "Invalid File Format  You Have To Update Your Profile";
			}	
		}	?> </div><?php
}


		
		if($db->create_user_account($var_full_name,$var_email_id,$var_mobile_number,$var_dob
		,$var_password,$profile_photo,$var_gender))
		{
			?>
			<br />
	 
	  <div class="alert alert-success" role="alert">
	  <?php
			echo " Your account created successully";
		?></div><?php	

			//Send Whatsapp Message
			$whatsapp_message = "
				💥💥💥💥💥💥💥💥 \n

				*DREAM TECHNOLOGY*

				Dear $var_full_name,
				Thank You For Joining With Us \n

				\n Note:Automatic Software Message".
				"\n💥💥💥💥💥💥💥💥";

				$url =	"http://web.cloudwhatsapp.com/wapp/api/send?apikey=7a7bc6e92e1447d4ac545dac48eebee4&mobile=$var_mobile_number&msg=".urlencode($whatsapp_message);
					echo $response = file_get_contents($url);
			
			
			/*
			//send SMS
			$forwardURL = 'http://sms.bulksmsind.in/sendSMS?'.
			http_build_query(array(
			'username' => "abc", 
			'sendername' => "DRMTCH", 
			'smstype' => "TRANS", 
			'numbers' => $contact_no, 
			'message' => $user_message, 
			'apikey' => "1b4a8d6a-5760-40c7-b7eb-e3111-9e19cad", 
				));
				
				*/
	
		}
		
		}
		else{
			?>
			<br />
	  <div class="alert alert-danger" role="alert">
	  <?php
			
			echo "Invalid Captcha Code.. Refill details";
		}
		?></div><?php
	}
		
		?>



	
		<form action="signin.php" method="POST" enctype="multipart/form-data">
	
		<div class="mb-3 label_val">
		  <label for="exampleFormControlInput1" class="form-label">Full Name:</label>
		  <input type="text" class="form-control" id="exampleFormControlInput1" required placeholder="Enter Full Name" name="full_name"  />
		</div>
		
		<div class="mb-3 label_val" >
		  <label for="exampleFormControlInput2" class="form-label">Email address:</label>
		  <input type="email" name="address" class="form-control" id="exampleFormControlInput2" required placeholder="name@example.com">
		</div>
		
		<label class="label_val">Enter Mobile Number :</label>
	<input type="number" class="form-control" name="mobile_number"  placeholder="Enter Mobile Number" required />

	<br />
	
	<label class="label_val">Enter DOB:</label>
	<input type="date" class="form-control" name="dob" required />
	
	<br />
	
	
	<label class="label_val">Enter Password:</label>
	<input type="password" required class="form-control" name="password" placeholder="Enter password" />
	
	<br />
	
	<label class="label_val">Select Profile Photo:</label>
	<input type="file" class="form-control" name="picture" />

	<br />
	
	<label class="label_val">Select Gender:</label>
	<div class="label_val">
	<input type="radio" name="gender" required  value="Male" />Male
	<br />
	<input type="radio" name="gender" required checked value="Female" />Female
	</div>
	<br />
	

	  <?php
			$random_value = rand(50000,99000)
	  ?>
	  <label class="label_val">Enter Captcha Code</label>
	  <input type="text" class="form-control .prevent-select" name="system_captcha" value="<?php echo $random_value; ?>" readonly />
	  <br />
	  <input type="text" class="form-control" name="user_captcha" placeholder="Enter Captcha Code" />

	  <br />
	  <center><input type="submit" class="btn btn-warning" name="submit_btn" value="Create my Account"></center>
	  
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