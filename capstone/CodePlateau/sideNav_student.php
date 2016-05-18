<?php
  session_start();
  include('db/connect.php');
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
      <li><a href="temp_student.php?id=<?php echo $row['tutorial_id']; ?>"><?php echo $row['title']; ?></a></li>
      <?php } ?>
    </ul>
</div>
