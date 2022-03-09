<?php 
	session_start();
	// remove all session variables
	session_unset('user');
	// // destroy the session
	// session_destroy();
	header("location:login.html");
 ?>