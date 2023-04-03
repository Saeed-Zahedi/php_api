<?php

header('Content-Type:application/json');

require_once("conf.php");

$response=array();

if(isset($_POST['title'])&&isset($_POST['storyline'])&&isset($_POST['lang'])&&isset($_POST['stars'])&&
isset($_POST['run_time'])&&isset($_POST['box_office'])&&isset($_POST['genre'])&&isset($_POST['release_date'])){

    $title=$_POST['title'];
    $storyline=$_POST['storyline'];
    $lang=$_POST['lang'];
    $stars=$_POST['stars'];
    $run_time=$_POST['run_time'];
    $box_office=$_POST['box_office'];
    $genre=$_POST['genre'];
    $release_date=$_POST['release_date'];

    $state=$db->prepare("INSERT INTO movies (title,storyline,lang,genre,release_date,box_office,run_time,stars)
    VALUES (:title,:storyline,:lang,:genre,:release_date,:box_office,:run_time,:stars)
    ");
    $state->bindParam(':title',$title);
    $state->bindParam(':storyline',$storyline);
    $state->bindParam(':lang',$lang);
    $state->bindParam(':genre',$genre);
    $state->bindParam(':release_date',$release_date);
    $state->bindParam(':box_office',$box_office);
    $state->bindParam(':run_time',$run_time);
    $state->bindParam(':stars',$stars);
    if($state->execute()){
        $response['error']=false;
        $response['message']="movie inserted successfully";
    }else{
        $response['error']=true;
        $response['message']="inserting movie failed!!";
    }
}else{
    $response['error']=true;
    $response['message']="please provide data";
}

echo json_encode($response);    