<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="../1351.js"></script>
<script>
$(document).ready(function() {
"use strict";
$('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
$('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
$(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\"></a>");
$(".menu > ul > li").hover(function(e) {
  if ($(window).width() > 943) {
    $(this).children("ul").stop(true, false).fadeToggle(150);
    e.preventDefault();
  }
});
$(".menu > ul > li").click(function() {
  if ($(window).width() <= 943) {
    $(this).children("ul").fadeToggle(150);
  }
});
$(".menu-mobile").click(function(e) {
  $(".menu > ul").toggleClass('show-on-mobile');
  e.preventDefault();
});
});
</script>
<script>
console.log('%cStop!', 'color: red; font-size: 30px; font-weight: bold;');
console.log('If you are not admin, you will be legally punished if you set any codes here because your static IP address will be store in Database');
</script>