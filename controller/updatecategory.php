<?php

include"./../model/categories/operations.php";

$id=$_GET['id'];

$name = $_POST['name'];

$res=update($id,$name);
if ($res) {
    $table_url='./../view/categoriestable.php';
    header("location:$table_url");
    
}



?>