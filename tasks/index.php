<?php
session_start();
if($_SESSION["user_name"]) {
	
require '../settings.php';

if(count($_POST)>0) {
$title = $_POST['title'];
$detail = $_POST['detail'];
$completion= ''.$_POST['completion'].' 9:00:00';

$progress = date('Y-m-j');
$newprogress = ''.$progress.' 9:00:00';
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
mysqli_query($conn, "INSERT INTO `tasks` (`id`, `taskname`, `details`, `completion`, `startdate`) VALUES ('', '$title', '$detail', '$completion', '$progress')");
$message = "success";
echo $sql;
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
                    <h1 class="page-header">Tasks Management</h1>
                    <?php 
                    if($message == 'success'){
                    echo '<div class="alert alert-info" role="alert"><i class="fa fa-thumbs-o-up""></i> Sucess. Task Created.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
           		}
                    ?>
				
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	                    		<h3 class="panel-title">Current Tasks:</h3>
						
                    </div>
             <div class="panel-body">
 <?php
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$sql = "SELECT * FROM  `tasks` ORDER BY `id` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    // output data of each row
 while($row = $result->fetch_assoc()) {
$date2 = strtotime($row['completion']);
$date1 = strtotime($row['startdate']);

$today = time();
$dateDiff = $date2 - $date1;
$dateDiffForToday = $today - $date1;

$percentage = ($dateDiffForToday / $dateDiff) * 100;
$percentageRounded = round($percentage);
if($percentageRounded > 100){
$percentageRounded = "100";
}
echo $percentageRounded . '%';

  echo '<div><p><strong>'.$row["taskname"].'</strong><span class="pull-right text-muted">Aim Date: '. $row["completion"].'</span></p><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="' . $percentageRounded . '" aria-valuemin="0" aria-valuemax="100" style="width: '. $percentageRounded .'%"><span class="sr-only">'. $percentageRounded .'% Complete (success)</span></div></div><span class="text-muted">'. $row["details"].'</span><a href="./delete.php?id='.$row["id"].'" class="pull-right text-muted">Delete</a></div><hr>';
    }
} else {
    echo "No Tasks";
}
$conn->close();
?></div></div><div class="panel panel-default">
                    <div class="panel-heading">
                    	                    		<h3 class="panel-title">Create New Task</h3>
						
                    </div>
                      <div class="row">
                <div class="col-lg-6">
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <fieldset>
                             <div class="form-group">
                            	<label for="title">Task Name</label>
    <input class="form-control" id="title" type="text" name="title" id="title" placeholder="Fix Client Menu">
    <p class="help-block">How far are you now? Don't include % sign. I do that for you.</p>
                          </div> 
                          <div class="form-group">
                            	<label for="detail">Extra Detail</label>
    <input class="form-control" id="detail" type="text" name="detail" id="detail" placeholder="Fix client menu and then check they are happy with changes.">
    <p class="help-block">How far are you now? Don't include % sign. I do that for you.</p>
                          </div> 
                          <div class="form-group">
                            	<label for="completion">Target Date</label>
    <input class="form-control" id="completion" type="text" name="completion" id="completion" placeholder="24/10/15">
    <p class="help-block">When should this task be finished. Use this format: YEAR (0000)- MONTH (1-12) - DAY (1-31)</p>
                          </div>
                            
                                
                                <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg btn-block">
                            </fieldset>
                        </form>
                                            </div>
                </div></div>

                <!-- /.col-lg-6 -->
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