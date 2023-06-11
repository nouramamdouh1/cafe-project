<?php

include "./../../layouts.php";
include "./../../model/products/dbconnection.php";



$db= connect_to_database($dbuser,$dbpassword,$dbhost,$dbname);

// select
function select(){
    global $db;
    try {
        $select_query="select * from `cafe`.`products`;";
        $select_stmt= $db->prepare($select_query);
        $res=$select_stmt->execute();
        $row_count=$select_stmt->rowCount();
        $rows=$select_stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;



    } catch (Exception $e) {
       $e->getmessage();
    }
    
    
}


// insert


function insert($name,$image,$price,$quantity,$category_id){
    global $db;
    try {
        $inst_query="insert into `cafe`.`products` (`name`,`image`,`price`,`quantity`,`category_id`)
         values (:prodname,:prodimage,:prodprice,:prodquantity,:prodcategory_id);";
        $inst_stmt= $db->prepare($inst_query);
        $inst_stmt->bindParam(":prodname",$name);
        $inst_stmt->bindParam(":prodimage",$image);
        $inst_stmt->bindParam(":prodprice",$price);
        $inst_stmt->bindParam(":prodquantity",$quantity);
        $inst_stmt->bindParam(":prodcategory_id",$category_id);

        $res=$inst_stmt->execute();

        if ($res) {
           $no_of_affected_rows = $inst_stmt->rowCount();
           $id = $db->lastInsertId();
           return $id;
        }
        return false;
        
    } catch (Exception $e) {
       echo $e->getmessage();
       return false;
    }
    
    
}






?>