<?php
$conn = mysqli_connect("localhost", "aramstyle", "aram1219", "opentutorial");

$sql = "INSER INTO topic (title, description, created)
        VALUES ('MySQL','MySQL is ...', now())";

if(!mysqli_query($conn, $sql))
  echo mysqli_error($conn); // 실제에서는 파일에 로깅해야한다.

?>
