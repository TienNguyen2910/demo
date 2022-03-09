<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$name=$_POST['name'];
		$email=$_POST['email'];
		$mk=md5($_POST['pass']);
		require '../connect_database.php';
		$sql="INSERT INTO admin(admin_name,email,password) VALUES('$name','$email','$mk')";
		$result=$con->query($sql);
		if($result){
			$_SESSION['user']=$row['admin_name'];
			// echo "welcome ". $row['admin_name'];
			header("location:index.php");
		}
		$con->close();
	 ?>
</body>
</html>