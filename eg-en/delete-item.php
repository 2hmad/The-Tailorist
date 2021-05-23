<?php
include('connection.php');
session_start();
$id = $_GET['id'];
$ip = $_SERVER['REMOTE_ADDR'];
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM cart WHERE (email = '$email' AND id='$id') OR (ip = '$ip' AND id='$id')";
    $query = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($query);
    if($num > 0) {
        $del = mysqli_query($connect, "DELETE FROM cart WHERE (id='$id' AND email='$email') OR (id='$id' AND ip='$ip')");
        header('Location: cart.php');
    } else {
        echo "<script>alert('You dont have this product in your shopping cart')</script>";
        header('Location: cart.php');
    }
} else {
    $sql = "SELECT * FROM cart WHERE ip = '$ip' AND id='$id'";
    $query = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($query);
    if($num > 0) {
        $del = mysqli_query($connect, "DELETE FROM cart WHERE id='$id' AND ip = '$ip'");
        if($del) {
            header('Location: cart.php');
        }
    } else {
        echo "<script>alert('You dont have this product in your shopping cart')</script>";
        header('Location: cart.php');
    }
}
?>