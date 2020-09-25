<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$username = $input['username'];
$password = $input['password'];
$email = $input['email'];
$fullname = $input['fullname'];
$phone = $input['phone'];
$addressRegion = $input['addressRegion'];
$addressLatitude = $input['addressLatitude'];
$addressLongitude = $input['addressLongitude'];
$addressCity = $input['addressCity'];
$addressStreet = $input['addressStreet'];
$addressBuildingNumber = $input['addressBuildingNumber'];
$addressFloor = $input['addressFloor'];
$addressDescription = $input['addressDescription'];
$isHomeAddress = $input['isHomeAddress'];
$sql = "SELECT * FROM address WHERE  addressDescription = '$addressDescription' AND addressStreet = '$addressStreet' AND addressFloor = '$addressFloor'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $addressID = $row['addressID'];
    }
}
else{
    $addressID = null;
}

$sql = "INSERT INTO customer(username,email,password,fullName,phone,addressID) VALUES('$username','$email','$password','$fullname','$phone','$addressID')";
if ($conn->query($sql) === TRUE) {
  $response =  "New record created successfully";
  $response = json_encode($response);
  echo $response;
} else {
  $response =  "Error: " . $sql . "<br>" . $conn->error;
  $response = json_encode($response);
  echo $response;
}
?>