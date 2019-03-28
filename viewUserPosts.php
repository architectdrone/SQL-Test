<?php
echo
'
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>
';
$mysqli = new mysqli("mysql.eecs.ku.edu", "o167m805", "Leo4uc9U", "o167m805");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$all_posts = $mysqli->query('SELECT * FROM Posts WHERE author_id='.$_POST['selectedUser']);
echo '<table><tr><td><b>ID</b></td><td><b>Content</b></td></tr>';
while ($row = $all_posts->fetch_assoc())
{
  echo '<tr><td>'.$row['post_id'].'</td><td>'.$row['content'].'</td></tr>';
}
echo '</table>';
$mysqli->close();
?>
