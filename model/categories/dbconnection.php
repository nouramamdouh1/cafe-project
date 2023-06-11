<?php

// include "./../layouts.php";

$dbuser="root";
$dbpassword="";
$dbname="cafe";
$dbhost="localhost";

function connect_to_database($dbuser,$dbpassword,$dbhost,$dbname){

try {
    $dsn="mysql:dbname={$dbname};host={$dbhost}";
    // var_dump($dsn);
    $db=new pdo( $dsn,$dbuser,$dbpassword);

    if ($db) {
        // echo"connected successfully";
        return $db;
    }else{
        echo"error in connection";
    }
} catch (Exception $e) {
   echo $e->getmessage();
}





}

?>