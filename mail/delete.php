 <?php
 session_start();
require'../settings.php';
$id = $_GET['id'];
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$sql = "DELETE FROM `mail` WHERE `id` = $id";
$result = $conn->query($sql);
header("Location: /mail");
die();
$conn->close();

?>