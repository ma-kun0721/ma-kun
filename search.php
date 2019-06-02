<?php
// search.php
require_once('function.php');
require_once('dbconnect.php');
$nickname = '';
if (isset($_GET['nickname'])) {
    $nickname = $_GET['nickname'];
}
$stmt = $dbh->prepare('SELECT * FROM surveys WHERE nickname like ?');
$stmt->execute(["%$nickname%"]);
$results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <form action="search.php" method="GET">
        <input type="text" name="nickname">
        <input type="submit" value="検索">
    </form>
    <div class="container">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>名前</th>
        <th>メールアドレス</th>
        <th>お問い合わせ</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $result): ?>
            <tr>
          <td><?php echo $result ['nickname'];?></td>
          <td><?php echo $result ['email'];?></td>
          <td><?php echo $result ['content']; ?></td>
            </tr>
          <?php endforeach;?>
    </tbody>
  </table>
</div>
</body>
</html>
