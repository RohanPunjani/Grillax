<?php

    // You will get the id of genre here


    // return a list of songs for that particular genre
        
    require('../db.php');
    $id = $_GET['id'];
    //$sql = "SELECT * from songs";
    $sql = "SELECT * from rel_song_genre";
    $res = mysqli_query($conn, $sql);
    $i = 0;
    $val = [];
    while($row = mysqli_fetch_assoc($res)){
        $output = json_encode(array(
            "id" => $row['song_id'],
            "genre_id" => $row['genre_id']
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