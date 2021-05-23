<!DOCTYPE html>
<html>
<head>
<title>The Tailorist | Modern, Modest Fashion</title>
<?php include('links.php') ?>
<link rel="stylesheet" href="https://unpkg.com/xzoom/dist/xzoom.css">
<style>
@media screen and (max-width: 800px){
.instructions {
margin-bottom: 5%;
text-align: left;
}
    }
.style-4 del {
  color: rgba(169, 169, 169, 0.5);
  text-decoration: none;
  position: relative;
  font-size: 30px;
  font-weight: 100;
}
.style-4 del:before {
  content: " ";
  display: block;
  width: 95%;
  border-top: 3px solid rgba(169, 169, 169, 0.8);
  height: 4px;
  position: absolute;
  bottom: 20px;
  left: 0;
  transform: rotate(-11deg);
}
.style-4 del:after {
  content: " ";
  display: block;
  width: 95%;
  border-top: 3px solid rgba(169, 169, 169, 0.8);
  height: 4px;
  position: absolute;
  bottom: 20px;
  left: 0;
  transform: rotate(11deg);
}
.style-4 ins {
  font-size: 30px;
  font-weight: 500;
  text-decoration: none;
  padding: 1em 1em 1em 0.5em;
}
#default{
  text-align:center;
}
.xzoom {
    width: 100%;
    height: 550px;
    object-fit: cover;
}
</style>
</head>
<body>
<?php include('navbar.php') ?>
<div class="container" style="margin-top: 5%;">
    <div class="row">
