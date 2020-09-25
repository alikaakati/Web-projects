<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);
$requestedBy = $input['requestedBy'];
$requests = [];
$addresses = [];
$response = [];
$sql = "SELECT * FROM request r,customer c WHERE r.requestedBy = '$requestedBy' AND r.requestedBy = c.customerID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($requests,array(
            "fromAddressID"=>$row['fromAddressID']
            "toAddressID" => $row['toAddressID'],
            "Price" => $row['Price'],
            "ItemID" => $row['ItemID'],
            ));
        }
    }
    foreach ($requests as $key => $value) {
        foreach ($value as $y => $x) {
            if($y === "fromAddressID" || $y === "toAddressID"){
                $sql = "SELECT * FROM address WHERE addressID = '$requests[$key][$y]'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $requests[$key][$y] = [];
                        array_push($requests[$key][$y],array(
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
                        array_push($response,$requests[$key][$y]);
                    }
                    $response = json_encode($response);
                    echo $response;
                }
            }
        }
    }

?>