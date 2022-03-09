<?php 
	$idsp=$_POST['idsp'];
	$idl=$_POST['idl'];
	//echo $idsp.",".$idl;
	require '../connect_database.php';
	$files = $_FILES['hinh'];
	$file_names=$files['name'];
	foreach ($file_names as $key=> $value) {
		$duongdan='./img/'. $value;
		$con->query("INSERT INTO hinhanhsp (mahang,link_anh) VALUES($idsp,'$duongdan')");
		move_uploaded_file($files['tmp_name'][$key],$duongdan);
		//echo $duongdan."<br>";
	}
	switch ($idl) {
		case '1':
			$model=$_POST['model'];
			$cpu=$_POST['cpu'];
			$ram=$_POST['ram'];
			$mh=$_POST['mh'];
			$cm=$_POST['cm'];
			$oc=$_POST['oc'];
			$hdh=$_POST['hdh'];
			$sql="INSERT INTO tskthuat_laptop VALUES($idsp,$idl,'$model','$cpu','$ram','$mh','$cm','$oc','$hdh')";
			//echo $sql;
			$result=$con->query($sql);
			if($result){
				header('location:tables.php');
			}
			else{
				echo"insert fail!!";
			}
			break;
		case '2':
			$mh=$_POST['mh'];
			$hdh=$_POST['hdh'];
			$came_t=$_POST['came_t'];
			$came_s=$_POST['came_s'];
			$ram=$_POST['ram'];
			$btn=$_POST['btn'];
			$sim=$_POST['sim'];
			$dl=$_POST['dl'];
			$sql="INSERT INTO tskthuat_dt VALUES($idsp,2,'$mh','$hdh','$came_t','$came_s','$ram','$btn','$sim','$dl')";
			//echo $sql;
			$result=$con->query($sql);
			if($result){
				header('location:tables.php');
			}
			else{
				echo"insert fail!!";
			}
			break;
	}
	
	//(model,CPU,RAM,manhinh,card_manhinh,o)
 ?>
 