<?php

require 'connect.php';

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "8CTyc0U0RVRDHdJ";

$api_key= $node = $lat = $lng = $date = $time = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $node = test_input($_POST["node"]);
        $lat = test_input($_POST["lat"]);
        $lng = test_input($_POST["lng"]);
        $date = test_input($_POST["date"]);
        $time = test_input($_POST["time"]);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "UPDATE GPSData SET lat=$lat, lng=$lng, date=$date, time=$time WHERE node=$node";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}