<?php

// Get Query for genre by Id goes here

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
        "name" => $row['artist_first_name']." ".$row['artist_last_name']
    ));
    if($i==0){
        $val = array($output);
    }
    else{
        array_push($val, $output);
    }
    $i++;
}
die(json_encode($output));


?>