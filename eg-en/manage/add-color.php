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
<span style="text-align:center;font-weight:bold;font-size:25px;display:block;margin-bottom: 5%;margin-top: 1%;">Add Product</span>

<form method="POST" enctype="multipart/form-data">
  <label style="display: block;font-weight: bold;text-transform: capitalize;">Product Name</label>
  <input type="text" name="product-name" id="product-name" onkeyup='saveValue(this)' style="width: 100%;display: block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Price <span style="font-size: 14px;">(EGP)</span></label>
  <input type="text" name="product-price" id="product-price" onkeyup='saveValue(this)' style="width: 100%;display: block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Available Sizes (<a href="#" onclick="AddNewOption()" style="font-weight: 400;color: blue!important;font-size: 14px;"><span>Click to add a new option to write in it</span></a>)</label>
  <textarea id="available-sizes" name="available-sizes" style="width:100%;display: block;border: 1px solid #CCC;outline: none;height: 150px;" required></textarea>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Category</label>
  <select name="product-category" id="product-category" onkeyup='saveValue(this)' style="width: 283px;max-width:100%;height: 40px;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;">
    <option value="" hidden>Category</option>
    <option value="Women">Women</option>
    <option value="Men">Men</option>
    <option value="Kids">Kids</option>
    <option value="Wedding">Wedding</option>
  </select>
  <select name="product-subcategory" id="product-subcategory" onkeyup='saveValue(this)' style="width: 283px;max-width:100%;height: 40px;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;">
    <option value="" hidden>Sub Category</option>
  </select>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">This Color For (Set Product ID)</label>
  <input type="text" name="color-for" id="product-color" onkeyup='saveValue(this)' style="width: 100%;display: block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 4%;">Fabric</label>
  <select name="product-fabric" id="product-fabric" onkeyup='saveValue(this)' style="width: 100%;height: 40px;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
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
  <select name="product-size-model" id="product-size-model" onkeyup='saveValue(this)' style="width: 100%;height: 40px;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;">
    <option value="" hidden>Size</option>
    <option>XS</option>
    <option>S</option>
    <option>M</option>
    <option>L</option>
    <option>XL</option>
    <option>XXl</option>
    <option>XXXL</option>
  </select>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Dedicated to</label>
  <select name="product-dedicated" id="product-dedicated" onkeyup='saveValue(this)' style="width: 100%;height: 40px;display: inline-block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
    <option value="" hidden>Gender</option>
    <option>Men Only</option>
    <option>Women Only</option>
    <option>Men and Women</option>
  </select>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Weight in KGs</label>
  <input type="text" name="product-weight" id="product-weight" onkeyup='saveValue(this)' style="width: 100%;display: block;padding: 5px;border-radius: 5px;border: 1px solid #CCC;outline: none;" required>
  <label style="display: block;font-weight: bold;text-transform: capitalize;margin-top: 3%;">Product Details</label>
  <textarea name="product-details" id="product-details" onkeyup='saveValue(this)' style="width: 100%;display: block;border-radius: 5px;border: 1px solid #CCC;outline: none;padding:5px;height: 150px;" required></textarea>
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

  <button type="submit" name="add-item" class="add-item">Add Item</button>
