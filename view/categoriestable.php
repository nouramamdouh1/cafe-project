<?php

include"./../layouts.php";
include"./../model/categories/operations.php";
$rows=select();

?>
<div class="container">
  <br>
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
