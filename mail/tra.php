 <?php
 session_start();
require'../settings.php';
$id = $_GET['id'];
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$sql = "UPDATE  `mail` SET  `status` =  '2' WHERE  `mail`.`ID` =$id;";
$result = $conn->query($sql);
header("Location: /mail");
die();
$conn->close();

?>