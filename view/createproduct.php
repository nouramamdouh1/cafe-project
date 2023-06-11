<?php
include"./../layouts.php";
?>

<div class="container w-50 p-5">
<h2 class="text-center my-3">Add product</h2>
<form action="upload.php"  method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputname" class="form-label">product name</label>
    <input type="text" class="form-control" id="exampleInputname" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputimage" class="form-label">product image</label>
    <input type="file" name="image" id="exampleInputimage">
  </div>
  <div class="mb-3">
    <label for="exampleInputprice" class="form-label">product price</label>
    <input type="number" class="form-control" id="exampleInputprice" name="price">
  </div>
  <div class="mb-3">
    <label for="exampleInputquantity" class="form-label">product quantity</label>
    <input type="number" class="form-control" id="exampleInputquantity" name="quantity">
  </div>
  <div class="mb-3">
    <label for="exampleInputcategoryid" class="form-label">category_id</label>
    <input type="number" class="form-control" id="exampleInputcategoryid" name="categoryid">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



