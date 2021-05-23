<!DOCTYPE html>
<html>
<head>
<title>The Tailorist | Modern, Modest Fashion</title>
<?php include('links.php') ?>
<style>
.top {
  padding-top: 40px;
  padding-left: 11% !important;
  padding-right: 11% !important;
}

#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  color: #455a64;
  padding-left: 0px;
  margin-top: 30px;
}

#progressbar li {
  list-style-type: none;
  font-size: 13px;
  width: 25%;
  float: left;
  position: relative;
  font-weight: 400;
}

#progressbar .step0:before {
  font-family: FontAwesome;
  content: "\f10c";
  color: #fff;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -ms-transition: all 0.2s;
  -o-transition: all 0.2s;
}

#progressbar li:before {
  width: 40px;
  height: 40px;
  line-height: 45px;
  display: block;
  font-size: 20px;
  background: #c5cae9;
  border-radius: 50%;
  margin: auto;
  padding: 0px;
}

#progressbar li:after {
  content: "";
  width: 100%;
  height: 12px;
  background: #c5cae9;
  position: absolute;
  left: 0;
  top: 16px;
  z-index: -1;
}

#progressbar li:last-child:after {
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
  position: absolute;
  left: -50%;
}

#progressbar li:nth-child(2):after,
#progressbar li:nth-child(3):after {
  left: -50%;
}

#progressbar li:first-child:after {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  position: absolute;
  left: 50%;
}

#progressbar li:last-child:after {
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
}

#progressbar li:first-child:after {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
}

#progressbar li.active:before,
#progressbar li.active:after {
  background: #651fff;
}

#progressbar li.active:before {
  font-family: FontAwesome;
  content: "\f00c";
}

.icon {
  width: 60px;
  height: 60px;
  margin-right: 15px;
  font-size: 45px;
  color: #c5cae9;
}

.icon-content {
  padding-bottom: 20px;
}

@media screen and (max-width: 992px) {
  .icon-content {
    width: 50%;
  }
  .icon{
    margin-right:0%
  }
}
.icon-active {
    color: #651fff;
}
</style>
</head>
<body>
<?php include('navbar.php') ?>
<?php
$order = $_GET['order'];
$sql = "SELECT * FROM orders WHERE order_number = '$order'";
$query = mysqli_query($connect, $sql);
$num = mysqli_num_rows($query);
if($num > 0) {
while($row = mysqli_fetch_array($query)) {
    $status = $row['status'];
    $date = $row['date'];
    $name = $row['name'];
    $address = $row['address'];
    $city = $row['city'];
    $phone = $row['phone'];
    $user_email = $row['user_email'];
    $user_ip = $row['user_ip'];
}
} else {
  header('Location: 404.php');
}
?>
<div class="container">
    <div class="row d-flex justify-content-between px-3 top">
      <div class="d-flex">
        <h5>ORDER <span class="text-primary font-weight-bold">#<?php echo $order ?></span></h5>
      </div>
      <div class="d-flex flex-column text-sm-right">
        <p class="mb-0">Orderd: <span><?php echo "$date" ?></span></p>
        <p class="mb-0">Name: <span><?php echo "$name" ?></span></p>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-12">
        <ul id="progressbar" class="text-center">
<?php
if($order !== "") {
if($status == "Ordered") {
    echo "
    <li class='step0 active' title='Ordered'></li>
    <li class='step0' title='Verified'></li>
    <li class='step0' title='In Route'></li>
    <li class='step0' title='Delivered'></li>";
}elseif($status == "Verified") {
    echo "
    <li class='step0 active' title='Ordered'></li>
    <li class='step0 active' title='Verified'></li>
    <li class='step0' title='In Route'></li>
    <li class='step0' title='Delivered'></li>";
} elseif($status == "On Way") {
    echo "
    <li class='step0 active' title='Ordered'></li>
    <li class='step0 active' title='Verified'></li>
    <li class='step0 active' title='In Route'></li>
    <li class='step0' title='Delivered'></li>";
} elseif($status == "Delivered") {
    echo "
    <li class='step0 active' title='Ordered'></li>
    <li class='step0 active' title='Verified'></li>
    <li class='step0 active' title='In Route'></li>
    <li class='step0 active' title='Delivered'></li>";
}
} else {
    die();
    header('Location: index.php');
}
?>
        </ul>
      </div>
    </div>
    <div class="row justify-content-between top" style="padding-top: 0;">
    <?php
    if($order !== "") {
    if($status == "Ordered" || $status == "Verified" || $status == "Delivered" || $status == "On Way") {
        echo "<i class='fal fa-bags-shopping icon icon-active' title='Ordered'></i>";
    }
    if($status == "Verified" || $status == "Delivered" || $status == "On Way") {
        echo "<i class='far fa-badge-check icon icon-active' title='Verified'></i>";
    } else {
        echo "<i class='far fa-badge-check icon' title='Verified'></i>";
    }
    if($status == "On Way" || $status == "Delivered") {
        echo "<i class='fal fa-truck-moving icon icon-active' title='Order In Route'></i>";
    } else {
        echo "<i class='fal fa-truck-moving icon' title='Order In Route'></i>";
    }
    if($status == "Delivered") {
        echo "<i class='fal fa-home-lg-alt icon icon-active' title='Delivered'></i>";
    } else {
        echo "<i class='fal fa-home-lg-alt icon' title='Delivered'></i>";
    }
      }
    ?>
    </div>
    <div class="card" style="border: none">
      
    </div>
    <div class="card" style="border: none;">
      <div class="row d-flex justify-content-between px-3 top">
        <table class="table table-responsive">
          <thead class="table-dark">
            <tr>
              <th>Product Image</th>
              <th>Product Name</th>
            </tr>
          </thead>
          <tbody style="vertical-align: baseline;">
<?php
$sql = "SELECT * FROM cart WHERE (order_num = '$order')";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($query)){
  $product_id = $row['product_id'];
  $category = $row['category'];
  $size = $row['size'];
}
if($category == "product-men") {
  $sql_select = "SELECT * FROM products_men WHERE id = '$product_id'";
} elseif($category == "product-women") {
  $sql_select = "SELECT * FROM products_women WHERE id = '$product_id'";
} elseif($category == "product-kids") {
  $sql_select = "SELECT * FROM products_kdis WHERE id = '$product_id'";
} elseif($category == "product-wedding") {
  $sql_select = "SELECT * FROM products_wedding WHERE id = '$product_id'";
}
$query_select = mysqli_query($connect, $sql_select);
while($row_select = mysqli_fetch_array($query_select)){
  $name = $row_select['name'];
  $main_pic = $row_select['main_pic'];
  echo "
  <tr>
<td><a href='product.php?$category=$product_id' target='_blank'><img src='products/$main_pic' style='max-width:150px;height:150px'></a></td>
<td><a href='product.php?$category=$product_id' target='_blank' style='text-transform: uppercase;font-weight: bold;font-size: 15px;'>$name</a></td>
  </tr>";
}
?> 
          </tbody>
        </table>
      </div>
    </div>
</div>
</body>
<?php include('scripts.php') ?>
</html>