<?php

$dsn="mysql:dbname=sampledb;host=localhost";
$user="dbuser";
$password="hogehoge";


try{
$dbh=new PDO($dsn,$user,$password);
$sql="select * from user";
$user=$dbh->query($sql);
foreach($user as $u){
   echo $u["id"].":";
   echo $u["username"].":";
   echo $u["email"],":";
   echo $u["group_id"],":";
   echo $u["login_num"]."<br>";
}
}catch(PDOException $e){
  echo "Error:".$e->getMessage();
}

$dbh=null;

?>
