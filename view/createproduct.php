<?php
include"./../layouts.php";
include "./../model/products/dbconnection.php";
?>

<!-- <div class="container w-50 p-5">
<h2 class="text-center my-3">Add product</h2>
<form action="./../controller/saveproduct.php"  method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputname" class="form-label">product name</label>
    <input type="text" class="form-control" id="exampleInputname" name="name">
  </div>
   <div class="mb-3">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" type="file" id="formFile" name="image">
</div> -->
<!-- 
    <label for="exampleInputprice" class="form-label">product price</label>
    <input type="number" class="form-control" id="exampleInputprice" name="price">
  </div>
  <div class="mb-3">
    <label for="exampleInputquantity" class="form-label">product quantity</label>
    <input type="number" class="form-control" id="exampleInputquantity" name="quantity">
  </div>
  <div class="mb-3">
    <label for="exampleInputcategoryid" class="form-label">category_id</label>
    <input type="number" class="form-control" id="exampleInputcategoryid" name="category_id">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div> -->
<!-- comment==================================================== -->



<?php

$db= connect_to_database($dbuser,$dbpassword,$dbhost,$dbname);
if (isset($_GET)) {

    $query = 'SELECT * FROM categories';
    $sql = $db->prepare($query);
    $result  = $sql->execute();

    $categories = $sql->fetchAll();
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
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <h2>Add Product</h2>
            </div>
            <?php if (isset($_SESSION['errors']['product'])) {
                foreach ($_SESSION['errors']['product'] as $err_product) {
                    # code...
                }
            ?>
                <div class="alert alert-danger w-50 m-auto text center">
                    <span>
                        <?php echo $err_product;
                        unset($_SESSION['errors']['product']);
                        ?>

                    </span>
                </div>


            <?php }  ?>

        </div>
        <form action="./../controller/saveproduct.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class=" p-3  mx-auto my-3">
                        <div class="mb-3 row  ">
                            <label class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Enter new Product" name="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="price" placeholder="1" class="form-control ">

                                    </div>
                                    <div class="col-2">
                                        <span>EGP</span>
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">quantity</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="quantity" placeholder="1" class="form-control ">

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

                                            <?php    # code...
                                                }
                                            } ?>



                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <a href="add_category.php">Add Category</a>
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

                                <?php unset($_SESSION['inserted_category']);
                                } ?>
                            </div>


                        </div>
                        <div class="mb-3 ">
                            <div class="row">

                                <label class="col-sm-3 col-form-label">Product Picture</label>

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