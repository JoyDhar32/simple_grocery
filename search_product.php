<?php
require 'connection.php';

//search data
if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];
    // $search = "SELECT * FROM products where category like '%$search_data_value%'";
    $search = "SELECT * FROM products where price like '%$search_data_value%' OR category like '%$search_data_value%' OR name like '%$search_data_value%'";
    $data = $conn->query($search);
}
$select_rows = mysqli_query($conn, "SELECT * FROM `mycart`") or die('query failed');
$row_count = mysqli_num_rows($select_rows);
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



                <!-- Frozen Foods Start -->
                <div class="container-fluid pt-5">

                    <div class="text-center mb-3">
                        <h2 class="section-title px-5"><span class="px-2" id="frozen_food">Searching Result </span></h2>
                    </div>

                    <div class="row px-xl-5 pb-3">
                        <?php
                        while ($row = mysqli_fetch_assoc($data)) {
                        ?>
                            <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <a href="single_product.php?product=<?php echo $row['id']; ?>">
                                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                            <img class="img-fluid w-100" src="<?php echo $row["image"] ?>" alt="">
                                        </div>
                                    </a>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">

                                        <h6 class="text-truncate mb-3">
                                            <?php echo $row["name"] ?></h6></a>
                                        <div class="d-flex justify-content-center">
                                            <h6><strong> Price :</strong> <span style="color:green"> <?php echo $row["price"] ?>$</span></h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                    </div>
                                </div>
                            </div>




                        <?php } ?>
                    </div>
                </div>





            </div>
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Footer Start -->
    <?php
    include 'components/footer.php';
    ?>
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