<?php ini_set('display_errors', 'On'); ?>

<?php // cred.php
$dbhost = 'oniddb.cws.oregonstate.edu';
$dbname = 'anderma4-db';
$dbuser = 'anderma4-db';
$dbpass = 'QCRyUSSxRbmWcZir';
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

            <form role="form" method="post" action="profileUpdate.php">
              <div class="inner">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="firstName">First Name</label>
                    <input class="form-control" id="firstName" placeholder="First Name">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="lastName">Last Name</label>
                    <input class="form-control" id="lastName" placeholder="Last Name">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input class="form-control" type="number" id="age" placeholder="Age">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="weight">Weight</label>
                    <input class="form-control" id="weight" placeholder="Weight">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" id="email" placeholder="Email">
                </div>

                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
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