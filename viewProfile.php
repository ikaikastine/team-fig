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
        <h3>
        <a id="welcome-to-github-pages" class="anchor" href="#welcome-to-github-pages" aria-hidden="true"><span class="octicon octicon-link"></span></a>Welcome New User!</h3>
            <p>Were excited that you've decided to join us. Please fill out the information below to complete the setup of your profile</p>
            <form role="form" method="post" action="<?=$_SERVER['PHP_SELF']?>">
              <div class="inner">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="userID">Username</label>
                    <input class="form-control" name="userID" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <button type="submit" name="submitok" class="btn btn-default">Submit</button>
              </div>
            </form>
            </div>
    </div>
  </form>
    <!-- FOOTER -->
    <div id="footer_wrap" class="outer">
      <footer class="inner">
        <p class="copyright">Fitness Incentivizer Goal System is maintained by Team-Fig</p>
        <p>For more information click <a href="https://github.com/ikaikastine/team-fig">here</a></p>
      </footer>
    </div>
</body>
</html>