<!DOCTYPE html>
<html>
	<!-- Background patterns from subtlepatterns.com -->
<head>
	<title>Code Plateau</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link href="css/temp_styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="wrapper">
		<?php include('inc_nav.php'); ?>

		<?php include('sideNav.php'); ?>
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
			<!--
Show values based off of declare variables above
		-->
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
