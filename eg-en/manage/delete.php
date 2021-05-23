<?php
include('../connection.php');
if(isset($_SESSION['email_admin'])){
    $id = $_GET['product-id'];
if(isset($_GET['product-id']) && $id !== "") {
    $sql = "DELETE FROM products WHERE id=$id";
    $query = mysqli_query($connect, $sql);  
    echo "<script>alert('Deleted Succesfully')</script><script>window.close();</script>";
} else {
    echo "<script>alert('No Product with this id')</script>";
}
  } else {
    echo "<script>alert('Please Login First')</script>";
    header('Location: login.php');
  }  
?>