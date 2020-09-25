<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$requestID = $input['requestID'];
$driverID = $input['driverID'];
$sql = "SELECT * FROM request WHERE requestID = '$requestID'";
$result=$conn->query($sql);
if($result->num_rows > 0){
    while ($row=$result->fetch_assoc()) {
        $requestedBy=$row['requestedBy'];
        $fromAddress=$row['fromAddress'];
        $toAddress=$row['toAddress'];
    }
}

$sql = "INSERT INTO delivery(requestedBy,fromAddress,toAddres,acceptedBy,pricing)
        VALUES('$requestedBy','$fromAddress','$toAddres','$driverID',100)";
if(mysqli_query($conn,$sql)){

}
$sql = "DELETE FROM request WHERE requestID = '$requestID'";

if ($conn->query($sql) === TRUE) {
    $response = 'working';
    $response = json_encode($response);
    echo $response;
} else {
  $response = "Error deleting record: " . $conn->error;
  $response = json_encode($response);
  echo $response;

}