</form>
<?php
if(isset($_POST['add-item'])){
$product_name = $_POST['product-name'];
$product_price = $_POST['product-price'];
$available_sizes = $_POST['available-sizes'];
$product_category = $_POST['product-category'];
$product_subcategory = $_POST['product-subcategory'];
$product_color = $_POST['color-for'];
$fabric = $_POST['product-fabric'];
$size_model = $_POST['product-size-model'];
$dedicate = $_POST['product-dedicated'];
$weight = $_POST['product-weight'];
$details = $_POST['product-details'];
$targetDir = "../products/";
$main_pic_name = basename($_FILES["main-pic"]["name"]);
$targetFilePathMain = $targetDir . $main_pic_name;
$fileTypeMain = pathinfo($targetFilePathMain,PATHINFO_EXTENSION);

if($product_category === "Women") {
  $sql_select = "SELECT * FROM products_women";
  $query_select = mysqli_query($connect, $sql_select);
  while($row = mysqli_fetch_array($query_select)){
    $pic_one = $row['main_pic'];
    $pic_two = $row['second_pic'];
    $pic_third = $row['third_pic'];
    $pic_fourth = $row['fourth_pic'];
  }  
} elseif($product_category === "Men") {
  $sql_select = "SELECT * FROM products_men";
  $query_select = mysqli_query($connect, $sql_select);
  while($row = mysqli_fetch_array($query_select)){
    $pic_one = $row['main_pic'];
    $pic_two = $row['second_pic'];
    $pic_third = $row['third_pic'];
    $pic_fourth = $row['fourth_pic'];
  }  
} elseif($product_category === "Kids") {
  $sql_select = "SELECT * FROM products_kids";
  $query_select = mysqli_query($connect, $sql_select);
  while($row = mysqli_fetch_array($query_select)){
    $pic_one = $row['main_pic'];
    $pic_two = $row['second_pic'];
    $pic_third = $row['third_pic'];
    $pic_fourth = $row['fourth_pic'];
  }  
} elseif($product_category === "Wedding") {
  $sql_select = "SELECT * FROM products_wedding";
  $query_select = mysqli_query($connect, $sql_select);
  while($row = mysqli_fetch_array($query_select)){
    $pic_one = $row['main_pic'];
    $pic_two = $row['second_pic'];
    $pic_third = $row['third_pic'];
    $pic_fourth = $row['fourth_pic'];
  }  
}

if($main_pic_name !== "" && $main_pic_name !== "$pic_one" && move_uploaded_file($_FILES["main-pic"]["tmp_name"], $targetFilePathMain)){

  $second_pic_name = basename($_FILES["second-pic"]["name"]);
  if($second_pic_name !== "$pic_two"){
    $targetFilePathSecond = $targetDir . $second_pic_name;
    $fileTypeSecond = pathinfo($targetFilePathSecond,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["second-pic"]["tmp_name"], $targetFilePathSecond);
  } elseif($pic_two == "") {
    echo "";
  } elseif($second_pic_name == "$pic_two") {
    echo "<div class='alert alert-danger'>Change your second image name</div>";
  }

  $third_pic_name = basename($_FILES["third-pic"]["name"]);
  if($third_pic_name !== "$pic_third"){
    $targetFilePathThird = $targetDir . $third_pic_name;
    $fileTypeThird = pathinfo($targetFilePathThird,PATHINFO_EXTENSION);  
    move_uploaded_file($_FILES["third-pic"]["tmp_name"], $targetFilePathThird);
  } elseif($pic_third == "") {
    echo "";
  } elseif($third_pic_name == "$pic_third") {
    echo "<div class='alert alert-danger'>Change your second image name</div>";
  }

  $fourth_pic_name = basename($_FILES["fourth-pic"]["name"]);
  if($fourth_pic_name !== "$pic_fourth") {
    $targetFilePathFourth = $targetDir . $fourth_pic_name;
    $fileTypeFourth = pathinfo($targetFilePathFourth,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["fourth-pic"]["tmp_name"], $targetFilePathFourth);
  } elseif($pic_fourth == "") {
    echo "";
  } elseif($fourth_pic_name == "$pic_fourth") {
    echo "<div class='alert alert-danger'>Change your second image name</div>";
  }


  if($product_category === "Women") {
    $sql = "INSERT INTO products_women 
    (name, price, subcategory, sizes, fabric, size_model, weight, color_for, dedicated_to, product_details, main_pic, second_pic, third_pic, fourth_pic) 
    VALUES ('$product_name', '$product_price', '$product_subcategory', '$available_sizes', '$fabric', '$size_model', '$weight', '$product_color','$dedicate', '$details', '$main_pic_name', '$second_pic_name', '$third_pic_name', '$fourth_pic_name')";    
  } elseif($product_category === "Men") {
    $sql = "INSERT INTO products_men 
    (name, price, subcategory, sizes, fabric, size_model, weight, color_for, dedicated_to, product_details, main_pic, second_pic, third_pic, fourth_pic) 
    VALUES ('$product_name', '$product_price', '$product_subcategory', '$available_sizes', '$fabric', '$size_model', '$weight', '$product_color','$dedicate', '$details', '$main_pic_name', '$second_pic_name', '$third_pic_name', '$fourth_pic_name')";    
  } elseif($product_category === "Kids") {
    $sql = "INSERT INTO products_kids 
    (name, price, subcategory, sizes, fabric, size_model, weight, color_for, dedicated_to, product_details, main_pic, second_pic, third_pic, fourth_pic) 
    VALUES ('$product_name', '$product_price', '$product_subcategory', '$available_sizes', '$fabric', '$size_model', '$weight', '$product_color','$dedicate', '$details', '$main_pic_name', '$second_pic_name', '$third_pic_name', '$fourth_pic_name')";    
  } elseif($product_category === "Wedding") {
    $sql = "INSERT INTO products_wedding
    (name, price, subcategory, sizes, fabric, size_model, weight, color_for, dedicated_to, product_details, main_pic, second_pic, third_pic, fourth_pic) 
    VALUES ('$product_name', '$product_price', '$product_subcategory', '$available_sizes', '$fabric', '$size_model', '$weight', '$product_color','$dedicate', '$details', '$main_pic_name', '$second_pic_name', '$third_pic_name', '$fourth_pic_name')";    
  }
$query = mysqli_query($connect, $sql);
echo "<div class='alert alert-success'>Your product has been uploaded</div>";
} else {
  echo "<div class='alert alert-danger'>Please upload main image at least OR Change your main image name</div>";
}
}
?>
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
<script>
function AddNewOption(){
document.getElementById("available-sizes").value += '<option></option>'+'\n';
}
</script>
<script>
$(document).ready(function() {
    $("#product-category").change(function() {
        var val = $(this).val();
        if (val == "Women") {
            $("#product-subcategory").html("<option value='' hidden>Choose SubCategory</option>" +
            "<option>Knitwear</option>" +
            "<option>Cardigans & Jumpers</option>" +
            "<option>Hoodies & Sweatshirts</option>" +
            "<option>Jackets & Coats</option>" +
            "<option>Dresses</option>" +
            "<option>Shirts & Blouses</option>" +
            "<option>Islamic clothes</option>" +
            "<option>Beauty</option>" +
            "<option>Tops</option>" +
            "<option>Trousers</option>" +
            "<option>Shoes</option>" +
            "<option>Maternity Wear</option>" +
            "<option>Accessories</option>" +
            "<option>Blazers & Waistcoats</option>" +
            "<option>Lingerie</option>" +
            "<option>Nightwear & Loungewear</option>" +
            "<option>Sportswear</option>" +
            "<option>Basics</option>" +
            "<option>Skirts</option>" +
            "<option>Jeans</option>" +
            "<option>Socks & Tights</option>" +
            "<option>Jumpsuits</option>" +
            "<option>Shorts</option>" +
            "<option>Swimwear</option>" +
            "<option>Sale Up To 70% OFF</option>");
        } else if (val == "Men") {
          $("#product-subcategory").html("<option value='' hidden>Choose SubCategory</option>" +
            "<option>T-Shirts & Vests</option>" +
            "<option>Shirts</option>" +
            "<option>Hoodies & Sweatshirts</option>" +
            "<option>Jackets & Coats</option>" +
            "<option>Cardigans & Jumpers</option>" +
            "<option>Shirts & Blouses</option>" +
            "<option>Jeans</option>" +
            "<option>Shorts</option>" +
            "<option>Trousers</option>" +
            "<option>Shoes</option>" +
            "<option>Accessories</option>" +
            "<option>Blazers & Suits</option>" +
            "<option>Underwear</option>" +
            "<option>Sportswear</option>" +
            "<option>Basics</option>" +
            "<option>Socks</option>" +
            "<option>Swimwear</option>" +
            "<option>Nightwear & Loungewear</option>" +
            "<option>Sale Up To 70% OFF</option>");
        } else if (val == "Kids") {
          $("#product-subcategory").html("<option value='' hidden>Choose SubCategory</option>" +
            "<option>Newborn 0-9 Months</option>" +
            "<option>Baby Girl 4m-4Y</option>" +
            "<option>Baby Boy 4m-4Y</option>" +
            "<option>Girls 1½-10 Years</option>" +
            "<option>Boys 1½-10 Years</option>" +
            "<option>Girls 8-14+ Years</option>" +
            "<option>Boys 8-14+ Years</option>" +
            "<option>Kids Room</option>" +
            "<option>Cartoons & Comics</option>" +
            "<option>Sale Up To 70% OFF</option>");
        } else if (val == "Wedding") {
          $("#product-subcategory").html("<option value='' hidden>Choose SubCategory</option>" +
            "<optgroup label='--Women--'>" +
            "<option>Plus Size Wedding Dresses</option>" +
            "<option>Simple Wedding Dresses</option>" +
            "<option>Bridal Dresses</option>" +
            "<option>Long Sleeve Wedding Dresses</option>" +
            "<option>Red Wedding Dresses</option>" +
            "<option>Casual Wedding Dresses</option>" +
            "<option>Wedding Dress Rental</option>" +
            "<option>Black Wedding Dresses</option>" +
            "<option>Beach Wedding Dresses</option>" +
            "<option>Short Wedding Dresses</option>" +
            "<option>Wedding Guest Outfits</option>" +
            "<optgroup label='--Men--'>" +
            "<option>Tuxedos</option>" +
            "<option>Vested 3-Piece Suits</option>" +
            "<option>Suit Separates</option>" +
            "<option>Mix & Match - Paisley & Gray</option>" +
            "<option>Vests</option>" +
            "<option>Boys Suits & Tuxedos</option>");
        }
    });
});
</script>
</body>
</html>