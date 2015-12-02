<?php // accesscontrol.php
	@ob_start();
	session_start();
	#ini_set('display_errors', 'On'); 
	include_once 'common.php';
	include_once 'db.php';
	include_once 'cred.php';
?>


<?php
	if (isset($_POST['uid'])) {
		$uid = $_POST['uid'];
	} else {
		$uid = $_SESSION['uid'];
	}
	if (isset($_POST['pwd'])) {
		$pwd = $_POST['pwd'];
	} else {
		$pwd = $_SESSION['pwd'];
	}
	if(!isset($uid)) {
?>
		
	<!DOCTYPE html>
	<html lang="US-EN">
	<head>
		<title>Fitness Incentivizer Goal System</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
	
		<link rel="stylesheet" type="text/css" media="screen" href="stylesheets/stylesheet.css">
	</head>
	<body>
		<div id="header_wrap" class="outer">
			<header class="inner">
				<h1 id="project_title">Fitness Incentivizer Goal System</h1>
				<!-- <h2 id="project_tagline">Repository for team fig </h2> -->
				<!--
				<section id="downloads">
				<a class="zip_download_link" href="https://github.com/ikaikastine/team-fig/zipball/master">Download this project as a .zip file</a>
				<a class="tar_download_link" href="https://github.com/ikaikastine/team-fig/tarball/master">Download this project as a tar.gz file</a>
				</section>
				-->
			</header>
		</div>	
	<!-- MAIN CONTENT -->
    <div id="main_content_wrap" class="outer">
      <section id="main_content" class="inner">

		<div class="inner">		
			<h1> Login Required </h1>
			<p>You must log in to access this area of the site. If you are
			not a registered user, <a href="newUser.php">click here</a>
			to sign up for instant access!</p>
			<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" type="text" name="uid" size="8" placeholder="User Name">
				</div>
				<div class="form-group">
					<label for="password">Password</label> 
					<input class="form-control" type="password" name="pwd" SIZE="8" placeholder="Password">
				</div>
				<button class="btn btn-default" type="submit">Login</button>
			</form>
		</div>
		</section>
		</div>	
<?php
		exit;
	}
	$_SESSION['uid'] = $uid;
	$_SESSION['pwd'] = $pwd;
	$link = dbConnect();
	$passhash = hash('sha256', $pwd);
	$sql = "SELECT * FROM FIG_USER WHERE
	username = '$uid' AND password = '$passhash'";
	$result = mysqli_query($link,$sql);
	if (!$result) {
		error('A database error occurred while checking your '.
		'login details.\nIfhis error persists, please '.
		'contact you@example.com.');
	}
	if (mysqli_num_rows($result) == 0) {
	unset($_SESSION['uid']);
	unset($_SESSION['pwd']);
?>
		<h1> Access Denied </h1>
		<p>Your user ID or password is incorrect, or you are not a
		registered user on this site. To try logging in again, click
		<a href="<?=$_SERVER['PHP_SELF']?>">here</a>. To register for instant
		access, click <a href="RegisterUser.php">here</a>.</p>
<?php
	exit;
	}
?>
</body>
</html>
