<?php

// Get Query for genre by Id goes here

require('../db.php');
$id = $_GET['id'];
//$sql = "SELECT * from songs";
$sql = "SELECT * from genre where genre_id='$id'";
$res = mysqli_query($conn, $sql);
$i = 0;
$val = [];
while($row = mysqli_fetch_assoc($res)){
    $output = json_encode(array(
        "id" => $row['genre_id']
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