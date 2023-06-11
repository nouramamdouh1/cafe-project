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






?>