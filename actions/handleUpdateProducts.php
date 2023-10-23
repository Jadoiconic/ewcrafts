<?php
require_once "conn.php";

$pname = $_POST['pname'];
$id = intval($_POST['id']);
$price = $_POST['price'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$impact = $_POST['impact'];
$category = $_POST['category'];
$target_dir = "../images/";
$images = $_FILES["image"]["name"];
$image = $target_dir . basename($_FILES["image"]["name"]);
if(!empty($images)){
    $sql = "UPDATE `products` SET `name`='$pname',`price`='$price',`decription`='$description',`quantity`='$quantity',`impact`='$impact',`images`='$images',`category`='$category' WHERE `id`='$id'";
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
        $qry = mysqli_query($conn, $sql);
        if ($qry) {
            header("Location:../data.php");
            exit();
        } else {
            print("Something went Wrong");
        }
    } else {
        print("Failed to upload");
    }
}else{
    $sql = "UPDATE `products` SET `name`='$pname',`price`='$price',`decription`='$description',`quantity`='$quantity',`impact`='$impact',`category`='$category' WHERE `id`='$id'";            
    $qry = mysqli_query($conn, $sql);
    if ($qry) {
        header("Location:../data.php");
        exit();
    } else {
        print("Something went Wrong");
    }
}
?>