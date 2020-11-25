<?php

// you will get song_ID as well as user ID

// simply return YES or NO


require('../db.php');
$id = $_POST['song_id'];
$user_id = $_POST['user_id'];
//$sql = "SELECT * from songs";
$sql = "SELECT * from favourites where user_id='$user_id' and song_id='$id'";
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res)){
    echo json_encode(array("code"=>"200","msg"=>"YES"));
}else{
    echo json_encode(array("code"=>"400","msg"=>"NO"));
}


die();

?>