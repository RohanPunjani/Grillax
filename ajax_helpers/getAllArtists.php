<?php

require('../db.php');
// $id = $_GET['id']; to get from id
$sql = "SELECT * from artists";
// $sql = "SELECT * from songs where song_id='$id'";
$res = mysqli_query($conn, $sql);
$i = 0;
$val = [];
while($row = mysqli_fetch_assoc($res)){
    $output = json_encode(array(
        "id" => $row['artist_id'],
        "name" => $row['artist_first_name'] ." ". $row['artist_last_name'],
        "cover_photo_url" => $row['artist_photo_url']
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