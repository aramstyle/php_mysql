<?php
$conn = mysqli_connect("localhost", "aramstyle", "aram1219", "opentutorial");

$sql = "SELECT * FROM topic LIMIT 1000";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
  $escaped_title = htmlspecialchars($row['title']);
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
  'title' => 'Welcome',
  'description' => 'Hello, Web'
);

$update_link = '';
$delete_link = '';
if(isset($_GET['id'])) {
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  //$update_link = '<p><a href="update.php?id='.$_GET['id'].'">update</a></p>';
  $update_link = '
    <form action="update.php" method="post">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="update">
    </form>
  ';

  //$delete_link = '<a href="process_delete.php?id='.$_GET['id'].'">delete</a>';
  $delete_link = '
    <form action="process_delete.php" method="post">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="delete">
    </form>
  ';
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?=$list?>
    </ol>
    <p>
      <form action="create.php" method="post">
        <input type="submit" value="create">
      </form>
    </p>
    <p><?=$update_link?></p>
    <p><?=$delete_link?></p>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
  </body>
</html>
