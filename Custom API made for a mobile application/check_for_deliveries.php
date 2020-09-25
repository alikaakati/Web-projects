<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$driverID = $input['driverID'];
$sql = "SELECT * FROM delivery d,request r,driver dr WHERE  r.AcceptedBy = '$driverID' AND dr.driverID = r.AcceptedBy AND r.status = 'Ongoing' AND r.requestID = d.RequestID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $response = "ongoing delivery";
        $response = json_encode($response);
        echo $response;
    }
}

$sql = "SELECT * FROM delivery d,driver dr, delivery d WHERE  r.AcceptedBy = '$driverID' AND dr.driverID = r.AcceptedBy AND r.status = 'Pending' AND r.requestID = d.RequestID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $response = "pending delivery";
        $response = json_encode($response);
        echo $response;
    }
}
else{
    $response = "nothing";
    $response = json_encode($response);
    echo $response;
}



?>