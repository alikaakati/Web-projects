<?php 
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$startLoc = $input['startLoc'];
$endLoc = $input['endLoc'];
$api_key = "AIzaSyAs9OQE8DwUGED4WrLH8k7YKqXpbKhl71E";
$url = "https://maps.googleapis.com/maps/api/directions/json?origin=".$startLoc."&destination=".$endLoc."&key=".$api_key;
$reply = file_get_contents($url);
if($reply){
    $response = 'successeed';
    $response = json_encode($response);
    echo $response;
//    $response = json_decode($response,true);
//    echo $response['routes'][0]['overview_polyline']['points'];
}
else{
    echo "error";
}
?>