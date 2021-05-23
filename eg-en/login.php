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
input[name="login"] {
  padding: 10px;
  width: 190px;
  background: #171717;
  color: white;
  font-weight: 400;
  border: none;
  border-radius: 4px;
  margin-top: 4%;
  text-transform: uppercase;
}
@media screen and (max-width: 800px){
.dont-have-account {
  text-align: center;
}
.signin-with {
text-align: center !important;
}
.signin-facebook, .signin-google {
  max-width: 240px;
}
.login-form {
  border-right: none !important;
}
input[name="login"] {
margin-right:auto;
margin-left: auto;
display: block;
}
.forget-password {
  text-align: center !important;
  display: block !important;
  margin-top: 7%;
}
}
.xubkslfqo {
  padding: 10px;
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
.signin-facebook {
  background-color: transparent;
  padding: 10px;
  border: 1px solid #333333;
  width: 270px;
  outline:none;
  display:block;
  background: linear-gradient(to right, transparent 50%, black 50%);
  background-size: 200% 100%;
  background-position:left bottom;
  transition:0.5s;
}
.signin-facebook:hover {
  background-position:right bottom;
  color:white;
}
.signin-google {
  background-color: transparent;
  padding: 10px;
  border: 1px solid #333333;
  width: 270px;
  outline:none;
  display:block;
  margin-top: 1.75rem;
  background: linear-gradient(to right, transparent 50%, black 50%);
  background-size: 200% 100%;
  background-position:left bottom;
  transition:0.5s;
}
.signin-google:hover {
  background-position:right bottom;
  color:white;
}
</style>
</head>
<body>
<?php include('navbar.php') ?>

<div class="login-page" style="margin-top: 5%;margin-bottom: 15%;padding: 20px;display: block;">
<div style="border-bottom: 1px solid #e6e6e6;"><h4 style="text-transform: uppercase;">Sign In</h4></div>
<div class="container">
<div class="row">
<div class="col-lg">

<form method="POST" class="login-form" style="margin-top: 15%;border-right: 1px solid #e6e6e6;">

<label>
    <input type="email" name="email-login" placeholder="Email Address">
    <span>Email</span>
</label>
<label>
    <input type="password" name="pass-login" placeholder="Password" autocomplete="off">
    <span>Password</span>
</label>
<input type="submit" name="login" value="Sign In">
<a href="#" class="forget-password" style="font-weight: 400;font-size: .8125rem;color:#3c3c3c!important;margin-left:3%;display: inline-block;">Forget Password?</a>
</form>
<?php
if(isset($_SESSION['email'])) {
  header('Location: index.php');
} else {
  if(isset($_POST['login'])) {
    $email = $_POST['email-login'];
    $pass = sha1($_POST['pass-login']);
    if($email !== "" && $pass !== "") {
      $sql = "SELECT * FROM accounts WHERE email = '$email' AND password = '$pass'";
      $query = mysqli_query($connect, $sql);
      $num = mysqli_num_rows($query);
      if($num > 0) {
        while($row = mysqli_fetch_array($query)){
          $_SESSION['email'] = $row['email']; 
          header('Location: index.php');
          ob_end_flush();
        }
        } else {
          echo "<div style='color: #ff0017;font-size: 17px;text-transform: uppercase;margin-top: 5%;'><p><i class='far fa-times-octagon'></i> Email Address OR Password is incorrect</p></div>";
        }
      } else {
        echo "<div style='color: #ff0017;font-size: 17px;text-transform: uppercase;margin-top: 5%;'><p><i class='far fa-times-octagon'></i> Please Fill All Required Fields</p></div>";
      }
  }
}
?>
</div>
<div class="col-lg signin-with" style="text-align: left;">
  <div style="margin-left:5%;margin-top:20%;display:block">
  <a href="#" style="display: inline-block;"><button class="signin-facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="font-size: 20px;"></i> Continue With Facebook</button></a>
  <a href="#" style="display: inline-block;"><button class="signin-google"><i class="fab fa-google" aria-hidden="true" style="font-size: 20px;"></i> Continue With Google</button></a>
  <label class="dont-have-account" style="color:#292929;display:block;margin-top: 1.75rem;">Dont have an account yet?</label>
  <a href="sign-up.php" style="display: inline-block;"><button class="xubkslfqo"><i class="fal fa-user"></i> Sign Up</button></a>
  </div>
</div>

</div>
</div>
</div>

<?php include('footer.php') ?>
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