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

$all_users = $mysqli->query('SELECT * FROM Users');
echo '<table><tr><td><b>ID</b></td><td><b>name</b></td></tr>';
while ($row = $all_users->fetch_assoc())
{
  echo '<tr><td>'.$row['user_id'].'</td><td>'.$row['name'].'</td></tr>';
}
echo '</table>';
/*


if ($_POST['content'] == "")
{
  printf("Hey! You have to actually put something there.");
  exit();
}

$user_id_table = $mysqli->query('SELECT user_id FROM Users WHERE name = "' . $_POST['userName'] .'"');
if ($user_id_table->num_rows == 0)
{
  printf("That user (%s) doesn't exist.\n", $_POST['userName']);
  exit();
}
$user_id = $user_id_table->fetch_assoc()['user_id'];

$insert = $mysqli->query('INSERT INTO Posts (content, author_id) VALUES ("'.$_POST['content'].'", "'.$user_id.'")');
echo '<h1>' .$_POST['userName']. ' said: </h1>';
echo '<p>'.$_POST['content'].'</p>';
*/
$mysqli->close();
?>
