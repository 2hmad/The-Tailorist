<!DOCTYPE html>
<html>
<head>
<title>The Tailorist | Modern, Modest Fashion</title>
<?php include('links.php') ?>
<style>
main {
  display: none
}
.quantity-field {
  max-width: 75px;
  border: 1px solid #CCC;
  background: transparent;
  padding: 2px;
  outline: none;
}
.update-cart {
  outline: none;
  background: transparent;
  border: none;
  margin-right: 10%;
}
</style>
</head>
<body>
<?php include('navbar.php') ?>
<br><br>

<div class="container">
<h5>Shopping Cart <span>(<?php
  $remote  = $_SERVER['REMOTE_ADDR'];
  if(isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $sql = "SELECT COUNT(*) AS total_cart FROM cart WHERE email = '$email' OR ip = '$remote'";
  $query = mysqli_query($connect, $sql);
  $row = mysqli_fetch_assoc($query);
  echo $row['total_cart'];
  } else {
  $sql = "SELECT COUNT(*) AS total_cart FROM cart WHERE ip = '$remote'";
  $query = mysqli_query($connect, $sql);
  $row = mysqli_fetch_assoc($query);
  echo $row['total_cart'];
  }
?>)</span></h5>
<br><br>
<div class="table-responsive">
  <table class="table">
    <thead style="border:none">
    <tr class="table">
      <th scope="col">Product</th>
      <th scope="col">Size</th>
      <th scope="col">Price</th>
      <th scope="col">Remove</th>
    </tr>
    </thead>
    <tbody style="vertical-align: middle;">
    <?php
if(isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $ip = $_SERVER['REMOTE_ADDR'];
  $sql = "SELECT * FROM cart WHERE email = '$email' OR ip = '$ip'";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)) {
    $id = $row['id'];
    $product_id = $row['product_id'];
    $category_cart = $row['category'];
    $size = $row['size'];
    
    if($category_cart == "product-women"){
      $sql_select = "SELECT * FROM products_women WHERE id = $product_id";
    } elseif($category_cart == "product-men") {
      $sql_select = "SELECT * FROM products_men WHERE id = $product_id";
    } elseif($category_cart == "product-kids") {
      $sql_select = "SELECT * FROM products_kids WHERE id = $product_id";
    } elseif($category_cart == "product-wedding") {
      $sql_select = "SELECT * FROM products_wedding WHERE id = $product_id";
    }
    $query_select = mysqli_query($connect, $sql_select);
    while($row_select = mysqli_fetch_array($query_select)) {
      $name = $row_select['name'];
      $price = $row_select['price'];
      $category = $row_select['subcategory'];
      $main_pic = $row_select['main_pic'];
      if($row_select['discount'] !== "") {
        $discount = $row_select['discount'];
        echo "
        <tr>
          <th scope='row'><img src='products/$main_pic' alt='$name' class='product-frame' style='max-width: 80px;height: 80px;object-fit: cover;'><a href='product.php?$category_cart=$product_id' target='_blank'><span style='margin-left: 5%;text-transform: capitalize;'>$name</span></a></th>
          <td>$size</td>
          <td>".$price_discount = $price - ($price * $discount / 100)."</td>
          <td><a href='delete-item.php?id=$id'><i class='fad fa-trash-alt'></i></a></td>
        </tr>
        ";
      } else {
        echo "
        <tr>
          <th scope='row'><img src='products/$main_pic' alt='$name' class='product-frame' style='max-width: 80px;height: 80px;object-fit: cover;'><a href='product.php?$category_cart=$product_id' target='_blank'><span style='margin-left: 5%;text-transform: capitalize;'>$name</span></a></th>
          <td>$size</td>
          <td>$price</td>
          <td><a href='delete-item.php?id=$id'><i class='fad fa-trash-alt'></i></a></td>
        </tr>
        ";
      }
    }
  }
} else {
  $ip = $_SERVER['REMOTE_ADDR'];
  $sql_ip = "SELECT * FROM cart WHERE ip = '$ip'";
  $query_ip = mysqli_query($connect, $sql_ip);
  while($row = mysqli_fetch_array($query_ip)) {
    $id = $row['id'];
    $product_id = $row['product_id'];
    $category_cart = $row['category'];
    $size = $row['size'];
    
    if($category_cart == "product-women"){
      $sql_select = "SELECT * FROM products_women WHERE id = $product_id";
    } elseif($category_cart == "product-men") {
      $sql_select = "SELECT * FROM products_men WHERE id = $product_id";
    } elseif($category_cart == "product-kids") {
      $sql_select = "SELECT * FROM products_kids WHERE id = $product_id";
    } elseif($category_cart == "product-wedding") {
      $sql_select = "SELECT * FROM products_wedding WHERE id = $product_id";
    }
    $query_select = mysqli_query($connect, $sql_select);
    while($row_select = mysqli_fetch_array($query_select)) {
      $name = $row_select['name'];
      $price = $row_select['price'];
      $category = $row_select['subcategory'];
      $main_pic = $row_select['main_pic'];
      if($row_select['discount'] !== "") {
        $discount = $row_select['discount'];
        echo "
        <tr>
          <th scope='row'><img src='products/$main_pic' alt='$name' class='product-frame' style='max-width: 80px;height: 80px;object-fit: cover;'><a href='product.php?$category_cart=$product_id' target='_blank'><span style='margin-left: 5%;text-transform: capitalize;'>$name</span></a></th>
          <td>$size</td>
          <td>".$price_discount = $price - ($price * $discount / 100)."</td>
          <td><a href='delete-item.php?id=$id'><i class='fad fa-trash-alt'></i></a></td>
        </tr>
        ";
      } else {
        echo "
        <tr>
          <th scope='row'><img src='products/$main_pic' alt='$name' class='product-frame' style='max-width: 80px;height: 80px;object-fit: cover;'><a href='product.php?$category_cart=$product_id' target='_blank'><span style='margin-left: 5%;text-transform: capitalize;'>$name</span></a></th>
          <td>$size</td>
          <td>$price</td>
          <td><a href='delete-item.php?id=$id'><i class='fad fa-trash-alt'></i></a></td>
        </tr>
        ";  
      }
    }
  }
}
?>
    </tbody>
  </table>
</div>
  <a href="checkout.php"><button type="submit" name="checkout-cart" class="btn btn-dark" style="margin-left: auto;
    margin-right: auto;
    display: block;
    margin-top: 5%;
    margin-bottom:5%;
    width: 200px;
    padding: 10px;
    font-weight:bold"><span style="font-size: 0.98rem;">Checkout</span> <i class="fas fa-long-arrow-alt-right"></i></button></a>
</div>
<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>


</script>
</html>