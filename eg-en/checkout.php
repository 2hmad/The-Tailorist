<!DOCTYPE html>
<html>
<head>
<title>The Tailorist | Modern, Modest Fashion</title>
<?php include('links.php') ?>
<style>
[type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 6px;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #F87DA9;
    position: absolute;
    top: 9px;
    left: 3px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
.fa-chevron-right {
  -webkit-transform-origin: center center;
  -webkit-animation: arrow 1s linear infinite;
  -moz-transform-origin: center center;
  -moz-animation: arrow 1s linear infinite;
  transform-origin: center center;
  animation: arrow 1s linear infinite;
  float: right;
  position: relative;
  top: 4px;
}
@media screen and (max-width: 800px){
  .fa-chevron-right {
    top: 4px;
  }
  .product-frame {
    display: block;
  }
}
@-webkit-keyframes arrow{
  0%, 50%, 100% {
    -webkit-transform: translateX(-10px) ;
  }
  25% {
    -webkit-transform: translateX(-5px) ;
  }
  75% {
    -webkit-transform: translateX(-15px) ;
  }
}

@-moz-keyframes arrow{
  0%, 50%, 100% {
    -moz-transform: translateX(-10px) 
  }
  25% {
    -moz-transform: translateX(-5px) 
  }
  75% {
    -moz-transform: translateX(-15px)
  }
}

@keyframes arrow{
  0%, 50%, 100% {
    transform: translateX(-10px)
  }
  25% {
    transform: translateX(-5px)
  }
  75% {
    transform: translateX(-15px)
  }
}
.checkout {
  width: 280px;
  max-width: 200px;
  background: #4576ff;
  border: 1px solid #4576ff;
  padding: 10px;
  border-radius: 3px;
  margin-top: 5%;
  margin-left: auto;
  margin-right: auto;
  display: block;
  color: white;
  font-weight: bold;
  text-transform: uppercase;
  outline: none;
}
.checkout:hover {
  background-color: #3466f3;
  -webkit-transition: 0.6s;
  transition: 0.6s;
}
</style>
</head>
<body>
<?php include('navbar.php') ?>
<br><br>
<div class="container" style="width:100%;margin-bottom: 5%;">

<div class="row">
  <div class="col-lg">
    <h5 style="text-transform: uppercase;font-size:1.125rem">Delivery Method</h5>
    <form method="POST">
    <div style="margin-top: 3%;">
    <p>
      <input type="radio" id="delivery" name="radio-group" checked>
      <label for="delivery" style="float:left"><i class="far fa-truck-loading" style="font-size: 30px;"></i> </label>
      <div style="position: relative;bottom: 7px;left: 20px;">
        <span style="font-size:.875rem;font-weight:bold;text-transform:uppercase">Delivery To Home</span>
        <label style="font-size:.875rem;display:block;color: #5f5f5f;">Free delivery on orders above 499 EGP</label>
      </div>
    </p>
    </div>
    <div style="margin-top: 3%;">
    <p>
      <input type="radio" id="delivery" name="radio-group" disabled>
      <label for="delivery" style="float:left"><i class="fal fa-box-heart" style="font-size: 30px;color: grey;"></i> </label>
      <div style="position: relative;bottom: 7px;left: 20px;">
        <span style="font-size:.875rem;font-weight:bold;text-transform:uppercase;color: grey;">Pick up from our stores</span>
        <label style="font-size:.875rem;display:block;color: #5f5f5f;color: grey;">Receive your products through our stores</label>
      </div>
    </p>
    </div>
    </form>
    <div style="margin-top:5%">
      <h5 style="text-transform: uppercase;font-size:1.125rem">Delivery Address</h5>
      <form method='POST' style='margin-top:3%'>
<?php
if(isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $sql = "SELECT * FROM accounts WHERE email='$email'";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
    $address = $row['address'];
    $city = $row['city'];
    $phone = $row['phone'];
  }
  if($address !== "" && $city !== "" && $phone !== "") {
    echo "
    <div style='margin-top: 3%;'>
    <p>
      <input type='radio' id='delivery' name='radio-group' checked>
      <div style='position: relative;bottom: 7px;left: 20px;'>
        <span style='font-size:.875rem;font-weight:bold;text-transform:uppercase'>$address, $city, Egypt</span>
        <label style='font-size:.875rem;display:block;color: #5f5f5f;'>$phone</label>
      </div>
    </p>
    </div>
    ";
  } else {
    echo "<a href='shipping-address.php'><button type='button' style='text-align:left;
    outline:none;
    background: transparent;
    border: 2px solid black;
    padding: 10px;
    border-radius: 5px;
    width: 400px;
    max-width: 100%;'>Please Add Shipping Address In Your Account <i class='far fa-chevron-right'></i></button></a>";
  }
} else {
  $email = "";
  echo "
    <input type='text' name='name-checkout' placeholder='Full Name' style='margin-top: 1%;display:block;outline:none;width: 380px;max-width: 100%;padding: 7px;border-radius: 3px;border: 1px solid #CCC;' required>
    <input type='text' name='address-checkout' placeholder='Shipping Address' style='margin-top: 1%;display:block;outline:none;width: 380px;max-width: 100%;padding: 7px;border-radius: 3px;border: 1px solid #CCC;' required>
    <select name='city-checkout' style='margin-top: 1%;display:block;outline:none;width: 380px;max-width: 100%;padding: 7px;border-radius: 3px;border: 1px solid #CCC;' required>
    <option hidden>-- Governorate --</option>
    <option>Alexandria</option>
    <option>Kafr El Sheikh</option>
    <option>Cairo</option>
    <option>Qalyubia</option>
    <option>Suez</option>
    <option>Sharkia</option>
    <option>Damietta</option>
    <option>Red Sea</option>
    <option>Beheira</option>
    <option>Asyut</option>
    <option>Ismailia</option>
    <option>New Valley</option>
    <option>Qena</option>
    <option>South Sinai</option>
    <option>Sohag</option>
    <option>Fayoum</option>
    <option>Beni Suef</option>
    <option>Port Said</option>
    <option>Marsa Matrouh</option>
    <option>Minya</option>
    <option>Dakahlia</option>
    <option>Aswan</option>
    <option>North Sinai</option>
    <option>Menoufia</option>
    <option>Giza</option>
    <option>Luxor</option>
    <option>Gharbia</option>
    </select>
    <input type='text' name='phone-checkout' placeholder='Phone' style='margin-top: 1%;display:block;outline:none;width: 380px;max-width: 100%;padding: 7px;border-radius: 3px;border: 1px solid #CCC;'>
  ";
}
?>
    </div>
    <div style="margin-top:5%">
    <h5 style="text-transform: uppercase;font-size:1.125rem;margin-bottom: 3%;">Payment Methods</h5>
    <p>
      <input type="radio" id="credit-card" name="payment-methods" value="Credit Card" required>
      <label for="credit-card" style="float:left"><i class="fal fa-credit-card-front" style="font-size: 30px;"></i> </label>
      <div style="position: relative;left: 20px;margin-bottom: 3%;">
      <span style="font-size:.875rem;font-weight:bold;text-transform:uppercase">Credit / Debit Card</span>
      </div>
    </p>
    <p>
      <input type="radio" id="cash" name="payment-methods" value="Cash" required>
      <label for="cash" style="float:left"><i class="fal fa-hand-holding-usd" style="font-size: 30px;"></i> </label>
      <div style="position: relative;left: 20px;">
      <span style="font-size:.875rem;font-weight:bold;text-transform:uppercase">Cash On Delivery</span>
      </div>
    </p>
