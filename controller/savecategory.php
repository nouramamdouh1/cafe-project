<?php
include"./../layouts.php";
include"./../model/categories/operations.php";


var_dump($_POST);

$name = $_POST['name'];

$added=insert($name);

$table_url='./../view/categoriestable.php';
header("location:$table_url");






?>