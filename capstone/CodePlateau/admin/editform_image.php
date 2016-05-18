<!DOCTYPE html>
<?php
	session_start();
	//grabs values from recent page and put it into these variables below
	include('../db/connect.php');
	$link = $_GET['id'];
	$query = $db->prepare("SELECT image, tutorial_id FROM tutorials WHERE tutorial_id = $link");
	$query->execute();
	foreach($query as $i)
	{
		$image = $i['image'];
		$tid = $i['tutorial_id'];
	}

?>
<head>
    <meta charset="uft-8">
    <title>Edit Image</title>
		<link rel="stylesheet" href="../css/temp_styles.css" type="text/css" />
</head>
<body>
		<form method="post" action="" enctype="multipart/form-data">
			<h3>Modifiy Image</h3>
				<input type="file" name="file" onchange="document.getElementById('image').value = this.value.split('\\').pop().split('/').pop()">
				<input type="text" name="picture" id="image" value="<?php echo $image; ?>">
			<br/>
			<br/>
				<button name="submit">Submit</button>
			<br/>
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
                $work = $db->prepare("UPDATE tutorials SET image = :Image WHERE tutorial_id = $tid");
                $work->execute(array(":Image" => $_POST['picture']));
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
