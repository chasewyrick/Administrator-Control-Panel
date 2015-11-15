<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Administrator Dashboard</title>
	<!-- CSS Files -->
    <link href="./assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="/dist/css/admin.css" rel="stylesheet">
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- JS Files -->
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
</head>

<div class="se-pre-con"></div>

<body>

    <div id="wrapper">       
	   <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Administrator Dashboard</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/password"><i class="fa fa-key fa-fw"></i>Change Password</a>
                        </li>
                 
                        <li class="divider"></li>
                        <li><a href="/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="/dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Edit <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            
                        <li class="divider"></li>
                                <li>
                                    <a href="/edit/home/">Home Page <i class="fa fa-home fa-fw"></i></a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                        <a href="/messages"><i class="fa fa-envelope fa-fw"></i> Messages</a>
                        </li>
                        <li>
                        <a href="/blog"><i class="fa fa-comment fa-fw"></i> Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>