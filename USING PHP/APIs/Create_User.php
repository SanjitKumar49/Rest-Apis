<?php

require_once('db.php');  
header('Content-Type: application/json');

if($action == "create_user"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="Insert into users(name,email,password) values('$name','$email','$password')";
    $result=$mysqli->query($query);
    if($result){ /*
        $response= array(
            "erro"=>false,
            "message"=>"user add successfully!"
        );*/

        $response['erro']=false;
        $response['message']="user add successfully";
    } 
        echo json_encode($response);
        die();
    }
    ?>
