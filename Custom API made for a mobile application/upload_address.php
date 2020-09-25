<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$addressRegion = $input['addressRegion'];
$addressLatitude = $input['addressLatitude'];
$addressLongitude = $input['addressLongitude'];
$addressCity = $input['addressCity'];
$addressStreet = $input['addressStreet'];
$addressBuildingNumber = $input['addressBuildingNumber'];
$addressFloor = $input['addressFloor'];
$addressDescription = $input['addressDescription'];
$isHomeAddress = $input['isHomeAddress'];

$sql = "INSERT INTO address(addressRegion,addressLatitude,addressLongitude,addressCity,addressStreet,addressBuildingNumber,addressFloor,addressDescription,isHomeAddress) VALUES('$addressRegion','$addressLatitude','$addressLongitude','$addressCity','$addressStreet','$addressBuildingNumber','$addressFloor','$addressDescription','$isHomeAddress')";
if(mysqli_query($conn,$sql)){
    $response = "address info uploaded successfully";
    $response = json_encode($response);
    echo $response;
}
else{
    $response = "an error occured";
    $response = json_encode($response);
    echo $response;
}