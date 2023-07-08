<?php
require "connection.php";
if (isset($_POST["submit"])) {
    $message = "";
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    $imagefilename = $image['name'];
    $imagefileerror = $image['error'];
    $imagefiletemp = $image['tmp_name'];
    $filename_separate = explode('.', $imagefilename);
    $file_extension = strtolower(end($filename_separate));

    $extension = array('jpeg', 'jpg', 'png');
    if (in_array($file_extension, $extension)) {
        $upload_image = 'img/' . $imagefilename;
        move_uploaded_file($imagefiletemp, $upload_image);
        $sql = "insert into `products` (name,category,price,image,description) VALUES ('$name','$category','$price','$upload_image','$description')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $message = '<div class="alert alert-success">
            <strong>Success!</strong> Product Has Been Added Successfully
          </div>';
        } else {
            die(mysqli_error($conn));
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <title>addProduct</title>

    <!-- Favicon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container pt-5 mt-5" style="background-color:rgba(237, 231, 225,0.3)">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Insert Product</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-10 mb-5">
                <div class="Product-form">
                   
                        <?php if (isset($message)) { ?>
                            <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Product has been added successfully'
            })
        </script>

                            <?php } ?>
                    
                    <form action="" method="post" enctype="multipart/form-data" autocomplete="on" name="sentMessage" id="contactForm">

                        <div class="form-group row">
                            <div class="col-md-6 control-group">
                                <label for="text">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" data-validation-required-message="Please enter Product name" required/>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group col-md-6">
                                <label for="text">Product Category</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value="" disabled selected>Select Category</option>
                                    <option value='frozen food'>Frozen-Food</option>
                                    <option value='fresh food'>Fresh-Food</option>
                                    <option value='beverages'>Bevereages</option>
                                    <option value='home health'>Home-Health</option>
                                    <option value='pet food'>Pet-Food</option>
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 control-group">
                                <label for="text">Product Price</label>
                                <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" data-validation-required-message="Please enter Product name" required/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group col-md-6">
                                <label for="text">Product Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept=".jpg,.jepg,.png" required/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Product Description" data-validation-required-message="Please enter your message" name="description" required></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary text-right py-2 px-4" type="submit" id="sendMessageButton" name="submit">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <script src="js/main.js"></script>
</body>

</html>