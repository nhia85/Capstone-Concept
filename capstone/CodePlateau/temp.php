<?php
	session_start();
	include('db/connect.php');
	$link = $_GET['id'];
	$query = $db->prepare("SELECT * FROM tutorials WHERE tutorial_id = $link");
  $query->execute();
	foreach($query as $i)
	{
		$title = $i['title'];
		$content = $i['content'];
		$image = $i['image'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Code Plateau</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link href="css/temp_styles.css" rel="stylesheet" type="text/css" />
	<link href="css/tabs.css" rel="stylesheet" type="text/css" />
	<script src="scripts/jquery-1.7.1.min.js" type="text/javascript"></script>
  <script src="scripts/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="scripts/jquery.easytabs.min.js" type="text/javascript"></script>
	<!-- javascript for the tabs -->
	<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
    });
  </script>

</head>
<body>
	<div id="wrapper">

		<?php include('inc_nav.php'); ?>

		<?php include('sideNav.php'); ?>

		<!-- content 1 -->
		<div id="content1">
			<h3><?php echo $title; ?></h3>
			<p><?php echo $content; ?></p>

			<!-- upload image -->
			<div>
				<?php echo '<img src="images/' .$image.' "style="max-width: 500px; max-height: 400px;">'; ?>
			</div>

		</div> <!-- end of content1 -->

		<!-- content2-->
		<div id="content2">
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
$tabs2 = $db->prepare("SELECT tabs.lang, tabs.code, tabs.ref
												FROM tutorials
												JOIN tabs
												ON tutorials.tutorial_id = tabs.tutorial_id
												WHERE tutorials.tutorial_id = $link;");
$tabs2->execute();


for($k=0; $k=$tabs2->fetch(); $k++)
{ ?>
<div id="<?php echo $k['lang']; ?>">
<pre>
<code>
<?php echo $k['code']; ?>
</code>
</pre>
<p><?php echo $k['ref']; ?></p>
</div>

<?php } ?>

</div>
			</div>
		</div> <!-- end content2 -->

		<!-- the footer -->
		<?php include ('inc_footer.php') ?>
	</div> <!-- end wrapper -->

</body>
</html>
