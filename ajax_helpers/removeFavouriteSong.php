<?php


    require('../db.php');
    $id = $_GET['song_id'];
    $user_id = $_GET['user_id'];
    //$sql = "SELECT * from songs";
    $sql = "DELETE FROM favourites where user_id='$user_id' and song_id='$id'";
    if(mysqli_query($conn, $sql)){
        echo json_encode(array('msg'=>'deleted'));
    }
    else{
       // do something else
       echo json_encode(array('msg'=>'not deleted'));
    }
    


?>