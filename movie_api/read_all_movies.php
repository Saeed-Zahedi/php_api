<?php

header('Content-Type:application/json');

require_once("conf.php");

$response=array();

$state=$db->prepare("SELECT * FROM movies");
 
if($state->execute()){
    $movies=array();
    
    while($row=$state->fetchAll(PDO::FETCH_ASSOC)){
        $movies[]=$row;
    }
    $response['error']=false;
    $response['movies']=$movies;
    $response['message']="movies returned successfully";
    
}else{
    $response['error']=true;
    $response['message']="the query diden't executed";
}

echo json_encode($response);