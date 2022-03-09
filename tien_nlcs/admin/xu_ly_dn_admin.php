<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		session_start();
		$email =$_POST['email'];
		$mk =md5($_POST['pass']);
		//echo $email."<br>".$mk;
		require '../connect_database.php';
		$sql = "SELECT * FROM admin WHERE email = '$email' AND password ='$mk' ";
		//echo $sql;
		$result = $con->query($sql);
		$row=$result->fetch_assoc();
		if($result->num_rows>0){
			$_SESSION['user']=$row['admin_name'];
			// echo "welcome ". $row['admin_name'];
			header("location:index.php");
		}
		else{
			header("location:login.html");
		}
	 ?>
</body>
</html>