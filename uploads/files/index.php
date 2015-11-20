<?php
session_start();
if($_SESSION["user_name"]) {
	
require '../../settings.php';


    if(isset($_POST['delete'])){
    	$file = './uploaded/'.$_POST['id'].'';
        unlink($file);
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
<
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
       <?php require '../../nav.php'; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">Uploaded Files</h1>
                    <?php echo $message; ?>
				
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
              
						
                    
                      <div class="row">
<?php
     if ($handle = opendir('./uploaded')) {
       while (false !== ($entry = readdir($handle))) {
         if ($entry != "." && $entry != "..") {
         $FileType = pathinfo($entry,PATHINFO_EXTENSION);
         if($FileType == 'rar' OR $FileType == 'dwg' OR $FileType == 'doc' OR $FileType == 'docx' OR $FileType ==  'txt' OR $FileType == 'otp' OR $FileType == 'dot' OR $FileType == 'dotx' OR $FileType == 'php' OR $FileType == 'sql' OR $FileType == 'rb' OR $FileType == 'cpp' OR $FileType == 'ics' OR $FileType == 'cpp' OR $FileType == 'html' OR $FileType == 'mov' OR $FileType == 'qt' OR $FileType == 'mpg' OR $FileType == 'aac'){
         $colour = 'primary';
         $button = 'primary';
         } else if($FileType == 'png' OR $FileType == 'pdf' OR $FileType == 'java' OR $FileType == 'c' OR $FileType == 'h'  OR $FileType == 'mp4'){
         $colour = 'red';
         $button = 'danger';
         } else if($FileType == 'tga' OR $FileType == 'eps' OR $FileType == 'ai' OR $FileType == 'ppt' OR $FileType == 'pps' OR $FileType == 'xml' OR $FileType == 'exe' OR $FileType == 'flv' OR $FileType == 'avi' OR $FileType == 'mid' OR $FileType == 'dmg' OR $FileType == 'tgz'){
         $colour = 'yellow';
         $button = 'warning';
         } else if($FileType == 'gif' OR $FileType == 'bpm' OR $FileType == 'tiff' OR $FileType == 'jpg' OR $FileType == 'ots	' OR $FileType == 'xls' OR $FileType == 'xlsx' OR $FileType == 'dat' OR $FileType == 'm4v' OR $FileType == 'mp3' OR $FileType == 'zip'){
         $colour = 'green';
         $button = 'success';
         } else {
         $colour = 'default';
         $button = 'default';

         }
           echo '<div class="col-md-3"><div class="panel panel-'.$colour.'"><div class="panel-heading"><img src="/assets/png/'.$FileType.'.png"></div><div class="panel-body">'.$entry.'</div><div class="panel-footer"><a href="./uploaded/'.$entry.'">View File</a><div class="pull-right"><form method="post" class="form-inline"><input  class="btn btn-'.$button.' btn-xs" name="delete" type="submit" value="Delete"><input name="id" type="text" value="'.$entry.'" hidden></form></div></div></div></div>';
          }
         
       }
       closedir($handle);
     }
?>
     
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
           <?php require '../../footer.php'; ?>
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