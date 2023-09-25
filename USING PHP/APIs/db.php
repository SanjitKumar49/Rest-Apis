<?php

$dbhost="localhost";
$dbUser="root";
$dbpass="";
$dbName="apilearning";
$mysqli = new mysqli($dbhost,$dbUser,$dbpass,$dbName);

// for connect our database //
if($mysqli->connect_errno){
    $response=array(
        "error"=>true,
        "message"=>"ivalid database connection etail"
    );
    echo json_decode($response);
    die();
}
   
// For checking Whether our GET & POST Mothed is working or not //

$action=$_GET['action'];   // for get GET opertion
 /*$name=$_POST['name']; 
echo $name;
 echo $action;
exit();  */

?>
