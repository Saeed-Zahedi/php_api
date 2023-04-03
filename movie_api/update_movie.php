<?php

header('Content-Type:application/json');

require_once("conf.php");

$response=array();


if(isset($_POST['id'])&& isset($_POST['storyline']) && isset($_POST['stars'])&& isset($_POST['box_office'])){

        $id=$_POST['id'];
        $storyline=$_POST['storyline'];
        $stars=$_POST['stars'];
        $box_office=$_POST['box_office'];

        $state=$db->prepare("UPDATE movies SET stars='$stars', box_office='$box_office' , storyline='$storyline'
        WHERE id='$id'
        ");
        if($state->execute()){
            $response['error']=false;
            $response['message']="movie updated successfully";
        }else{
            $response['error']=true;
            $response['message']="updating movie failed";
        }

}else{
    $response['error']=true;
    $response['message']="please provide id stars storyline and stars";
}

echo json_encode($response);