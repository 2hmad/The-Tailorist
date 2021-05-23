<html>
<head>
<title>Admin Dashboard | The Tailorist</title>
<?php include('links.php') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<style>
@charset "UTF-8";
.delete {
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
<div class="delete">
<div class="row">
<?php
$sql = "SELECT * FROM products ORDER BY id DESC";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $name = $row['name'];
  $main_pic = $row['main_pic'];
  echo "
  <div class='col-lg-3' style='margin-bottom: 2%;'>
  <div class='card'>
    <img src='../products/$main_pic' class='card-img-top' style='width: 100%;height: 165px;object-fit: cover;'>
    <div class='card-body'>
    <a href='../product.php?id=$id' target='_blank'><span style='font-size: 1.2em;font-weight: bold;'>$name</span></a>
    <form method='POST' style='margin-top: 10%;'>
      <button class='btn btn-dark' type='button' data-bs-toggle='modal' data-bs-target='#exampleModal' style='margin-left: auto;margin-right: auto;display: block;'>Delete Product</button>
      <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>Are You Sure ?</h5>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
              <a href='delete.php?product-id=$id' target='_blank'><button type='button' name='delete-product' class='btn btn-primary'>Save changes</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </form>
  ";
}
?>
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