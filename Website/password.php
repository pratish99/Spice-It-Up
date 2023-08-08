<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>Fancy Form Design: Change Password</title>
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
	<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css" />
	<![endif]-->
	
	<!-- JS -->
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.pack.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
</head>
<?php
session_start();
 include('conn.php');
 $un = $_SESSION['user'];
 
 if(isset($_POST['submit'])){
	 $password = $_POST['password_new'];

	 $sql = "UPDATE `customer_register` SET `password`='$password' WHERE userid='$un' ";

	 $result = mysqli_query($conn,$sql);
	 if($result)
	 {
		 
		 echo '<script>alert("Updated successfully")</script>';
		 header('location:profile.php');
	 }
	 else{
		echo '<script>alert(" failed to Update ")</script>';
	 }
 }
?>
<body id="change-password">
	
	<!-- Container -->	
	<br><br><br><br><br><br><br><br><br><br><br>
	<center>
	<div id="container"><div id="container-inner">
		<h1>Change Password</h1>
		<form action="#" method="POST">
			<fieldset>
				<!-- Your current password -->
				<div>
					<label for="password_current">Your current password</label>
					<input type="text" name="password_current" id="password_current" />
				</div>
				
				<!-- Your new password -->
				<div>
					<label for="password_new">Your new password</label>
					<input type="text" name="password_new" id="password_new" />
				</div>
				
				<!-- Confirm password -->
				<div>
					<label for="password_confirm">Confirm password</label>
					<input type="text" name="password_confirm" id="password_confirm" />
				</div>
				
				<!-- Controls -->
				<div class="controls">
					<input id="submit" name="submit" type="submit" value="Save Password" />
				</div>
			</fieldset>
		</form>
			
	</div></div>	<!-- /Container -->
	
</body>
</html>