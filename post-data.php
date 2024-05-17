<?php
$servername = "localhost";
$username = "root";
$dbname = "traveltrace";
$password = "";

 
$api_key_value = "12345";
$api_key= $Seat_count =  "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $Seat_count = test_input($_POST["Seat_count"]);
        $Latitude = test_input($_POST["Latitude"]);
        $Longitude = test_input($_POST["Longitude"]);
        $latLog = "17.719505+83.295181";

        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "UPDATE bus_data SET Seat_count = '$Seat_count' , current_location = '$latLog' WHERE Bus_name = 'Bus 1'";      
        
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key";
    }
 
}
else {
    echo "No data posted HTTP POST.";
}
 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}