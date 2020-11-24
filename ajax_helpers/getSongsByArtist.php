<?php

    // You will get the id of artist here


    // return a list of songs for that particular artist
    require('../db.php');
    $id = $_GET['id'];
    //$sql = "SELECT * from songs";
    $sql = "SELECT * from artists where artist_id='$id'";
    $res = mysqli_query($conn, $sql);
    $i = 0;
    $val = [];
    while($row = mysqli_fetch_assoc($res)){
        $output = json_encode(array(
            "id" => $row['artist_id'],
            "first_name" => $row["artist_first_name"],
            "last_name" => $row["artist_last_name"],
            "artist_photo_url" =>$row["artist_photo_url"]
        ));
        if($i==0){
            $val = array($output);
        }
        else{
            array_push($val, $output);
        }
        $i++;
    }
    die(json_encode($val));

?>