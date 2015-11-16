<?php
session_start();
if($_SESSION["user_name"]) {
	
require '../settings.php';

if(count($_POST)>0) {
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_query($conn, "INSERT");
} else {
    echo "";
}
$conn->close();
?>
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
	<style>
	.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>
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
                    <h1 class="page-header">Uploads Management</h1>
                    <?php echo $message; ?>
				
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	                    		<h3 class="panel-title">Upload New File</h3>
						
                    </div>
                      <div class="row">
                <div class="col-lg-6">
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <fieldset>
                             <div class="form-group">
                            	<label for="taskname">Task Name</label>
    <input class="form-control" id="taskname" type="text" name="taskname" id="taskname" placeholder="Fix Client Menu">
    <p class="help-block">How far are you now? Don't include % sign. I do that for you.</p>
                          </div> 
                          <div class="form-group">
                            	<label for="details">Extra Detail</label>
    <input class="form-control" id="details" type="text" name="details" id="details" placeholder="Fix client menu and then check they are happy with changes.">
    <p class="help-block">How far are you now? Don't include % sign. I do that for you.</p>
                          </div> 
                          <div class="form-group">
                            	<label for="compleation">Target Date</label>
    <input class="form-control" id="compleation" type="text" name="compleation" id="compleation" placeholder="24/10/15">
    <p class="help-block">When should this task be finished.</p>
                          </div>
                            <div class="form-group">
                            	<label for="progress">Progress</label>
    <input class="form-control" id="progress" type="number" name="progress" id="progress" value="0">
    <p class="help-block">How far are you now? Don't include % sign. I do that for you.</p>
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
