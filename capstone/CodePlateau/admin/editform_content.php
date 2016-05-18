<!DOCTYPE html>
<?php
	session_start();
	include('../db/connect.php');
	//$link is from the URL
	$link = $_GET['id'];
	$query = $db->prepare("SELECT content, tutorial_id, title FROM tutorials WHERE tutorial_id = '$link'");
	$query->execute();
	foreach($query as $i)
	{
		$content = $i['content'];
		$tid = $i['tutorial_id'];
		$title = $i['title'];
	}
?>
<head>
    <meta charset="uft-8">
		<link rel="stylesheet" href="../css/temp_styles.css" type="text/css" />
</head>
<body>

		<form method="post" action="">
		<h3>Modifiy Content</h3>
		<!--
Grabs from database and output the values
	-->
				<textarea readonly class="text" type="text" rows="6" cols="60"><?php echo $content; ?></textarea>
				<textarea name="content" type="text" rows="6" cols="60"><?php echo $content; ?></textarea>
			<br/>
			<button name="submit">Submit</button>
			<br/>
		</form>

		<br/>
		<?php
		//update query from database
			if(isset($_POST['submit']))
			{
				try
				{
					include('../db/connect.php');
					$work = $db->prepare("UPDATE tutorials SET content = :Content WHERE tutorials.tutorial_id = ".$tid.";");
					$work->execute(array(":Content" => $_POST['content']));
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
