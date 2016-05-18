<!DOCTYPE html>
<?php
	session_start();
	include('../db/connect.php');
	$link = $_GET['id'];
	$lang = $_GET['lang'];
	$query = $db->prepare("SELECT tabs.lang, tabs.code, tabs.ref, tabs.notes
												FROM tutorials
												JOIN tabs
												ON tutorials.tutorial_id = tabs.tutorial_id
												WHERE tutorials.tutorial_id = $link AND tabs.lang = '$lang';");
	$query->execute();
	foreach($query as $i)
	{
		$languages = $i['lang'];
		$code = $i['code'];
		$ref = $i['ref'];
		$notes = $i['notes'];
	}
?>
<head>
    <meta charset="uft-8">
    <title>Edit Languages</title>
    <link rel="stylesheet" href="../css/temp_styles.css" type="text/css" />
</head>
<body>
	<div>
		<script type="text/javascript">

		</script>
		<form method="post" action="">
			<!--
Show declare values from above that's grabing from the database
		-->
			<h3>Modifiy <?php echo $languages; ?></h3>
				<textarea class="text" readonly type="text" rows="1" cols="20" class="format"><?php echo $languages; ?></textarea>
				<textarea name="title" type="text" rows="1" cols="20" class="format"><?php echo $languages; ?></textarea>
			<br/>
			<h3>Modifiy Codes</h3>
				<textarea class="text" readonly type="text" rows="6" cols="60" class="format"><?php echo $code; ?></textarea>
				<textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}"
				name="code" type="text" rows="6" cols="60" class="format"><?php echo $code; ?></textarea>
			<br/>
			<h3>Modifiy Notes</h3>
				<textarea class="text" readonly type="text" rows="6" cols="60" class="format"><?php echo $notes; ?></textarea>
				<textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}"
				name="notes" type="text" rows="6" cols="60" class="format"><?php echo $notes; ?></textarea>
			<br/>
			<h3>Modifiy Links</h3>
				<textarea class="text" readonly type="text" rows="6" cols="60" class="format"><?php echo $ref; ?></textarea>
				<textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}"
				name="ref" type="text" rows="6" cols="60" class="format"><?php echo $ref; ?></textarea>
			<br/>
				<button name="submit">Submit</button>
				<br/>
				<br/>
		</form>
	</div>

		<br/>
		<?php
		//update the tables from the database
			if(isset($_POST['submit']))
			{
				try
				{
					include('../db/connect.php');
					$work = $db->prepare("UPDATE tabs a JOIN tutorials b
										 ON a.tutorial_id = b.tutorial_id
										 SET a.lang = :Title, a.code = :Code, a.ref = :Links, a.notes = :Notes
										 WHERE b.tutorial_id = ".$link." AND a.lang = '$lang';");
					$work->execute(array(":Title" => $_POST['title'], ":Code" => $_POST['code'], ":Links" => $_POST['ref'], ":Notes" => $_POST['notes']));
					header("Location: temp_admin.php?id=$link");
				}
				catch(PDOException $e)
				{
					echo 'ERROR: '. $e -> getMessage();
				}
			}
		?>
</body>
</html>
