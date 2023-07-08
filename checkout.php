<?php
require 'connection.php';
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

                <!-- Checkout Start -->
                <form action="" method="POST">
                    <div class="container-fluid pt-5">
                        <div class="row px-xl-5">
                            <div class="col-lg-8">
                                <div class="mb-4">
                                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                                    <form action="" method="post">
                                        <?php
                                        $select_cart = mysqli_query($conn, "SELECT * FROM `mycart`");
                                        $total = 0;
                                        $grand_total = 0;
                                        if (mysqli_num_rows($select_cart) > 0) {
                                            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                                $total_price = number_format($fetch_cart['price'] * $fetch_cart['qty']);
                                                $grand_total = $total += $total_price;
                                            }
                                        }
                                        ?>




                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>First Name</label>
                                                <input class="form-control" type="text" placeholder="John" name="first_name" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Last Name</label>
                                                <input class="form-control" type="text" placeholder="Doe" name="last_name" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>E-mail</label>
                                                <input class="form-control" type="text" placeholder="example@email.com" name="email" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Mobile No</label>
                                                <input class="form-control" type="text" placeholder="0424000000" name="mobile" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Address Line 1</label>
                                                <input class="form-control" type="text" placeholder="123 Street" name="address" required>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label>ZIP Code</label>
                                                <input class="form-control" type="text" placeholder="123" required name="zip">
                                            </div>

                                        </div>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="card border-secondary mb-5">
                                    <div class="card-header bg-secondary border-0">
                                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                                    </div>
                                    <div class="card-body">

                                        <hr class="mt-0">
                                        <div class="d-flex justify-content-between mb-3 pt-1">
                                            <h6 class="font-weight-medium">Subtotal</h6>
                                            <h6 class="font-weight-medium">$<?= $grand_total; ?></h6>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-weight-medium">Shipping</h6>
                                            <h6 class="font-weight-medium">$00</h6>
                                        </div>
                                    </div>
                                    <div class="card-footer border-secondary bg-transparent">
                                        <div class="d-flex justify-content-between mt-2">
                                            <h5 class="font-weight-bold">Total</h5>
                                            <h5 class="font-weight-bold">$<?= $grand_total; ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-secondary mb-5">
                                    <div class="card-header bg-secondary border-0">
                                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                                <label class="custom-control-label" for="banktransfer">Cash On Delivery</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer border-secondary bg-transparent">
                                        <input type="submit" onclick="setDelay()" value="Place Order" name="place_order" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            include 'components/footer.php';
            ?>

            <?php
            if (isset($_POST['place_order'])) {

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $mobile = $_POST['mobile'];
                $address = $_POST['address'];
                $zip = $_POST['zip'];
                $total = $grand_total;
                $select_cart = mysqli_query($conn, "SELECT * FROM `order_details` WHERE total_price=$total_price AND mobile = $mobile");
                if (mysqli_num_rows($select_cart) > 0) {
                    $already = "Product already added to cart";
                } else {
                    $detail_query = mysqli_query($conn, "INSERT INTO `order_details` (first_name, last_name, email, mobile, address, zip, total_price) VALUES('$first_name','$last_name','$email','$mobile','$address','$zip','$total')") or die('query failed');

                    if ($detail_query) {
                        $order_complete = 1;
                    }
                }
            }
            ?>
            <!-- Checkout End -->
            <?php if (isset($order_complete)) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Congratulations',
                        text: 'Product has been added successfully'
                    })
                </script>

                <?php
                if (isset($order_complete)) {
                    $sql = "DELETE FROM mycart";

                    if ($conn->query($sql) === TRUE) {
              
                      $res=1; 
           
                    }
                }
            } ?>
            <!-- Checkout End -->
            <?php if (isset($already)) { ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Already Placed the order'
                    })
                </script>

            <?php } ?>




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

            <!-- Template Javascript -->
            <script src="js/main.js"></script>
</body>

</html>