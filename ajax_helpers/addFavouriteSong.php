<?php

// you will get song_ID as well as user ID

// simply add both to the favourites table & return success if succeeded :)

    require('../db.php');
    $id = $_GET['song_id'];
    $user = $_GET['user_id'];
    //$sql = "SELECT * from songs";
    $sql = "INSERT INTO favourites (`song_id`,`user_id`) values('$id','$user')";
    if(mysqli_query($conn, $sql)){
        echo json_encode(array('code'=> "200",'msg'=>'inserted'));
    }
    else{
       // do something else
       echo json_encode(array("code" => "400", 'msg'=>'not inserted'));
    }
    


?>