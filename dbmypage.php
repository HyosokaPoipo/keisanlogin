<?php
session_start();
// ログイン状態チェック
if (!isset($_SESSION["user_name"])) {
header("Location: dblogin.php");
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>メインページ</title>
</head>
<body>
<main>
<a href="dblogout.php">ログアウト</a>
</main>
</body>
</html>