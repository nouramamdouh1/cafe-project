<?php

include "./../layouts.php";
include "dbconnection.php";


$db= connect_to_database($dbuser,$dbpassword,$dbhost,$dbname);

try{
$create_category_query="create table `cafe`.`categories`(`id` int auto_increment primary key , `name` varchar(255))";

$db->query($create_category_query);

}catch(Exception $e){
echo  $e->getmessage();
}



?>