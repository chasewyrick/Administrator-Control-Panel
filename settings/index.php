<?php
session_start();

if($_SESSION["user_name"]) {
?>
 <?php
 session_start();
 $message="";
 
 include'../settings.php';
 if(count($_POST)>0) {
 	$showblog = $_POST['showblog'];
 	$showtasks = $_POST['showtasks'];
 	$sql = "UPDATE  `members` SET  `showblog` =  $showblog, `showtasks` = '$showtasks' WHERE  `id` ='1'"; 
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

    <title>Admin - Dashboard</title>

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
    <!-- WARNING: Respond.js doesnt work if you view the page via file: -->
    <!--[if lt IE 9]>
        <script src="https:oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https:oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
paste this code under head tag or in a seperate js file.
	 Wait for window load
	$(window).load(function() {
		 Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>

<body>

    <div id="wrapper">
     
<?php include'../nav.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Settings</h1><P>
                    <?php
                    echo $message;
                    ?></p>
                   
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$result = mysqli_query($conn, "SELECT * FROM members");
if ($result->num_rows > 0) {

    // output data of each row
 while($row = $result->fetch_assoc()) {
	$showblog = $row['showblog'];
	$showtasks= $row['showtasks'];
 }
}
$conn->close();
?>

            <!-- /.row -->
           <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dashboard Peferences</h3>
                    </div>
                    <div class="panel-body">
                        <form name="frmUser" method="post" action="">
                            <fieldset>
<div class="form-group">
  <label for="showblog">Show Create Blog Post on Dashboard.</label>
    <input id="showblog" name="showblog" class="form-control" type="number" value="<?php echo $showblog; ?>" min="0" max="1">
    <p class="help-block">Enter 1 to show or 0 to hide.</p>
</div>
<div class="form-group">
  <label for="showtasks">Show Create New Task on Dashboard.</label>
    <input id="showtasks" name="showtasks" class="form-control" type="number" value="<?php echo $showtasks; ?>" min="0" max="1">
    <p class="help-block">Enter 1 to show or 0 to hide.</p>
</div>
                                <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.row -->
           <?php include'../footer.php'; ?>
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