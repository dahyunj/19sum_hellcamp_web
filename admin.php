<?php
session_start();
if($_SESSION['userid']=='admin') {

  $db_host = "localhost";
  $db_user = "hc";
  $db_pw = "hchchchC";
  $db_name = "hellcamp";
  $mysql = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
  $admin = "SELECT * FROM member WHERE userid='admin'";
  $result = $mysql->query($admin);
  $result = mysqli_fetch_assoc($result);
  $adminpw = md5($result['userpw']);
  if($_SESSION['userid']=='admin') {

  }
  else{
    header('Location: ./index.php');
  }

} else {
  header('Location: ./index.php');
}
 ?>


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
 					<p>ADMIN</p>
 					<h2>HC WEB</h2>
 				</header>
 			</div>
 		</section>
 		<!-- Header -->
<?php
  $db_host = "localhost";
  $db_user = "hc";
  $db_pw = "hchchchC";
  $db_name = "hellcamp";
  $mysql = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
  echo "<h3> </h3><h3>MANAGE</h3><h3> </h3>";
  echo "<form method='post' action='/admin.php'><div class='row uniform'>";
  echo "<div class='9u 12u$(small)'><input type='text' name='query' id='query' value='' placeholder='MYSQL 쿼리를 입력하세요'></div>";
  echo "<div class='3u$ 12u$(small)'><input type='submit' value='SUBMIT' class='fit'></div></div></form>";

  $query = $_POST['query'];
  if($query){
    $result3 = $mysql->query($query);
    if(!$result3){
      echo "<script>alert(\"ERROR\");</script>";
    }
  }

  $member = "SELECT * FROM member";
  $result1 = $mysql->query($member);
  echo "<h3> </h3><h3>MEMBER</h3><h3> </h3><div class='table-wrapper'>";
  echo "<table><thead><tr><th>id</th><th>userid</th><th>userpw</th><th>username</th></tr></thead><tbody>";
  foreach ($result1 as $item) {
    echo "<tr><td>".$item['id']."</td>";
    echo "<td>".$item['userid']."</td>";
    echo "<td>".$item['userpw']."</td>";
    echo "<td>".$item['username']."</td></tr>";
  }
	echo "</tbody><tfoot><tr><td colspan='2'></td></tr></tfoot></table></div>";
  $post = "SELECT * FROM post";
  $result2 = $mysql->query($post);
  echo "<h3> </h3><h3>POST</h3><h3> </h3><div class='table-wrapper'>";
  echo "<table><thead><tr><th>id</th><th>title</th><th>description</th><th>name_orig</th><th>name_save</th></tr></thead><tbody>";
  foreach ($result2 as $item) {
    echo "<tr><td>".$item['id']."</td>";
    echo "<td>".$item['title']."</td>";
    echo "<td>".$item['description']."</td>";
    echo "<td>".$item['name_orig']."</td>";
    echo "<td>".$item['name_save']."</td></tr>";
  }
  echo "</tbody><tfoot><tr><td colspan='2'></td></tr></tfoot></table></div>";

 ?>


 		<!-- Scripts -->
 			<script src="/static/js/jquery.min.js"></script>
 			<script src="/static/js/jquery.scrollex.min.js"></script>
 			<script src="/static/js/skel.min.js"></script>
 			<script src="/static/js/util.js"></script>
 			<script src="/static/js/main.js"></script>

 	</body>
 </html>
