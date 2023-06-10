<?php

include "./../../layouts.php";
include "./../dbconnection.php";



$db= connect_to_database($dbuser,$dbpassword,$dbhost,$dbname);

// select
function select(){
    global $db;
    try {
        $select_query="select * from `cafe`.`categories`;";
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


function insert($name){
    global $db;
    try {
        $inst_query="insert into `cafe`.`categories` (`name`) values (:catname);";
        $inst_stmt= $db->prepare($inst_query);
        $inst_stmt->bindParam(":catname",$name);
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

function update($id,$name){
    global $db;
    try {
        $update_query="update `cafe`.`categories` set `name`=:catname where `id`=:catid;";
        $update_stmt= $db->prepare($update_query);
        $update_stmt->bindParam(":catname",$name);
        $update_stmt->bindParam(":catid",$id);
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








// delete






?>