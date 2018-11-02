<?php
session_start();//セッションの開始

//既にログインしている場合のダイレクトリンクは省略

//ログインボタンが押された場合の対応. 未入力エラーは省略
$error_message = "";

if(isset($_POST["login"])){//loginフォームから入力したデータを取得し、それが空かどうか見る
    $username = $_POST["user_name"];//入力フォームから受け取ったusernameを代入

    $dsn = "mysql:dbname=sampledb;host=localhost";//dbへの接続
    $db_user = "root";//dbへの接続する場合のテーブル
    $db_password = "";
    $password = $_POST["password"];//dbへの接続する場合のパスワード
    try{
        $dbh = new PDO($dsn, $db_user, $db_password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));//DBからデータをとる
        $sql = "select * from practice where username = '$username'";
        $sth = $dbh->query($sql);

        $result =$sth->fetch(PDO::FETCH_ASSOC);
        if(strcmp($password, $result["password"]) === 0){
            echo "Login success";
                //ログインしている場合は、ページ変遷が起きないための処理    
            $_SESSION["user_name"]=$_POST["user_name"];
            $mypage_url="dbmypage.php";
            header("Location:{$mypage_url}");
            exit;
        } else{
            print "Login failed";
        }

    }catch(PDOException $e){
        echo "Error:".$e->getMessage();
    }

    $error_message="Login failed due to worng ID or Password. Please try again♪";
}

if($error_message){
    echo $error_message;
}
?>

<form action="" method="post">
 <p>Login ID:<input type="text" name="user_name"></p>
 <p>Password:<input type="password" name="password"></p>
 <input type="submit" name="login" value="Login">
</form>