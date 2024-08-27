<?php
$servername = "localhost";
$username = "root";
$password = "user";
$dbname = "reclame_sao_joao";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
<?php
	$pdo = new PDO('mysql:host=localhost;dbname=reclame_sao_joao', 'root', 'user');
?>

