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
    <a href="my-account.php"><button class="nav-link" id="v-pills-account-tab">My Account</button></a>
    <a href="previous-orders.php"><button class="nav-link" id="v-pills-orders-tab">Previous Orders</button></a>
    <a href="shipping-address.php"><button class="nav-link active" id="v-pills-contact-tab">Address Info</button></a>
    <a href="#"><button class="nav-link" id="v-pills-password-tab">Change Your Password</button></a>
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
            <input type="password" name="old-password" placeholder="Old Password" required>
            <span>Old Password</span>
        </label>
        <label>
            <input type="password" name="new-password" placeholder="New Password" required>
            <span>New Password</span>
        </label>
        <label>
            <input type="password" name="confirm-new-password" placeholder="Confirm New Password" required>
            <span>Confirm New Password</span>
        </label>
        <button type="submit" name="save-changes-account" class="xubkslfqo">Save Changes</button>
    </form>
<?php
if(isset($_POST['save-changes-account'])) {
    $old_password = sha1($_POST['old-password']);
    $new_password = sha1($_POST['new-password']);
    $confirm_new_password = sha1($_POST['confirm-new-password']);
    if($confirm_new_password === "$new_password") {
        if($row=mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM accounts WHERE email = '$email'"))) {
            $password = $row['password'];
        }    
        if($old_password === "$password") {
            if($old_password !== "" && $new_password !== "" && $confirm_new_password !== "") {
                $sql = "UPDATE accounts SET password='$new_password' WHERE email='$email'";
                $query = mysqli_query($connect, $sql);
                echo "<div class='alert alert-success'>Your password changed</div>";
            } else {
                echo "<script>alert('Fill All Required Feilds');</script>";
            }
        } else {
            echo "<div class='alert alert-danger'>Old password is incorrect</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>New password and confirm new password is not matching</div>";
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