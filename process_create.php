<?php
$conn = mysqli_connect("localhost", "aramstyle", "aram1219", "opentutorial");

$filtered = array(
  'title' => mysqli_real_escape_string($conn, $_POST['title']),
  'description' => mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "INSERT INTO topic (title, description, created)
        VALUES (
          '{$filtered['title']}',
          '{$filtered['description']}',
          now()
        )
";

if(!mysqli_query($conn, $sql))
{
  echo 'Save Error!! Call me...';
  error_log(mysqli_error($conn));
}
else {
  echo 'Success to save. <a href="index.php">Back</a>';
}

?>
