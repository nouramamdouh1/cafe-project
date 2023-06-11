<?php 
include"./../model/products/dbconnection.php";

$db= connect_to_database($dbuser,$dbpassword,$dbhost,$dbname);
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = 'SELECT * FROM products WHERE id = ?'  ;          
    $sql = $db->prepare($query);
    $result  = $sql->execute([$id]);
    
    $product = $sql->fetch();

    $count =  $db->prepare("DELETE from products where id = ?")->execute([$id]);
    if($count){
        
        $_SESSION['deleted']['product'] = "deleted successfully";
        $products_table='./../view/all_products.php';
        header("location: $products_table");
    }
}   
?>