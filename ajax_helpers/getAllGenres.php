<?php

require('../db.php');
// $id = $_GET['id']; to get from id
$sql = "SELECT * from genre";
// $sql = "SELECT * from songs where song_id='$id'";
$res = mysqli_query($conn, $sql);
$i = 0;
$val = [];
while($row = mysqli_fetch_assoc($res)){
    $output = json_encode(array(
        "id" => $row['genre_id'],
        "name" => $row['genre_name'],
        // "song_artist_id" => $row['song_artist_id'],
        // "song_cover_image_url" => $row['song_cover_image_url'],
        // "song_url" => $row['song_url'],
        // "song_album_id" => $row['song_album_id']
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