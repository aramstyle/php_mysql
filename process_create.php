<?php
$conn = mysqli_connect("localhost", "aramstyle", "aram1219", "opentutorial");

$sql = "INSERT INTO topic (title, description, created)
        VALUES (
          '{$_POST['title']}',
          '{$_POST['description']}',
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
