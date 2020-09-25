<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$description = $input['description'];
$vehicleWeightNeeded = $input['vehicleWeightNeeded'];

$sql = "INSERT INTO Item(description,vehicleWeightNeeded) VALUES('$description','$vehicleWeightNeeded')";
if(mysqli_query($conn,$sql)){
    $response = $conn->insert_id;
    $response = json_encode($response);
    echo $response;
}

?>
