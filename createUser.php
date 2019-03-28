<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "o167m805", "Leo4uc9U", "o167m805");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

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
$mysqli->close();
?>