</div>
  </div>

  <div class="col-lg-4">
    <div class="card" style="height: 450px;overflow: scroll;">
    <div class="table-responsive">
  <table class="table" id="table">
    <thead style="border:none">
    <tr class="table">
      <th scope="col">Product</th>
      <th scope="col"></th>
      <th scope="col">Size</th>
      <th scope="col">Price</th>
    </tr>
    </thead>
    <tbody style="vertical-align: middle;">
      <?php
        $ip = $_SERVER['REMOTE_ADDR'];
        if(isset($_SESSION['email'])) {
          $sql = "SELECT * FROM cart WHERE email='$email' OR ip='$ip'";
        } else {
          $sql = "SELECT * FROM cart WHERE ip='$ip'";
        }
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)) {
          $id = $row['id'];
          $product_id = $row['product_id'];
          $category_cart = $row['category'];
          $size = $row['size'];
          
          if($category_cart == "product-women"){
            $sql_select = "SELECT * FROM products_women WHERE id = $product_id";
          } elseif($category_cart == "product-men") {
            $sql_select = "SELECT * FROM products_men WHERE id = $product_id";
          } elseif($category_cart == "product-kids") {
            $sql_select = "SELECT * FROM products_kids WHERE id = $product_id";
          } elseif($category_cart == "product-wedding") {
            $sql_select = "SELECT * FROM products_wedding WHERE id = $product_id";
          }
          $query_select = mysqli_query($connect, $sql_select);
          while($row_select = mysqli_fetch_array($query_select)) {
            $name = $row_select['name'];
            $price = $row_select['price'];
            $category = $row_select['subcategory'];
            $main_pic = $row_select['main_pic'];
            if($row_select['discount'] !== "") {
              $discount = $row_select['discount'];
              echo "
              <tr>
                <td><img src='products/$main_pic' alt='$name' class='product-frame' style='max-width: 80px;height: 80px;object-fit: cover;'></td>
                <td><a href='product.php?$category_cart=$product_id' target='_blank' style='font-weight:bold;position: relative;left: 2%;'><span style='text-transform: capitalize;'>$name</span></a></td>
                <td>$size</td>
                <td class='price'>".$price_discount = $price - ($price * $discount / 100)."</td>
              </tr>
              ";
            } else {
              echo "
              <tr>
                <td><img src='products/$main_pic' alt='$name' class='product-frame' style='max-width: 80px;height: 80px;object-fit: cover;'></td>
                <td><a href='product.php?$category_cart=$product_id' target='_blank' style='font-weight:bold;position: relative;left: 2%;'><span style='text-transform: capitalize;'>$name</span></a></td>
                <td>$size</td>
                <td class='price'>$price</td>
              </tr>
              ";  
            }
          }
        }
      ?>
    </tbody>
  </table>
    </div>
    </div>
      <button type="submit" class="checkout" name="checkout"><span id="sum1"></span><i class="far fa-chevron-right"></i></button>
  </form>
