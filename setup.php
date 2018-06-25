<?php 

if(count($_POST)>0) {

	// Set the variables.
	$mysqlhost = $_POST["mysqlhost"];
	$mysqluser = $_POST["mysqluser"];
	$mysqlpass = $_POST["mysqlpass"];
	$mysqldb = $_POST["mysqldb"];
	$administration_email = $_POST["email"];
	$host = '$host';
	$mysql_user = '$mysql_user';
	$mysql_pass = '$mysql_pass ';
	$db = '$db';

		// Check variables
		if(isset($mysqlhost)){
			$check = 1;
		} else {
			$check = 0;
			echo 'Please enter a MySQL Host';
		}

		if(isset($mysqluser)){
			$check = 1;
		} else {
			$check = 0;
			echo 'Please enter a MySQL Username';
		}

		if(isset($mysqlpass)){
			$check = 1;
		} else {
			$check = 0;
			echo 'Please enter a MySQL Password';
		}

		if(isset($mysqldb)){
			$check = 1;
		} else {
			$check = 0;
			echo 'Please enter a MySQL Database';
		}
		
		if(isset($administration_email)){
			$check = 1;
		} else {
			$check = 0;
			echo 'Please enter a email';
		}

		// Now check if there were errors
		if($check == 0){
			die();
		} else {
    	$f = fopen('settings.php', 'w') or die("can't open file");
    	fwrite($f, "<?php \$administrationemail = '$administration_email'; \$host = '$mysqlhost'; \$mysql_user = '$mysqluser'; \$mysql_pass = '$mysqlpass'; \$db = '$mysqldb'; ?>");
    	fclose($f);

    // Now create the tables
		// Initiate the MySQLi connection
		$conn = new mysqli($mysqlhost, $mysqluser, $mysqlpass, $mysqldb);
		$username = $_POST["username"];
		$password = $_POST["password"];
		$newpassword = password_hash($password, PASSWORD_DEFAULT);
		// Check connection exists
		if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		}

// Set the querys
$query1 = "CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `post` longtext NOT NULL,
  `date` text NOT NULL,
  `author` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
$query2 = "CREATE TABLE IF NOT EXISTS `mail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` text,
  `subject` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
$query3 = "CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `showblog` int(11) NOT NULL,
  `showtasks` int(11) NOT NULL,
  `superuser` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
$query4 = "CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taskname` text NOT NULL,
  `details` text NOT NULL,
  `completion` text NOT NULL,
  `startdate` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

	// Run the querys
	$result1 = mysqli_query($conn, $query1);
	$result2 = mysqli_query($conn, $query2);
	$result3 = mysqli_query($conn, $query3);
	$result4 = mysqli_query($conn, $query4);
	$link = mysqli_connect($mysqlhost, $mysqluser, $mysqlpass);
	mysqli_select_db($link, $mysqldb);
        $sql = "INSERT INTO `members` (`id`, `username`, `password`, `showblog`, `showtasks`, `superuser`) VALUES (NULL, '$username', '$newpassword', '1', '1', '1')";
	$result = mysqli_query($link, $sql);
	$status = '1';
}
} else {
$status = '0';
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
<?php
if($status == '0'){
?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    
                    		<h3 class="panel-title">Set-Up</h3><p></p><h5>Please fill out this form with all the details. Once submitted your dashboard will be ready.</h5>
						
                    </div>
                    <div class="panel-body">
                        
    <form method="post" action="" name="config_form">
    <div class="form-group">
    <input class="form-control" type="text" id="mysqlhost" name="mysqlhost" placeholder="MySQL Hostname">
    </div><div class="form-group">
    <input class="form-control" type="text" id="mysqluser" name="mysqluser" placeholder="MySQL Username">
    </div><div class="form-group">
    <input class="form-control" type="password" id="mysqlpass" name="mysqlpass" placeholder="MySQL Password">
    </div><div class="form-group">
    <input class="form-control" type="text" id="mysqldb" name="mysqldb" placeholder="MySQL Database">
    </div><div class="form-group">
    <input class="form-control" type="email" id="email" name="email" placeholder="Administration Email">
    </div><div class="form-group">
    <input class="form-control" type="text" id="username" name="username" placeholder="Dashboard Username">
    </div><div class="form-group">
    <input class="form-control" type="text" id="password" name="password" placeholder="Dashboard Password">
    </div><div class="form-group">
    <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg btn-block">
    </div>
    </form>
                       
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <?php 
    } else {
    ?>
    <center>
    <iframe src="./assets/status.php" width="1000" height="660" style="border:none; overflow-y: hidden" scrolling="no" seamless="seamless"></iframe>
    </center>
    <?php
    }
    ?>

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
