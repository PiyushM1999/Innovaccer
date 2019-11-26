<?php 

$link=mysqli_connect("localhost","root","","drdo");
if(isset($_POST['submit'])){

	$adminemail="security@drdo";
	$adminpass="drdo124";
	if($_POST['name']==$adminemail && $_POST['password']==$adminpass)
	{
		header("Location:details.html");
	}
	if($_POST['name']==''||$_POST['password']=='')
	{
	   echo '<script language="javascript">';
	   echo 'alert("Please Enter your Email ID or password")';
		echo '</script>';
   
	}
	else{
        $hash = md5($_POST['password'], PASSWORD_DEFAULT);
		$query="SELECT * FROM sign WHERE name1='".mysqli_real_escape_string($link,$_POST['name'])."'";
		$result=mysqli_query($link,$query);
		$row=mysqli_fetch_array($result);
		if(isset($row)){

			if($hash==$row['pass']){
				
			
             $_SESSION['id']=$row['id'];
	
			setcookie("id",$row['id'],time()+60*60*24*365);
				
		header("Location:session.php");
				
			}
			else{
			    echo '<script language="javascript">';
	echo 'alert("Please Correct your Password")';
	echo 'alert("Please Enter a valid Email ID")';
     echo '</script>';
		}
	}
	


}}
?>

<!DOCTYPE html>
<html>
<head>
<title>login page</title>
	<link rel="stylesheet" type="text/css" href="stylepg.css">
	
<body>
	<div class="loginform">
	<img src = "user1.png" class="avatar">
	<h1>Login here</h1>
	<form method="post">
		<p>Username</p>
		<input type="text" name="name" placeholder="Enter Username">
		<p>Password</p>
		<input type="password" name="password" placeholder="Enter Password">
		<input type="submit" name="submit" value="Login">
		
		<br>
		<a href="http://localhost/drdo%20project/Registration.php">Don't have an account ?</a>
	</form>
	</div>
</body>
</head>
</html>
