<html>
<head>
<title>Admin Dashboard | The Tailorist</title>
<?php include('links.php') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<style>
.add {
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
.add-item {
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
<div class="add">
<ul class="list-unstyled multi-steps" style="margin-bottom: 5%;">
    <li>Choose Product</li>
    <li class="is-active">Edit Product</li>
</ul>
<span style="text-align:center;font-weight:bold;font-size:25px;display:block;margin-bottom: 5%;margin-top: 1%;">Edit Product</span>

<form method="POST">

<?php
$sql = "SELECT * FROM products";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $name = $row['name'];
  $main_pic = $row['main_pic'];
}
?>

  <label style="display: block;font-weight: bold;text-transform: capitalize;">Product Name</label>
  <input type="text" name="product-name" style="width: 100%;display: block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Availabel Sizes</label>
  <select name="product-size-one" style="width: auto;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Size</option>
    <option>XS</option>
    <option>S</option>
    <option>M</option>
    <option>L</option>
    <option>XL</option>
    <option>XXl</option>
    <option>XXXL</option>
  </select>
  <select name="product-size-two" style="width: auto;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Size</option>
    <option>XS</option>
    <option>S</option>
    <option>M</option>
    <option>L</option>
    <option>XL</option>
    <option>XXl</option>
    <option>XXXL</option>
  </select>
  <select name="product-size-three" style="width: auto;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Size</option>
    <option>XS</option>
    <option>S</option>
    <option>M</option>
    <option>L</option>
    <option>XL</option>
    <option>XXl</option>
    <option>XXXL</option>
  </select>
  <select name="product-size-four" style="width: auto;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Size</option>
    <option>XS</option>
    <option>S</option>
    <option>M</option>
    <option>L</option>
    <option>XL</option>
    <option>XXl</option>
    <option>XXXL</option>
  </select>
  <select name="product-size-five" style="width: auto;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Size</option>
    <option>XS</option>
    <option>S</option>
    <option>M</option>
    <option>L</option>
    <option>XL</option>
    <option>XXl</option>
    <option>XXXL</option>
  </select>
  <select name="product-size-six" style="width: auto;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Size</option>
    <option>XS</option>
    <option>S</option>
    <option>M</option>
    <option>L</option>
    <option>XL</option>
    <option>XXl</option>
    <option>XXXL</option>
  </select>
  <select name="product-size-seven" style="width: auto;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Size</option>
    <option>XS</option>
    <option>S</option>
    <option>M</option>
    <option>L</option>
    <option>XL</option>
    <option>XXl</option>
    <option>XXXL</option>
  </select>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 4%;">Fabric</label>
  <select name="product-fabric" style="width: 100%;height: 40px;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Fabric</option>
    <option>Canvas</option>
    <option>Cashmere</option>
    <option>Chiffon</option>
    <option>Cotton</option>
    <option>Damask</option>
    <option>Polyester</option>
    <option>Satin</option>
    <option>Silk</option>
    <option>Suede</option>
    <option>Viscose</option>
  </select>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Size Shown On model</label>
  <select name="product-size-model" style="width: 100%;height: 40px;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Size</option>
    <option>XS</option>
    <option>S</option>
    <option>M</option>
    <option>L</option>
    <option>XL</option>
    <option>XXl</option>
    <option>XXXL</option>
  </select>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Weight in KGs</label>
  <input type="text" name="product-weight" style="width: 100%;display: block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Dedicated to</label>
  <select name="product-dedicated" style="width: 100%;height: 40px;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Gender</option>
    <option>Men Only</option>
    <option>Women Only</option>
    <option>Men and Women</option>
  </select>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Availabel Colors <span style="color: #7d7d7d;font-size: 15px;font-weight: 400;">(Press Enter after color name)</span></label>
  <textarea id="color-add" style="width: 100%;display: block;border-radius: 5px;border: 1px solid #CCC;outline: none;padding:5px" required></textarea>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Product Details</label>
  <textarea id="product-details" style="width: 100%;display: block;border-radius: 5px;border: 1px solid #CCC;outline: none;padding:5px;height: 150px;" required></textarea>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Product Pictures</label>
  <div class="mb-3">
    <label for="formFile" class="form-label">Main Picture</label>
    <input class="form-control" type="file" id="formFile" name="main-pic" required>
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Second Picture (Optionally)</label>
    <input class="form-control" type="file" id="formFile" name="second-pic">
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Third Picture (Optionally)</label>
    <input class="form-control" type="file" id="formFile" name="third-pic">
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Fourth Picture (Optionally)</label>
    <input class="form-control" type="file" id="formFile" name="fourth-pic">
  </div>

  <button type="submit" name="edit-item" class="edit-item">Edit Item</button>
</form>
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