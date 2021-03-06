<?php
session_start();
if($_SESSION["user_name"]) {
	
require '../settings.php';

if(count($_POST)>0) {

$title=addslashes($_POST['title']);
$post= $_POST['post']; 
$author=addslashes($_POST['author']);
$date=date(r);
	$link = mysqli_connect($host, $mysql_user, $mysql_pass);
	mysqli_select_db($link, $db);
        
	mysqli_query($link, "INSERT INTO `blog` (`id`, `title`, `post`, `date`, `author`) VALUES ('', '$title', '$post', '$date', '$author')"); 
       
       $message = 'Congratulations, You blog post is now live.';
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
                    <h1 class="page-header">Blog Management <a class="btn btn-default pull-right" href="./">Back</a></h1>
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
  <label class="col-md-12 control-label" for="title">Title</label>  
  <div class="col-md-12">
  <input id="title" name="title" type="text" placeholder="A good title always works!" class="form-control input-md" required="">
  <span class="help-block">Create a nice title ideally 10 to 50 characters long. </span>  
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-12 control-label" for="post">Blog Post Content</label>
  <div class="col-md-12">                     
    <textarea class="form-control" id="post" name="post" rows = "9">Just a nice little blog post to tell people about Bananas!</textarea>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="author">Author</label>  
  <div class="col-md-12">
  <input id="author" name="author" type="text" placeholder="Banana Man!" class="form-control input-md">
  <span class="help-block">Who made this post?</span>  
  </div>
</div>

 <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg btn-block">
                            </fieldset>
                        </form>
                    </div>

		
                <!-- /.col-lg-6 -->
                <div class="col-lg-4">
                <div class="" id="markup">
  <div class="well">
    <h4>Markup Help</h4>
    <b>Want to add fany text effects to your post?</b>
    <p>Line Break: <code>&lt;br&gt;</code> place in location of the intended line break.</p>
    <p>Bold Text: <code>&lt;b&gt;</code> at the beginning and <code>&lt;/b&gt;</code> and the end of the bolded section. </p>
    <p>Header Text: <code>&lt;h1&gt;</code> at the beginning and <code>&lt;/h1&gt;</code> and the end of the header section. </p>
    <p>Paragraph Text: <code>&lt;p&gt;</code> at the beginning and <code>&lt;/p&gt;</code> and the end of the paragraph. </p>  
    <p>List: <code>&lt;li&gt;</code> at the beginning and <code>&lt;/li&gt;</code> and the end of the list entry. You can add as many list entries you want. </p>
  </div>
</div>
</div>
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