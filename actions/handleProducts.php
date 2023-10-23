<?php
require_once "conn.php";

$pname = $_POST['pname'];
$price = $_POST['price'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$impact = $_POST['impact'];
$category = $_POST['category'];
$target_dir = "../images/";
$images = $_FILES["image"]["name"];
$image = $target_dir . basename($_FILES["image"]["name"]);
$userId = intval($_POST['userId']);
$sql = "INSERT INTO `products` (`name`, `price`, `decription`, `quantity`, `impact`, `images`, `category`, `userId`) VALUES ('$pname', '$price', '$description', '$quantity', '$impact', '$images','$category',  '$userId');";
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
?>