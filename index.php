<?php
  session_start();
	if(isset($_SESSION['userid']) && isset($_SESSION['username'])) {
    header('Location: ./home.php');

	}
	else{
	}

  $db_host = "localhost";
  $db_user = "hc";
  $db_pw = "hchchchC";
  $db_name = "hellcamp";
  $mysql = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

  $login_id = $_POST['login_id'];
  $login_pw = $_POST['login_pw'];
if(!($login_id&&$login_pw)){

}
else{
  $login = "SELECT * FROM member WHERE userid='$login_id' AND userpw='$login_pw'";
  $result = $mysql->query($login);
    if($result->num_rows==1){
      $_SESSION['userid']=$login_id;
      $result = mysqli_fetch_assoc($result);
      $username = $result['username'];
      if(isset($_SESSION['userid'])){
        $_SESSION['username']=$username;
        $_SESSION['userpw']=md5($login_pw);
        header('Location: ./home.php');
      }
      else{
        echo "<script>alert(\"ERROR\");</script>";
      }
    }
    else{
      echo "<script>alert(\"ID 또는 PW가 일치하지 않습니다.\");</script>";
    }
  }
 ?>


 <!DOCTYPE HTML>
 <!--
 	Hielo by TEMPLATED
 	templated.co @templatedco
 	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
 -->
 <html>
 	<head>
 		<title>SSG HELLCAMP WEB</title>
 		<meta charset="utf-8" />
 		<meta name="viewport" content="width=device-width, initial-scale=1" />
 		<link rel="stylesheet" href="static/css/main.css" />
 	</head>
 	<body class="subpage">

 		<!-- Header -->
 			<header id="header">
 				<div class="logo"><a href="index.php">HC WEB </a></div>
 			</header>


 		<!-- One -->
 			<section id="One" class="wrapper style3">
 				<div class="inner">
 					<header class="align-center">
 						<p>dahyun</p>
 						<h2>HC WEB</h2>
 					</header>
 				</div>
 			</section>

 		<!-- Main -->
 			<div id="main" class="container">

 				<!-- Elements -->

 					<div class="row 200%">
 						<div class="6u 12u$(medium)">

 								<h3>Login First...</h3>

 								<form method="post" action="/index.php">
 									<div class="row uniform">
 										<div class="6u 12u$(xsmall)">
 											<input type="text" name="login_id" id="login_id" value="" placeholder="ID" />
 										</div>
 										<div class="6u$ 12u$(xsmall)">
 											<input type="text" name="login_pw" id="login_pw" value="" placeholder="PW" />
 										</div>
 										<!-- Break -->
 										<div class="12u$">


 											</div>
 										</div>
 										<!-- Break -->


 										<div class="12u$">
 											<ul class="actions">
 												<li><input type="submit" value="LOGIN" /></li>
 												<a href="join.php" class="button alt">JOIN</a>
 											</ul>
 										</div>
 									</div>
 								</form>


 		<!-- Footer -->


 		<!-- Scripts -->
 			<script src="static/js/jquery.min.js"></script>
 			<script src="static/js/jquery.scrollex.min.js"></script>
 			<script src="static/js/skel.min.js"></script>
 			<script src="static/js/util.js"></script>
 			<script src="static/js/main.js"></script>
 	</body>
 </html>
