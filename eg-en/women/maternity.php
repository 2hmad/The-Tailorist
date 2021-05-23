<!DOCTYPE html>
<html>
<head>
<title>Maternity | Modern, Modest Fashion</title>
<?php include('links.php') ?>
<style>
.accordion-button:focus {
    box-shadow: none;
}
@media screen and (max-width: 800px){
}
.card-body {
    padding: 0rem 0rem;
}
.accordion-button:focus {
    z-index: 3;
    border-color: #dfdfdf;
    outline: 0;
}
.accordion-button:not(.collapsed) {
    color: black;
    background-color: white;
}
.accordion-button:not(.collapsed)::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    transform: rotate(180deg);
}
ins {
    text-decoration: none;
}
</style>
</head>
<body>
<?php include('navbar.php') ?>

<!-- Styles Switcher -->
<div id="styles-switcher" class="right">
<div class="filter-options" style="margin-top: 7%;">
    <div class="accordion" id="accordionExample">
    <div class="accordion-item" style="margin-bottom: 10%;border-bottom: 1px solid #dfdfdf;">
        <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Sort By
        </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
        <div class="accordion-body" style="line-height:3em">
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&sort=best-seller";}else{echo "$_SERVER[REQUEST_URI]?sort=best-seller";} ?>">Best Seller</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&sort=high-low";}else{echo "$_SERVER[REQUEST_URI]?sort=high-low";} ?>">Price High to Low</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&sort=low-high";}else{echo "$_SERVER[REQUEST_URI]?sort=low-high";} ?>">Price Low to High</a>
        </div>
        </div>
    </div>
    <div class="accordion-item" style="margin-bottom: 10%;">
        <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            Size
        </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
        <div class="accordion-body" style="line-height: 3em;height: 300px;overflow: overlay;">
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=4";}else{echo "?size=4";} ?>" style="display: block;">4</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=6";}else{echo "?size=6";} ?>" style="display: block;">6</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=8";}else{echo "?size=8";} ?>" style="display: block;">8</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=10";}else{echo "?size=10";} ?>" style="display: block;">10</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=12";}else{echo "?size=12";} ?>" style="display: block;">12</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=14";}else{echo "?size=14";} ?>" style="display: block;">14</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=16";}else{echo "?size=16";} ?>" style="display: block;">16</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=18";}else{echo "?size=18";} ?>" style="display: block;">18</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=20";}else{echo "?size=20";} ?>" style="display: block;">20</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=22";}else{echo "?size=22";} ?>" style="display: block;">22</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=XS";}else{echo "?size=XS";} ?>" style="display: block;">XS</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=S";}else{echo "?size=S";} ?>" style="display: block;">S</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=M";}else{echo "?size=M";} ?>" style="display: block;">M</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=L";}else{echo "?size=L";} ?>" style="display: block;">L</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=XL";}else{echo "?size=XL";} ?>" style="display: block;">XL</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=XXL";}else{echo "?size=XXL";} ?>" style="display: block;">XXL</a>
            <a class="dropdown-item" href="<?php if(isset($_GET['page'])) { echo "$_SERVER[REQUEST_URI]&size=XXXL";}else{echo "?size=XXXL";} ?>" style="display: block;">XXXL</a>
        </div>
        </div>
    </div>
    </div>
    </div>
<button class="btn switcher-toggle"><i class="far fa-filter"></i></button>
</div>
<!-- Styles Switcher End --> 

<div class="container">
<div class="row">
    </div>
<div class="row">
<?php
if(isset($_GET['page'])) {
    $page_number = $_GET['page'];
} else {
    $page_number = 1;
}
$num_per_page = 36;
$from = ($page_number-1)*$num_per_page;
if(isset($_GET['sort']) && $_GET['sort'] !== "" && $_GET['sort'] == 'best-seller') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' ORDER BY buyers DESC LIMIT $from, $num_per_page";
} elseif(isset($_GET['sort']) && $_GET['sort'] !== "" && $_GET['sort'] == 'high-low') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' ORDER BY price DESC LIMIT $from, $num_per_page";

} elseif(isset($_GET['sort']) && $_GET['sort'] !== "" && $_GET['sort'] == 'low-high') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' ORDER BY price ASC LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '4') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%4%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '6') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%6%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '8') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%8%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '10') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%10%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '12') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%12%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '14') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%14%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '16') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%16%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '18') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%18%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '20') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%20%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == '22') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%22%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'XS') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%<option>XS</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'S') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%<option>S</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'M') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%<option>M</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'L') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%<option>L</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'XL') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%<option>XL</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'XXL') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%<option>XXL</option>%' LIMIT $from, $num_per_page";

} elseif(isset($_GET['size']) && $_GET['size'] !== "" && $_GET['size'] == 'XXXL') {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' AND sizes LIKE '%<option>XXXL</option>%' LIMIT $from, $num_per_page";

} else {
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity' ORDER BY id DESC LIMIT $from, $num_per_page";
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
            <a href='../product.php?product-women=$id' style='display: inline-block;margin-top:2%;'>
                <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
                <div style='height:428px'>
                    <img src='../products/$main_pic' class='card-img-top' alt='$name' onmouseover=this.src='../products/$second_pic' onmouseout=this.src='../products/$main_pic' style='width:100%;height:428px;object-fit: cover;'>
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
            <a href='../product.php?product-women=$id' style='display: inline-block;margin-top:2%;'>
                <div class='card' style='width: 300px;max-width: 300px;height: 470px;border: none;'>
                <div style='height:428px'>
                    <img src='../products/$main_pic' class='card-img-top' alt='$name' style='width:100%;height:428px;object-fit: cover;'>
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
<?php
    $sql = "SELECT * FROM products_women WHERE subcategory = 'Maternity'";
    $query = mysqli_query($connect, $sql);
    $totalItems = mysqli_num_rows($query);

    $total_pages = ceil($totalItems/$num_per_page);
    for($i=1;$i<=$total_pages;$i++){
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

<?php include('../footer.php') ?>
</body>
<?php include('scripts.php') ?></html>