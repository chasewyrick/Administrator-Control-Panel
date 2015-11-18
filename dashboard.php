<?php
session_start();

if($_SESSION["user_name"]) {
?>
<?php include 'settings.php';?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator - Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="./assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dist/css/Administrator.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="./assets/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

<?php require '/home/laughin1/public_html/admin/nav.php'; ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1><p>Welcome <?php echo $_SESSION["user_name"]; ?>, Use the side menu to quickly access different sections of the dashboard. </p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
         
                    
                                                  <?php
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$result = mysqli_query($conn, "SELECT * FROM tasks");
$num_tasks = mysqli_num_rows($result);

$conn->close();
?>
<?php
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$result = mysqli_query($conn, "SELECT * FROM messages");
$num_msg = mysqli_num_rows($result);

$conn->close();
?>
<?php
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$result = mysqli_query($conn, "SELECT * FROM blog");
$num_blog = mysqli_num_rows($result);

$conn->close();
?>
<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_tasks; ?></div>
                                    <div>
                                    <?php 
                                     if($num_tasks = 1){
                                     echo "Task"; 
                                     } else { 
                                     echo "Tasks"; 
                                     }
                                     ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/tasks">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_msg; ?></div>
                                    <div>
                                     <?php 
                                     if($num_msg = 1){
                                     echo "Message"; 
                                     } else { 
                                     echo "Messages"; 
                                     }
                                     ?>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <a href="/messages">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-rss fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_blog; ?></div>
                                    <div>
                                    <?php 
                                     if($num_blog = 1){
                                     echo "Blog Post"; 
                                     } else { 
                                     echo "Blog Posts"; 
                                     }
                                     ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/blog">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo date('jS'); ?></div>
                                    <div><?php echo date('F Y'); ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-right"><?php echo date('h:i:sa'); ?></span>
                                
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
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
<?php
if($showblog == 1){
?>
<div class="col-lg-6">
<div class="panel panel-default">
                        <div class="panel-heading">
                        Create New Blog Post
                        </div>
                        
<div class="row">
<div class="col-lg-10 col-md-offset-1">
<p></p>
                    <form action="/blog" method="post">
<!-- Text input-->
<div class="form-group">
  <label class="control-label" for="title">Title</label>  
  
  <input id="title" name="title" type="text" placeholder="A good title always works!" class="form-control input-md" required="">
  <span class="help-block">Create a nice title ideally 10 to 50 characters long. </span>  
  
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="control-label" for="post">Blog Post Content</label>
                     
    <textarea class="form-control" id="post" name="post" rows = "9">Just a nice little blog post to tell people about Bananas!</textarea>
    
</div>

<!-- Text input-->
<div class="form-group">
  <label class="control-label" for="author">Author</label>  
  
  <input id="author" name="author" type="text" placeholder="Banana Man!" class="form-control input-md">
  <span class="help-block">Who made this post?</span>  
  
</div> </div>
                  </div>
<div class="panel-footer">
                               
 <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg btn-block">
                                <div class="clearfix"></div>
                            </div>
                            </fieldset>
                        </form>
                    </div>
                 
                  </div>
                  <?php
                  } else {
                  }
                  ?>
                  <?php
if($showtasks == 1){
?>
<div class="col-lg-6">
<div class="panel panel-default">
                  <div class="panel-heading">
                        Create New Task
                        </div>
                      
<div class="row">
<div class="col-lg-10 col-md-offset-1">
<p></p>
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
                            </div>
                            </div>
                                
<div class="panel-footer">
                               
 <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg btn-block">
                                <div class="clearfix"></div>
                            </div>
                            </fieldset>
                        </form>
                      
            </div>
            </div>
                
            </div>
            </div>
            </div>
             <?php
                  } else {
                  }
                  ?>
            </div>
            <?php include '/home/laughin1/public_html/admin/footer.php'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./assets/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./assets/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./assets/metisMenu/dist/metisMenu.min.js"></script>

   
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
