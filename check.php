<?php 
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    header('Location: index.html');
}

$nickname =  htmlspecialchars($_POST['nickname']);
  // 関数のよびだし
    require_once('function.php');
// スーパーグローバル関数
$nickname = h($_POST['nickname']);
$email = $_POST['email'];
$content = $_POST['content'];
// var_dump($_POST);
// .echo $nickname;
if($nickname == '') {
        $nickname_result = 'ニックネームが入力されてません。';
    } else {
        $nickname_result = 'ようこそ、' . $nickname . '様';
    }

    if ($email == '') {
        $email_result = 'メールアドレスが入力されてません。';
    } else {
        $email_result = 'メールアドレス:' . $email;
    }

    if ($content == '') {
        $content_result = 'お問い合わせ内容が入力されてません。';
    } else {
        $content_result = 'お問い合わせ内容:' . $content;
    }

    ?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>入力内容確認</title>
</head>
<body>
<h1>入力内容確認</h1>
<p><?php echo $nickname_result ?></p>
<p><?php echo $email_result ?></p>
<p><?php echo $content_result ?></p>
<form method="POST" action="thanks.php">
  <input type="button" value=" 戻る" onclick="
  history.back()">
  <?php if ($email != '' && $nickname !=''):?>
    <input type="submit" value="ok">
  <?php endif; ?>
</form>
</body>
</html>