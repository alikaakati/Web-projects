<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$userID = $input['userID'];
$requests = array();
$sql = "SELECT * FROM request WHERE requestedBy = '$userID'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($requests,$row['fromAddress'],$row['toAddress']);        
    }
}
else{
    $response = 'nox';
    $response = json_encode($response);
    echo $response;
}

$sql = "SELECT * FROM address WHERE requestedBy = '$userID'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

    }
}


?>