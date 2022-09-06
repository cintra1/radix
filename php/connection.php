<?php

try{
    $pdo = new PDO("mysql:dbname=Radix; host=localhost","root","");
}catch(PDOException $e){
    echo "Error".$e->getMessage();
}