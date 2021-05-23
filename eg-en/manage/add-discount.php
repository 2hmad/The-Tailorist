<html>
<head>
<title>Admin Dashboard | The Tailorist</title>
<?php include('links.php') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<style>
.add-discount {
  background-color: white;
  padding: 15px;
  margin-top: 6%;
  border-radius: 5px;
  box-shadow: 0px 0px 5px 5px #f1f1f1;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 6%;
}
.add-button {
  width: 200px;
  padding: 10px;
  background: tomato;
  color: white;
  font-weight: bold;
  text-transform: uppercase;
  border: 1px solid tomato;
  border-radius: 5px;
  outline: none;
  margin-left: auto;
  margin-right: auto;
  display: block;
  margin-top: 7%;
}
</style>
</head>
<body style="background-color: hsl(210deg 50% 98%);">
<?php include('menu.php');
if(isset($_SESSION['email_admin'])){
  echo "";
} else {
  echo "<script>alert('Please Login First')</script>";
  header('Location: login.php');
}
?>
<div class="container">
<div class="add-discount">
<span style="text-align:center;font-weight:bold;font-size:25px;display:block;margin-bottom: 5%;margin-top: 1%;">Add Discount</span>

<form method="POST">
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Product ID</label>
  <input type="number" name="product-id" style="width: 100%;display: block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Category</label>
  <select name="product-category" style="width: 100%;display: block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Choose Category</option>
    <option>Women</option>
    <option>Men</option>
    <option>Kids</option>
    <option>Wedding</option>
  </select>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Discount <span style="font-size: 0.9rem;color: red;">(%)</span></label>
  <input type="number" name="product-discount" min="0" style="width: 100%;display: block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
  <button type="submit" name="add-discount" class="add-button">Add Discount</button>
</form>
<?php
if(isset($_POST['add-discount'])) {
  $product_id = $_POST['product-id'];
  $product_category = $_POST['product-category'];
  $discount = $_POST['product-discount'];
  if($product_category === "Women") {
    $sql = "SELECT * FROM products_women WHERE id = $product_id";
    $query = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($query);
    if($num > 0) {
      $sql = "UPDATE products_women SET discount = '$discount' WHERE id = '$product_id'";
      $query = mysqli_query($connect, $sql);
      echo "<div class='alert alert-success'>You added discount on this product</div>";
    } else {
      echo "<div class='alert alert-danger'>Item is not found</div>";
    }
  } elseif($product_category === "Men") {
    $sql = "SELECT * FROM products_men WHERE id = $product_id";
    $query = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($query);
    if($num > 0) {
      $sql = "UPDATE products_men SET discount = '$discount' WHERE id = '$product_id'";
      $query = mysqli_query($connect, $sql);
      echo "<div class='alert alert-success'>You added discount on this product</div>";
    } else {
      echo "<div class='alert alert-danger'>Item is not found</div>";
    }
  } elseif($product_category === "Kids") {
    $sql = "SELECT * FROM products_kids WHERE id = $product_id";
    $query = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($query);
    if($num > 0) {
      $sql = "UPDATE products_kids SET discount = '$discount' WHERE id = '$product_id'";
      $query = mysqli_query($connect, $sql);
      echo "<div class='alert alert-success'>You added discount on this product</div>";
    } else {
      echo "<div class='alert alert-danger'>Item is not found</div>";
    }
  } elseif($product_category === "Wedding") {
    $sql = "SELECT * FROM products_wedding WHERE id = $product_id";
    $query = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($query);
    if($num > 0) {
      $sql = "UPDATE products_wedding SET discount = '$discount' WHERE id = '$product_id'";
      $query = mysqli_query($connect, $sql);
      echo "<div class='alert alert-success'>You added discount on this product</div>";
    } else {
      echo "<div class='alert alert-danger'>Item is not found</div>";
    }
  }
}
?>
</div>
</div>
<?php include('scripts.php') ?>
<script>
$('#color-add').keypress(function(e){
if (e.keyCode == 13) {
$('#color-add').val($('#color-add').val() + ', ');
}
});
</script>
<script>
jQuery(function ($) {
$(".sidebar-dropdown > a").click(function() {
$(".sidebar-submenu").slideUp(200);
if (
$(this)
  .parent()
  .hasClass("active")
) {
$(".sidebar-dropdown").removeClass("active");
$(this)
  .parent()
  .removeClass("active");
} else {
$(".sidebar-dropdown").removeClass("active");
$(this)
  .next(".sidebar-submenu")
  .slideDown(200);
$(this)
  .parent()
  .addClass("active");
}
});
$("#close-sidebar").click(function() {
$(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
$(".page-wrapper").addClass("toggled");
});
});
</script>
</body>
</html>