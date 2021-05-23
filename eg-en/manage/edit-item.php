<html>
<head>
<title>Admin Dashboard | The Tailorist</title>
<?php include('links.php') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<style>
@charset "UTF-8";
.edit {
  background-color: white;
  padding: 15px;
  margin-top: 6%;
  border-radius: 5px;
  box-shadow: 0px 0px 5px 5px #f1f1f1;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 6%;
}
.multi-steps > li.is-active ~ li:before, .multi-steps > li.is-active:before {
  content: counter(stepNum);
  font-family: inherit;
  font-weight: 700;
}
.multi-steps > li.is-active ~ li:after, .multi-steps > li.is-active:after {
  background-color: #ededed;
}

.multi-steps {
  display: table;
  table-layout: fixed;
  width: 100%;
}
.multi-steps > li {
  counter-increment: stepNum;
  text-align: center;
  display: table-cell;
  position: relative;
  color: tomato;
}
.multi-steps > li:before {
  content: "";
  content: "✓;";
  content: "𐀃";
  content: "𐀄";
  content: "✓";
  display: block;
  margin: 0 auto 4px;
  background-color: #fff;
  width: 36px;
  height: 36px;
  line-height: 32px;
  text-align: center;
  font-weight: bold;
  border-width: 2px;
  border-style: solid;
  border-color: tomato;
  border-radius: 50%;
}
.multi-steps > li:after {
  content: "";
  height: 2px;
  width: 100%;
  background-color: tomato;
  position: absolute;
  top: 16px;
  left: 50%;
  z-index: -1;
}
.multi-steps > li:last-child:after {
  display: none;
}
.multi-steps > li.is-active:before {
  background-color: #fff;
  border-color: tomato;
}
.multi-steps > li.is-active ~ li {
  color: #808080;
}
.multi-steps > li.is-active ~ li:before {
  background-color: #ededed;
  border-color: #ededed;
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
<div class="edit">
<ul class="list-unstyled multi-steps" style="margin-bottom: 5%;">
    <li class="is-active">Choose Product</li>
    <li>Edit Product</li>
</ul>
<div class="row">
<?php
if(isset($_GET['page'])) {
  $page_number = $_GET['page'];
} else {
  $page_number = 1;
}
$num_per_page = 10;
$from = ($page_number-1)*$num_per_page;

$sql = "SELECT * FROM products_women LIMIT $from, $num_per_page";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $name = $row['name'];
  $main_pic = $row['main_pic'];
  echo "
  <div class='col-lg-3' style='margin-bottom: 2%;'>
  <div class='card'>
    <img src='../products/$main_pic' class='card-img-top' style='width: 245px;height: 245px;object-fit: cover;'>
    <div class='card-body'>
    <a href='../product.php?product-women=$id' target='_blank'><span style='font-size: 1.2em;font-weight: bold;'>$name</span></a>
    <a href='edit.php?id=$id' style='margin-top: 10%;display:block'><button class='btn btn-dark' style='margin-left: auto;margin-right: auto;display: block;'>Edit Product</button></a>
    </div>
  </div>
  </div>
  ";
}
?>
<?php
$sql = "SELECT * FROM products_men LIMIT $from, $num_per_page";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $name = $row['name'];
  $main_pic = $row['main_pic'];
  echo "
  <div class='col-lg-3' style='margin-bottom: 2%;'>
  <div class='card'>
    <img src='../products/$main_pic' class='card-img-top' style='width: 245px;height: 245px;object-fit: cover;'>
    <div class='card-body'>
    <a href='../product.php?product-men=$id' target='_blank'><span style='font-size: 1.2em;font-weight: bold;'>$name</span></a>
    <a href='edit.php?id=$id' style='margin-top: 10%;display:block'><button class='btn btn-dark' style='margin-left: auto;margin-right: auto;display: block;'>Edit Product</button></a>
    </div>
  </div>
  </div>
  ";
}
?>
<?php
$sql = "SELECT * FROM products_kids LIMIT $from, $num_per_page";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $name = $row['name'];
  $main_pic = $row['main_pic'];
  echo "
  <div class='col-lg-3' style='margin-bottom: 2%;'>
  <div class='card'>
    <img src='../products/$main_pic' class='card-img-top' style='width: 245px;height: 245px;object-fit: cover;'>
    <div class='card-body'>
    <a href='../product.php?product-kids=$id' target='_blank'><span style='font-size: 1.2em;font-weight: bold;'>$name</span></a>
    <a href='edit.php?id=$id' style='margin-top: 10%;display:block'><button class='btn btn-dark' style='margin-left: auto;margin-right: auto;display: block;'>Edit Product</button></a>
    </div>
  </div>
  </div>
  ";
}
?>
<?php
$sql = "SELECT * FROM products_wedding LIMIT $from, $num_per_page";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $name = $row['name'];
  $main_pic = $row['main_pic'];
  echo "
  <div class='col-lg-3' style='margin-bottom: 2%;'>
  <div class='card'>
    <img src='../products/$main_pic' class='card-img-top' style='width: 245px;height: 245px;object-fit: cover;'>
    <div class='card-body'>
    <a href='../product.php?product-wedding=$id' target='_blank'><span style='font-size: 1.2em;font-weight: bold;'>$name</span></a>
    <a href='edit.php?id=$id' style='margin-top: 10%;display:block'><button class='btn btn-dark' style='margin-left: auto;margin-right: auto;display: block;'>Edit Product</button></a>
    </div>
  </div>
  </div>
  ";
}
?>

</div>
<?php
    $sql = "SELECT products_women.id, products_men.id, products_kids.id, products_wedding.id FROM products_women, products_men, products_kids, products_wedding";
    $query = mysqli_query($connect, $sql);
    $totalItems = mysqli_num_rows($query);

    $total_pages = ceil($totalItems/$num_per_page);
    for($i=1;$i<=$total_pages;$i++){
    }
?>

<div class="container xsmall">
  <div class="pagination">
      <ul class="ul-pagination">
          <li class="li-pagination"><a href="?page=<?php
            if(($page_number - 1) > 0){
            echo $page_number - 1;
            } else{
                echo $page_number;
            }
            ?>">Previous</a></li>
          <li class="active li-pagination"><a href="#" style="color:white !important"><?php echo "$page_number" ?></a></li>
          <li class="li-pagination"><a href="?page=<?php if(($page_number + 1) < $total_pages){ echo $page_number + 1; }elseif(($page_number + 1) >= $total_pages){ echo $total_pages; }?>">Next</a></li>
      </ul>
  </div>
</div>

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