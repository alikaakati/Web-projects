<?php
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$requestedByID = $input['requestedByID'];
$requestedByUsername = 'asd';
$fromRegion = $input['fromRegion'];
$fromStreet = $input['fromStreet'];
$fromBuilding = $input['fromBuilding'];
$fromFloor = $input['fromFloor'];
$fromNextTo = $input['fromNextTo'];

$toRegion = $input['toRegion'];
$toStreet = $input['toStreet'];
$toBuilding = $input['toBuilding'];
$toFloor = $input['toFloor'];
$toNextTo = $input['toNextTo'];

$priceFrom = 3;
$priceTo = 4.7;
//$toBePickedUpAt = '12:00 PM - Monday - 14/10 - 2020';
$sql = "INSERT INTO requestedDelivery
(requestedByID,requestedByUsername,fromRegion,fromStreet,fromBuilding,fromFloor,fromNextTo,toRegion,toStreet,toBuilding,toFloor,toNextTo,priceFrom,priceTo)
VALUES ('$requestedByID','fuck','$fromRegion','$fromStreet','$fromBuilding','$fromFloor','$fromNextTo','$toRegion','$toStreet','$toBuilding','$toFloor','$toNextTo','$priceFrom','$priceTo');
";
if(mysqli_query($conn,$sql)){
    $response = "Your request is published ";
    $response = json_encode($response);
    echo $response;
}
else{
    $response =  "Error: " . $sql . "<br>" . $conn->error;
    $response = json_encode($response);
    echo $response;
}

?>