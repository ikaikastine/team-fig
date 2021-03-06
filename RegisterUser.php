<?php ini_set('display_errors', 'On'); ?>

<?php // RegisterUser.php
	include 'common.php';
	include 'db.php';
	include_once 'cred.php';

	if (!isset($_POST['submitok'])):
	// Display the user signup form
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>New User Registration</title>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

</head>

<body>

	<h3>New User Registration Form</h3>

	<p><font color="orangered" size="+1"><tt><b>*</b></tt></font> indicates a required field</p>

	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
		<table border="0" cellpadding="0" cellspacing="5">
			<tr>
				<td align="right">
					<p>Name</p>
				</td>	
				<td>
					<input name="newname" type="text" maxlength="100" size="25" />
					<font color="orangered" size="+1"><tt><b>*</b></tt></font>
				</td>
			</tr>

			<tr>
				<td align="right">
					<p>Username</p>
				</td>
				<td>
					<input name="newid" type="text" maxlength="100" size="25" />
					<font color="orangered" size="+1"><tt><b>*</b></tt></font>
				</td>
			</tr>

    			<tr>
				<td align="right">
					<p>Password</p>
				</td>
				<td>
					<input name="newpass" type="text" maxlength="100" size="25" />
					<font color="orangered" size="+1"><tt><b>*</b></tt></font>
				</td>
			</tr>

			<tr>
				<td align="right" colspan="2">
					<hr noshade="noshade" />
					<input type="reset" value="Reset Form" />
					<input type="submit" name="submitok" value="   OK   " />
				</td>
			</tr>
		</table>
	</form>

</body>
</html>

<?php
	else:
		// Process signup submission
		$link = dbConnect();
		if ($_POST['newid']=='' or $_POST['newname']=='' or $_POST['newpass']=='') {
			error('One or more required fields were left blank.\n'.
				'Please fill them in and try again.');
		}


		// Check for existing user with the new id
		$sql = "SELECT COUNT(*) FROM FIG_USER WHERE username = '$_POST[newid]'";
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

		$hash = hash('sha256', $_POST[newpass]);

		$sql = "INSERT INTO FIG_USER SET
		name = '$_POST[newname]',
		username = '$_POST[newid]',
		password = '$hash'";

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
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<p><strong>User registration successful!</strong></p>
	<p>To log in,
	click <a href="login.php">here</a> to return to the login
	page, and enter your new username and password.</p>
</body>
</html>
<?php
endif;
?>
