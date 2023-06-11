<?php

include"./../layouts.php";
include"./../model/categories/operations.php";
$rows=select();

?>

<div class="container-fluid header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active border-end" aria-current="page" href="homepage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-end" href="./all_products.php">Products</a>
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
  <br>
  <div class="container">
  <a href="./../view/createcategory.php" class="btn btn-success py-2 my-4">Add category</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php 
        foreach ($rows as $row) {
            echo"<tr>";
            foreach ($row as $field) {
                echo "<td>{$field}</td>";
            }
            echo "<td><a href='./../view/editcategory.php?id={$row["id"]}' class='btn btn-primary'>Edit</a></td>";
            echo "<td><a href='./../controller/deletecategory.php?id={$row["id"]}' class='btn btn-danger'>Delete</a></td>";
            echo"</tr>";
        }
        ?>
    
  </tbody>
</table>

</div>
