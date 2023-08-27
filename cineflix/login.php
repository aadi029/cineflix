<?php
	//Include the function file
	require_once('lib/functions.php');
	$db = new class_functions();
	
	if(isset($_GET['logout']))//for logout process
	{
		unset($_SESSION['login_mobile_no']);
	}

	
?>

<html>
<head>
<title>log-in</title>


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
  <h1 style="text-align:center; color:white;">Log-in to Account</h1>
	  
	  <br />
	 
	  
		  	<?php 
			
			

			if(isset($_POST['submit_btn']))
	{
		 $var_mobile_number = $_POST['mobile_number'];
		 $var_password	=	$_POST['password'];
		 $var_system_captcha	=	$_POST['system_captcha'];
		$var_user_captcha	=	$_POST['user_captcha'];
		
		if($var_system_captcha==$var_user_captcha)
		{
		 
		$db_password = $db->get_user_password($var_mobile_number);
		  
		  
		  if($var_password=="aditya")
			 {
				 header("location:admin.php");
			 }
		 if($db_password=="")
		 {
		?>
		  <br />
	  <div class="alert alert-danger" role="alert">
		
		
		<?php	echo "You are not registered";?>
		</div>
		
		<?php
		
			
			
			
		 }
		 else
		 {
			 

			 if($db_password==$var_password)
			 {
				 $danger = "login danger";
				 	$_SESSION['login_mobile_no'] = $var_mobile_number;
					header("location:dashboard.php");
			 }
			
			
			 else
			 {
				?>
		<br />
		<div class="alert alert-danger" role="alert">				
				<?php	echo "Wrong password";?>
				</div>
				<?php
			}
		 }
		}
		else
		{?>
			<br />
	  <div class="alert alert-danger" role="alert"><?php
			echo "Invalid Captcha Code.. Refill details";
			?></div>
			<?php
		}
	
	 }
			
			
			?>
     		
	
	
		<form action="login.php" method="POST">
	

		<label class="label_val">Enter Mobile Number :</label>
	<input type="number" class="form-control" name="mobile_number"  placeholder="Enter Mobile Number" required />

	<br />
	
	
	
	<label class="label_val">Enter Password:</label>
	<input type="password" required class="form-control" name="password" placeholder="Enter password" />
	
	 <br />
	  <?php
			$random_value = rand(50000,99000)
	  ?>
	  <label class="label_val">Enter Captcha Code</label>
	  <input type="text" class="form-control .prevent-select" name="system_captcha" value="<?php echo $random_value; ?>" readonly />
	  <br />
	  <input type="text" class="form-control" name="user_captcha" placeholder="Enter Captcha Code" required />


	  <br />
	  
	  <center><input type="submit" class="btn btn-warning" name="submit_btn" value="SUBMIT"></center>
	  
	  </form>
	  </div>
</center>

<br />
	<br />
	<br />

<div><!-- footer -->
<?php
require_once('footer.php');
?>

<!-- close of footer -->




	 
    </div><!-- Close of grid -->
    </div>
  </div>
</div>

</body>
</html>