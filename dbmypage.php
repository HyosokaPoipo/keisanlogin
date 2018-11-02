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
	<style type="text/css">
		@keyframes keianimation {
			0% {
				transform: translateX(0);
			}
			
			25% {
				transform: translateX(100px);
				color: green;
				font-size: 24px;
			}
			
			50% {
				transform: translateX(200px);
				color: cyan;
				font-size: 34px;
			}
			
			75% {
				transform: translateX(300px);
				color: yellow;
				font-size: 44px;
			}
			
			100% {
				transform: translateX(400px);
				color: red;
				font-size: 54px;
			}
		}
		
		@keyframes verticalanim {
			0% {
				transform: translateX(-55px);
			}
			
			25% {
				transform: translateY(-155px);
			}
			
			50% {
				transform: translateY(-655px);
			}
			
			75% {
				transform: translate(100px, -55px);
			}
			
			100% {
				transform: translateY(-255px);
			}
		}
		
		h3 {
			animation-name: keianimation;
			animation-duration: 4s;
			animation-direction: alternate;
			animation-iteration-count: infinite;
		}
		
		a.logout {
			animation-name: verticalanim;
			animation-duration: 4s;
			animation-direction: alternate;
			animation-iteration-count: infinite;
		}
	</style>
</head>
<body>
<main>
	<h3> Welcome <?php echo $_SESSION["user_name"]; ?> san</h3>
	<a href="dblogout.php" class="logout">ログアウト</a>
</main>
</body>
</html>