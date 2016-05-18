<!-- TPauMer  -->
<!DOCTYPE html>
<head>
    <meta charset="uft-8">
    <title>Register</title>
    <!-- /* ways to use php*/ -->
	  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/temp_styles.css" rel="stylesheet" type="text/css" />
	<style>
		li {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		}
		form {
		  width: 98%;
		  background-image: url(images/whitewall.png);
		  padding-top: 10px;
		  padding-bottom: 20px;
		  margin: 5px auto 0;
		  border: thin solid #C0C0C0;
		}
    td{
      padding: 8px;
    }
    .err{
      color: #AC182E;
      text-align: center;
      padding-top: 20px;
      padding-bottom: 50px;
      font-weight: bold;
    }

	#footer{
		width: 98.5%;
		margin-left: auto;
		margin-right: auto;
		float: clear;
	}

	</style>
</head>
<body>
  <div id="wrapper">
		<?php
        include_once('inc_nav.php');
        $select = array("Select your role", "Admin", "Student");
        ?>

<!-- Form for user info -->
<form method="post" action="">
  <h1 align="center">Register</h1>
      <table align="center">
      <tr>
              <td>First Name:</td>
              <td><input type="text" name="first" value="<?php if(isset($_POST['first'])){echo $_POST['first']; }?>" required></td>
      </tr>
			<tr>
              <td>Last Name:</td>
              <td><input type="text" name="last" value="<?php if(isset($_POST['last'])){echo $_POST['last']; }?>" required></td>
      </tr>
      <tr>
              <td>Username:</td>
              <td><input type="text" name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username']; }?>" required></td>
      </tr>
      <tr>
              <td>Password:</td>
              <td><input type="password" name="password" required></td>
      </tr>
      <tr>
              <td>Confirm Password:</td>
              <td><input type="password" name="cpass" required></td>
      </tr>
      <tr>
    <div class="content">

    <!-- javascript that ask for code if user select admin from the dropdown -->
		<script type="text/javascript">
				function showfield(name){
				  if(name=='Admin')document.getElementById('div1').innerHTML='Please provide pass code<br/><input type="text" name="passcode" />';
				  else document.getElementById('div1').innerHTML='';
				}
		</script>
				<td>Role:</td>
                <td>
                <select name="role" id="Users" onchange="showfield(this.options[this.selectedIndex].value)">
                <?php
                  for($i = 0; $i < 3; ++$i)
                {
                ?>
                  <option value="<?php echo $select[$i]; ?>"><?php echo $select[$i]; ?></option>
                <?php
                }
                ?>
                </select>
                </td>
		<tr><td></td>
      <td><div id="div1"></td></div>
    </tr>
        </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="addbtn" value="Create"></td>
            </tr>
            <br/>
            </table>

        <!-- validates all user inputs -->
        <?php
        if(isset($_POST['addbtn']))
            {
                $first = $_POST['first'];
                $first = preg_match("/^[A-Za-z]{1,50}$/", $first) ? "True" : "False";
                $last = $_POST['last'];
                $last = preg_match("/^[A-Za-z]{1,100}$/", $last) ? "True" : "False";
                $username = $_POST['username'];
                $match_user = preg_match("/^[A-Za-z0-9]{1,50}$/", $username) ? "True" : "False";
                $password = $_POST['password'];
                $match_pass = preg_match("/^[a-zA-Z0-9]{2,20}$/", $password) ? "True" : "False";
                $cpass = $_POST['cpass'];
                $role = $_POST['role'];
        				$passcode = $_POST['passcode'];
                //code for admin registration
        				$code = "1234";
                //--------------------
				if($first != "False")
        {
          if($last != "False")
          {
            if($match_user != "False")
            {
              if($match_pass != "False")
              {
                if($password == $cpass)
                {
    					    if($role != "Student")
    					     {
    								if($passcode == $code)
    								{
  										try
  										{
                        //admin
                        include('db/connect.php');
                        $stmt = $db->prepare("INSERT INTO accounts(first_name, last_name, user_name, password, role)
                                              VALUES(:first, :last, :username, :password, :role)");
                        $stmt->execute(array(":first" => $_POST['first'], ":last" => $_POST['last'], ":username" => $_POST['username'],
                                             ":password" => $_POST['password'], ":role" => $_POST['role'] ));
                        $err = "Registration Successful";
  										}
  										catch(PDOException $e)
  										{
  												$err = 'ERROR: '. $e -> getMessage();
  										}
  								}
  								else
  								{
  										$err = "Passcode or Role is invalid";
  								}
  						  }
  							else
  							{
    							try
    							{
                    //student
                    include('db/connect.php');
                    $stmt = $db->prepare("INSERT INTO accounts(first_name, last_name, user_name, password, role)
                                          VALUES(:first, :last, :username, :password, :role)");
                    $stmt->execute(array(":first" => $_POST['first'], ":last" => $_POST['last'], ":username" => $_POST['username'],
                                         ":password" => $_POST['password'], ":role" => $_POST['role'] ));
                    $err = "Registration Successful";
    							}
    							catch(PDOException $e)
    							{
    									$err = 'ERROR: '. $e -> getMessage();
    							}
    					}
    			}
          else
          {
            $err = "Password doesn't match";
          }
        }
      else
      {
          $err = "Password is invalid";
      }
    }
    else
    {
      $err = "Username is invalid";
    }
  }
    else
    {
        $err = "Last name is invalid";
    }
  }
  else
  {
    $err = "First name is invalid";
  }
}
?>
  <p class="err"><?php echo $err; ?></p>
  </form>
  <?php include('inc_footer.php'); ?>
  </div>
</div> <!-- wrapper div -->
</body>
</html>
