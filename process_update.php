<?php
$conn = mysqli_connect("localhost", "aramstyle", "aram1219", "opentutorial");

//settype($_POST['id'], 'integer');
$filtered = array(
  'id' => mysqli_real_escape_string($conn, $_POST['id']),
  'title' => mysqli_real_escape_string($conn, $_POST['title']),
  'description' => mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "
  UPDATE topic
  SET title='{$filtered['title']}', description= '{$filtered['description']}'
  WHERE id ={$filtered['id']}
";

if(!mysqli_query($conn, $sql))
{
  echo 'Save Error!! Call me...';
  error_log(mysqli_error($conn));
}
else {
  echo 'Success to update. <a href="index.php">Back</a>';
}

?>
