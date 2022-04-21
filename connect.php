<?php

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "hypnos");

$dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

 try{

    $db = new PDO($dsn, DBUSER, DBPASS);

 }catch(PDOException $e){
    die($e->getMessage());
 }

?>