<?php
if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM cart WHERE email='$email' OR ip='$ip'")) > 0){

} else {
  header('Location: cart.php');
}
if(isset($_POST['checkout'])) {
  $payment_method = $_POST['payment-methods'];
  $now = time();
  $today = date("Ymd");
  $order_number = date('YmdHi', rand($now, $today));
  $date = date("j F Y");
  if(!isset($_SESSION['email'])) {
    $name = $_POST['name-checkout'];
    $address = $_POST['address-checkout'];
    $city = $_POST['city-checkout'];
    $phone = $_POST['phone-checkout'];
  } else {
    $sql_select = "SELECT * FROM accounts WHERE email = '$email'";
    $query_select = mysqli_query($connect, $sql_select);
    while($row_select = mysqli_fetch_array($query_select)) {
      $name = $row_select['name'];
      $address = $row_select['address'];
      $city = $row_select['city'];
      $phone = $row_select['phone'];
    }
  }
  if($payment_method === "Credit Card") {
    $status = "Incomplete";
    $sql = "INSERT INTO orders (order_number, user_ip, user_email, name, address, city, phone, date, status) VALUES ('$order_number', '$ip', '$email', '$name', '$address', '$city', '$phone', '$date', '$status')";
    $query = mysqli_query($connect, $sql);
    $sql_update = "UPDATE cart SET order_num = '$order_number' WHERE email = '$email' OR ip = '$ip'";
    $query_update = mysqli_query($connect, $sql_update);
    //header("Location: credit-card.php");
  } else {
    $status = "Ordered";
    $sql = "INSERT INTO orders (order_number, user_ip, user_email, name, address, city, phone, date, status) VALUES ('$order_number', '$ip', '$email', '$name', '$address', '$city', '$phone', '$date', '$status')";
    $query = mysqli_query($connect, $sql);
    $sql_update = "UPDATE cart SET order_num = '$order_number' WHERE email = '$email' OR ip = '$ip'";
    $query_update = mysqli_query($connect, $sql_update);
    header("Location: success.php?order=$order_number");
  }
}
?>
  </div>
</div>
</div>

<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
<script>
var table = document.getElementById("table"), sumVal = 0;  
for(var i = 1; i < table.rows.length; i++){
  sumVal = sumVal + parseInt(table.rows[i].cells[3].innerHTML);
}
document.getElementById("sum1").innerHTML = sumVal + " EGP";
</script>
</html>