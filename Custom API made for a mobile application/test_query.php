<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$userID = $input['userID'];
$sql = "SELECT * FROM request r,customer c,pickupAddress a,destinationAddress WHERE r.requestedBy = '$userID' ";
$result = $conn->query($sql);
if($result->num_rows > 0) {
/*    while($row = $result->fetch_assoc()) {

    }
  */
    $response = 'yes';
    $response json_encode($response);
    echo $response;
}
else{
    $response = 'no';
    $response json_encode($response);
    echo $response;    
}
?>