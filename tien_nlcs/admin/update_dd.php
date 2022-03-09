<?php 
	session_start();
	if(!isset($_SESSION['user'])){
		header("location:login.html");
	}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update order</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <?php  $ma=$_GET['madon'];
                    require '../connect_database.php';
                    $cau = "SELECT * FROM dondathang WHERE maddh=$ma";
                    $result =$con->query($cau);
                    $row = $result->fetch_assoc();
                ?>
                <!-- Nested Row within Card Body -->
                <div class="row">
                	<div class="col-lg-5 d-none d-lg-block"><img src="img/update.jpg"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Cập nhật trạng thái đơn hàng!</h1>
                            </div>
                            <form class="user" action="xu_ly_update_tt.php" method="POST" enctype="multipart/form-data">
                               <div class="row">
               						<div class="col-sm-6"><label for='cap'>Cập nhật trạng thái</label></div>
                                    <div class="col-sm-6">
                                        <select id='cap' name='tt'>
                                            <option value='-1' style='color:#006400;'> Hủy đơn
                                            </option>                          
                                            <option value='1' style='color: #FF8C00'> Đang được xử lý
                                            </option>                       
                                            <option value='2' style='color: #2715bd'> Giao hàng
                                         </option>                                                   
                                        </select>
                                    </div>
                                <input type="hidden" name="idd" value="<?php echo $row['maddh']?>" >
                               </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="submit" class="btn btn-success" value="Cập nhật">
                                    </div>
                                </div>
                                <hr>
                            </form>
                            
                            <div class="text-center">
                                <a class="small" href="index.php">Back to homepage!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>