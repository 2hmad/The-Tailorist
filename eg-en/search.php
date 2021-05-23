<!DOCTYPE html>
<html>
<head>
<title>The Tailorist | Modern, Modest Fashion</title>
<?php include('links.php') ?>
</head>
<body>
<?php include('navbar.php') ?>
<div class="container" style="min-height:100vh">
<div class="row">
<?php
$search_keyword = $_GET['keyword'];
$sql_women = "SELECT * FROM products_women WHERE products_women.name LIKE '%$search_keyword%'";
$query_women = mysqli_query($connect, $sql_women);
while($row_women = mysqli_fetch_array($query_women)){
  $id = $row_women['id'];
  $name = $row_women['name'];
  $main_pic = $row_women['main_pic'];
  $price = $row_women['price'];
  if($row_women['discount'] !== "") {
    $discount = $row_women['discount'];
} else {
    $discount = "";
}
if($row_women['second_pic'] !== "") {
    $second_pic = $row_women['second_pic'];
    echo "
    <div class='col-lg-3' style='min-height: 570px;'>
        <a href='product.php?product-men=$id' target='_blank' style='display: inline-block;margin-top:2%;'>
            <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
            <div style='height:428px'>
                <img src='products/$main_pic' class='card-img-top' alt='$name' onmouseover=this.src='products/$second_pic' onmouseout=this.src='products/$main_pic' style='width:100%;height:428px;object-fit: cover;'>
            </div>
            <div class='card-body'>
            <div style='text-align: left;padding:10px;text-align:center'>
                <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
            </div>
            </div>
            </div>
        </a>
    </div>";    
} else {
    echo "
    <div class='col-lg-3' style='min-height: 570px;'>
        <a href='product.php?product-men=$id' target='_blank' style='display: inline-block;margin-top:2%;'>
            <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
            <div style='height:428px'>
                <img src='products/$main_pic' class='card-img-top' alt='$name' style='width:100%;height:428px;object-fit: cover;'>
            </div>
            <div class='card-body'>
            <div style='text-align: left;padding:10px;text-align:center'>
                <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
            </div>
            </div>
            </div>
        </a>
    </div>";    
}
}
?>
<?php
$sql_men = "SELECT * FROM products_men WHERE products_men.name LIKE '%$search_keyword%'";
$query_men = mysqli_query($connect, $sql_men);
while($row_men = mysqli_fetch_array($query_men)){
  $id = $row_men['id'];
  $name = $row_men['name'];
  $main_pic = $row_men['main_pic'];
  $price = $row_men['price'];
  if($row_men['discount'] !== "") {
    $discount = $row_men['discount'];
} else {
    $discount = "";
}
if($row_men['second_pic'] !== "") {
    $second_pic = $row_men['second_pic'];
    echo "
    <div class='col-lg-3' style='min-height: 570px;'>
        <a href='product.php?product-men=$id' target='_blank' style='display: inline-block;margin-top:2%;'>
            <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
            <div style='height:428px'>
                <img src='products/$main_pic' class='card-img-top' alt='$name' onmouseover=this.src='products/$second_pic' onmouseout=this.src='products/$main_pic' style='width:100%;height:428px;object-fit: cover;'>
            </div>
            <div class='card-body'>
            <div style='text-align: left;padding:10px;text-align:center'>
                <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
            </div>
            </div>
            </div>
        </a>
    </div>";    
} else {
    echo "
    <div class='col-lg-3' style='min-height: 570px;'>
        <a href='product.php?product-men=$id' target='_blank' style='display: inline-block;margin-top:2%;'>
            <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
            <div style='height:428px'>
                <img src='products/$main_pic' class='card-img-top' alt='$name' style='width:100%;height:428px;object-fit: cover;'>
            </div>
            <div class='card-body'>
            <div style='text-align: left;padding:10px;text-align:center'>
                <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
            </div>
            </div>
            </div>
        </a>
    </div>";    
}
}
?>
<?php
$sql_kids = "SELECT * FROM products_kids WHERE products_kids.name LIKE '%$search_keyword%'";
$query_kids = mysqli_query($connect, $sql_kids);
while($row_kids = mysqli_fetch_array($query_kids)){
  $id = $row_kids['id'];
  $name = $row_kids['name'];
  $main_pic = $row_kids['main_pic'];
  $price = $row_kids['price'];
  if($row_kids['discount'] !== "") {
    $discount = $row_kids['discount'];
} else {
    $discount = "";
}
if($row_kids['second_pic'] !== "") {
    $second_pic = $row_kids['second_pic'];
    echo "
    <div class='col-lg-3' style='min-height: 570px;'>
        <a href='product.php?product-men=$id' target='_blank' style='display: inline-block;margin-top:2%;'>
            <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
            <div style='height:428px'>
                <img src='products/$main_pic' class='card-img-top' alt='$name' onmouseover=this.src='products/$second_pic' onmouseout=this.src='products/$main_pic' style='width:100%;height:428px;object-fit: cover;'>
            </div>
            <div class='card-body'>
            <div style='text-align: left;padding:10px;text-align:center'>
                <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
            </div>
            </div>
            </div>
        </a>
    </div>";    
} else {
    echo "
    <div class='col-lg-3' style='min-height: 570px;'>
        <a href='product.php?product-men=$id' target='_blank' style='display: inline-block;margin-top:2%;'>
            <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
            <div style='height:428px'>
                <img src='products/$main_pic' class='card-img-top' alt='$name' style='width:100%;height:428px;object-fit: cover;'>
            </div>
            <div class='card-body'>
            <div style='text-align: left;padding:10px;text-align:center'>
                <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
            </div>
            </div>
            </div>
        </a>
    </div>";    
}
}
?>
<?php
$sql_wedding = "SELECT * FROM products_wedding WHERE products_wedding.name LIKE '%$search_keyword%'";
$query_wedding = mysqli_query($connect, $sql_wedding);
while($row_wedding = mysqli_fetch_array($query_wedding)){
  $id = $row_wedding['id'];
  $name = $row_wedding['name'];
  $main_pic = $row_wedding['main_pic'];
  $price = $row_wedding['price'];
  if($row_wedding['discount'] !== "") {
    $discount = $row_wedding['discount'];
} else {
    $discount = "";
}
if($row_wedding['second_pic'] !== "") {
    $second_pic = $row_wedding['second_pic'];
    echo "
    <div class='col-lg-3' style='min-height: 570px;'>
        <a href='product.php?product-men=$id' target='_blank' style='display: inline-block;margin-top:2%;'>
            <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
            <div style='height:428px'>
                <img src='products/$main_pic' class='card-img-top' alt='$name' onmouseover=this.src='products/$second_pic' onmouseout=this.src='products/$main_pic' style='width:100%;height:428px;object-fit: cover;'>
            </div>
            <div class='card-body'>
            <div style='text-align: left;padding:10px;text-align:center'>
                <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
            </div>
            </div>
            </div>
        </a>
    </div>";    
} else {
    echo "
    <div class='col-lg-3' style='min-height: 570px;'>
        <a href='product.php?product-men=$id' target='_blank' style='display: inline-block;margin-top:2%;'>
            <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
            <div style='height:428px'>
                <img src='products/$main_pic' class='card-img-top' alt='$name' style='width:100%;height:428px;object-fit: cover;'>
            </div>
            <div class='card-body'>
            <div style='text-align: left;padding:10px;text-align:center'>
                <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
            </div>
            </div>
            </div>
        </a>
    </div>";    
}
}
?>
</div>
</div>
<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
</html>