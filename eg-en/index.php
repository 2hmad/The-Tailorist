<!DOCTYPE html>
<html>
<head>
<title>The Tailorist | Modern, Modest Fashion</title>
<?php include('links.php') ?>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<style>
.carousel-item {
    height: 583px;
}
.carousel-item img {
    object-fit: cover;
    height: 100%;
}
.card {
    box-shadow: none;
    outline: none;
}
.browse-btn {
    background-color: transparent;
    padding: 10px 25px;
    color: white;
    border: 1px solid white;
    font-weight: bold;
    text-transform: uppercase;
    border-radius: 3px;
    margin-top: 2%;
    margin-left: 1%;
    outline: none;
}
.browse-btn:hover {
    background-color: white;
    -webkit-transition: 0.6s;
    transition: 0.6s;
    color:black
}
.row {
    margin-left: 0;
    margin-right: 0;
}
</style>
</head>
<body>
<section data-vc-parallax="1.5" style="background-image: url(pics/woman-model-business-suit-wearing-hat.jpg);background-repeat: no-repeat;background-size: cover;min-height: 100vh;background-position: center;background-attachment: fixed;">
<?php include('navbar.php') ?>

<div style="padding: 0px 0px 0px 35px;margin-top: 11%;">
<h1 style="text-transform: uppercase;font-size: 30px;color: white;font-weight: bold;font-size:3em"><?php
$today = new DateTime();
$today->format('m-d-Y');
$spring = new DateTime('March 20');
$summer = new DateTime('June 20');
$fall = new DateTime('September 22');
$winter = new DateTime('December 21');

switch(true) {
    case $today >= $spring && $today < $summer:
        echo 'Spring';
        break;

    case $today >= $summer && $today < $fall:
        echo 'Summer';
        break;

    case $today >= $fall && $today < $winter:
        echo 'Fall';
        break;

    default:
        echo 'Winter';
}
?> FASHION<br>TREND <?php echo date('Y') ?></h1>
<a href="#women"><button type="button" class="browse-btn" onClick="document.getElementById('women').scrollIntoView();">browse</button></a>
</div>
</section>

<div class="row" style="width: 100%;">
<div class="col-sm-8" style="min-height:553px;background: url('pics/X7ualoEGBt.jpg');background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;">
    
</div>
<div class="col-sm-4">
    <div style="padding: 10px;-webkit-box-pack: center;-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;display:block;height: 100%;">
        <div style="height: 100%;display: block;color:#222">
            <p style="padding-top: 20%;text-transform: uppercase"><?php
            $today = new DateTime();
            $today->format('m-d-Y');
            $spring = new DateTime('March 20');
            $summer = new DateTime('June 20');
            $fall = new DateTime('September 22');
            $winter = new DateTime('December 21');

            switch(true) {
                case $today >= $spring && $today < $summer:
                    echo 'Spring';
                    break;

                case $today >= $summer && $today < $fall:
                    echo 'Summer';
                    break;

                case $today >= $fall && $today < $winter:
                    echo 'Fall';
                    break;

                default:
                    echo 'Winter';
            }
            ?> <?php echo date('Y') ?></p>
            <h1 style="font-weight: bold;font-size: 45px;">HOPE'S<br>LIVE SHOW</h1>
            <span style="font-size:14px;display: block;margin-top: 3%;line-height: 2em;">Our products bring together the finest materials and stunning design to create something very special. Creating unique products that everyone can enjoy.</span>
        </div>
    </div>
</div>
</div>


<div class="row" id="women" style="width: 100%;">
<div class="col-sm-8">
<div class="container" style="margin-top: 5%;">
    <div class="carousel-slick" style="height:100%;text-align: center;display: block;">
    <?php
$sql = "SELECT * FROM products_women ORDER BY RAND() LIMIT 6";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_assoc($query)){
    $id = $row['id'];
    $name = $row['name'];
    $category = $row['subcategory'];
    $price = $row['price'];
    $main_pic = $row['main_pic'];
    if($row['discount'] !== "") {
        $discount = $row['discount'];
    } else {
        $discount = "";
    }
    if($row['second_pic'] !== "") {
        $second_pic = $row['second_pic'];
        echo "
        <div>
            <a href='product.php?product-women=$id' style='display: inline-block;margin-top:2%;'>
                <div class='card' style='width: 300px;max-width: 300px;min-height: 400px;border: none;'>
                <div style='height:300px'>
                    <img src='products/$main_pic' class='card-img-top' alt='$name' onmouseover=this.src='products/$second_pic' onmouseout=this.src='products/$main_pic' style='width:100%;height:100%;object-fit: cover;'>
                </div>
                <div class='card-body'>
                <div style='text-align: left;padding:10px;text-align:center'>
                    <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                    ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
                </div>
                </div>
                </div>
            </a>
        </div>";    
    } else {
        echo "
        <div>
            <a href='product.php?product-women=$id' style='display: inline-block;margin-top:2%;'>
                <div class='card' style='width: 300px;max-width: 300px;min-height: 400px;border: none;'>
                <div style='height:300px'>
                    <img src='products/$main_pic' class='card-img-top' alt='$name' style='width:100%;height:100%;object-fit: cover;'>
                </div>
                <div class='card-body'>
                <div style='text-align: left;padding:10px;text-align:center'>
                    <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                    ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
                </div>
                </div>
                </div>
            </a>
        </div>";    
    }
}
?>
    </div>