<?php
if(isset($_GET['product-women'])) {
    $id_women = $_GET['product-women'];
    $gender = "product-women";
} elseif(isset($_GET['product-men'])) {
    $id_men = $_GET['product-men'];
    $gender = "product-men";
} elseif(isset($_GET['product-kids'])) {
    $id_kids = $_GET['product-kids'];
    $gender = "product-kids";
} elseif(isset($_GET['product-wedding'])) {
    $id_wedding = $_GET['product-wedding'];
    $gender = "product-wedding";
}
if(isset($id_women) || isset($id_men) || isset($id_kids) || isset($id_wedding) && $id !== ""){
    if(isset($id_women)) {
        $sql = "SELECT * FROM products_women WHERE id=$id_women";
    } elseif (isset($id_men)) {
        $sql = "SELECT * FROM products_men WHERE id=$id_men";
    } elseif (isset($id_kids)) {
        $sql = "SELECT * FROM products_kids WHERE id=$id_kids";
    } elseif (isset($id_wedding)) {
        $sql = "SELECT * FROM products_wedding WHERE id=$id_wedding";
    }
    $query = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($query);
    if ($num > 0) {
        while($row = mysqli_fetch_array($query)){
            $name = $row['name'];
            $price = $row['price'];
            $category = $row['subcategory'];
            $sizes = $row['sizes'];
            $fabric = $row['fabric'];
            $size_model = $row['size_model'];
            $weight = $row['weight'];
            $dedicated = $row['dedicated_to'];
            $colors = $row['color_for'];
            $details = $row['product_details'];
            $main_pic = $row['main_pic'];
            $second_pic = $row['second_pic'];
            $third_pic = $row['third_pic'];
            $fourth_pic = $row['fourth_pic'];
            $discount = $row['discount'];
        }
    } else {
        header('Location: 404.php');
    }  
} else {
    echo "<script>alert('No Product with this id');window.history.back()</script>";
}
?>
    <div class="col-lg-7">
    <section id="default" class="padding-top0">
    <div class="row">
      <div class="large-5 column">
        <div class="xzoom-container">
        <?php
        if ($main_pic !== "") {
            echo "<img class='xzoom' id='xzoom-default' src='products/$main_pic' xoriginal='products/$main_pic'>";
        }
        ?>
          <div class="xzoom-thumbs">
            <?php
            if ($main_pic !== "") {
                echo "<a href='products/$main_pic'><img class='xzoom-gallery' width='80' src='products/$main_pic' xpreview='products/$main_pic' title='$name'></a>";
            }
            if ($second_pic !== "") {
                echo "<a href='products/$second_pic'><img class='xzoom-gallery' width='80' src='products/$second_pic' xpreview='products/$second_pic' title='$name'></a>";
            }
            if ($third_pic !== "") {
                echo "<a href='products/$third_pic'><img class='xzoom-gallery' width='80' src='products/$third_pic' xpreview='products/$third_pic' title='$name'></a>";
            }
            if ($fourth_pic !== "") {
                echo "<a href='products/$fourth_pic'><img class='xzoom-gallery' width='80' src='products/$fourth_pic' xpreview='products/$fourth_pic' title='$name'></a>";
            }

            ?>
          </div>
        </div>        
      </div>
      <div class="large-7 column"></div>
    </div>
    </section>
    <!-- default end -->

        </div>
        <div class="col-lg">
            <span style="padding-top: 3%;padding-bottom: 3%;display:block;color: gray;font-weight: 400;"><span style="font-weight: bold;">452</span> Buyed This Item</span>
            <h1 style="font-size: 30px;font-weight: 400;text-transform: capitalize;"><?php echo "$name"; ?></h1>
            <div class="style-4" style="margin-top: 5%;">
            <?php                            
                if($discount > 0) {
                        $price_discount = $price - ($price * $discount / 100);
                        echo "<del><span class='amount' style='font-weight: 400;'>$price EGP</span></del>";
                        echo "<ins><span class='amount' style='font-weight: 400;'>$price_discount EGP</span></ins>";
                        echo "<span style='color:red;display: block;font-size: 15px;'>(Save $discount%)</span>";
                } else {
                    echo "<ins style='padding: 0;'><span class='amount' style='font-weight: 400;'><span>$price</span> EGP</span></ins>";
                }
            ?>
            </div>
            <p style="font-weight: bold;margin-top: 7%;">Available Sizes :</p>
            <form method="POST">
            <select name="available-sizes" style="width: 200px;padding: 7px;border-radius: 5px;border: 1px solid #CCC;outline:none" required>
                <?php
                if(isset($id_women)) {
                    $sql_size = "SELECT sizes FROM products_women WHERE id = $id_women";
                } elseif (isset($id_men)) {
                    $sql_size = "SELECT sizes FROM products_men WHERE id = $id_men";
                } elseif (isset($id_kids)) {
                    $sql_size = "SELECT sizes FROM products_kids WHERE id = $id_kids";
                } elseif (isset($id_wedding)) {
                    $sql_size = "SELECT sizes FROM products_wedding WHERE id = $id_wedding";
                }
                $query_size = mysqli_query($connect, $sql_size);
                while($row_size = mysqli_fetch_array($query_size)){
                $sizes = $row_size['sizes'];
                echo "$sizes";
                }
                ?>
            </select>
            <p style="font-weight: bold;margin-top: 7%;">Available Colors :</p>
            <?php
            if(isset($id_women)) {
                $sql_color = "SELECT * FROM products_women WHERE color_for = $id_women";
            } elseif (isset($id_men)) {
                $sql_color = "SELECT * FROM products_men WHERE color_for = $id_men";
            } elseif (isset($id_kids)) {
                $sql_color = "SELECT * FROM products_kids WHERE color_for = $id_kids";
            } elseif (isset($id_wedding)) {
                $sql_color = "SELECT * FROM products_wedding WHERE color_for = $id_wedding";
            }
            $query_color = mysqli_query($connect, $sql_color);
            if($query_color) {
                if(mysqli_num_rows($query_color) > 0) {
                    while($row = mysqli_fetch_array($query_color)){
                        $id_color = $row['id'];
                        $main_pic = $row['main_pic'];
                        if(isset($id_women)) {
                            echo "<a href='product.php?product-women=$id_color' style='display:inline-block;margin-right:2%'><img src='products/$main_pic' style='max-width: 47px;height: 71px;object-fit: cover;'></a>";
                        } elseif (isset($id_men)) {
                            echo "<a href='product.php?product-men=$id_color' style='display:inline-block;margin-right:2%'><img src='products/$main_pic' style='max-width: 47px;height: 71px;object-fit: cover;'></a>";
                        } elseif (isset($id_kids)) {
                            echo "<a href='product.php?product-kids=$id_color' style='display:inline-block;margin-right:2%'><img src='products/$main_pic' style='max-width: 47px;height: 71px;object-fit: cover;'></a>";
                        } elseif (isset($id_wedding)) {
                            echo "<a href='product.php?product-wedding=$id_color' style='display:inline-block;margin-right:2%'><img src='products/$main_pic' style='max-width: 47px;height: 71px;object-fit: cover;'></a>";
                        }
                    }
                } else {
                    echo "<a href='$_SERVER[REQUEST_URI]' style='display:inline-block;margin-right:2%'><img src='products/$main_pic' style='max-width: 47px;height: 71px;object-fit: cover;'></a>";
                }
            }
            ?>
            <div style="text-align: center;">
                <button type='submit' name='add-cart' id='add-cart' style='text-transform: uppercase;'><i class='fal fa-shopping-bag'></i> Add To Cart</button>
                <a href="checkout.php?product-id=<?php
                if(isset($_GET['product-women'])) {
                    echo "$id_women";
                } elseif(isset($_GET['product-men'])) {
                    echo "$id_men";
                } elseif(isset($_GET['product-kids'])) {
                    echo "$id_kids";
                } elseif(isset($_GET['product-wedding'])) {
                    echo "$id_wedding";
                }
                ?>"><button type="button" id="add-cart" style="text-transform: uppercase;"><i class="fal fa-cash-register"></i> Buy Now</button>
                </a>
            </form>
        <?php
        $remote = $_SERVER['REMOTE_ADDR'];

        if(isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        } else {
            $email = "";
        }
        if(isset($_GET['product-women'])) {
            $category_cart = "product-women";
        } elseif(isset($_GET['product-men'])) {
            $category_cart = "product-men";
        } elseif(isset($_GET['product-kids'])) {
            $category_cart = "product-kids";
        } elseif(isset($_GET['product-wedding'])) {
            $category_cart = "product-wedding";
        }
        if(isset($_POST['add-cart'])) {
            $size = $_POST['available-sizes'];
            if($size !== "") {
                if(isset($id_women)) {
                    $sql = "INSERT INTO cart (email, ip, product_id, category, size) VALUES ('$email', '$remote', '$id_women', '$category_cart', '$size')";
                } elseif (isset($id_men)) {
                    $sql = "INSERT INTO cart (email, ip, product_id, category, size) VALUES ('$email', '$remote', '$id_men', '$category_cart', '$size')";
                } elseif (isset($id_kids)) {
                    $sql = "INSERT INTO cart (email, ip, product_id, category, size) VALUES ('$email', '$remote', '$id_kids', '$category_cart', '$size')";
                } elseif (isset($id_wedding)) {
                    $sql = "INSERT INTO cart (email, ip, product_id, category, size) VALUES ('$email', '$remote', '$id_wedding', '$category_cart', '$size')";
                }
                $query = mysqli_query($connect, $sql);
                header('Location: '.$_SERVER['REQUEST_URI'].'');
                
            } else {
                echo "<script>alert('Please Choose Size')</script>";
            }
        }
        ?>
            </div>
        </div>
    </div>
