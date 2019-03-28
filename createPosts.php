<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "o167m805", "Leo4uc9U", "o167m805");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

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
/*
$query = 'INSERT INTO Users (name) VALUES ("' . $_POST['newUserName'] .'")';
$allWithThatName = $mysqli->query('SELECT * FROM Users WHERE name="' . $_POST['newUserName'] . '"');

if ($allWithThatName->num_rows > 0)
{
  echo '<h1> WHO DO YOU THINK YOU ARE? </h1>';
  echo 'Sorry, there is already a user named '. $_POST['newUserName'];
}
elseif ($_POST['newUserName'] == "")
{
  echo '<h1> DONT BE A NOBODY... </h1>';
  echo 'Sorry, you have to choose a name.';
}
elseif ($result = $mysqli->query($query))
{
    echo '<h1> Hello </h1>';
    echo '<p> Welcome, ' . $_POST['newUserName'] . '</p>';
}
else {
  echo 'Oops!' . $query;
}
*/
$mysqli->close();
?>
