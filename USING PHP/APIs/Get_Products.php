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

if($action=='get_products'){
        $query="Select * from  product";
        $result=$mysqli->query($query);
        if($result->num_rows>0){
        $response['error']=false;
        $response['message']=$result->num_rows . "products found";
        while($row =$result->fetch_assoc()){
            $products[]=$row;
        }  
        $response['data']=$products;
    }else{
        header('HTTP/1.1 400 NOT FOUND');
        $response['error']=true;
        $response['message']="no product found"; 
    }
    echo json_encode($response);
}
exit();
?>