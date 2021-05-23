<!DOCTYPE html>
<html>
<head>
<title>The Tailorist | Modern, Modest Fashion</title>
<?php include('links.php') ?>
<style>
@charset "UTF-8";
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
.nav-pills .nav-link.active {
  content: "\2713 ";
}
</style>
</head>
<body>
<?php include('navbar.php') ?>
<br><br>
<div class="container" style="width:100%">

  <ul class="list-unstyled multi-steps">
    <li>Add Personal Data</li>
    <li class="is-active">Payment Method</li>
    <li>Purchased</li>
  </ul>

<div style="margin-left: auto;margin-right:auto;display:block;box-shadow: 0px 0px 11px 0px #d4d4d4;background:white;width:550px;margin-top:7%;max-width:100%;padding:15px">
<h6 style="text-transform: uppercase;font-weight:bold;margin-top:5%;margin-bottom:5%;color:#f77070">Payment Methods</h6>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation" style="margin-left: auto;">
    <button class="nav-link active" id="pills-home-tab" style="background: transparent;border: navajowhite;outline: none;" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><img src="pics/visa-mastercard.png" style="max-width: 45px;"></button>
  </li>
  <li class="nav-item" role="presentation">
    <a href="#" target="_blank"><button class="nav-link" id="pills-profile-tab" style="background: transparent;border: navajowhite;outline: none;" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><img src="pics/paypal.png" style="max-width: 45px;"></button></a>
  </li>
  <li class="nav-item" role="presentation" style="margin-right: auto;">
    <button class="nav-link" id="pills-contact-tab" style="background: transparent;border: navajowhite;outline: none;" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><img src="pics/fawry.png" style="max-width: 45px;"></button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent" style="margin-top:10%">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <form method="POST">
    <label style="display: block;margin-top: 8%;color: #757575;text-transform: uppercase;font-weight:bold">Card Number <span style="color:#f77070">*</span></label>
    <input type="text" name="card-number" style="height: 44px;outline:none;display: block;padding: 5px;width: 95%;border: 1px solid #CCC;border-radius: 4px;" required>
    <label style="display: block;margin-top: 5%;color: #757575;text-transform: uppercase;font-weight:bold">Name On Card <span style="color:#f77070">*</span></label>
    <input type="text" name="name-card-number" style="height: 44px;outline:none;display: block;padding: 5px;width: 95%;border: 1px solid #CCC;border-radius: 4px;" required>
    <input name="ccv" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "4" placeholder="CCV" max="4" style="height: 44px;outline:none;margin-top:5%;display: inline-block;padding: 5px;width: 47%;border: 1px solid #CCC;border-radius: 4px;" required>
    <input type="text" name="expiry-date" placeholder="Expiry Date MM/YY" style="height: 44px;outline:none;display: inline-block;padding: 5px;width: 47%;border: 1px solid #CCC;border-radius: 4px;" required>
    <span style="display: block;margin-top: 5%;text-align: center;font-weight: bold;text-transform: uppercase;font-size: 20px;">Total : 200 EGP</span>
    <input type="submit" name="purchase" value="PURCHASE" style="margin-bottom: 5%;display: block;margin-left: auto;margin-right: auto;margin-top: 5%;width: 250px;max-width: 100%;height: 46px;background: tomato;border: 1px solid tomato;color: white;font-weight: bold;border-radius: 5px;outline: none;">
  </form>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>

</div>
<img src="pics/payment.png" alt="The Tailorist Payment Methods" style="margin-left: auto;margin-right: auto;display: block;max-width: 300px;margin-top: 2%;margin-bottom: 5%;">
</div>
<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
</html>