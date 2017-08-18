<?php
$servername = "localhost";
$username = "hng-test";
$password = "herominatii2015";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "CREATE DATABASE testingDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully <br>";
} else {
    echo "Error creating database: " . $conn->error;
}
$databasename = "testingDB";
$conn = new mysqli($servername, $username, $password, $databasename);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "CREATE TABLE MyTable (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully <br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    
$sql = "INSERT INTO MyTable (firstname, lastname, email)
VALUES ('Oreoluwa', 'Ojo', 'oreeboy@gmail.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully  <br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id . " <br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    $conn->close();
?>