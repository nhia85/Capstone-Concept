<!DOCTYPE html>
<?php
	//this is the admin homepage
	session_start();
	include('../db/connect.php');
  $link = $_GET['id'];
	$role = $_SESSION['sess_userrole'];
	//check if you are a admin
	if(!isset($_SESSION['sess_username']) && $role!="Admin")
	{
	   header('Location: index.php?err=2');
	}
?>
<html>
<head>
	<title>Code Plateau</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link href="../css/temp_styles.css" rel="stylesheet" type="text/css" />

	<style type="text/css">


	</style>

</head>
<body>
	<div id="wrapper">
		<div id="header">

			<div id="logo">
				<a href="index_admin.php">
					Code Plateau
				</a>
			</div>
			<div style="float: right; color: #AC182E; margin-right: 20px;"><p><?php echo $_SESSION['sess_username'];?></p></div>
			<div id="navigation">
				<ul>
					<li style="float: right;"><a href="../logout.php">Logout</a></li>
			  </ul>

			</div>
		</div> <!-- end header -->

		<?php include('sideNav_admin.php'); ?>

		<?php
		//grabs and show value into declare variables
			include('../db/connect.php');
			$query = $db->prepare("SELECT image, content FROM home");
			$query->execute();
			foreach($query as $i)
			{
				$content = $i['content'];
				$image = $i['image'];
			}
		?>
		<!-- content 1 -->
		<div id="content1">
<!--
Show the outputed values from database
-->
			<?php echo '<img src="../images/' .$image.'" style="max-width: 500px; max-height: 400px;">'; ?>

			<br/>
			<br/>
			<!--
			show spacing within text area
			-->
			<?php echo nl2br($content); ?>

			<br/>
			<a href="editform_home.php" >Edit Page</a>
		</div>
		<!-- end of content1 -->
		<?php include ('../inc_footer.php') ?>
	</div> <!-- end wrapper -->

</body>
</html>
