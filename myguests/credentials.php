<?
$servername = "localhost";
$username = "elizannwyatt";
$password = "Kaizoku28";
$dbname = "jaxcodeliz";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>