<!DOCTYPE html>
<?php
	//this is the admin homepage
	session_start();
	include('db/connect.php');
  $link = $_GET['id'];
	$role = $_SESSION['sess_userrole'];
	//check if you are a admin
	if(!isset($_SESSION['sess_username']) && $role!="Student")
	{
	   header('Location: index.php?err=2');
	}
?>
<html>
	<!-- Background patterns from subtlepatterns.com -->
<head>
	<title>Code Plateau</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link href="css/temp_styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="wrapper">
    <div id="header">

            <div id="logo">
                  <a href="index_student.php">Code Plateau</a>
            </div>
            <div style="float: right; color: #AC182E; margin-right: 20px;"><p><?php echo $_SESSION['sess_username'];?></p></div>
            <div id="navigation">
              <ul>
              <li style="float: right;"><a href="logout.php">Logout</a></li>

              </ul>
            </div>
    </div>


		<?php include('sideNav_student.php'); ?>

		<?php
		//grab value from database
			include('db/connect.php');
			$query = $db->prepare("SELECT image, content FROM home");
			$query->execute();
			foreach ($query as $i)
			{
				$content = $i['content'];
				$image = $i['image'];
			}
		?>

		<!-- content 1 -->
		<div style="min-height: 500px;" id="content1">
			<?php echo '<img src="images/'.$image.'" style="max-width: 500px; max-height: 400px;">'; ?>
			<p>
				<?php echo nl2br($content); ?>
			</p>

		</div> <!-- end of content1 -->


		<!-- the footer -->
		<?php include('inc_footer.php'); ?>
	</div> <!-- end wrapper -->

</body>
</html>
