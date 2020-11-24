<?php

// Get Query for all Songs goes here
require('../db.php');
// $id = $_GET['id']; to get from id
$sql = "SELECT * from songs";
// $sql = "SELECT * from songs where song_id='$id'";
$res = mysqli_query($conn, $sql);
$i = 0;
$val = [];
while($row = mysqli_fetch_assoc($res)){
    $output = json_encode(array(
        "id" => $row['song_id'],
        "name" => $row['song_title'],
        "song_artist_id" => $row['song_artist_id'],
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