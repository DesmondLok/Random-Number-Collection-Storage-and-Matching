<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "number_collecter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname );

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "
    <script>
        console.log('Database Connected successfully');
    </script>
";



