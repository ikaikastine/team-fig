<?php #ini_set('display_errors', 'On'); ?>

<?php // db.php 
include 'cred.php';
 
function dbConnect() 
{
	global $dbhost, $dbuser, $dbpass, $dbname;
	$dbcnx = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die("The site database appears to be down.");
	return $dbcnx;
}
?>