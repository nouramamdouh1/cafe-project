<?php
include "./../layouts.php";
include "./../model/products/product_operations.php";

$db= connect_to_database($dbuser,$dbpassword,$dbhost,$dbname);


$products=select();


?>


<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12">
<?php foreach ($products as $product): ?>
<div class="card">

  <img class="card-img-top" style="width: 100px;height=100px" src="<?php echo $product['image']  ?>" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $product['name']; ?></h5>
    <p class="card-text"><?php echo $product['price']; ?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
    <?php
             endforeach;
          ?>
  </div>
  
</div>
</div>
</div>
</div>

