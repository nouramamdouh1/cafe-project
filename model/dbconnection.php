<?php

include "./../layouts.php";

$dbuser="root";
$dbpassword="";
$dbname="cafe";
$dbhost="localhost";



try {
    $dsn="mysql:dbname={$dbname};host={$dbhost}";
    // var_dump($dsn);
    $db=new pdo( $dsn,$dbuser,$dbpassword);
} catch (Exception $e) {
   echo $e->getmessage();
}

if ($db) {
    echo"connected successfully";
}else{
    echo"error in connection";
}





?>