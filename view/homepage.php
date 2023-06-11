<?php
include "./../layouts.php";
include "./../model/products/product_operations.php";

$db= connect_to_database($dbuser,$dbpassword,$dbhost,$dbname);


if (isset($_GET)) {

    $query = 'SELECT * FROM products';
    $sql = $db->prepare($query);
    $result  = $sql->execute();

    $products = $sql->fetchAll();
}
if (isset($_SESSION['products'])) {
    $products = $_SESSION['products'];
    unset($_SESSION['products']);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
    }
    
</style>

<body>
    <div class="container-fluid header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active border-end" aria-current="page" href="homepage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-end" href="all_products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-end" href="#">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-end" href="#">Manual Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-end" href="#">Checks</a>
                        </li>


                    </ul>
                    
                </div>
            </div>
        </nav>

    </div>



<table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th> product</th>
                        <th>price</th>

                        <th>image</th>
                        
                      
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($products)  && !empty($products)) {
                        foreach ($products as $product) { ?>

                            <tr>
                                <td>
                                    <?php echo $product['id'] ?>
                                </td>

                                <td>
                                    <?php echo $product['name'] ?>

                                </td>
                                <td>
                                    <?php echo $product['price'] ?> EGP

                                </td>

                                <td>
                                    <img class="" style="width: 100px;height=100px" src="<?php echo $product['image']  ?>" alt="">


                                </td>

                               

                            </tr>



                    <?php }
                    }  ?>
                </tbody>
            </table>
