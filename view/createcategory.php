<?php
include"./../layouts.php";
?>

<div class="container w-50 p-5">
<h2 class="text-center my-3">Add category</h2>
<form action="./../controller/savecategory.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputname" class="form-label">category name</label>
    <input type="text" class="form-control" id="exampleInputname" name="name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>