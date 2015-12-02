<?php include 'accesscontrol.php'>
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
<?php
$sql = "SELSE e.name, e.kcalhr * (w.minutes / 60) AS cal, notes FROM FIG_WORKOUT w LEFT JOIN FIG_EXERCISE e ON w.exercise = e.eid WHERE uid = '$uid'";
$result = mysqli_query($link, $sql);

for($row_no = 0; $row_no < $result->num_rows; $row_no++)
{
	$result->data_seek($row_no);
	$row = $result->fetch_assoc();
	echo $row['exercise'] . ' ' . $row['cal'] . ' ' . $row['notes'] . '<br />'
}
?>
</html>
