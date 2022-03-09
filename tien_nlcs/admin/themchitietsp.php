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

    <title>Add detail product</title>

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
                <?php 
                $idsp=$_GET['idsp'];
                $idl=$_GET['id_loai'];
                ?>
                <div class="row">
                	<div class="col-lg-5 d-none d-lg-block"><img src="img/add_product.jpg"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Chi tiết sản phẩm!</h1>
                            </div>
                            <form class="user" action="xu_ly_chitietsp.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="idsp" value="<?php echo $idsp ?>">
                                <input type="hidden" name="idl" value="<?php echo $idl ?>">
                                <!-- start thông số laptop -->
                               <?php switch ($idl) {
                                   case '1': ?>
                                   <div class="row">
                                    <div class="col-sm-6"><label for='tensp'>Model</label></div>
                                    <div class="col-sm-6"><input type="text" id="tensp" required name ="model"
                                      ></div>

                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='c'>CPU</label></div>
                                    <div class="col-sm-6"><input type="text"  id="c" required name ="cpu"
                                      ></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='r'>RAM</label></div>
                                    <div class="col-sm-6"><input type="text"  id="r" required name ="ram"
                                      ></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='mh'>Màn hình</label></div>
                                    <div class="col-sm-6"><input type="text"  id="mh" required name ="mh"
                                      ></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='cm'>Card màn hình</label></div>
                                    <div class="col-sm-6"><input type="text"  id="cm" required name ="cm"
                                      ></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='o'>Ổ cứng</label></div>
                                    <div class="col-sm-6"><input type="text"  id="o" required name ="oc"
                                      ></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='h'>Hệ điều hành</label></div>
                                    <div class="col-sm-6"><input type="text"  id="h" required name ="hdh"
                                      ></div>
                                  </div>
                                  <?php  break;    //end thông số laptop
                                  case '2': 
                                  ?>
                                  <!-- start thông đt -->
                                  <div class="row">
                                    <div class="col-sm-6"><label for='mh'>Màn hình</label></div>
                                    <div class="col-sm-6"><input type="text"  id="mh" required name ="mh"
                                      ></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='c'>Hệ điều hành</label></div>
                                    <div class="col-sm-6"><input type="text"  id="c" required name ="hdh"
                                      ></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='r'>Camera sau</label></div>
                                    <div class="col-sm-6"><input type="text"  id="r" required name ="came_s"
                                      ></div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-sm-6"><label for='o'>Camera trước</label></div>
                                    <div class="col-sm-6"><input type="text"  id="o" required name ="came_t"
                                      ></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='cm'>RAM</label></div>
                                    <div class="col-sm-6"><input type="text"  id="cm" required name ="ram"
                                      ></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='bn'>Bộ nhớ trong</label></div>
                                    <div class="col-sm-6"><input type="text"  id="bn" required name ="bnt"
                                      ></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='bn'>SIM</label></div>
                                    <div class="col-sm-6"><input type="text"  id="bn" required name ="sim"
                                      ></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6"><label for='dl'>Dung lượng pin</label></div>
                                    <div class="col-sm-6"><input type="text"  id="dl" required name ="dl"
                                      ></div>
                                  </div>
                                  <?php  break;  
                              }  ?>         <!-- end thông số đt -->
                              <div class='row'>
                                  <div class='col-sm-6'><label for='cm'>Hình ảnh sản phẩm</label></div>
                                  <div class='col-sm-6'><input type='file'  id='cm' required name ='hinh[]' multiple
                                  ></div>
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