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