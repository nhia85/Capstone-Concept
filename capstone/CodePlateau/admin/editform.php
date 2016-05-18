<!DOCTYPE html>
<?php
	session_start();
	include('../db/connect.php');
	//grab value from previous page into this page into these variables below
	$link = $_GET['id'];
	$query = $db->prepare("SELECT title, tutorial_id FROM tutorials WHERE tutorial_id = $link");
	$query->execute();
	foreach($query as $i)
	{
		$title = $i['title'];
		$tid = $i['tutorial_id'];
	}

?>
<head>
    <meta charset="uft-8">
    <title>PHP examples</title>
    <link rel="stylesheet" href="../css/temp_styles.css" type="text/css" />
</head>
<body>
		<form method="post" action="">
			<!--
show values of declare variables
		-->
			<h3>Modifiy Title</h3>
					<textarea class="text" readonly type="text" rows="6" cols="60" class="text"><?php echo $title; ?></textarea>
					<textarea name="name" type="text" rows="6" cols="60" class="format"><?php echo $title; ?></textarea>
				<br/>
				<button name="submit">Submit</button>
				<br/>
		</form>
		<br/>
		<?php
		//update the tables for database
			if(isset($_POST['submit']))
			{
				try
				{
					include('../db/connect.php');
					$work = $db->prepare("UPDATE tutorials SET title = :Title WHERE tutorial_id = $tid;");
					$work->execute(array(":Title" => $_POST['name']));
					header("Location: temp_admin.php?id=$tid");
				}
				catch(PDOException $e)
				{
					echo 'ERROR: '. $e -> getMessage();
				}
			}
		?>
</body>
</html>
