<?php
// $mysqli = new mysqli("localhost","id17291204_devlaboratory","729f@4ig9Fmf3l2Jf4j#7h4gj83L923","id17291204_dev_lab");

// // Check connection
// if ($mysqli -> connect_errno) {
//   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
//   exit();
// }


// $sql = "SELECT * FROM clients";
// $result = $mysqli->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }
// $mysqli->close();


$servername = "localhost";
$username = "id17291204_devlaboratory";
$password = "729f@4ig9Fmf3l2Jf4j#7h4gj83L923";
$database = "id17291204_dev_lab";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
