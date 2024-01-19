<?php

$DB_HOST = 'localhost';
$DB_USER = 'tope_bd';
 $DB_PASS = 'BMbFCeA8JYHGjSkK';
$DB_NAME = 'tope_bd';

try{
 $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
 echo $e->getMessage();
}


// alterar também ->criar roteiro



?>
