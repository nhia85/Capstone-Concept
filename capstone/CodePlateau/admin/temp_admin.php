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
	else
	{
		$query = $db->prepare("SELECT * FROM tutorials WHERE tutorial_id = $link");
	  $query->execute();
		foreach($query as $i)
		{
			$title = $i['title'];
			$content = $i['content'];
			$image = $i['image'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Code Plateau</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link href="../css/temp_styles.css" rel="stylesheet" type="text/css" />
	<link href="../css/tabs.css" rel="stylesheet" type="text/css" />
	<script src="../scripts/jquery-1.7.1.min.js" type="text/javascript"></script>
  <script src="../scripts/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="../scripts/jquery.easytabs.min.js" type="text/javascript"></script>
	<!-- javascript for the tabs -->
	<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
    });
  </script>


</head>
<body>
	<div id="wrapper">

		<!--nav has to be different to display the username upon logging in -->
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

		<!-- content 1 -->
		<div id="content1">
			<h3><?php echo nl2br($title); ?></h3>

			<a class="edit" href="editform.php?id=<?php echo $link; ?>">^Edit Title^</a>

			<p style="margin-bottom: 20px;"><?php echo nl2br($content); ?></p>

			<a class="edit" href="editform_content.php?id=<?php echo $link; ?>">^Edit Content^</a>

			<!-- upload image -->
			<div>
				<?php echo '<img src="../images/' .$image.'" style="max-width: 500px; max-height: 400px;">'; ?>
				<br/>
				<a class="edit" href="editform_image.php?id=<?php echo $link; ?>">^Edit Image^</a>
			</div>

		</div> <!-- end of content1 -->

		<!-- content2-->
		<!-- add button -->
		<div id="content2">
			<form method="post" style="margin-bottom: 25px;">
				<div style="float: right;">
					<input placeholder="Language name" name="add" size="12" />&nbsp;<button class="btn2" name="add_btn">ADD</button>
				</div>
			</form>

			<div id="tab-container" class='tab-container'>
				<ul class='etabs'>
				<?php
					$tabs = $db->prepare("SELECT lang FROM tabs WHERE tutorial_id = $link");
					$tabs->execute();
					for($j=0; $j=$tabs->fetch(); $j++)
					{ ?>
						<li class='tab'><a href="#<?php echo $j['lang']; ?>"><?php echo $j['lang']; ?></a></li>
		<?php } ?>
				</ul>
				<div class='panel-container'>


<?php #connect to the DB to grab data for the tabs #
$tabs2 = $db->prepare("SELECT tabs.lang, tabs.code, tabs.ref, tabs.notes
												FROM tutorials
												JOIN tabs
												ON tutorials.tutorial_id = tabs.tutorial_id
												WHERE tutorials.tutorial_id = $link;");
$tabs2->execute();


for($k=0; $k=$tabs2->fetch(); $k++)
{
	$language = $k['lang'];
	$code = $k['code'];
	$ref = $k['ref'];
	$notes = $k['notes'];
	?>
<div id="<?php echo $language; ?>">
<pre>
<code>
<?php echo $code; ?>
</code>
</pre>
<p><?php echo nl2br($notes); ?></p>
<p><?php echo nl2br($ref); ?></p>
	<a class="edit" href="editform_tabs.php?id=<?php echo $link. "&lang=". $language; ?>">^Edit Languages^</a>
</div>

<?php } ?>

</div>
			</div>
		</div> <!-- end content2 -->

		<!-- the footer -->

			<?php include ('../inc_footer.php') ?>

	</div> <!-- end wrapper -->
	<?php
			if(isset($_POST['add_btn']))
			{
				try
				{
					include('../db/connect.php');
					$work = $db->prepare("INSERT INTO tabs(lang, tutorial_id) VALUES(:lang, $link)");
					$work->execute(array(":lang" => $_POST['add']));
				}
				catch (Exception $e)
				{
					echo 'ERROR: '. $e -> getMessage();
				}
				unset($_POST);
				header("Location: temp_admin.php?id=$link");
			}
	?>
	<!-- TPauMer  -->
</body>
</html>
