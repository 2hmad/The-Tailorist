<html>
<head>
<title>Admin Dashboard | The Tailorist</title>
<?php include('links.php') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<style>
.all-orders {
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
<div class="all-orders">
<div class="row">

<div class="col-lg-3" style="margin-bottom: 2%;">
<div class="card">
    <div class="card-body" style="text-align: center;">
    <span style="display: block;color: #b7b7b7;font-weight: bold;">13/2/2021</span>
    <span style="font-size: 1.2em;font-weight: bold;text-transform: uppercase;display:inline-block">Order</span>
    <a href="#" style="font-size: 1.2em;font-weight: bold;display:block">#123456789015</a>
    <span style="color: #00b300;margin-top: 6%;display: block;text-transform: uppercase;font-weight: bold;"><i class="fas fa-check"></i> Delivered</span>
    <span style="color: #F29339;margin-top: 6%;display: block;text-transform: uppercase;font-weight: bold;"><i class="fas fa-clock"></i> Pending</span>
    <span style="color: red;margin-top: 6%;display: block;text-transform: uppercase;font-weight: bold;"><i class="fas fa-times"></i> Canceled</span>
    <a href="#" style="margin-top: 10%;display:block"><button class="btn btn-dark" style="margin-left: auto;margin-right: auto;display: block;">Order Status</button></a>
    </div>
</div>
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