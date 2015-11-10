<?php
session_start();

if($_SESSION["user_name"]) {
?>
 <?php
 session_start();
 $message="";
 if(count($_POST)>0) {
	 
 require '/admin/settings.php';
 $conn = mysqli_connect("$host, $mysql_user, $mysql_pass");
 mysqli_select_db("$db");
$username = mysqli_real_escape_string($_POST['user_name']);
$password = mysqli_real_escape_string($_POST['password']);
$currentpassword = mysqli_real_escape_string($_POST['currentpassword']);
$hash = md5($salt . $currentpassword); 
$hash = md5($salt . $password); 
 $result = mysqli_query("SELECT * FROM members WHERE username='" . $username . "' and password = '". $currentpassword."'");
 $row  = mysqli_fetch_array($result);
 if(is_array($row)) {
 $sql = "UPDATE members SET `password` = '". $password ."' WHERE `members`.`id` = 1;";
 $result = mysqli_query($sql);
 mysqli_fetch_array($result);
 $message = "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-saved' aria-hidden='true'></span> Password Changed Successfully</div>";
 } else {
 $message = "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Invalid Password</div>";
 }
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

<script src="http:ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http:cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
paste this code under head tag or in a seperate js file.
	 Wait for window load
	$(window).load(function() {
		 Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>


<div class="se-pre-con"></div>
<body>

    <div id="wrapper">
     
<?php require ''.$root.'/admin/nav.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Change Password</h1><P>
                    <?php
                    echo $message;
                    ?></p>
                   
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Change Password</h3>
                    </div>
                    <div class="panel-body">
                        <form name="frmUser" method="" action="">
                            <fieldset>
                                                            <div class="form-group">
                                    <input class="form-control" placeholder="Old Password" name="currentpassword" type="password" value="">
                                </div>
                                      <div class="form-group">
                                    <input class="form-control" placeholder="New Password" name="password" type="password" value="">
                                </div>
                                <input value="submit" class="btn btn-success btn-lg btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.row -->
           <?php require ''.$root.'/admin/footer.php'; ?>
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
