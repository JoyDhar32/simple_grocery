<?php
require 'connection.php';

$id=$_GET['product'];

if(filter_var($id, FILTER_VALIDATE_INT)===false){
    header("Location: index.php");
    die(); 
}

 $sql="SELECT * from products where id like  '%$id%'";

$single_product = $conn->query($sql);
 $row = mysqli_fetch_assoc($single_product);


 $select_rows=mysqli_query($conn,"SELECT * FROM `mycart`") or die('query failed');
 $row_count=mysqli_num_rows($select_rows);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UTS Grocery</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="css/single_product.css?v=1.1" />

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
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 55px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <a href="index.php#frozen_food" class="nav-item nav-link">Frozen-Food</a>
                        <a href="index.php#fresh_food" class="nav-item nav-link">Fresh-Food</a>
                        <a href="index.php#beverages" class="nav-item nav-link">Beverages</a>
                        <a href="index.php#home_health" class="nav-item nav-link">Home-Health</a>
                        <a href="index.php#pet_food" class="nav-item nav-link">Pet-Food</a>
                    </div>
                </nav>
            </div>
            
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">UTS</span>Grocery</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </nav>



                <div class="container-fluid pt-5">

                    <div class="row">
                    
                            <div class="productCard_block">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="productCard_leftSide clearfix">
                                          

                                            <div class="sliderBlock">
                                                
                                                        <img src="<?php echo $row["image"] ?>" alt="<?php echo $row["category"] ?>"/>
                                               


                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="productCard_rightSide">
                                             <div class="block_product">
                                                <h4 class=""><?php  echo $row['name']; ?></h4>

                                                <p class="block_product__advantagesProduct">
                                                <?php  echo $row['category']; ?>
                                                </p>

                                                <div class="block_informationAboutDevice">

                                                  

                                                    <div class="block_descriptionInformation">
                                                        <span><?php  echo $row['description']; ?>
                                                        </span>
                                                    </div>

                                                 
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="block_price">
                                                                <span class="block_price__currency">Price: <?php  echo $row['price'].'$'; ?></span>
                                                             
                                                        </div>
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                </div>
            </div></div></div></div>
            <button ondblclick = window.location.href='cart.php'; id="dragBtn" style="position:fixed;right:100px;bottom:30px;height:50px;width:170px;background:#C17A74;border:none;border-radius:5px;color:white;font-weight:bold;z-index:99"><i class="fas fa-shopping-cart" style="color:white"></i> <abbr title="Double Click Me">My Cart &nbsp </abbr>( <span style="color:green"> <?php echo $row_count ?></span> ) </button>
       <!-- Footer Start -->
       <?php
    include 'components/footer.php';
    ?>
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
    <script src="js/single_product.js"></script>
</body>

</html>