<?php 

$server="localhost";
$username="root";
$password="";
$db="bank";


$conn = mysqli_connect($server,$username,$password,$db);

if($conn === false){
    die("my sql is not connected");
  
}
else{
    mysql_select_db($db);
}


?> 