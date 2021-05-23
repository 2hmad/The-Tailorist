<html>
<head>
<title>Admin Dashboard | The Tailorist</title>
<?php include('links.php') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<style>
.messages {
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
<?php include('menu.php') ?>
<div class="container">
<div class="messages">
<form method="POST">
  <button type="submit" class="btn btn-danger" style="display: block;margin-bottom: 3%;"><i class="fas fa-trash"></i> Delete All</button>
</form>
<div class="row">

<div class="col-lg" style="margin-bottom: 2%;">
<div class="card">
    <div class="card-body">
    <a href="#"><span style="font-size: 1.2em;font-weight: bold;text-transform: uppercase;display:inline-block">Lorem Ipsume Lorem Ipsume Lorem Ipsume</span></a>
    <a href="#"><div style="text-overflow: ellipsis;overflow: hidden; width: 100%; white-space: nowrap;">Lorem Ipsume Lorem Ipsume Lorem IpsumeLorem Ipsume Lorem Ipsume Lorem IpsumeLorem Ipsume Lorem Ipsume Lorem IpsumeLorem Ipsume Lorem Ipsume Lorem Ipsume</div></a>
    <a href="#" style="color: #909090 !important;display: block;margin-top: 1%;"><span style="font-weight:bold">Date: </span><span>14/02/2021</span></a>
    <a href="#" style="margin-top:2%;display:block"><button class="btn btn-dark" style="display: block;">Show Messages</button></a>
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