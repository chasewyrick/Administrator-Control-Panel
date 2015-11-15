<?php
session_start();

if($_SESSION["user_name"]) {
$id = isset($_GET['id']) ? $_GET['id'] : '';

require '../settings.php';

?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administration - Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dist/css/admin.css" rel="stylesheet">

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
       <?php require '../nav.php'; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Messages</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php


// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM  `messages` WHERE `id` = '$id'";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
?>

<form action="send.php" method="post">
<p><b>Recipients Name:</b> <input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>"/><br />
<b>E-mail:</b> <input class="form-control" type="text" name="email" value="<?php echo $row['email']; ?>"/><br />

<p><b>Your Message:</b><br />
<textarea  class="form-control" name="message" rows="10" cols="40"></textarea></p>

<p><input name="submit" type="submit" class="btn btn-theme" value="Send it!"></p>

<p> </p>

</form>
<?php
    }


$conn->close();
?>

                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
           <?php require '//admin/footer.php'; ?>
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

    <!-- Morris Charts JavaScript -->
    <script src="/assets/raphael/raphael-min.js"></script>
    <script src="/assets/morrisjs/morris.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/admin.js"></script>

</body>

</html>


<?
}
else {
header('Location: '.$loginplease.'');
die();
}
?>