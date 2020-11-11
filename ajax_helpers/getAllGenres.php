<?php

require('../db.php');
$sql = "SELECT * from genres";
$res = mysqli_query($conn, $sql);
$i = 0;
$val = [];
while($row = mysqli_fetch_assoc($res)){
    $output = json_encode(array(
        "id" => $row['genre_id'],
        "name" => $row['genre_name'],
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