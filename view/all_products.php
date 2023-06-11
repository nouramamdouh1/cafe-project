<?php
include"./../layouts.php";
include "./../model/products/dbconnection.php";
session_start();
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    
</head>

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
                            <a class="nav-link border-end" href="./../view/categoriestable.php">Categories</a>
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
                
                    <p class="mx-1 ">
                        <a class="btn btn-secondary mx-1 " href="#">logout</a>
                    </p>
                </div>
            </div>
        </nav>

    </div>
    <div class="container">
        <div class="row my-3">
            <div class="col-8 ">
                <h2>All Products</h2>
            </div>
            <div class="col-4 ">
                <a href="./../view/createproduct.php" class="btn btn-primary">Add Products</a>
            </div>
            <?php if (isset($_SESSION['inserted_product'])) { ?>
                <span class="alert alert-success">
                    <?php echo $_SESSION['inserted_product'];
                    unset($_SESSION['inserted_product'])
                    ?>

                </span>

            <?php }  ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th> product</th>
                        <th>price</th>

                        <th>image</th>
                        <th>action</th>
                      
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

                                <td>
                                    <a class="btn btn-secondary" href="./../view/editproduct.php?id=<?php echo $product['id'] ?>">Update</a>
                                    <a class="btn btn-danger" href="./../controller/deleteproduct.php?id=<?php echo $product['id'] ?>">delete</a>
                                    
                                </td>

                            </tr>



                    <?php }
                    }  ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>


</html>