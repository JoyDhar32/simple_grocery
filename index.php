<?php
require 'components/index_com.php';
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
                <a href="" class="text-decoration-none">
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

<?php
require 'components/nav_bar.php'
?>


    <!-- Frozen Foods Start -->
    <div class="container-fluid pt-1">
        <div class="text-center mb-3">
            <h2 class="section-title px-5"><span class="px-2" id="frozen_food">Frozen Food</span></h2>
        </div>

        <div class="row px-xl-5 pb-3">
            <?php
            while ($row = mysqli_fetch_assoc($frozen_food)) {
            ?>
                <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4"> 
                    <form action="" method="post">
                        <a href="single_product.php?product=<?php echo $row['id']; ?>">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="<?php echo $row["image"] ?>" alt="">
                            </div>
                        </a>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $row["name"] ?></h6>
                            <div class="d-flex justify-content-center">
                                <h6><strong> Price :</strong> <span style="color:green"> <?php echo $row["price"] ?>$</span></h6>
                            </div>
                        </div>
                     
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                        <div class="card-footer d-flex  bg-light border">
                          <input type="submit" name="cart" class="btn btn-sm pl-2" value="Add To Cart" style="font-weight:bold; color:#C17A74"/> 
                        </div>
                        </form>
                    </div>
                </div>
           
            <?php } ?>
        </div>
    </div>

    <!-- Fresh Foods Start -->
    <div class="container-fluid pt-1">
        <div class="text-center mb-3">
            <h2 class="section-title px-5"><span class="px-2" id="fresh_food">Fresh Food</span></h2>
        </div>

        <div class="row px-xl-5 pb-3">
            <?php
            while ($row = mysqli_fetch_assoc($fresh_food)) {
            ?>
               <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4"> 
                    <form action="" method="post">
                        <a href="single_product.php?product=<?php echo $row['id']; ?>">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="<?php echo $row["image"] ?>" alt="">
                            </div>
                        </a>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $row["name"] ?></h6>
                            <div class="d-flex justify-content-center">
                                <h6><strong> Price :</strong> <span style="color:green"> <?php echo $row["price"] ?>$</span></h6>
                            </div>
                        </div>
                     
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                        <div class="card-footer d-flex  bg-light border">
                          <input type="submit" name="cart" class="btn btn-sm pl-2" value="Add To Cart" style="font-weight:bold; color:#C17A74"/> 
                        </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>




    <!-- Beverages Start -->
    <div class="container-fluid pt-1">
        <div class="text-center mb-3">
            <h2 class="section-title px-5"><span class="px-2" id="beverages">Beverages</span></h2>
        </div>

        <div class="row px-xl-5 pb-3">
            <?php
            while ($row = mysqli_fetch_assoc($beverages)) {
            ?>
               <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4"> 
                    <form action="" method="post">
                        <a href="single_product.php?product=<?php echo $row['id']; ?>">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="<?php echo $row["image"] ?>" alt="">
                            </div>
                        </a>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $row["name"] ?></h6>
                            <div class="d-flex justify-content-center">
                                <h6><strong> Price :</strong> <span style="color:green"> <?php echo $row["price"] ?>$</span></h6>
                            </div>
                        </div>
                     
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                        <div class="card-footer d-flex  bg-light border">
                          <input type="submit" name="cart" class="btn btn-sm pl-2" value="Add To Cart" style="font-weight:bold; color:#C17A74"/> 
                        </div>
                        </form>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>




    <!-- Home Health Start -->
    <div class="container-fluid pt-1">
        <div class="text-center mb-3">
            <h2 class="section-title px-5"><span class="px-2" id="home_health">Home Health</span></h2>
        </div>

        <div class="row px-xl-5 pb-3">
            <?php
            while ($row = mysqli_fetch_assoc($home_health)) {
            ?>
            <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4"> 
                    <form action="" method="post">
                        <a href="single_product.php?product=<?php echo $row['id']; ?>">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="<?php echo $row["image"] ?>" alt="">
                            </div>
                        </a>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $row["name"] ?></h6>
                            <div class="d-flex justify-content-center">
                                <h6><strong> Price :</strong> <span style="color:green"> <?php echo $row["price"] ?>$</span></h6>
                            </div>
                        </div>
                     
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                        <div class="card-footer d-flex  bg-light border">
                          <input type="submit" name="cart" class="btn btn-sm pl-2" value="Add To Cart" style="font-weight:bold; color:#C17A74"/> 
                        </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>




    <!-- Pet Foods Start -->
    <div class="container-fluid pt-1">
        <div class="text-center mb-3">
            <h2 class="section-title px-5"><span class="px-2" id="pet_food">Pet Food</span></h2>
        </div>

        <div class="row px-xl-5 pb-3">
            <?php
            while ($row = mysqli_fetch_assoc($pet_foods)) {
            ?>
               <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4"> 
                    <form action="" method="post">
                        <a href="single_product.php?product=<?php echo $row['id']; ?>">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="<?php echo $row["image"] ?>" alt="">
                            </div>
                        </a>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $row["name"] ?></h6>
                            <div class="d-flex justify-content-center">
                                <h6><strong> Price :</strong> <span style="color:green"> <?php echo $row["price"] ?>$</span></h6>
                            </div>
                        </div>
                     
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                        <div class="card-footer d-flex  bg-light border">
                          <input type="submit" name="cart" class="btn btn-sm pl-2" value="Add To Cart" style="font-weight:bold; color:#C17A74"/> 
                        </div>
                        </form>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
    <button ondblclick = window.location.href='cart.php'; id="dragBtn" style="position:fixed;right:100px;bottom:30px;height:50px;width:170px;background:#C17A74;border:none;border-radius:5px;color:white;font-weight:bold;z-index:99"><i class="fas fa-shopping-cart" style="color:white"></i> <abbr title="Double Click Me">My Cart &nbsp </abbr>( <span style="color:green"> <?php echo $row_count ?></span> ) </button>
 <!-- product Messages -->
<?php 
require 'components/product_message.php';
require 'components/footer.php';
?>
<!-- Product Components End -->
   


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