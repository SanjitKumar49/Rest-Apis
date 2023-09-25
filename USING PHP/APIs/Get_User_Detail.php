<?php
require_once('db.php');  
header('Content-Type: application/json');



$api_key=$_SERVER['HTTP_API_KEY'] ?? '';
$valid_api_key="acbmsdjkdbbjkdhsdh";
if($api_key!==$valid_api_key){
    header('HTTP/1.1 401 Unauthorized');         // for auth
    $response['message']='Invalid API key';
    echo json_encode($response);
    die();
}


if($action == "get_user_detail"){
    $user_id=$_GET['user-id'];
    $query="Select * from users where id=$user_id";
    $result=$mysqli->query($query);
    
    if($result->num_rows>0){
        $userRow=$result->fetch_assoc();
        
        $response['error']=false;
        $response['message']="user found";   // single single value
        $response['data']=$userRow;
    }else{
        header('HTTP/1.1 400 NOT FOUND');
        $response['error']=true;
        $response['message']="user not found";  
    }
    echo json_encode($response);
}
 exit();
?>