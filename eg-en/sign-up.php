<!DOCTYPE html>
<html>
<head>
<title>The Tailorist | Modern, Modest Fashion</title>
<?php include('links.php') ?>
<style>
.signup-page {
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
input[name="signup"] {
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
.already-have-account {
  text-align: center;
}
.signup-with {
text-align: center !important;
}
.signup-facebook, .signup-google {
  max-width: 240px;
}
.signup-form {
  border-right: none !important;
}
input[name="signup"] {
margin-right:auto;
margin-left: auto;
display: block;
}
}
.valid {
  color: green;
}
.valid:before {
  position: relative;
  left: -35px;
  content: "\2714";
}
.invalid {
  color: red;
}
.invalid:before {
  position: relative;
  left: -35px;
  content: "\2716";
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
.signup-facebook {
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
.signup-facebook:hover {
  background-position:right bottom;
  color:white;
}
.signup-google {
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
.signup-google:hover {
  background-position:right bottom;
  color:white;
}
</style>
</head>
<body>
<?php include('navbar.php') ?>

<div class="signup-page" style="margin-top: 5%;margin-bottom: 15%;padding: 20px;display: block;">
<div style="border-bottom: 1px solid #e6e6e6;"><h4 style="text-transform: uppercase;">Sign Up</h4></div>
<div class="container">
<div class="row">
<div class="col-lg">

<form method="POST" class="signup-form" style="margin-top: 15%;border-right: 1px solid #e6e6e6;" autocomplete="off">
<label>
    <input type="text" name="name-signup" placeholder="Full Name" autocomplete="off">
    <span>Full Name</span>
</label>
<label>
    <input type="email" name="email-signup" placeholder="Email Address" autocomplete="off">
    <span>Email</span>
</label>
<label>
    <input type="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="pass-signup" placeholder="Password" autocomplete="off">
    <span>Password</span>
</label>
  <p id="letter" class="invalid" style="margin-left: 10%;margin-bottom: 0.3rem;">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid" style="margin-left: 10%;margin-bottom: 0.3rem;">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid" style="margin-left: 10%;margin-bottom: 0.3rem;">A <b>number</b></p>
  <p id="length" class="invalid" style="margin-left: 10%;">Minimum <b>8 characters</b></p>
<div class="g-recaptcha" data-sitekey="6Lf_n08aAAAAAJ8B7a3fepHaVVxx2yiBvv3bNqZH"></div>
<span style="display: block;width: 40%;font-size: .6875rem!important;color: #707070;margin-top: 3%;">By registering you agreed to our <a href="#" style="text-decoration: underline !important;">Terms & Conditions</a> and <a href="#" style="text-decoration: underline !important;">Privacy Policy</a>.</span>
<input type="submit" name="signup" value="Create An Account">
</form>
<?php
if(isset($_SESSION['email'])) {
  header('Location: index.php');
} else {
  if(isset($_POST['signup'])) {
    $name = $_POST['name-signup'];
    $email = $_POST['email-signup'];
    $pass = sha1($_POST['pass-signup']);
  if($name !== "" && $email !== "" && $pass !== "") {
    $sql_validate = "SELECT * FROM accounts WHERE email = '$email'";
    $query_validate = mysqli_query($connect, $sql_validate);
    $num = mysqli_num_rows($query_validate);
    if($num > 0) {
      echo "<div style='color: #ff0017;font-size: 17px;text-transform: uppercase;margin-top: 5%;'><p><i class='far fa-times-octagon'></i> Your email address used before</p></div>";
    } else {
      $sql = "INSERT INTO accounts (name, email, password) VALUES ('$name', '$email', '$pass')";
      $query = mysqli_query($connect, $sql);  
      echo "<div style='color: green;font-size: 16px;text-transform: uppercase;margin-top: 5%;'><p><i class='fal fa-check-circle'></i> Your account has created, You will redirect in 5 sec</p></div>";  
      echo "<script>setTimeout(function(){ window.location.href = 'login.php'; }, 5000);</script>";
    }
  } else {
    echo "<div style='color: #ff0017;font-size: 17px;text-transform: uppercase;margin-top: 5%;'><p><i class='far fa-times-octagon'></i> Fill all fields</p></div>";
  }
  }
}
?>
</div>
<div class="col-lg signup-with" style="text-align: left;">
  <div style="margin-left:5%;margin-top:20%;display:block">
  <a href="#" style="display: inline-block;"><button class="signup-facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="font-size: 20px;"></i> <span>Continue With Facebook</span></button></a>
  <a href="#" style="display: inline-block;"><button class="signup-google"><i class="fab fa-google" aria-hidden="true" style="font-size: 20px;"></i> <span>Continue With Google</span></button></a>
  <label class="already-have-account" style="color:#292929;display:block;margin-top: 1.75rem;">Already have an account?</label>
  <a href="login.php" style="display: inline-block;"><button class="xubkslfqo"><i class="fal fa-user"></i> Sign In</button></a>
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
$(function() {
    $('.signup-form').disableAutoFill();
});
</script>
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

myInput.onkeyup = function() {
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>