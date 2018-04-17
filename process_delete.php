<?php
$conn = mysqli_connect("localhost", "aramstyle", "aram1219", "opentutorial");

//settype($_POST['id'], 'integer');
$filtered = array(
  'id' => mysqli_real_escape_string($conn, $_POST['id']),
);

$sql = "
  DELETE FROM topic
  WHERE id ={$filtered['id']}
";

if(!mysqli_query($conn, $sql))
{
  echo 'Delete Error!! Call me...';
  error_log(mysqli_error($conn));
}
else {
  echo 'Success to delete. <a href="index.php">Back</a>';
}

?>
