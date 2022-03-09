<?php 
	session_start();
	session_unset("client");
	header("location:login_client.html");
 ?>