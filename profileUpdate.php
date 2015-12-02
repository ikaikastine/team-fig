<!--This is the page that updates the user profile to the database-->
<?php
	session_start();
	$userName = $_SESSION['uid'];
	include 'dp.php';
?>
<!--seesion_start() must be the very first thing in the page-->

<!DOCTYPE html>
<html lang="US-EN">
<head>
	<title>Fitness Incentivizer Goal System</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
	
	<link rel="stylesheet" type"text/css" media="screen" href="stylesheets/stylesheet.css">
</head>
<body>

	<!--HEADER-->
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

	<?php
		//get the managerID and the password via POST
		$name = $_POST['name'];
		$userName = $_POST['username'];
		$password = $_POST['password'];

		echo "after setting variables";		

		//connect to the database to find the managerID and check if the password matches
		$dbc = dbConnect();
		$query = "UPDATE FIG_USER SET name = '$name'; password = '$password';  WHERE username = '$userName'";
		$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
		//move the image to images/
		//echo $_FILES['headPhoto']['tmp_name'];
		$extension = split("[/\\.]", $_FILES['headPhoto']['name']);
		$n = count($extension) - 1;
		$extension = $extension[$n];
		//echo $extension;
		$dir = 'images/'.$userName.".".$extension;
		move_uploaded_file($_FILES['headPhoto']['tmp_name'], $dir);
		//terminate the connection with the database
		mysqli_close($dbc);

		echo "database query finished";
	?>

	<!-- FOOTER -->
	<div id="footer_wrap" class="outer">
		<footer class="inner">
			<p class="copyright">Fitness Incentivizer Goal System is maintained by Team-Fig</p>
			<p>For more information click <a href="https://github.com/ikaikastine/team-fig">here</a></p>
		</footer>
	</div>


</body>
</html>
