<?php
$db_user="root";
$db_password="";
$db_name="movie_api";

$db=new PDO("mysql:host=localhost;dbname=$db_name;",$db_user,$db_password);

if(!$db){
    echo "connection failed!";  
}   