</div>
<hr class="dropdown-divider" style="margin-top: 4%;margin-bottom: 4%;">
<div class="container">
    <h3 style="font-size: 1.3rem;font-weight: 500;">Product Details :</h3>
    <p style="margin-top: 30px;"><?php echo "$details" ?></p>
    <table class="table table-striped">
    <tbody style="line-height: 3em;">
    <tr>
      <th scope="row" style="width: 350px;">Fabric</th>
      <td><?php echo "$fabric"; ?></td>
    </tr>
    <tr>
      <th scope="row" style="width: 350px;">Size Shown On Model</th>
      <td><?php echo "$size_model"; ?></td>
    </tr>
    <tr>
      <th scope="row" style="width: 350px;">Weight in KGs</th>
      <td><?php echo "$weight"; ?></td>
    </tr>
    <tr>
      <th scope="row" style="width: 350px;">Dedicated to</th>
      <td><?php echo "$dedicated"; ?></td>
    </tr>
    </tbody>
    </table>
</div>
<hr class="dropdown-divider" style="margin-top: 4%;margin-bottom: 2%;">
<div class="container" style="margin-bottom: 2%;text-align:center">
    <div class="row">
        <div class="col-lg instructions">
            <div style="background:#B9FFDD;width:40px;height:40px;border-radius:50%;text-align:center;display:inline-block">
            <span style="font-size: 19px;padding-top: 5px;display: block;">1</span>
            </div>
            <span style="font-weight: 500;">Safe Packaging and Delivery</span>
        </div>
        <div class="col-lg instructions">
            <div style="background:#FFC4A5;width:40px;height:40px;border-radius:50%;text-align:center;display:inline-block">
            <span style="font-size: 19px;padding-top: 5px;display: block;">2</span>
            </div>
            <span style="font-weight: 500;">Faster Checkout</span>
        </div>
        <div class="col-lg instructions">
            <div style="background:#B9DCFF;width:40px;height:40px;border-radius:50%;text-align:center;display:inline-block">
            <span style="font-size: 19px;padding-top: 5px;display: block;">3</span>
            </div>
            <span style="font-weight: 500;">Easy Returns</span>
        </div>
    </div>
</div>
<hr class="dropdown-divider" style="margin-bottom: 4%;">
<div class="container">
<h3 style="font-size: 1.3rem;font-weight: 500;">Releated Products :</h3>
    <div class="row" style="text-align: center;">
