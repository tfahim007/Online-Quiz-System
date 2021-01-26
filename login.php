<?php
	require('database.php');
	session_start();
	if(isset($_SESSION["email"]))
	{
		session_destroy();
	}
	
	$ref=@$_GET['q'];		
	if(isset($_POST['submit']))
	{	
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$email = stripslashes($email);
		$email = addslashes($email);
		$pass = stripslashes($pass); 
		$pass = addslashes($pass);
		$email = mysqli_real_escape_string($con,$email);
		$pass = mysqli_real_escape_string($con,$pass);					
		$str = "SELECT * FROM user WHERE email='$email' and password='$pass'";
		$result = mysqli_query($con,$str);
		if((mysqli_num_rows($result))!=1) 
		{
			echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
			header("refresh:0;url=login.php");
		}
		else
		{
			$_SESSION['logged']=$email;
			$row=mysqli_fetch_array($result);
			$_SESSION['name']=$row[1];
			$_SESSION['id']=$row[0];
			$_SESSION['email']=$row[2];
			$_SESSION['password']=$row[3];
			header('location: welcome.php?q=1'); 					
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="form.css">
		<title>Login | Online Quiz System</title>
	</head>

	<body>		
				<div class="introname">
					<h2>Online Quiz System</h2>
				</div>
				<div class="tableform">
					<form method="post" action="login.php" enctype="multipart/form-data">	
						<table>
							<center> <h2 style="font-family: Noto Sans;color:white;">Login to </h2><h1 style="font-family: Noto Sans; color:white;">Online Quiz System</h1></center><br>

							<tr>
								<td><input type="email" name="email" placeholder="Enter Your Email Id" required></td>
							</tr>
							<tr>
								<td><input type="password" name="password" placeholder="Enter Your Password" required></td>
							</tr>
							<tr>
								<td><button class="btn btn-primary btn-block" name="submit">Login</button></td>
							</tr>
							
							<tr>
								<td>
									<center>
										<h3 style="font-family: Noto Sans;color:white; text-decoration: none; margin-left: 50px;">Don't have an account? <a href="register.php" style="font-size:25px;">Register</a> Here..</h3>
									<center>
								</td>
							</tr>
						</table>
					</form>
				</div>
			

	</body>
</html>