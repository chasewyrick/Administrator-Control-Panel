 <?php
 session_start();
if($_SESSION["user_name"]) {
require'../settings.php';
$id = isset($_GET['id']);
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$sql = "DELETE FROM `tasks` WHERE `tasks`.`id` = $id";
$result = $conn->query($sql);
echo 'Task has been deleted. <a href="/tasks">Back</a>';
die();
$conn->close();
} else {
}
?>
