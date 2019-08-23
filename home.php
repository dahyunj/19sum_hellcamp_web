<?php
session_start();
if(!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
	header('Location: ./index.php');
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
		<link rel="stylesheet" href="/static/css/main.css" />
	</head>
	<body>
		<header id="header">
			<div class="logo"><a href="/index.php">HC WEB</a></div>
			<a href="#menu">Menu</a>
		</header>


		<!-- Nav -->
		<nav id="menu">
			<ul class="links">
				<li><a href="/">Home</a></li>
				<li><a href="/"><?php echo $_SESSION['username'];?>님</a></li>
				<li><a href="/logout.php">Logout</a></li>
			</ul>
		</nav>

		<!-- One -->
		<section id="One" class="wrapper style3">
			<div class="inner">
				<header class="align-center">
					<p>WELCOME</p>
					<h2>HC WEB</h2>
				</header>
			</div>
		</section>
		<!-- Header -->

		<section id="one" class="wrapper style2">
			<div class="inner">

					<a href="/post.php"><div class="plus_btn" id="plus_btn">PLUS</div></a>
		</secion>

		<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">



            <?php
            $db_host = "localhost";
            $db_user = "hc";
            $db_pw = "hchchchC";
            $db_name = "hellcamp";
            $mysql = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
            $post_view = "SELECT * FROM post";
            $result = $mysql->query($post_view);

            foreach ($result as $item) {
              echo "<div><div class='box'><div class='content'><header class='align-center'>";
              echo "<h2>".$item['title']."</h2></header>";
              echo "<p style='text-align:center;'>".$item['description']."</p>";
							echo "<form method='post' action='/edit.php'><footer class='align-center'>";
							echo "<input type='hidden' name='idx' value='".$item['id']."'/>";

							echo "<input type='submit' value='EDIT' />";
              echo "</footer></form>";

							if($item['name_orig']!=NULL){
							echo "<form method='post' action='/download.php'><footer class='align-center'>";
							echo "<input type='hidden' name='name_save' value='".$item['name_save']."'/>";
							echo "<input type='hidden' name='name_orig' value='".$item['name_orig']."'/>";
							echo "<input type='submit' class = 'alt' value='".$item['name_orig']."' />";
							echo "</footer></form>";
							}
							echo "</div></div></div>";
            }
             ?>


					</div>
				</div>
			</section>



		<!-- Two -->

		<!-- Scripts -->
			<script src="/static/js/jquery.min.js"></script>
			<script src="/static/js/jquery.scrollex.min.js"></script>
			<script src="/static/js/skel.min.js"></script>
			<script src="/static/js/util.js"></script>
			<script src="/static/js/main.js"></script>

	</body>
</html>
