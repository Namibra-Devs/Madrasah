<?php
include("config.php");
include("firebaseRDB.php");
$response = array();
if (isset($_COOKIE['userId']) && isset($_COOKIE['name'])){
    setcookie("userId", "", time() - 3600, "/");
    setcookie("name", "", time() - 3600, "/");
    $response['message'] = "Signout successful";
    $response['status'] = 200;
}else{
    $response['message'] = "Error";
    $response['status'] = 500;
}

http_response_code($response['status']);
header('Content-Type: application/json');
echo json_encode($response);
?>

