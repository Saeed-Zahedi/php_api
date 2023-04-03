<?php

header('Content-Type:application/json');

require_once("conf.php");

$response=array();

if(isset($_POST['id'])){

    $id=$_POST['id'];
    $state=$db->prepare("DELETE FROM movies WHERE id=:id LIMIT 1");
    $state->bindParam(':id',$id);
    if($state->execute()){
        $response['error']=false;
        $response['message']="movie deleted!!";
    }else{
        $response['error']=true;
        $response['message']="couldn't delete movie";
    }

}else{

    $response['error']=true;
    $response['message']="please provide id for deleting";

}

echo json_encode($response);