<?php
session_start();
if(!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
	session_destroy();
	header('Location: ./index.php');
}
$idx = $_POST['idx'];
if(!(idx)){
	header('Location: ./index.php');
}
$db_host = "localhost";
$db_user = "hc";
$db_pw = "hchchchC";
$db_name = "hellcamp";
$mysql = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

$delete = "DELETE FROM post WHERE id='$idx'";

$result = $mysql->query($delete);
if($result){
  header('Location: ./home.php');
      }
else {
  echo "<script>alert(\"ERROR\");</script>";
}



 ?>
