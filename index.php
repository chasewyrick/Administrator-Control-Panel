<?php
session_start();
$message="";
require 'settings.php';

	
if(count($_POST)>0) {

	$link = mysqli_connect($host, $mysql_user, $mysql_pass);
	mysqli_select_db($link, $db);
$username = mysqli_real_escape_string($link, trim($_POST['user_name']));
$password = mysqli_real_escape_string($link, trim($_POST['password']));

$result = mysqli_query($link, "SELECT * FROM members WHERE username='" . $username . "'");
$row = mysqli_fetch_array($result);
if(is_array($row)) {
$hash = $row['password'];
$passwordcheck = password_verify($password, $hash);
} 
if($hash == $passwordcheck){
$_SESSION["user_id"] = $row['id'];
$_SESSION["user_name"] = $row['username'];
} else {
$message = "Invalid Username or Password!";
}
if(isset($_SESSION["user_id"])) {
header("Location:dashboard.php");
exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administration Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dist/css/admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    		<h3 class="panel-title">Sign In for Access To Secure Area</h3>
						<h4><?php echo $message; ?></h4>
                    </div>
                    <div class="panel-body">
                        <form name="frmUser" method="post" action="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="user_name" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg btn-block">
                            </fieldset>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="/assets/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/admin.js"></script>

</body>

</html>