<?php
if(isset($id_women)) {
    $sql = "SELECT * FROM products_women WHERE subcategory = '$category' ORDER BY RAND() LIMIT 4";
} elseif (isset($id_men)) {
    $sql = "SELECT * FROM products_men WHERE subcategory = '$category' ORDER BY RAND() LIMIT 4";
} elseif (isset($id_kids)) {
    $sql = "SELECT * FROM products_kids WHERE subcategory = '$category' ORDER BY RAND() LIMIT 4";
} elseif (isset($id_wedding)) {
    $sql = "SELECT * FROM products_wedding WHERE subcategory = '$category' ORDER BY RAND() LIMIT 4";
}
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
        <div class='col-lg-3' style='min-height: 570px;'>
            <a href='product.php?$gender=$id' target='_blank' style='display: inline-block;margin-top:2%;'>
                <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
                <div style='height:428px'>
                    <img src='products/$main_pic' class='card-img-top' alt='$name' onmouseover=this.src='products/$second_pic' onmouseout=this.src='products/$main_pic' style='width:100%;height:428px;object-fit: cover;'>
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
        <div class='col-lg-3' style='min-height: 570px;'>
            <a href='product.php?$gender=$id' target='_blank' style='display: inline-block;margin-top:2%;'>
                <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
                <div style='height:428px'>
                    <img src='products/$main_pic' class='card-img-top' alt='$name' style='width:100%;height:428px;object-fit: cover;'>
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
<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
<script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
<script>
(function ($) {
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
        $('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
        $('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
        $('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});
        $('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});

        var isTouchSupported = 'ontouchstart' in window;

        if (isTouchSupported) {
            $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
                var xzoom = $(this).data('xzoom');
                xzoom.eventunbind();
            });
            $('.xzoom, .xzoom2, .xzoom3').each(function() {
                var xzoom = $(this).data('xzoom');
                $(this).hammer().on("tap", function(event) {
                    event.pageX = event.gesture.center.pageX;
                    event.pageY = event.gesture.center.pageY;
                    var s = 1, ls;
    
                    xzoom.eventmove = function(element) {
                        element.hammer().on('drag', function(event) {
                            event.pageX = event.gesture.center.pageX;
                            event.pageY = event.gesture.center.pageY;
                            xzoom.movezoom(event);
                            event.gesture.preventDefault();
                        });
                    }
    
                    xzoom.eventleave = function(element) {
                        element.hammer().on('tap', function(event) {
                            xzoom.closezoom();
                        });
                    }
                    xzoom.openzoom(event);
                });
            });
        $('.xzoom4').each(function() {
            var xzoom = $(this).data('xzoom');
            $(this).hammer().on("tap", function(event) {
                event.pageX = event.gesture.center.pageX;
                event.pageY = event.gesture.center.pageY;
                var s = 1, ls;
                xzoom.eventmove = function(element) {
                    element.hammer().on('drag', function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        xzoom.movezoom(event);
                        event.gesture.preventDefault();
                    });
                }
                var counter = 0;
                xzoom.eventclick = function(element) {
                    element.hammer().on('tap', function() {
                        counter++;
                        if (counter == 1) setTimeout(openfancy,300);
                        event.gesture.preventDefault();
                    });
                }
                function openfancy() {
                    if (counter == 2) {
                        xzoom.closezoom();
                        $.fancybox.open(xzoom.gallery().cgallery);
                    } else {
                        xzoom.closezoom();
                    }
                    counter = 0;
                }
            xzoom.openzoom(event);
            });
        });
        $('.xzoom5').each(function() {
            var xzoom = $(this).data('xzoom');
            $(this).hammer().on("tap", function(event) {
                event.pageX = event.gesture.center.pageX;
                event.pageY = event.gesture.center.pageY;
                var s = 1, ls;

                xzoom.eventmove = function(element) {
                    element.hammer().on('drag', function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        xzoom.movezoom(event);
                        event.gesture.preventDefault();
                    });
                }
                var counter = 0;
                xzoom.eventclick = function(element) {
                    element.hammer().on('tap', function() {
                        counter++;
                        if (counter == 1) setTimeout(openmagnific,300);
                        event.gesture.preventDefault();
                    });
                }
                function openmagnific() {
                    if (counter == 2) {
                        xzoom.closezoom();
                        var gallery = xzoom.gallery().cgallery;
                        var i, images = new Array();
                        for (i in gallery) {
                            images[i] = {src: gallery[i]};
                        }
                        $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                    } else {
                        xzoom.closezoom();
                    }
                    counter = 0;
                }
                xzoom.openzoom(event);
            });
        });
        } else {
            $('#xzoom-fancy').bind('click', function(event) {
                var xzoom = $(this).data('xzoom');
                xzoom.closezoom();
                $.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
                event.preventDefault();
            });
            $('#xzoom-magnific').bind('click', function(event) {
                var xzoom = $(this).data('xzoom');
                xzoom.closezoom();
                var gallery = xzoom.gallery().cgallery;
                var i, images = new Array();
                for (i in gallery) {
                    images[i] = {src: gallery[i]};
                }
                $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                event.preventDefault();
            });
        }
    });
})(jQuery);
</script>
</html>