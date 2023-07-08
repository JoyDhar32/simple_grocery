

<?php
require 'connection.php';

$mycart = "SELECT * FROM mycart";
$cart = $conn->query($mycart);
$grand_total=0;
if(isset($_POST['update_btn'])){
    $update_value = $_POST['update_qty'];
    $update_id = $_POST['update_qty_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `mycart` SET qty = '$update_value' WHERE id = '$update_id'");
    if($update_quantity_query){
       header('location:cart.php');
    };
 };
 
 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `mycart` WHERE id = '$remove_id'");
    header('location:cart.php');
 };


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UTS Grocery</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">

        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">UTS</span>Grocery</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="search_product.php" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products" name="search_data">

                        <input type="submit" value="search" class="btn btn-primary" name="search_data_product">

                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="addProduct.php" class="btn border nav-item nav-link">
                    <i class="fas fa-plus-circle text-primary"></i> Insert product
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-1">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 55px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 300px">
                        <a href="index.php#frozen_food" class="nav-item nav-link">Frozen-Food</a>
                        <a href="index.php#fresh_food" class="nav-item nav-link">Fresh-Food</a>
                        <a href="index.php#beverages" class="nav-item nav-link">Beverages</a>
                        <a href="index.php#home_health" class="nav-item nav-link">Home-Health</a>
                        <a href="index.php#pet_food" class="nav-item nav-link">Pet-Food</a>
                    </div>
                </nav>
       
       
      
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light ">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">UTS</span>Grocery</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </nav>
         
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php
            while ($row = mysqli_fetch_assoc($cart)) {
            ?>
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> <?php echo $row['name'] ?></td>
                            <td class="align-middle"><?php echo $row['price'].'$'; ?></td>
                           
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width:150px">
                              
                                 
                                    <form action="" method="POST">
                                   <input type="hidden" name="update_qty_id" value="<?php echo $row['id']; ?>"/>
                                   <div class="row">
                                    <input type="number" class="form-control form-control-sm bg-secondary text-center col-md-4" value="<?php echo $row['qty']?>" min="1" max="10" name="update_qty">
                                   <input type="submit" value="update" name="update_btn"class="btn btn-sm btn-primary col-md-8">
                                   </div>
                                </form>
                              
           
                                </div>
                            </td>  
                            <td class="align-middle">  <?php echo $sub_total=($row['price']* $row['qty'])?> </td>
                            <td class="align-middle"><a href="cart.php?remove=<?php echo $row['id'];?>" name="remove_item" onclick ="return confirm('remove item from cart?')" class="btn btn-sm btn-primary" ><i class="fa fa-times"></i> </a></td>
                        </tr>

                  <?php 
                $grand_total +=$sub_total;
                } ?>
                    </tbody>
                </table>
            </div>
   
        </div>
    </div>
    <div class="col-md-8">
    <div class="card border-secondary mb-5  text-center">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">$<?php echo $grand_total; ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$00</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">$<?php echo $grand_total; ?></h5>
                    </div>
                    <a href="checkout.php" class="btn btn-block btn-primary my-3 py-3 <?= ($grand_total > 1)?'':'disabled'; ?>">Proceed To Checkout</a>
                </div>
            </div></div>
</div></div>


    <!-- Footer Start -->
   <?php require 'components/footer.php' ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <script src="js/dragbutton.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>















