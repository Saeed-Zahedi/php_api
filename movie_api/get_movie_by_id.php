<?php

header('Content-Type:application/json');
require_once("conf.php");

$response=array();

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $state=$db->prepare("SELECT * FROM movies 
    WHERE id=:id");
    $state->bindParam(':id',$id);
    if($state->execute()){
    $result=$state->fetchAll(PDO::FETCH_ASSOC);
    $movie=array(
        'id'=>$result[0]['id'],
        'title'=>$result[0]['title'],
        'storyline'=>$result[0]['storyline'],
        'lang'=>$result[0]['lang'],   
        'genre'=>$result[0]['genre'],
        'release_date'=>$result[0]['release_date'], 
        'box_office'=>$result[0]['box_office'], 
        'run_time'=>$result[0]['run_time'],
        'stars'=>$result[0]['stars']
    );
    $response['error']=false;
    $response['movie']=$movie;
    $response['message']="movie returned successfully";
    }else{
        $response['error']=true;
        $response['message']="returning movies failed!!";
    }
}else{
    $response['error']=true;
    $response['message']="please provide a id for movie";
}

echo json_encode($response);