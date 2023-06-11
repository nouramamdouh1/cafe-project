<?php
session_start();

include "./../layouts.php";
// include "./../model/products/dbconnection.php";
include "./../model/products/product_operations.php";

$product=select_product_by_id($_GET['id']);
$query2 = 'SELECT * FROM categories'  ;          
    $sql2 = $db->prepare($query2);
    $result2  = $sql2->execute();
    
    $categories = $sql2->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
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
                            <a class="nav-link border-end" href="all_users.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-end" href="homwpage.php">Manual Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-end" href="#">Checks</a>
                        </li>


                    </ul>
                    <p class="mx-1 ">
                        <a class="btn btn-secondary mx-1 " href="logout.php">logout</a>
                    </p>
                </div>
            </div>
        </nav>

    </div>
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <h2>Edit Product</h2>
            </div>

        </div>
        <form action="./../controller/updateproduct.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class=" p-3  mx-auto my-3">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">

                        <div class="mb-3 row  ">
                            <label class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Enter new Product"  name="name" value="<?php echo $product['name'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="price" placeholder="enter price" value="<?php echo $product['price'] ?>" class="form-control ">

                                    </div>
                                    <div class="col-2">
                                        <span>EGP</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-select" name="category" aria-label="Default select example">
                                            <option selected disabled>Open this select menu</option>
                                            <?php
                                            if (!empty($categories)) {
                                                foreach ($categories as $cat) { ?>

                                                    <option value="<?php echo $cat['id']  ?>"><?php echo $cat['name']  ?></option>

                                            <?php 
                                                }
                                            } ?>



                                        </select>
                                    </div>
                                    
                                </div>
                                <!-- category name -->
                                <?php
                                if (isset($_SESSION['inserted_category'])) { ?>

                                    <div class="alert alert-success w-50 text-center ">
                                        <span>
                                            <?php echo $_SESSION['inserted_category']; ?>
                                        </span>
                                    </div>

                                <?php session_unset();
                                } ?>
                            </div>


                        </div>
                        <div class="mb-3 ">
                            <div class="row">

                                <label class="col-sm-3 col-form-label">Product Picture</label>
                                <div class="row w-50 m-auto">
                                <img src="<?php echo $product['image'] ?>" style="max-height:250px" alt="image">

                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <input type="file" name="image" class="form-control" id="inputGroupFile02">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="w-100 text-center mx-auto my-5 ">
                            <button class="btn btn-primary" type="submit">save</button>
                            <button class="btn btn-secondary" type="reset">reset</button>

                        </div>

                    </div>

                </div>
            </div>
        </form>

    </div>
</body>

</html>