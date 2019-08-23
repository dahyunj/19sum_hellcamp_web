<?php
session_start();
if(!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {

}
else{
	header('Location: ./home.php');
}


  $db_host = "localhost";
  $db_user = "hc";
  $db_pw = "hchchchC";
  $db_name = "hellcamp";
  $mysql = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

  $join_id = $_POST['join_id'];
  $join_username = $_POST['join_username'];
  $join_pw = $_POST['join_pw'];
  $join_pwc = $_POST['join_pwc'];

  if(!($join_id&&$join_username&&$join_pw&&$join_pwc)){

  }
  else{
    if(!($join_id))
      echo "<script>alert(\"ID를 입력하세요.\");</script>";
    else if(!($join_username))
      echo "<script>alert(\"USERNAME을 입력하세요.\");</script>";
    else if($join_username=='admin')
      echo "<script>alert(\"올바른 USERNAME을 입력하세요.\");</script>";
    else if(!($join_pw))
      echo "<script>alert(\"PASSWORD를 입력하세요.\");</script>";
    else if(!($join_pwc))
      echo "<script>alert(\"PASSWORD CHECK를 입력하세요.\");</script>";
    else{
      if($join_pwc!=$join_pw)
        echo "<script>alert(\"패스워드가 일치하지 않습니다.\");</script>";
      else{
        $idcheck = "SELECT * FROM member WHERE userid='$join_id'";
        $result1 = $mysql->query($idcheck);
        if($result->num_rows!=0){
            echo "<script>alert(\"이미 존재하는 ID입니다.\");</script>";
        }
        else {

        $join = "INSERT INTO member (userid, userpw, username) VALUES ('$join_id','$join_pw','$join_username')";
        $result2 = $mysql->query($join);
        if($result2){
                echo "<script>alert(\"회원가입 성공\");</script>";
        }
        else {
            echo "<script>alert(\"ERROR\");</script>";
        }
      }
      }
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

								<h3>Join Us</h3>

								<form method="post" action="/join.php">
									<div class="row uniform">
										<div class="6u 12u$(xsmall)">
											<input type="text" name="join_id" id="join_id" value="" placeholder="ID" />
										</div>
                    <div class="2u$">
                    </div>
										<div class="6u$ 12u$(xsmall)">
											<input type="text" name="join_username" id="join_username" value="" placeholder="USERNAME" />
										</div>
                    <div class="6u$ 12u$(xsmall)">
											<input type="text" name="join_pw" id="join_pw" value="" placeholder="PW" />
										</div>
                    <div class="6u$ 12u$(xsmall)">
                      <input type="text" name="join_pwc" id="join_pwc" value="" placeholder="PW CHECK" />
                    </div>


										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" value="SUBMIT" /></li>
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
