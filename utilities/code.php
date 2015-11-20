/* This is the code needed for implimentation on your website. */

/* Messaging Page (For the frontend user) */

<?php
$name=addslashes($_POST['name']);
$email=addslashes($_POST['email']); 
$message=addslashes($_POST['message']);
$date=date(r);
      if(isset($_POST['submit'])) {
      require '/admin/settings.php';
	mysqli_connect($host, $mysql_user, $mysql_pass);
	mysqli_select_db($db);
mysqli_query("INSERT INTO `messages` (`name`, `message`, `email`, `date`) VALUES ('$name', '$message', '$email', '$date')"); 
	// the message which you can change to anything.
$msg = "Hello, You have a new message from your website. Please go to this address to view: http://hostname/admin/messages";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("$administrationemail","New Message From Website",$msg);
 } else {
 Print "Something went wrong please go back!";
 }
 ?>


/* Display your page edits on the website. */
/* Section One - Place this at the top of the page you wish edits to show. This is one for a homepage with is included in the panel. */


<?php

// change these things
require '/admin/settings.php';
mysqli_connect($host, $mysql_user, $mysql_pass);
mysqli_select_db($db);

$result = mysqli_query("SELECT * FROM `homepage`");

while($row = mysqli_fetch_assoc($result)){
?>

/* Section Two - This display the text on your website. However as of now you cannot edit the entire code. But that feature is comming soon */
/* This is what you would put for each section of text on your site. Simply change the name to the name of the section. However make sure it matches what is in your database */
<?php
echo "".$row['name of section']."";
?>


/* Blog Page: - Paste this where you want blog posts to go.*/

 <?php
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM  `blog` ORDER BY `id` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='panel panel-default'><div class='panel-heading'><h3 class='panel-title'>" . $row["title"]. "</h3></div><div class='panel-body'>" . $row["post"]. "</div><div class='panel-footer'>" . $row["date"]. "</div></div>";
    }
} else {
    echo "No Blog Posts :(";
}
$conn->close();
?>
