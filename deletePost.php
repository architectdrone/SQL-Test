<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "o167m805", "Leo4uc9U", "o167m805");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
if (isset($_POST['toDelete']))
{
  foreach ($_POST['toDelete'] as $current)
  {
    echo $current;
    $the_post = $mysqli->query('DELETE FROM Posts WHERE post_id='.$current);
  }
  echo "SHAZAM!";
}
else {
  echo "That was anticlimactic!";
}
$mysqli->close();
?>
