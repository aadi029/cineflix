<?php
	//Include the function file
	require_once('lib/functions.php');
	$db = new class_functions();

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
	<?php

  ?> <hr /><h1>Hey <?php echo 	$_SESSION['login_mobile_no'];?>, Click Pay Now  And Enjoy Your Fantacy!
  <hr />
	  
	  <div class="cstm_form_container">

<div class="btn btn-warning" >
<a href="https://rzp.io/i/xF2dv8f" style="text-decoration:none; color:black;" >PAY NOW</a>
</div>

<div class="btn btn-danger">
<a href="login.php?logout" style="text-decoration:none; color:black;">CANCEL</a>
</div>
</div>
<hr />
</h1>
<h1 class= "cstm_h1">You are one step ahed from premium!!Buy Now...</h1>

	  
   
   
  

</center>

<br />
	<br />
	<br />

	
	
<?php
require_once('footer.php');
?>

<!-- close of footer -->




	 
    </div><!-- Close of grid -->
    </div>

</body>
</html>
	 