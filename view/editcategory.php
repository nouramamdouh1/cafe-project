<?php
include"./../layouts.php";
include "./../model/categories/operations.php";

$cat=select_category_by_id($_GET['id']);

?>

<div class="container w-50 p-5">
<h2 class="text-center my-3">Edit category</h2>
<form action="./../controller/updatecategory.php?id=<?php echo $cat['id']  ?>" method="POST">
  <div class="mb-3">
    <label for="exampleInputname" class="form-label">category name</label>
    <input type="text" class="form-control" id="exampleInputname" name="name" value="<?php echo $cat['name'] ? $cat['name']:'' ; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>