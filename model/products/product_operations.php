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



// update

function update($id,$name,$image,$price,$quantity,$category_id){
    global $db;
    try {
        $update_query="update `cafe`.`products` set `name`=:prodname ,
        `image`=:prodimage,
        `price` =:prodprice,
        `quantity` =:prodquantity,
        `category_id` =:prodcategory_id
         where `id`=:prodid;";
        $update_stmt= $db->prepare($update_query);
        $update_stmt->bindParam(":prodname",$name);
        $update_stmt->bindParam(":prodimage",$image);
        $update_stmt->bindParam(":prodprice",$price);
        $update_stmt->bindParam(":prodquantity",$quantity);
        $update_stmt->bindParam(":prodcategory_id",$category_id);
        $update_stmt->bindParam(":prodid",$id);
        $res=$update_stmt->execute();

        if ($res) {
           $no_of_affected_rows = $update_stmt->rowCount();
           return $no_of_affected_rows;
           
        }
        return false;
        
    } catch (Exception $e) {
       echo $e->getmessage();
       return false;
    }
    
    
}






?>