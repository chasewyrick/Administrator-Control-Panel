<?php
session_start();

if($_SESSION["user_name"]) {
$account = $_SESSION["user_name"];
?>
 <?php
 session_start();
 $message="";
 
 require'../settings.php';
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
                    <h1 class="page-header">Manage Users<a class="btn btn-success pull-right" href="new.php">New User</a></H1>	
                    <P><?php
                    echo $message;
                    ?></p>
                   
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

$sql = "SELECT * FROM  `members` WHERE username = '$account'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    // output data of each row
 while($row = $result->fetch_assoc()) {
 $super = $row['superuser'];
 
 }
 }
 if($super == 1){
 ?>
           <div class="row">
            <div class="col-md-12">
    <table class="table">
      <caption>Current Users</caption>
      <thead>
        <tr>
          <th>#</th>
          <th>Usernames</th>
          <th>Superuser?</th>
          <th>User Settings</th>
          <th>Delete User</th>
        </tr>
      </thead>
      <tbody>
        
      
  
         <?php
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$sql = "SELECT * FROM  `members` ORDER BY `id` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    // output data of each row
 while($row = $result->fetch_assoc()) {
 if($row['superuser'] == 1){
 $super = "Yes";
 } else {
 $super = "No";
 }
echo '<tr><td>'.$row['id'].'</td><td>'.$row['username'].'</td><td>'.$super.'<td><a class="btn btn-primary btn-xs" href="/user/'.$row['username'].'">Settings</a></td><td><a class="btn btn-danger btn-xs" href="./delete/'.$row['username'].'">Delete</a></td></tr>';


    }
} else {
    echo "<li>No Messages</li>";
}
}
$conn->close();
?>
 </tbody>
    </table>
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