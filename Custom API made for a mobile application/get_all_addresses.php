<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$user = $input['user'];
$userID = $user['userID'];
$addresses = [];

$sql = "SELECT * FROM address WHERE userID = '$userID'";
$check = mysqli_fetch_array(mysqli_query($conn,$sql));
if(isset($check)){
    array_push($addresses,array(
        'addressRegion' => $row['addressRegion'],
        'addressLatitude' => $row['addressLatitude'],
        'addressLongitude' => $row['addressLongitude'],
        'addressCity' => $row['addressCity'],
        'addressStreet' => $row['addressStreet'],
        'addressBuildingNumber' => $row['addressBuildingNumber'],
        'addressFloor' => $row['addressFloor'],
        'addressDescription' => $row['addressDescription'],
        'isHomeAddress' => $row['isHomeAddress']

    ));
$response = $addresses;
$response = json_encode($response);
echo $response ;
}
else{
    $response = 'null';
    $response = json_encode($response);
    echo $response;
}
?>