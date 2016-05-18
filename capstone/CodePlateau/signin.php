<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/login_styles.css" rel="stylesheet">
    <link href="css/login_styles2.css" rel="stylesheet">
    <link href="css/temp_styles.css" rel="stylesheet" type="text/css" />
    <style>
      .reg{
        text-align: center;
        margin-top: 30px;
        padding-bottom: 20px;
        font-size: 20px;
      }
    </style>
  </head>
  <body>
    <div id="wrapper" style="text-align: center;">
    <?php include('inc_nav.php'); ?>
    <div class="container" style="width: inherit;">
      <div class="info">
<h3 style="padding: 10px; background-color: #AC182E;" class="bg-primary">Dunwoody College of Technology</h3>
<div class="col-md-6 col-md-offset-3">
<h4></span>Log in with your credentials<span class="glyphicon glyphicon-user"></h4><br/>
<div class="block-margin-top">
<?php
//Associative array to display 2 types of error message.
 $errors = array( 1=>"Invalid user name or password, Try again",
                  2=>"Please login to access this area" );
//Get the error_id from URL
if(isset($_GET['err']))
{
  $error_id =  $_GET['err'];

  if ($error_id == 1)
  {
    echo '<p class="text-danger">'.$errors[$error_id].'</p>';
  }
  elseif ($error_id == 2)
  {
    echo '<p class="text-danger">'.$errors[$error_id].'</p>';
  }
}
?>

  <!-- connect to authenticate.php to validate user inputs -->
  <form action="authenticate.php" method="POST"
  class="form-signin col-md-8 col-md-offset-2" role="form">
     <input type="text" name="username" class="form-control"
     				placeholder="Username" required autofocus><br/>
     <input type="password" name="password" class="form-control"
     				placeholder="Password" required><br/>
     <button class="btn btn-lg btn-primary btn-block"
     					type="submit" style="background-color: #AC182E; border: thin solid black;">Sign in</button>
  </form>
        </div>
      </div>
    </div>
  </div>
<div class="reg"><a href="register.php" style="color: #AC182E">Register</a></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
  </div>
  </body>
</html>
