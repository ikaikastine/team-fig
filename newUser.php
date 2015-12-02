<?php ini_set('display_errors', 'On'); ?>

<?php // RegisterUser.php
	include 'common.php';
	include 'db.php';
	include_once 'cred.php';
	if (!isset($_POST['submitok'])):
	// Display the user signup form
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="chrome=1">
	<meta name="description" content="Team-fig : Repository for team fig ">

	<link rel="stylesheet" type="text/css" media="screen" href="stylesheets/stylesheet.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
	<title>Fitness Incentivizer Goal System</title>
</head>

<body>
	<!-- HEADER -->
	<div id="header_wrap" class="outer">
		<header class="inner">
			<h1 id="project_title">Fitness Incentivizer Goal System</h1>
		</header>
	</div>

	<!-- MAIN CONTENT -->
	<div id="main_content_wrap" class="outer">
		<section id="main_content" class="inner">
			<h3><a id="welcome-to-github-pages" class="anchor" href="#welcome-to-github-pages" aria-hidden="true"><span class="octicon octicon-link"></span></a>Welcome New User!</h3>

			<p>Were excited that you've decided to join us. Please fill out the information below to complete the setup of your profile</p>

			<form role="form" enctype="multipart/form-data" method="POST" action="<?=$_SERVER['PHP_SELF']?>">
				<div class="inner">
					<div class="row">
						<div class="form-group col-md-4 photoUpload">
							<!--image-->
							<!--<input type="hiddden" name="MAX_FILE_SIZE" value="131072" />-->
							<!--no bigger than 128KB-->
							<img src="#" alt="User Name" />
							<input type="file" name="headPhoto"/>
						</div>
						<div class="form-group col-md-4">
							<label for="name">Name</label>
							<input class="form-control" name="name" placeholder="Name">
						</div>

						<div class="form-group col-md-4">
							<label for="userID">Username</label>
							<input class="form-control" name="userID" placeholder="Username">
						</div>
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input class="form-control" type="password" name="password" placeholder="Password">
					</div>

          <div class="row">
            <div class="form-group col-md-4">
              <label for="name">Weight</label>
              <input class="form-control" name="weight" placeholder="Weight">
            </div>

            <div class="form-group col-md-4">
              <label for="userID">Age</label>
              <input class="form-control" name="age" placeholder="Age">
            </div>
          </div>

					<button type="submit" name="submitok" class="btn btn-default">Submit</button>
 				</div>
			</form>
            <section>
	</div>

	<!-- FOOTER -->
	<div id="footer_wrap" class="outer">
		<footer class="inner">
			<p class="copyright">Fitness Incentivizer Goal System is maintained by Team-Fig</p>
			<p>For more information click <a href="https://github.com/ikaikastine/team-fig">here</a></p>
		</footer>
	</div>

</body>
</html>

<?php
	else:
		// Process signup submission
		$link = dbConnect();
		if ($_POST['userID']=='' or $_POST['name']=='' or $_POST['password']=='') {
			error('One or more required fields were left blank.\n'. 
				'Please fill them in and try again.');
		}


		// Check for existing user with the new id
		$sql = "SELECT COUNT(*) FROM FIG_USER WHERE username = '$_POST[userID]'";
		$result = mysqli_query($link,$sql);
		if (!$result) {
			error('A database error occurred in processing your '.
				'submission.\nIf this error persists, please '.
				'contact you@example.com.');
		}

		//need to find a way to replace this to prevent duping users
		//original code uses some ancient library that was deprecated
		//need to convert to mysqli now
		//im not a php wizard yet so... i haven't figured it out yet

		/* if (@mysql_result($result,0,0)>0) {
		error('A user already exists with your chosen userid.\n'.
		'Please try another.');
		} */

		$hash = hash('sha256', $_POST['password']);

		$sql = "INSERT INTO FIG_USER SET
		name = '$_POST[name]',
		username = '$_POST[userID]',
		password = '$hash',
		age = '$_POST[age]',
		weight = '$_POST[weight]'";
		
		//move the image to images/
		echo $_FILES['headPhoto']['tmp_name'];
		$extension = split("[/\\.]", $_FILES['headPhoto']['name']);
		$n = count($extension) - 1;
		$extension = $extension[$n];
		//echo $extension;
		username = $_POST[userID];
		$dir = 'images/'.$username.".".$extension;
		move_uploaded_file($_FILES['headPhoto']['tmp_name'], $dir);
		echo "image";

		if (!mysqli_query($link,$sql))
			error('A database error occurred in processing your '.
    				'submission.\nIf this error persists, please '.
				'contact you@example.com.');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> Registration Complete </title>
	<meta http-equiv="Content-Type"
	content="text/html; charset=iso-8859-1" />
</head>
<body>
	<p><strong>User registration successful!</strong></p>
	<p>To log in, click <a href="index.php">here</a> to return to the main page.</p>
</body>
</html>
<?php
endif;
?>
