<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$conn = mysqli_connect('localhost','iot_admin','G@i!Km2j3CJ-B^8g','iot_database');

$sql = "SELECT * FROM GPSData";
$mysqli = mysqli_query($conn, $sql);
$json_data = array();

while($row = mysqli_fetch_assoc($mysqli))
{
    $json_data[] = $row;
}

echo json_encode(['markers'=>$json_data]);


?>