<?php
  session_start();
  include('../db/connect.php');
  $query = $db->prepare("SELECT tutorial_id, title FROM tutorials");
  $query->execute();
  ?>
<div id="sideNav">
    <ul>
      <h2>Tutorial</h2>
      <?php
        for($i=0; $row=$query->fetch(); $i++)
        {
          ?>
      <li><a href="temp_admin.php?id=<?php echo $row['tutorial_id']; ?>"><?php echo $row['title']; ?></a></li>
      <?php } ?>
    </ul>
    <form method="post" style="margin-bottom: 25px;">
      <div style="margin-left: 20px;"><input placeholder="Topic name" name="add_topic" size="14"/>&nbsp;<button class="btn2" name="topic_btn">ADD</button></div>
    </form>
</div>

<?php
    if(isset($_POST['topic_btn']))
    {
      try
      {
        include('../db/connect.php');
        $work = $db->prepare("INSERT INTO tutorials(title) VALUES(:title)");
        $work->execute(array(":title" => $_POST['add_topic']));
      }
      catch (Exception $e)
      {
        echo 'ERROR: '. $e -> getMessage();
      }
      unset($_POST);
      header("Location: temp_admin.php?id=1");
    }

?>
