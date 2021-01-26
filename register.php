<?php
	include("database.php");
	session_start();
	
	if(isset($_POST['submit']))
	{	
		$name = $_POST['name'];
		$name = stripslashes($name);
		$name = addslashes($name);

		$email = $_POST['email'];
		$email = stripslashes($email);
		$email = addslashes($email);

		$password = $_POST['password'];
		$password = stripslashes($password);
		$password = addslashes($password);

		$college = $_POST['college'];
		$college = stripslashes($college);
		$college = addslashes($college);
		$str="SELECT email from user WHERE email='$email'";
		$result=mysqli_query($con,$str);
		
		if((mysqli_num_rows($result))>0)	
		{
            echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
            header("refresh:0;url=login.php");
        }
		else
		{
            $str="insert into user set name='$name',email='$email',password='$password',college='$college'";
			if((mysqli_query($con,$str)))	
			echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
			header('location: welcome.php?q=1');
		}
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Register | Online Quiz System</title>
		<link rel="stylesheet" href="form.css">
   
	</head>

	<body>
		<div class="introname">
			<h2>Online Quiz System</h2>
		</div>
		<div class="tableformlong">
			<form method="post" action="register.php" enctype="multipart/form-data">
				<table>
							<center> <h2 style="font-family: Noto Sans;color:white;">Register to </h2><h1 style="font-family: Noto Sans; color:white;">Online Quiz System</h1></center><br>

							<tr>
								<td><input type="text" name="name"  placeholder="Enter Your Full Name" required /></td>
							</tr>
							<tr>
								<td><input type="email" name="email"  placeholder="Enter Your Email" required /></td>
							</tr>
							<tr>
								<td><input type="password" name="password"  placeholder="Enter Your Password" required /></td>
							</tr>
							<tr>
								<td><input type="text" name="college" placeholder="Enter Your Institution" required /></td>
							</tr>
							<tr>
								<td><button class="btn" name="submit">Register</button></td>
							</tr>
							
							<tr>
								<td>
									<center>
										<h3 style="font-family: Noto Sans;color:white; text-decoration: none; margin-left: 50px;">Already have an account? <a href="login.php" style="font-size:25px;">Login</a> Here..</h3>
									<center>
								</td>
							</tr>
						</table>
			</form>
		</div>
				
	</body>
</html>