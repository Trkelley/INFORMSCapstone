
<?php
// Set Connection Variables
$servername = "127.0.0.1";
$username = "bama_team";
$password = "N@tionalChampions!2017";
$dbname = "analytic_backup_edu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}

// Set Connection Variables
$servername = "ec2-54-159-222-176.compute-1.amazonaws.com";
$username = "bama_team";
$password = "N@tionalChampions!2017";
$dbname = "analytic_backup_edu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}
?>