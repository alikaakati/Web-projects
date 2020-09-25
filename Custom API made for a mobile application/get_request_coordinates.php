<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$userID = $input['userID'];
$requestID = $input['requestID'];
$response = array();
$sql = "SELECT * FROM request r,customer c,pickupAddress p,destinationAddress d WHERE r.requestedBy = '$userID' AND r.fromAddress = p.pAddressID AND r.toAddress = d.dAddressID AND r.requestedBy = c.customerID";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($response,array(
        'requestID' => $row['requestID'],
        'pAddressLatitude' => $row['pAddressLatitude'],
        'pAddressLongitude' => $row['pAddressLongitude'],
        'dAddressLatitude' => $row['dAddressLatitude'],
        'dAddressLongitude' => $row['dAddressLongitude'],
        );
    }
    $response = json_encode($response);
    echo $response;
}