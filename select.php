<?php
$conn = mysqli_connect("localhost", "aramstyle", "aram1219", "opentutorial");

$sql = "SELECT * FROM topic LIMIT 1000";
$result = mysqli_query($conn, $sql);

do {
  $row = mysqli_fetch_array($result);
  echo '<h1>'.$row['title'].'</h1>';
  echo $row['description'];
} while ($row != NULL);

?>
