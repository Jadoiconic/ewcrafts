<?php 
require_once "./actions/conn.php";
$docId = $_GET['q'];
$sql = "UPDATE orders SET `delivery`= !delivery WHERE `id` ='$docId'";
$qry = mysqli_query($conn,$sql);
if($qry){
    header('Location:orders.php');
}
?>