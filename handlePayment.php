<?php
require_once "./actions/conn.php";
include 'pay_parse.php';


hdev_payment::api_id("HDEV-936b6800-f7e5-4f2d-93a6-143515e0dfe3-ID");
hdev_payment::api_key("HDEV-08c68070-dc42-4310-9b2a-352d6f425daa-KEY");

$amount = $_POST['price'];
$names = $_POST['names'];
$tel = $_POST['phone'];
$email = $_POST['email'];
$id = $_POST['id'];
$prodName = $_POST['prodName'];
$calback = "";
$status = '';
$transaction_ref = generateRandomAlphanumeric(18);
$tx_ref = "Xf2mQyNYjcQ4l2yDFM";

try {
    $pay = hdev_payment::pay($tel, $amount, $transaction_ref, $calback);
    $result = hdev_payment::get_pay($transaction_ref);
    if ($pay) {
        $sql = "INSERT INTO `orders`(`productId`, `ProductName`, `price`, `clientName`, `email`, `phone`, `status`, `transaction_ref`) VALUES ('$id','$prodName','$amount','$names','$email','$tel','1','$transaction_ref')";
            $res = mysqli_query($conn, $sql);
            if ($res && $result) {
                $_SESSION["paymentSuccess"] = "Payment Successfully!";
                header("Location:shop.php");
                print("Login Successfuly");
            }else{

            }
        }else{
            $sql = "INSERT INTO `orders`(`productId`, `ProductName`, `price`, `clientName`, `email`, `phone`, `status`, `transaction_ref`) VALUES ('$id','$prodName','$amount','$names','$email','$tel','0','$transaction_ref')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                $_SESSION["paymentFail"] = "Payment Failled!";
                header("Location:shop.php");
                print("Login Successfuly");
            }
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

function generateRandomAlphanumeric($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>