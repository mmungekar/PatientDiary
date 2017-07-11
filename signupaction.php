<?php
$uname = $_POST["uname"];
$pwd = $_POST["pwd"];
$function = $_POST["function"];

$servername = "localhost";
$username = "root";
$password = "r0s@nne0cel0t";
$dbname = "mydb";
$usernameErr = "";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if($function == "login"){
    $sql = "SELECT * FROM user WHERE USERNAME = '$uname' AND PASSWORD =  '$pwd' ";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows!=1) {
     echo "ERROR: Incorrect login information";
    }
    else{
        echo "Success";
    }
      $conn->close();
}

else if($function == 'signup'){
$sql = "SELECT * FROM user WHERE USERNAME = '".$uname."'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
     echo "ERROR: Username is already taken";
      $conn->close();
}
else{
$sql = "INSERT INTO user(USERNAME, PASSWORD)
VALUES('".$uname."',
'".$pwd."')";

if ($conn->query($sql) === TRUE) {
     echo "Success";
} else {
     echo "Error: " . $sql . "<br>" . $conn->error;
     $conn->close();
    }
  $conn->close();
    }
}

?>