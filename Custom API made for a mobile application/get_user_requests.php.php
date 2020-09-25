<?php
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$requestedBy = $input['userID'];
$requests = array();


$sql = "SELECT * FROM request r,customer c WHERE r.requestedBy = '$requestedBy' AND r.requestedBy = c.customerID";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($requests, $row['fromAddress']);
            array_push($requests, $row['toAddress']);
        }
    }
    $response = json_encode($requests);
    echo $response;


?>