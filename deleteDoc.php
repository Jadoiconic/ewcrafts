<?php 
require_once "./actions/conn.php";
$docId = $_GET['q'];
$sql = "DELETE FROM `products` WHERE `id` ='$docId'";
$sqli = "DELETE FROM `orders` WHERE `productId` ='$docId'";
if(mysqli_query($conn, $sqli)) {
$qry = mysqli_query($conn,$sql);
if($qry){
    header('Location:data.php');
}
}
// ?>