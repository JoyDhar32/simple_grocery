<?php
require 'connection.php';
$category1 = "SELECT * FROM products where category='frozen food'";
$frozen_food = $conn->query($category1);

$category2 = "SELECT * FROM products where category='fresh food'";
$fresh_food = $conn->query($category2);

$category3 = "SELECT * FROM products where category='beverages'";
$beverages = $conn->query($category3);

$category4 = "SELECT * FROM products where category='home health'";
$home_health = $conn->query($category4);

$category5 = "SELECT * FROM products where category='pet food'";
$pet_foods = $conn->query($category5);

// subscription form
if (isset($_POST["subscription"])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
 
    $sql = "insert into `subscription` (name,email) VALUES ('$name','$email')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $message = '<div class="alert alert-success">
            <strong>Success!</strong> Subscription Has Been Completed Successfully
          </div>';
    }
}
if (isset($_POST['cart'])) {
   $id=$_POST['id'];
   $sql="SELECT * from products where id like '%$id%'";

   $single_product = $conn->query($sql);
    $row = mysqli_fetch_assoc($single_product);
    $name= $row['name'];
    $image= $row['image'];
    $qty= 1;
    $price= $row['price'];

$select_cart = mysqli_query($conn,"SELECT * FROM `mycart` WHERE product_id=$id");
if(mysqli_num_rows($select_cart)>0){
    $already="Product already added to cart";
}
else{
    $sql_insert = "insert into `mycart` (product_id,name,image,qty,price) VALUES ('$id','$name','$image','$qty','$price')";
    $result = mysqli_query($conn, $sql_insert);
    if($result){
        $add_cart = '<div class="alert alert-success">
        <strong>Success!</strong> Product Has Been Added Successfully
      </div>';
    }
}
    
}
$select_rows=mysqli_query($conn,"SELECT * FROM `mycart`") or die('query failed');
    $row_count=mysqli_num_rows($select_rows);
?>