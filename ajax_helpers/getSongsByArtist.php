<?php

    // You will get the id of artist here


    // return a list of songs for that particular artist
    require('../db.php');
    $id = $_GET['id'];
    //$sql = "SELECT * from songs";
    $sql = "SELECT * from songs Inner Join artists on songs.song_artist_id=artists.artist_id where artist_id='$id'";
    $res = mysqli_query($conn, $sql);
    $i = 0;
    $val = [];
    while($row = mysqli_fetch_assoc($res)){
        $output = json_encode(array(
            "id" => $row['song_id'],
            "name" => $row['song_title'],
            "song_artist_id" => $row['song_artist_id'],
            "song_artist_name" => $row['artist_first_name']." ".$row['artist_last_name'],
            "song_id" => $row['song_id'],
            "song_cover_image_url" => $row['song_cover_image_url'],
            "song-title" => $row['song_title'],
            "song_url" => $row['song_url'],
            "song_album_id" => $row['song_album_id'],
            "song_post_at" => $row['song_posted_at'],
            "song_post_by" => $row['song_posted_by'],
            "song_played_count" => $row['song_played_count']
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