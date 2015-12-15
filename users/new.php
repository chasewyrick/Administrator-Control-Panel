<?php
session_start();
if($_SESSION["user_name"]) {
	
require '../settings.php';

if(count($_POST)>0) {

$newname = $_POST['username'];
$unhashed = $_POST['newpass'];
$newpass = password_hash($unhashed, PASSWORD_BCRYPT);
$superuser = $_POST['superuser'];
	$link = mysqli_connect($host, $mysql_user, $mysql_pass);
	mysqli_select_db($link, $db);
        $sql = "INSERT INTO `members` (`id`, `username`, `password`, `showblog`, `showtasks`, `superuser`) VALUES (NULL, '$newname', '$newpass', '1', '1', '$superuser')";
	$result = mysqli_query($link, $sql); 
     
       $message = 'Congratulations, The new user can now login!';
 } else {
 echo "";
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
       <?php require '../nav.php'; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">New User <a class="btn btn-default pull-right" href="./">Back</a></h1>
                    <p> <?php echo $message; ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <form action="" method="post">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="username">Username</label>  
  <div class="col-md-12">
  <input id="title" name="username" type="text" placeholder="John_Smithy123" class="form-control input-md" required="">
   
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-12 control-label" for="newpass">Password</label>
  <div class="col-md-12">                     
    <input class="form-control" id="newpass" name="newpass" type="password"> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="superuser">Super User?</label>  
  <div class="col-md-12">
  <input id="superuser" name="superuser" type="number" value="0" class="form-control input-md">
  <span class="help-block">Should this new user have full permissions? Remember 1 for yes and 0 for no.</span>  
  </div>
</div>

 <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg btn-block">
                            </fieldset>
                        </form>
                  </div>
            </div>
            <!-- /.row -->
           <?php require '../footer.php'; ?>
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
    <script src="/dist/js/Administrator.js"></script>

</body>

</html>


<?
}
else {
header('Location: '.$loginplease.'');
die();
}
?>
