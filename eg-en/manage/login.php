<!DOCTYPE html>
<html>
<head>
<title>The Tailorist | Modern, Modest Fashion</title>
<?php include('links.php') ?>
<style>
.login-page {
  margin-top: 5%;
  max-width: 65rem;
  margin-left: auto;
  margin-right: auto;
}
input {
    margin-left: auto;
    margin-right: auto;
    display: block;
}
input[name="email-login"] {
    padding: 8px;
    width: 325px;
    margin-top: 11%;
    border: none;
    border-bottom: 1px solid #CCC;
    outline: none;
    max-width: 100%;
}
input[name="login"]:hover {
    background: #459cc7 !important;
    color: white !important;
    border: 1px solid #459cc7;
    transition: 0.6s;
    font-weight:bold;
}

</style>
</head>
<body style="background:#56baec">

<div class="login-page" style="margin-top: 8%;padding: 20px;display: block;">
<div class="container">
<div class="row">
<div style="width: 500px;max-width: 100%;min-height: 480px;background: white;border-radius: 5px;margin-left: auto;margin-right: auto;box-shadow: 0px 0px 20px 1px #464646;">
<form method="POST" class="login-form" style="margin-top: 15%;">
    <span style="text-align: center;display: block;font-weight: bold;font-size: 27px;color: #004363;">Admin Panel</span>
    <input type="email" name="email-login" placeholder="Email Address" style="background-color: transparent;">
    <input type="password" name="pass-login" placeholder="Password" autocomplete="off" style="max-width: 100%;background-color: transparent;padding: 8px;width: 325px;margin-bottom: 14%;border: none;border-bottom: 1px solid #CCC;outline: none;margin-top:8%">
    <input type="submit" name="login" value="Sign In" style="color:white;border-radius:3px;font-weight:bold;width: 170px;padding: 13px;background: #56baec;border: 1px solid #56baec;outline:none;border-radius: 3px;margin-top: 4%;">
    <?php
if(isset($_SESSION['email_admin'])) {
  header('Location: index.php');
} else {
  if(isset($_POST['login'])) {
    $email = $_POST['email-login'];
    $pass = sha1($_POST['pass-login']);
    if($email !== "" && $pass !== "") {
      $sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$pass'";
      $query = mysqli_query($connect, $sql);
      $num = mysqli_num_rows($query);
      if($num > 0) {
        while($row = mysqli_fetch_array($query)){
          $_SESSION['email_admin'] = $row['email']; 
          header('Location: index.php');
          ob_end_flush();
        }
        } else {
          echo "<div style='text-align:center;color: #ff0017;font-size: 17px;text-transform: uppercase;margin-top: 5%;'><p><i class='far fa-times-octagon'></i> Email Address OR Password is incorrect</p></div>";
        }
      } else {
        echo "<div style='text-align:center;color: #ff0017;font-size: 17px;text-transform: uppercase;margin-top: 5%;'><p><i class='far fa-times-octagon'></i> Please Fill All Required Fields</p></div>";
      }
  }
}
?>
</form>
</div>
</div>
</div>
</div>

</body>
<?php include('scripts.php') ?>
<script>
$(function() {
  $('input').on('change', function() {
    var input = $(this);
    if (input.val().length) {
      input.addClass('populated');
    } else {
      input.removeClass('populated');
    }
  });
  
  setTimeout(function() {
    $('#fname').trigger('focus');
  }, 500);
});
</script>
</html>