</div>
</div>
<div class="col-sm-4" style="min-height:553px;background: url('pics/test1.jpg');background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;">
        <div style="padding: 10px;-webkit-box-pack: center;-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;display:block;height: 100%;">
            <div style="text-align: center;height: 100%;display: block;color:white">
                <span style="font-family:'Circular Std Book', sans-serif;font-size:14px;padding-top: 35%;display: block;">WOMEN'S CLOTHING</span>
                <h1 style="font-weight: bold;font-size: 45px;font-family: 'Circular Std Bold', sans-serif">HOT TREND IN THIS WEEK</h1>
                <a href="women/all-products.php"><button type="button" class="browse-btn">browse</button></a>
            </div>
        </div>
    </div>
</div>


<div class="row" style="width: 100%;">
<div class="col-sm-8" style="min-height:553px;background: url('pics/couple-in-winter-cloths-in-studio.jpg');background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;">
        <div style="padding: 10px;-webkit-box-pack: center;-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;display:block;height: 100%;">
            <div style="text-align: center;height: 100%;display: block;color:white">
                <span style="font-family:'Circular Std Book', sans-serif;font-size:14px;padding-top: 15%;display: block;">MEN'S CLOTHING</span>
                <h1 style="font-weight: bold;font-size: 45px;font-family: 'Circular Std Bold', sans-serif">HOT TREND IN THIS WEEK</h1>
                <a href="men/all-products.php"><button type="button" class="browse-btn">browse</button></a>
            </div>
        </div>
    </div>

<div class="col-sm-4">
<div class="container" style="margin-top: 5%;">
    <div class="carousel-slick-two" style="height:100%;text-align: center;display: block;">
    <?php
$sql = "SELECT * FROM products_men ORDER BY RAND() LIMIT 4";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_assoc($query)){
    $id = $row['id'];
    $name = $row['name'];
    $category = $row['subcategory'];
    $price = $row['price'];
    $main_pic = $row['main_pic'];
    if($row['discount'] !== "") {
        $discount = $row['discount'];
    } else {
        $discount = "";
    }
    if($row['second_pic'] !== "") {
        $second_pic = $row['second_pic'];
        echo "
        <div>
            <a href='product.php?product-women=$id' style='display: inline-block;margin-top:2%;'>
                <div class='card' style='width: 300px;max-width: 300px;min-height: 400px;border: none;'>
                <div style='height:300px'>
                    <img src='products/$main_pic' class='card-img-top' alt='$name' onmouseover=this.src='products/$second_pic' onmouseout=this.src='products/$main_pic' style='width:100%;height:100%;object-fit: cover;'>
                </div>
                <div class='card-body'>
                <div style='text-align: left;padding:10px;text-align:center'>
                    <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                    ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
                </div>
                </div>
                </div>
            </a>
        </div>";    
    } else {
        echo "
        <div>
            <a href='product.php?product-women=$id' style='display: inline-block;margin-top:2%;'>
                <div class='card' style='width: 300px;max-width: 300px;min-height: 400px;border: none;'>
                <div style='height:300px'>
                    <img src='products/$main_pic' class='card-img-top' alt='$name' style='width:100%;height:100%;object-fit: cover;'>
                </div>
                <div class='card-body'>
                <div style='text-align: left;padding:10px;text-align:center'>
                    <h1 style='font-size: 18px;font-weight: bold;text-transform: capitalize;'>$name</h1>
                    ". ( ($discount !== "") ? "<del style='color:#bfbfbf!important;font-weight: 400;font-size: 17px;'>$price EGP</del> <ins style='font-weight: 400;font-size: 17px;'>".$price_discount = $price - ($price * $discount / 100)." EGP</ins><br/><span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>" : "<span style='font-weight: 400;font-size: 17px;'>$price EGP</span>" ) ."
                </div>
                </div>
                </div>
            </a>
        </div>";    
    }
}
?>
</div>
</div>
</div>
</div>

<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$('.carousel-slick').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3,
  dots:true,
  arrows: false,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

</script>
<script>
$('.carousel-slick-two').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  dots:true,
  arrows: false
});
</script>

</html>