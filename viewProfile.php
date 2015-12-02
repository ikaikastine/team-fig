<?php ini_set('display_errors', 'On'); ?>
<?php // RegisterUser.php
    include 'accesscontrol.php';
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
        <h3>
        <a id="welcome-to-github-pages" class="anchor" href="#welcome-to-github-pages" aria-hidden="true"><span class="octicon octicon-link"></span></a>View Profile</h3>
            
            <?php 
                $link = dbConnect();
                $passhash = hash('sha256', $pwd);
                $sql = "SELECT name, password, points, weight, height, age, location FROM FIG_USER WHERE
                username = '$uid' AND password = '$passhash'";
                $result = mysqli_query($link, $sql);
                $profile_result = mysqli_fetch_array($result);
            ?>
            <p>Welcome back <?php echo $result['name']; ?> </p>

            <p> 
                <?php 
                    echo "Name: " $profile_result['name'];
                    echo "Password: " $profile_result['password'];
                    echo "Points: " $profile_result['points'];
                    echo "Weight: " $profile_result['weight'];
                    echo "Height: " $profile_result['height'];
                    echo "Age: " $profile_result['age'];
                    echo "Location: " $profile_result['location'];
                ?>
            </p>

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