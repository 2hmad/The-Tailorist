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
  padding: 10px;
}
.xubkslfqo:hover {
  background-position:right bottom;
  color:white;
}
</style>
</head>
<body>
<?php include('navbar.php') ?>
<div class="container" style="margin-top:5%;max-width: 95%;">
<div class="row">

<div class="col-lg-2" style="margin-bottom: 15%">
  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="line-height: 3em;">
    <a href="my-account.php"><button class="nav-link active" id="v-pills-account-tab">My Account</button></a>
    <a href="previous-orders.php"><button class="nav-link" id="v-pills-orders-tab">Previous Orders</button></a>
    <a href="shipping-address.php"><button class="nav-link" id="v-pills-contact-tab">Address Info</button></a>
    <a href="change-password.php"><button class="nav-link" id="v-pills-password-tab">Change Your Password</button></a>
  </div>
</div>

<div class="col-lg">
<div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">
    <?php
    $email = $_SESSION['email'];
    if(isset($_SESSION['email'])) {
        $sql = "SELECT * FROM accounts WHERE email = '$email'";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)) {
            $name = $row['name'];
            $phone = $row['phone'];
            $address = $row['address'];
            $city = $row['city'];
        }
    } else {
        header('Location: login.php');
    }
    ?>
    <form method="POST">
        <label>
            <input type="text" name="name-change" placeholder="Full Name" value="<?php echo "$name"; ?>">
            <span>Full Name</span>
        </label>
        <label>
            <input type="text" name="phone-change" placeholder="Phone Number" value="<?php if($phone !== ""){echo "$phone"; }else{echo "+20";} ?>">
            <span>Phone Number</span>
        </label>
        <label>
            <input type="text" name="email-change" placeholder="Email Address" value="<?php echo "$email";?>">
            <span>Email Address</span>
        </label>
        <button type="submit" name="save-changes-account" class="xubkslfqo">Save Changes</button>
    </form>
<?php
if(isset($_POST['save-changes-account'])) {
    $name_change = $_POST['name-change'];
    $phone_change = $_POST['phone-change'];
    $email_change = $_POST['email-change'];
    $sql = "UPDATE accounts SET name='$name_change', phone='$phone_change', email='$email_change' WHERE email='$email'";
    $query = mysqli_query($connect, $sql);
    if($query) {
        header("Location: my-account.php");
        if($email_change !== "$email") {
            echo "You will logout now";
            session_destroy();
            header('Location: login.php');
        }    
    }
}
?>
    </div>
</div>
</div>
</div>
</div>
<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
</html>