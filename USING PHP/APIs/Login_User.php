<?php
require_once('db.php');  
header('Content-Type: application/json');

if($action == "login_user"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query="Select * from users where email='$email' and password='$password'";
    $result =$mysqli->query($query);

    if($result->num_rows>0){
        $userRow=$result->fetch_assoc();
        
        $response['error']=false;
        $response['message']="user logged in successfully";   // single single value
        $response['data']=$userRow;
    }else{
        header('HTTP/1.1 400 NOT FOUND');
        $response['error']=true;
        $response['message']="Incorrect email and password";  
    }
    echo json_encode($response);
}
 exit();
?>