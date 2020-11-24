<?php

    $conn = mysqli_connect("localhost:3307", "root", "", "grillax");
    if(!$conn){
        echo json_encode(['code'=>502, 'msg'=>'Cannot connect to the database']);
        exit;
    }

?>