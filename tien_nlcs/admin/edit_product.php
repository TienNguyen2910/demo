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

    <title>Add product</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <?php  $idsp=$_GET['idsp'];
                    require '../connect_database.php';
                    $cau = "SELECT * FROM mathang WHERE mahang=$idsp";
                    $result =$con->query($cau);
                    $row = $result->fetch_assoc();
                ?>
                <div class="row">
                	<div class="col-lg-5 d-none d-lg-block"><img src="img/add_product.jpg"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Sửa sản phẩm!</h1>
                            </div>
                            <form class="user" action="xu_ly_edit_product.php" method="POST" enctype="multipart/form-data">
                               <div class="row">
               						<div class="col-sm-6"><label for='tensp'>Tên sản phẩm</label></div>
                                    <div class="col-sm-6"><input type="text" id="tensp" required name ="name_item" value="<?php echo $row['tenhang']?>" 
                                          ></div>
                                    <input type="text" name="idsp" value="<?php echo $row['mahang']?>" style="display: none">
                               </div>
                                <div class="row">
                                    <div class="col-sm-6"><label for='gia'>Giá sản phẩm</label></div>
                                    <div class="col-sm-6"><input type="text"  id="gia" required name ="price"
                                         value="<?php echo $row['dongia']?>"> (VNĐ)</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6"><label for='sl'>Số lượng</label></div>
                                        <div class="col-sm-6"><input type="text"  id="sl" required name ="quantity" value="<?php echo $row['soluongton']?>"
                                          > </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6"><label for='hinh'>Hình ảnh sản phẩm</label></div>
                                        <div class="col-sm-6"><input type="file"  id="hinh" required name ="image"
                                          ></div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6"><label for='danhmuc'>Danh mục sản phẩm</label></div>
                                        <div class="col-sm-6">
                                        	<?php 
                                        		  $sql="SELECT * FROM loaisanpham";
                                        		  $result=$con->query($sql);
                                        	 ?>
                                        	<select name="category" id="danhmuc">
                                        		<?php while($rows=$result->fetch_assoc()){ ?>
                                        		<option value="<?php echo $rows['maloai'] ?>"><?php echo $rows['tenloai'] ?></option>
                                        		<?php } ?>
                                        	</select>
                                    	</div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6"><label for='danhmuc'>Thương hiệu</label></div>
                                        <div class="col-sm-6">
                                        	<?php 
                                        		  $sqli="SELECT * FROM hangsanxuat";
                                        		  $result=$con->query($sqli);
                                        	 ?>
                                        	<select name="brand" id="danhmuc">
                                        		<?php while($rows=$result->fetch_assoc()){ ?>
                                        		<option value="<?php echo $rows['mahsx'] ?>"><?php echo $rows['tenhsx'] ?></option>
                                        		<?php } 
                                        			$con->close();
                                        		?>
                                        	</select>
                                    	</div> 
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="reset" class="btn btn-primary"value="Làm lại">
                                        <input type="submit" class="btn btn-success" value="Thêm">
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