<?php 
include 'index.php';
$json = file_get_contents('php://input');
$input = json_decode($json,true);

$requestedBy = $input['userID'];
$fromAddressID = $input['fromAddressID'];
$toAddressID = $input['toAddressID'];
$Price = $input['Price'];
$ItemID = $input['ItemID'];
$AcceptedBy = null;

$sql = "INSERT INTO request(requestedBy,fromAddressID,toAddressID,Price,ItemID,AcceptedBy) VALUES('$requestedBy','$fromAddressID','$toAddressID','$Price','$ItemID','$AcceptedBy')";
        if(mysqli_query($conn,$sql)){
                $response = "Your request has been published";
                $response = json_encode($response);
                echo $response;
        }
        else {
          $response = "Error: " . $sql . "<br>" . $conn->error;
          $response = json_encode($response);
          echo $response;
        }
?>