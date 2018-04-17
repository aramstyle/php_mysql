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
if(isset($_POST['id'])) {
  $filtered_id = mysqli_real_escape_string($conn, $_POST['id']);
  $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  $update_link = '<a href="update.php?id='.$_POST['id'].'">update</a>';

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
    <form action="process_update.php" method="post">
      <input type="hidden" name="id" value="<?=$_POST['id']?>">
      <p><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
      <p> <textarea name="description" placeholder="description"><?=$article['description']?></textarea> </p>
      <p> <input type="submit"> </p>
    </form>

  </body>
</html>
