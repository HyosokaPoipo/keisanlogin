<?php

$dsn="mysql:dbname=sampledb;host=localhost";
$user="practice";
$password="hogehoge";


try{
$dbh=new PDO($dsn,$user,$password);
$sql="select * from practice";
$user=$dbh->query($sql);
foreach($user as $u){
   echo $u["id"].":";
   echo $u["username"].":";
   echo $u["password"]."<br>";
}
}catch(PDOException $e){
  echo "Error:".$e->getMessage();
}

$dbh=null;

?>
