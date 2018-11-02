<?php
session_start();

$error_message="";
if(isset($_POST["login"])){
    if($_POST["user_name"]=="keisuke" && $_POST["password"]=="aaaaa"){
        $_SESSION["user_name"]=$_POST["user_name"];
        $mypage_url="mypage.php";
        header("Location:{$mypage_url}");
        exit;
    }
$error_message="Login failed due to worng ID or Password. Please try again.";
}
?>

<?php
if($error_message){
    echo $error_message;
}
?>

<form action="login.php" method="POST">
 <p>Login ID:<input type="text" name="user_name"></p>
 <p>Password:<input type="password" name="password"></p>
 <input type="submit" name="login" value="Login">
</form>