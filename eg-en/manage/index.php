<html>
<head>
<title>Admin Dashboard | The Tailorist</title>
<?php include('links.php') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<style>
.dropdown-toggle::after {
  content: none;
}
.dropdown {
  position: relative;
  bottom: 49px;
  text-align: right;
}
@media screen and (max-width: 800px){
.dropdown {
  position: relative;
  bottom: 28px;
  text-align: right;
}
}
.btn-secondary {
  background: transparent !important;
  border: none !important;
  margin-bottom: -20px;
}
.btn-secondary:focus {
  outline:none !important;
  box-shadow: none !important;
}
.card {
  border: none;
}
</style>
</head>
<body style="background-color: hsl(0deg 0% 96%)">
<?php
include('menu.php');
if(isset($_SESSION['email_admin'])){
  echo "";
} else {
  echo "<script>alert('Please Login First')</script>";
  header('Location: login.php');
}
?>
<div style="width:100%;background:white;padding:20px"><div class="container"><span style="font-size: 20px;font-weight: bold;text-transform: uppercase;">Financial Dashboard</span></div></div>
<div class="container">

<div class="row" style="margin-top:4%;">
<div class="col-lg-4" style="display:inline-block;margin-bottom:15px;margin-left:auto">
  <div class="card" style="padding: 15px;">
    <span style="text-transform: uppercase;font-weight:500;color:#949494">Add To Cart</span>
    <span style="font-weight: bold;font-size: 24px;margin-top: 2%;">150,000,000</span>
    <div style="margin-top: 10%;"><span style="color: #11CC11;font-size: larger;" title="Improve">▲</span> <span>vs. <?php $currentMonth = date('F');echo Date('F', strtotime($currentMonth . " last month")); ?></span></div>
  </div>
  </div>
  <div class="col-lg-4" style="display:inline-block;margin-bottom:15px;margin-right:auto">
  <div class="card" style="padding: 15px;">
    <span style="text-transform: uppercase;font-weight:500;color:#949494">Total Revenue</span>
    <span style="font-weight: bold;font-size: 24px;margin-top: 2%;">450 EGP</span>
    <div style="margin-top: 10%;"><span style="color: red;font-size: larger;">▼</span> <span>Need Improve</span></div>
  </div>
  </div>
</div>
<div class="row" style="margin-top:4%;">
<div class="col-lg-4" style="display:inline-block;margin-bottom:15px;margin-left:auto">
  <div class="card" style="padding: 15px;">
    <span style="text-transform: uppercase;font-weight:500;color:#949494">Clients</span>
    <span style="font-weight: bold;font-size: 24px;margin-top: 2%;">50</span>
    <div style="margin-top: 10%;"><span style="color: red;font-size: larger;">▼</span> <span>vs. <?php $currentMonth = date('F');echo Date('F', strtotime($currentMonth . " last month")); ?></span></div>
  </div>
  </div>
  <div class="col-lg-4" style="display:inline-block;margin-bottom:15px;margin-right:auto">
  <div class="card" style="padding: 15px;">
    <span style="text-transform: uppercase;font-weight:500;color:#949494">Products</span>
    <span style="font-weight: bold;font-size: 24px;margin-top: 2%;">5</span>
    <div style="margin-top: 10%;"><span style="color: red;font-size: larger;">▼</span> <span>vs. <?php $currentMonth = date('F');echo Date('F', strtotime($currentMonth . " last month")); ?></span></div>
  </div>
  </div>
</div>
<div class="row" style="margin-top: 5%;">
<div class="col-lg-3">
  <div class="card" style="padding: 20px;min-height: 280px;">
    <span style="text-transform: uppercase;font-weight:500;color:#949494">Withdrawal Status</span>
    <span style="font-size:22px;font-weight:500;margin-top:10%"><i class="fad fa-analytics" style="color:#c3c3c3;font-size:17px"></i> 500 EGP<span style="display: block;font-size: 15px;color: #5a5a5a;margin-left: 13%;margin-top: 2%;">Pending</span></span>
    <span style="font-size:22px;font-weight:500;margin-top:15%"><i class="fad fa-analytics" style="color:#c3c3c3;font-size:17px"></i> 1000 EGP<span style="display: block;font-size: 15px;color: #5a5a5a;margin-left: 13%;margin-top: 2%;">Paid</span></span>
  </div>
</div>
<div class="col-lg-4">
  <div class="card" style="padding: 20px;min-height: 280px;">
    <span style="text-transform: uppercase;font-weight:500;color:#949494">Customers vs Non-Customers</span>
    <canvas id="chart-products" style="margin-top:10%"></canvas>
  </div>
</div>
<div class="col-lg">
  <div class="card" style="padding: 20px;min-height: 280px;">
    <span style="text-transform: uppercase;font-weight:500;color:#949494">Latest Orders</span>
    <div class="table-responsive-xxl">
<table class="table" style="margin-bottom: 0;">
  <thead class="table-light">
    <tr>
      <th scope="col">Order#</th>
      <th scope="col">Date</th>
      <th scope="col">Revenue</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">152451RE4</th>
      <th>11, Feb, 2021</th>
      <th>500 EGP</th>
      <th style="text-align:center;"><i class="far fa-clock" style="color: #f94500"></i></th>
    </tr>
    <tr>
      <th scope="row">152451RE4</th>
      <th>11, Feb, 2021</th>
      <th>500 EGP</th>
      <th style="text-align:center"><i class="far fa-check" style="color: green"></i></th>
    </tr>    
    <tr>
      <th scope="row">152451RE4</th>
      <th>11, Feb, 2021</th>
      <th>500 EGP</th>
      <th style="text-align:center"><i class="far fa-times" style="color: red"></i></th>
    </tr> 
    <tr>
      <th scope="row">152451RE4</th>
      <th>11, Feb, 2021</th>
      <th>500 EGP</th>
      <th style="text-align:center"><i class="far fa-times" style="color: red"></i></th>
    </tr>               
  </tbody>
</table>
    </div>
  </div>
</div>

</div>
</div>

</div>
<?php include('scripts.php') ?>
<script>
var ctx = document.getElementById("chart-products").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Customers", "Non-Customers"],
    datasets: [{
      backgroundColor: [
        "#e74c3c",
        "#34495e"
      ],
      data: [50, 150]
    }]
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