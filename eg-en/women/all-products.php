<!DOCTYPE html>
<html>
<head>
<title>All Products | Modern, Modest Fashion</title>
<?php include('links.php') ?>
<style>
.accordion-button:focus {
    box-shadow: none;
}
.card-body {
    padding: 0rem 0rem;
}
.accordion-button:focus {
    z-index: 3;
    border-color: #dfdfdf;
    outline: 0;
}
.accordion-button:not(.collapsed) {
    color: black;
    background-color: white;
}
.accordion-button:not(.collapsed)::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    transform: rotate(180deg);
}
ins {
    text-decoration: none;
}
.card {
    box-shadow: none;
    text-align:left
}
.btn-outline-dark:hover {
    color:white !important;
}
.btn-outline-dark:focus {
    box-shadow: none;
}
</style>
</head>
<body>
<?php include('navbar.php') ?>

<div class="container">
<div class="row" style="margin-top: 5%;margin-bottom: 5%">
<p>
  <a class="btn btn-outline-dark" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
    <i class="fal fa-sliders-v"></i> Filter
  </a>
  <a class="btn btn-outline-dark" data-bs-toggle="collapse"  role="button" aria-expanded="false" data-bs-target="#collapseSearch">
    <i class="fal fa-search"></i> Search
  </a>

</p>
<div class="collapse" id="collapseFilter">
  <div class="card card-body" style="padding: 15px;display: block;">
  <div class="container">
    <div class="row">
    <div class="col-lg" style="line-height: 2em;margin-bottom:5%">
        <h5 style="margin-bottom: 1%;text-transform:uppercase;font-weight: bold">Sort By</h5>
        <a href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&sort=best-seller";}else{echo "$_SERVER[REQUEST_URI]?sort=best-seller";} ?>" style="display: block;">Best Seller</a>
        <a href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&sort=high-low";}else{echo "$_SERVER[REQUEST_URI]?sort=high-low";} ?>" style="display: block;">Price High to Low</a>
        <a href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&sort=low-high";}else{echo "$_SERVER[REQUEST_URI]?sort=low-high";} ?>" style="display: block;">Price Low to High</a>
    </div>
    <div class="col-lg" style="line-height: 2em;">
        <h5 style="margin-bottom: 1%;text-transform:uppercase;font-weight: bold;">Available Sizes</h5>
            <a href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=XS";}else{echo "?size=XS";} ?>" style="display: block;">XS</a>
            <a href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=S";}else{echo "?size=S";} ?>" style="display: block;">S</a>
            <a href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=M";}else{echo "?size=M";} ?>" style="display: block;">M</a>
            <a href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=L";}else{echo "?size=L";} ?>" style="display: block;">L</a>
            <a href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=XL";}else{echo "?size=XL";} ?>" style="display: block;">XL</a>
            <a href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=XXL";}else{echo "?size=XXL";} ?>" style="display: block;">XXL</a>
            <a href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=XXXL";}else{echo "?size=XXXL";} ?>" style="display: block;">XXXL</a>
    </div>
    </div>
  </div>
</div>
</div>

<div class="collapse" id="collapseSearch">
    <div class="card-body" style="padding: 15px;display: block;">
        <form method="POST">
        <input type="text" name="search" placeholder="Product name ..." autocomplete="off" style="width: 100%;padding: 15px;border: none;border-bottom: 4px solid #eaeaea;">
        <button type="submit" name="search-butt" style="outline: none;background:transparent;border:none;position: absolute;right: 35px;top: 65px;font-size: 20px;color:#CCC"><i class="fal fa-search"></i></button>
        </form>
    </div>
</div>
</div>

