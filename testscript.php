<?php
echo "Hello";
$values = json_decode($_GET["x"]);
echo $values->strengthData[0]->Exercise;

$servername = "localhost";
$username = "root";
$password = "r0s@nne0cel0t";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// For strength
for ($x = 0; $x <= sizeof($values->strengthData); $x++){
$sql = "INSERT INTO strength(EXERCISE, SET_1,SET_2,SET_3,SET_4,SET_5)
VALUES('".$values->strengthData[$x]->Exercise."',
'".$values->strengthData[$x]->Set_1."',
'".$values->strengthData[$x]->Set_2."',
'".$values->strengthData[$x]->Set_3."',
'".$values->strengthData[$x]->Set_4."',
'".$values->strengthData[$x]->Set_5."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // $conn->close();
    }
}

//For cardio
for ($x = 0; $x <= sizeof($values->cardioData); $x++){
$sql = "INSERT INTO cardio(EXERCISE,TIME,INTENSITY,DISTANCE,RATE,CALORIES)
VALUES('".$values->cardioData[$x]->Exercise."',
'".$values->cardioData[$x]->Time."',
'".$values->cardioData[$x]->Intensity."',
'".$values->cardioData[$x]->Distance."',
'".$values->cardioData[$x]->Rate."',
'".$values->cardioData[$x]->Calories."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // $conn->close();
    }
}

//For flexibility
for ($x = 0; $x <= sizeof($values->flexibilityData); $x++){
$sql = "INSERT INTO flexibility(ENTRY)
VALUES('".$values->flexibilityData[$x]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // $conn->close();
    }
}
$conn->close();

?>