<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$username = $input['username'];
$password = $input['password'];
$user = array();
    $sql = "SELECT * FROM users WHERE username='$username' AND password = '$password'";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        while ($row=$result->fetch_assoc()) {
            $user['username']=$row['username'];
            $user['email'] = $row['email'];
            $user['userID'] = $row['userID'];
            $user['password'] = $row['password'];
            $response = $user;
            $response = json_encode($response);
            echo $response;
        }
    }
    else{
        $response = 'An error occured';
        $response = json_encode($response);
        echo $response;   
    }