<div class="row">
<?php
if(isset($_GET['page'])) {
    $page_number = $_GET['page'];
} else {
    $page_number = 1;
}
$num_per_page = 36;
$from = ($page_number-1)*$num_per_page;
if(isset($_GET['sort']) && $_GET['sort'] !== "" && $_GET['sort'] == 'best-seller') {
    $sql = "SELECT * FROM products_women ORDER BY buyers DESC LIMIT $from, $num_per_page";
} elseif(isset($_GET['sort']) && $_GET['sort'] !== "" && $_GET['sort'] == 'high-low') {
    $sql = "SELECT * FROM products_women ORDER BY price DESC LIMIT $from, $num_per_page";

} elseif(isset($_GET['sort']) && $_GET['sort'] !== "" && $_GET['sort'] == 'low-high') {
    $sql = "SELECT * FROM products_women ORDER BY price ASC LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '4') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%4%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '6') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%6%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '8') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%8%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '10') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%10%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '12') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%12%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '14') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%14%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '16') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%16%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '18') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%18%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '20') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%20%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '22') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%22%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'XS') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%<option>XS</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'S') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%<option>S</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'M') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%<option>M</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'L') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%<option>L</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'XL') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%<option>XL</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'XXL') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%<option>XXL</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'XXXL') {
    $sql = "SELECT * FROM products_women WHERE sizes LIKE '%<option>XXXL</option>%' LIMIT $from, $num_per_page";

} else {
    $sql = "SELECT * FROM products_women ORDER BY id DESC LIMIT $from, $num_per_page";
}

$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_assoc($query)){
    $id = $row['id'];
    $name = $row['name'];
    $price = $row['price'];
    $main_pic = $row['main_pic'];
    if($row['discount'] !== "") {
        $discount = $row['discount'];
    } else {
        $discount = "";
    }
    if($row['second_pic'] !== "") {
        $second_pic = $row['second_pic'];
        echo "
        <div class='col-lg-3'>
            <a href='../product.php?product-women=$id' style='display: inline-block;margin-top:2%;'>
                <div class='card' style='width: 300px;max-width: 100%;height: 470px;border: none;'>
                <div style='width:270px;height:345px'>
                    <img src='../products/$main_pic' class='card-img-top' alt='$name' onmouseover=this.src='../products/$second_pic' onmouseout=this.src='../products/$main_pic' style='width:100%;height:100%;object-fit: contain;'>
                </div>
                <div class='card-body'>
                <div style='text-align: left;padding:10px;'>
                    <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;padding: 0 0 8px;font-size: 1.1em;'>$name</h1>
                    ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 500;font-size: 90%;color: #777;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 500;font-size: 17px;font-size: 90%;color: #777;'>$price EGP</span>" ) ."
                </div>
                </div>
                </div>
            </a>
        </div>";    
    } else {
        echo "
        <div class='col-lg-3'>
            <a href='../product.php?product-women=$id' style='display: inline-block;margin-top:2%;'>
                <div class='card' style='width: 300px;max-width: 100%;height: 470px;border: none;'>
                <div style='width:270px;height:345px'>
                    <img src='../products/$main_pic' class='card-img-top' alt='$name' style='width:100%;height:100%;object-fit: contain;'>
                </div>
                <div class='card-body'>
                <div style='text-align: left;padding:10px;'>
                    <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;padding: 0 0 8px;font-size: 1.1em;'>$name</h1>
                    ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 500;font-size: 90%;color: #777;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 500;font-size: 17px;font-size: 90%;color: #777;'>$price EGP</span>" ) ."
                </div>
                </div>
                </div>
            </a>
        </div>";
    }
}
?>
<?php
    $sql = "SELECT * FROM products_women";
    $query = mysqli_query($connect, $sql);
    $totalItems = mysqli_num_rows($query);

    $total_pages = ceil($totalItems/$num_per_page);
    for($i=1;$i<=$total_pages;$i++){
    }
?>

</div>
<div class="row">
<div class="container xsmall">
  <div class="pagination">
      <ul class="ul-pagination">
          <li class="li-pagination"><a href="?page=<?php
            if(($page_number - 1) > 0){
            echo $page_number - 1;
            } else{
                echo $page_number;
            }
            ?>"><i class="fal fa-chevron-left"></i></a></li>
          <li class="active li-pagination"><a href="#" style="color:white !important"><?php echo "$page_number" ?></a></li>
          <li class="li-pagination"><a href="?page=<?php if(($page_number + 1) < $total_pages){ echo $page_number + 1; }elseif(($page_number + 1) >= $total_pages){ echo $total_pages; }?>"><i class="fal fa-chevron-right"></i></a></li>
      </ul>
  </div>
</div>
</div>
</div>

<?php include('../footer.php') ?>
</body>
<?php include('scripts.php') ?>
</html>