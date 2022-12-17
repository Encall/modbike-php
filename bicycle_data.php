<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$conn = mysqli_connect('localhost','iot_admin','G@i!Km2j3CJ-B^8g','iot_database');

$sql = "SELECT * FROM bicycle_data JOIN GPSData USING (node);";
$mysqli = mysqli_query($conn, $sql);
$json_data = array();

while($row = mysqli_fetch_assoc($mysqli))
{
    $json_data[] = $row;
}

echo json_encode(['bicycle_data'=>$json_data]);


?>