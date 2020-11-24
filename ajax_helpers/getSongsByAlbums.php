<?php

    // You will get the id of ablum here


    // return a list of songs for that particular album

    require('../db.php');
    $id = $_GET['id'];
    //$sql = "SELECT * from songs";
    $sql = "SELECT * from albums where album_id='$id'";
    $res = mysqli_query($conn, $sql);
    $i = 0;
    $val = [];
    while($row = mysqli_fetch_assoc($res)){
        $output = json_encode(array(
            "id" => $row['album_id'],
            "name" => $row["album_name"]
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