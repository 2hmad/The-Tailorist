<!DOCTYPE html>
<html>
<head>
<title>My Account | Modern, Modest Fashion</title>
<?php include('links.php') ?>
<style>
form label {
  position: relative;
  display: block;
}
form label input {
  font: 18px Helvetica, Arial, sans-serif;
  box-sizing: border-box;
  display: block;
  border: none;
  padding: 15px;
  width: 365px;
  max-width: 100%;
  border-bottom: 1px solid #525252;
  margin-bottom: 40px;
  font-size: 18px;
  outline: none;
  transition: all 0.2s ease-in-out;
}
form label input::-moz-placeholder {
  -moz-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  color: #999;
  font: 18px Helvetica, Arial, sans-serif;
}
form label input:-ms-input-placeholder {
  -ms-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  color: #999;
  font: 18px Helvetica, Arial, sans-serif;
}
form label input::placeholder {
  transition: all 0.2s ease-in-out;
  color: #999;
  font: 18px Helvetica, Arial, sans-serif;
}
form label input:focus, form label input.populated {
  padding-top: 28px;
  padding-bottom: 12px;
}
form label input:focus::-moz-placeholder, form label input.populated::-moz-placeholder {
  color: transparent;
}
form label input:focus:-ms-input-placeholder, form label input.populated:-ms-input-placeholder {
  color: transparent;
}
form label input:focus::placeholder, form label input.populated::placeholder {
  color: transparent;
}
form label input:focus + span, form label input.populated + span {
  opacity: 1;
  top: 10px;
}
form label span {
  color: #2d2d2d;
  font: 13px Helvetica, Arial, sans-serif;
  position: absolute;
  top: 0px;
  left: 20px;
  opacity: 0;
  transition: all 0.2s ease-in-out;
}
.nav-link {
    background: transparent;
    border: none;
}
.nav-link.active {
    outline: none;
    border: none;
    background-color: transparent!important;
    font-weight: bold;
    color: black!important;
}
.nav-link:focus {
    outline: none;
    border: none
}
.xubkslfqo {
  border: 1px solid #333333;
  width: 180px;
  outline:none;
  margin-top: 1rem;
  background: linear-gradient(to right, transparent 50%, black 50%);
  background-size: 200% 100%;
  background-position:left bottom;
  transition:0.5s;
}
.xubkslfqo:hover {
  background-position:right bottom;
  color:white;
}
@media screen and (max-width: 800px){
a {
  color: black !important;
}
}
</style>
</head>
<body>
<?php include('navbar.php') ?>
<div class="container" style="margin-top:5%;max-width: 95%;">
<div class="row">

<div class="col-lg-2" style="margin-bottom: 15%">
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="line-height: 3em;">
    <a href="my-account.php"><button class="nav-link" id="v-pills-account-tab">My Account</button></a>
    <a href="previous-orders.php"><button class="nav-link active" id="v-pills-orders-tab">Previous Orders</button></a>
    <a href="shipping-address.php"><button class="nav-link" id="v-pills-contact-tab">Address Info</button></a>
    <a href="change-password.php"><button class="nav-link" id="v-pills-password-tab">Change Your Password</button></a>
  </div>
</div>

<div class="col-lg">
<div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
    <div class='table-responsive'>
        <table class='table'>
          <thead class="thead-light">
            <tr>
              <th scope='col'>Order No.</th>
              <th scope='col'>Date</th>
              <th scope='col'>Status</th>
            </tr>
          </thead>
          <tbody style="line-height: 3em;">
          <?php
          if(isset($_GET['page'])) {
            $page_number = $_GET['page'];
        } else {
            $page_number = 1;
        }
        $num_per_page = 7;
        $from = ($page_number-1)*$num_per_page;
        
          $sql = "SELECT * FROM orders WHERE user_email = '$email' LIMIT $from, $num_per_page";
          $query = mysqli_query($connect, $sql);
          $num = mysqli_num_rows($query);
          if($num > 0) {
              while($row = mysqli_fetch_array($query)) {
                  $order_number = $row['order_number'];
                  $date = $row['date'];
                  $status = $row['status'];
                  echo "
                    <tr>
                      <td><a href='tracking.php?order=$order_number' target='_blank'>$order_number</a></td>
                      <td>$date</td>
                      <td>$status</td>
                    </tr>";
              }
          } else {
              echo "<span style='font-weight: bold;text-align: center;display: block;text-transform: uppercase;font-size: 19px;'>No order has been placed recently</span>";
          }
          ?>
          </tbody>
        </table>
        <?php
    $sql = "SELECT * FROM orders WHERE user_email = '$email'";
    $query = mysqli_query($connect, $sql);
    $totalItems = mysqli_num_rows($query);

    $total_pages = ceil($totalItems/$num_per_page);
    for($i=1;$i<=$total_pages;$i++){
    }
?>

<form method="POST">
  <button type="submit" name="delete-prev-orders" class="btn btn-danger"><i class="fal fa-trash"></i> Delete All</button>
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fal fa-box-usd"></i> Refund</button>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Restore Purchases</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <select name="order-number" style="padding:5px;width:100%;outline:none">
          <option value="" hidden>-- Order Number --</option>
          <?php
          while($row = mysqli_fetch_array($query)) {
            $order_number = $row['order_number'];
            echo "<option>$order_number</option>";
          }
          ?>
        </select>
        <textarea name="cause" style="width: 100%;height:150px;margin-top:2%;outline:none;padding:5px" placeholder="Write the reason for this refund"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="refund" class="btn btn-primary">Refund</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php
if(isset($_POST['refund'])) {
  $order = $_POST['order-number'];
  $cause = $_POST['cause'];
  if($order !== "" && $cause !== "") {
    if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM refund WHERE order_number = '$order'")) > 0) {
      echo "<script>alert('You requested it before, Please wait our response')</script>";
    } else {
    $query_refund = mysqli_query($connect, "INSERT INTO refund (order_number, cause) VALUES ('$order_number', '$cause')");
    echo "<div class='alert alert-success'>Refund order requested</div>";
    }
  } else {
    echo "<script>alert('Fill All Required Inputs')</script>";
  }
}
if(isset($_POST['delete-prev-orders'])) {
  mysqli_query($connect, "DELETE FROM orders WHERE user_email = '$email'");
  header('Location: '.$_SERVER['REQUEST_URI'].'');
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
</div>
</div>
</div>
</div>
<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
</html>