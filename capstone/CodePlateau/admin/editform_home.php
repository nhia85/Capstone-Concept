<!-- this page edits the home page -->
<!DOCTYPE html>
<?php
	session_start();
	//grabs values from recent page and put it into these variables below
	include('../db/connect.php');
	$link = $_GET['id'];
	$query = $db->prepare("SELECT content, image FROM home");
	$query->execute();
	foreach($query as $i)
	{
		$content = $i['content'];
		$image = $i['image'];
	}

?>
<head>
    <meta charset="uft-8">
    <title>Edit Homepage</title>
    <link rel="stylesheet" href="../css/temp_styles.css" type="text/css" />
</head>
<body>
		<form method="post" action="" enctype="multipart/form-data">
		<h3>Modifiy Content</h3>
				<textarea class="text" readonly type="text" rows="6" cols="60" class="format"><?php echo $content; ?></textarea>
				<textarea name="content" type="text" rows="6" cols="60" class="format"><?php echo $content; ?></textarea>
			<br/>
			<br/>
		<h3>Modifiy Image</h3>
				<input type="file" name="file" id="file" onchange="document.getElementById('name').value = this.value.split('\\').pop().split('/').pop()">
				<input type="text" name="image" id="name" value="<?php echo $image; ?>">
			<br/>
			<br/>
			<button name="submit">Submit</button>
		</form>
		<br/>
		<?php
			if(isset($_POST['submit']))
			{
				if(!move_uploaded_file($_FILES['file']['tmp_name'], '../images/' . $_FILES['file']['name'])){
				}
				try
				{
					include('../db/connect.php');
					$work = $db->prepare("UPDATE home SET image = :Image, content = :Content");
					$work->execute(array(":Image" => $_POST['image'], ":Content" => $_POST['content']));
					header("Location: index_admin.php?id=$link");
				}
				catch(PDOException $e)
				{
					echo 'ERROR: '. $e -> getMessage();
				}
			}
		?>
</body>
</html>
