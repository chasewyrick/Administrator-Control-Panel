<?php
session_start();
$user = isset($_GET['u']) ? $_GET['u'] : 'None';
if($_SESSION["user_name"]) {
$account = $_SESSION["user_name"]; 
?>
 <?php
 session_start();
 $message="";
 
 include'settings.php';
 if(count($_POST)>0) {
 	$superornot = $_POST['superuser'];
 	$newusername = $_POST['username'];
 	$sql = "UPDATE  `members` SET  `superuser` =  $superornot, `username` = '$newusername' WHERE  `username` = '$user'"; 
	$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
	if ($conn->connect_error) {
    	die("Connection failed: ". $conn->connect_error);
	} 
	mysqli_query($conn, $sql);
	$conn->close();	 
	
 }
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator - Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dist/css/Administrator.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/assets/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>


<div class="se-pre-con"></div>
<body>

    <div id="wrapper">

<?php require 'nav.php'; ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage <?php echo $user; ?> Account</h1>
                </div>
                <div class='row'>
                       <?php
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$sql = "SELECT * FROM  `members` WHERE username = '$user'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    // output data of each row
 while($row = $result->fetch_assoc()) {
 $username = $row['username'];
 
 $supers = $row['superuser'];
 }
 }

$sql2 = "SELECT * FROM  `members` WHERE username = '$account'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {

    // output data of each row
 while($row2 = $result2->fetch_assoc()) {
 $super = $row2['superuser'];
 
 }
 }
 if($super == 1){
 ?>
<div class='col-md-4'>
<h2>General Settings</h2>
<hr>
<form action="" method="post"> 
<div>
<label for="username">Username</label>
<input value="<?php echo ''.$username; ?>" class="form-control" type="text" size="30" name = "username">
<?php
if($user == $account){
$warning2 = " <b>If you change your username you will need to login again!</b>";
} else {
$warning2 = "";
}
?>
<p class="help-block">Changing a account username may have unintended consequences.<?php echo $warning2; ?></p>
<hr>
<input class="btn btn-primary" name="submit" type="submit" value="Update"/>
</div>
</div>
<div>
     <div class='col-md-4'>
<h2>Permission Settings</h2>
<hr>
<form action="" method="post"> 
<div>
<label for="superuser">Super User?</label>
<input value="<?php echo ''.$supers; ?>" class="form-control" type="number" size="1" name="superuser" id="superuser">
<?php
if($user == $account){
$warning = " <b>If you change this you may lose your superuser access!</b>";
} else {
$warning = "";
}
?>
<p class="help-block">Enter 1 to make this user a super user. Enter 0 to revoke super user access.<?php echo $warning; ?></p>
<hr>
<input class="btn btn-primary" name="submit" type="submit" value="Update"/>
</div>
</div>
</div>
<?php
} else {
echo "<center><h2>Your account does not have the required permissions to edit a user.</h2>";
}
?>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
         
            <?php include 'footer.php'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/assets/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/metisMenu/dist/metisMenu.min.js"></script>

   
    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/Administrator.js"></script>

</body>

</html>


<?php

}
else {
header('Location: '.$loginplease.'');
die();
}
?>
