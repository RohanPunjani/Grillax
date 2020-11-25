<?php

    // You will get the id of genre here


    // return a list of songs for that particular genre
        
    require('../db.php');
    $id = $_GET['id'];
    //$sql = "SELECT * from songs";
    $sql = "SELECT * from rel_song_genre inner join songs on songs.song_id=rel_song_genre.song_id inner join artists on artists.artist_id=songs.song_artist_id where genre_id=$id";
    // echo $sql;
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