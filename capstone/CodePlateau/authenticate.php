<?php
  //this page check if the username and password matches the Database
  // and redirects to the appropriate directory based on admin or Student

  require 'db/connect.php'; //Databse Connection
  session_start(); //Start the session

  if(isset($_POST['username']))
  {
    $username = $_POST['username'];
  }

  if(isset($_POST['password']))
  {
  	$password = $_POST['password'];
  }

  // Check whether the entered username/password pair exist in the Database
  $q = 'SELECT * FROM accounts WHERE user_name=:username AND password=:password';
  $query = $db->prepare($q);
  $query->execute(array(':username' => $username, ':password' => $password));

  if($query->rowCount() == 0)
  {
    header('Location: signin.php?err=1');
  }
  else
  {
    //fetch the result as associative array
  	$row = $query->fetch(PDO::FETCH_ASSOC);

  	//Store the fetched details into $_SESSION
  	$_SESSION['sess_user_id'] = $row['account_id'];
  	$_SESSION['sess_username'] = $row['user_name'];
    $_SESSION['sess_userrole'] = $row['role'];

  	if($_SESSION['sess_userrole'] == "Admin")
  	{
      header("Location: admin/temp_admin.php?id=1");
  	}

  	elseif($_SESSION['sess_userrole'] == "Student")
  	{
      header("Location: temp_student.php?id=1");
  	}

  }
?>
