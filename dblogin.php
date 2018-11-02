<?php
session_start();//セッションの開始

//既にログインしている場合のダイレクトリンクは省略

//ログインボタンが押された場合の対応. 未入力エラーは省略
$error_message="";
print_r($_POST);

if(isset($_POST["login"])){//loginフォームから入力したデータを取得し、それが空かどうか見る
    if($_POST["user_name"]=="keisuke" && $_POST["password"]=="aaaaa"){
        $username=$_POST["user_name"];//入力フォームから受け取ったusernameを代入

        $dsn="mysql:dbname=sampledb;host=localhost";//dbへの接続
        $user="practice";//dbへの接続する場合のテーブル
        $password="hogehoge";//dbへの接続する場合のパスワード
        
        try{
            $dbh=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));//DBからデータをとる
            $sql= "select * from practice where (username = '$username') and (password='$password')";
            $sth = $dbh->prepare($sql);
            $sth->execute(array($username));
            $password=$_POST["password"];

            $result =$sth->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password,$result["password"])){
                print "Login success";
            } else{
                print "Login failed";
            }

            }catch(PDOException $e){
              echo "Error:".$e->getMessage();
            }
    
        //ログインしている場合は、ページ変遷が起きないための処理    
        $_SESSION["user_name"]=$_POST["user_name"];
        $mypage_url="dbmypage.php";
        header("Location:{$mypage_url}");
        exit;
    }
$error_message="Login failed due to worng ID or Password. Please try again♪";
}

if($error_message){
    echo $error_message;
}
?>

<form action="dblogin.php" method="post">
 <p>Login ID:<input type="text" name="user_name"></p>
 <p>Password:<input type="password" name="password"></p>
 <input type="submit" name="login" value="Login">
</form>