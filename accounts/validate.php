<?php

require('../db.php');
session_start();
$email = $_POST['email'];
$type = $_POST['type'];
$password = sha1($_POST['password']);

if($type=='register')
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_exists_query =  "SELECT * FROM users where user_email='$email'";
    $email_exists_res = mysqli_query($conn,$email_exists_query);
    if(mysqli_num_rows($email_exists_res) > 0)
    {
        $msg = "Email ID Already Exists";
        echo json_encode(['code'=>404, 'msg'=>$msg]);
        exit;
    }
    $user_id = uniqid();
    $inserting_user_sql = "INSERT INTO users (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_password`) VALUES ('$user_id', '$first_name', '$last_name', '$email', '$password')";
    if(!mysqli_query($conn, $inserting_user_sql))
    {
        $msg = "<li>Cannot Register, Please try again...</li>";
        echo json_encode(['code'=>400, 'msg'=>$msg]);
        exit;
    }
    $msg = "Successfully Registered";
    echo json_encode(['code'=>200, 'msg'=>$msg]);
    exit;
}
else if($type=='login'){
    $login_query =  "SELECT * FROM users where user_email='$email' and user_password='$password'";
    $login_res = mysqli_query($conn,$login_query);
    if(mysqli_num_rows($login_res) != 1)
    {
        $msg = "Incorrect Email ID or Password";
        echo json_encode(['code'=>404, 'msg'=>$msg]);
        exit;
    }
    $user = mysqli_fetch_array($login_res);
    $msg = "Successfully Logged In...";
    echo json_encode(['code'=>200, 'msg'=>$msg, 'user'=>$user]);
    exit;
}

?>

?>