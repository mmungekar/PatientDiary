<?php
$planEntry = json_decode($_POST["Plan_Entry"]);

$servername = "localhost";
$username = "root";
$password = "r0s@nne0cel0t";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

for ($x = 0; $x < sizeof($planEntry); $x++){
$sql = "INSERT INTO plan(USERNAME, EXERCISE, TIME, DAY_OF_WEEK)
VALUES('Mina',
'".$planEntry[$x]->Exercise."',
'".$planEntry[$x]->Time."',
'".$planEntry[$x]->Day_of_Week."')";
if ($conn->query($sql) === TRUE) {
    echo "Success";
} 
else {
    echo $planEntry + "Error: " . $sql . "<br>" . $conn->error;
    // $conn->close();
    }
}

$conn->close();
?>