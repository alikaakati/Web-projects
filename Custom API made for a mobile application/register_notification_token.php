<?php
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$pushToken = $input['pushToken'];
$username = $input['username'];
$sql = "UPDATE users SET pushToken='$pushToken' WHERE username = '$username'";
if(mysqli_query($conn,$sql)){
    $response = "Updated successfully";
    $response = json_encode($response);
    echo $response;
}
else{
    $response = 'error';
    $response = json_encode($response);
    echo $response;
}

?>