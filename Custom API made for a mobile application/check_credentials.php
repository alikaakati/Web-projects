<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$username = $input['username'];
$password = $input['password'];
$email = $input['email'];
$fullname = $input['fullname'];
$phone = $input['phone'];

$sql = "SELECT * FROM users WHERE email='$email' OR username = '$username'";
$check = mysqli_fetch_array(mysqli_query($conn,$sql));
if(isset($check)){
 
$response = 'Username / Email already in use';
$response = json_encode($response);
echo $response ;
}
else{
    $response = 'Continue to fill address info';
    $response = json_encode($response);
    echo $response;
}