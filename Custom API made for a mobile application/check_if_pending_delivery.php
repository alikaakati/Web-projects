<?php
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$driverID = $input['driverID'];
$sql = "SELECT * FROM ongoingDeliver WHERE acceptedBy = '$driverID'";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    }
        $response = 'true';
        $response = json_encode($response);
        echo $response;
}
else{
        $response = 'false';
        $response = json_encode($response);
        echo $response;
}
?>