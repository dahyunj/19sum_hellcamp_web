<?php
session_start();
if(!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
	header('Location: ./index.php');
}
$db_host = "localhost";
$db_user = "hc";
$db_pw = "hchchchC";
$db_name = "hellcamp";
$mysql = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

$uploads_dir = '../../webfile';
$allowed_ext = array('jpg','jpeg','png','gif','txt','mp3','mp4','hwp','pdf');

$error = $_FILES['post_file']['error'];
$name = $_FILES['post_file']['name'];
$ext = array_pop(explode('.', $name));
$save = base64_encode("$uploads_dir/.$name");
if(!($name)){

}
else{
	if( $error != UPLOAD_ERR_OK ) {
		switch( $error ) {
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
				echo "<script>alert(\"파일이 너무 큽니다.\");</script>";
				break;
				default:
      	echo "<script>alert(\"ERROR\");</script>";
				break;
			}
		}
		else if( !in_array($ext, $allowed_ext) ) {
			echo "<script>alert(\"허용되지 않는 파일 형식입니다.\");</script>";
		}
		else {
  	if(move_uploaded_file( $_FILES['post_file']['tmp_name'], "$uploads_dir/$name")){
		}else{
			echo "<script>alert(\"ERROR\");</script>";
		}
	}
}
$post_description = $_POST['description'];
$post_title = $_POST['title'];
$post = "INSERT INTO post (title, description, name_orig, name_save) VALUES('$post_title', '$post_description','$name','$save');";

if(!($post_description||$post_title)){

}else{
  if(!($post_title))
    echo "<script>alert(\"제목을 입력하세요.\");</script>";
  else if(!($post_description))
    echo "<script>alert(\"내용을 입력하세요.\");</script>";
  else{
    $result = $mysql->query($post);
    if($result){
				header('Location: ./home.php');
			    }
    else {
      echo "<script>alert(\"ERROR\");</script>";
    }
  }
}

 ?>



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

      <!-- Elements -->
      <div id="main" class="container">

      				<!-- Elements -->
      					<h2 id="elements">POST</h2>
      					<div class="row 200%">
      						<div class="6u 12u$(medium)">


      							<!-- Form -->
      								<form method="post" enctype='multipart/form-data' action="/post.php">
      									<div class="row uniform">
      										<div class="12u$">
      											<input type="text" name="title" id="title" value="" placeholder="title">
      										</div>
      										<div class="12u$">
      											<textarea name="description" id="description" rows="6" placeholder='description' ></textarea>
      										</div>
                          <div class="12u$">
	                           <input type='file' name='post_file'>
                             </div>
      										<!-- Break -->
      										<div class="12u$">
      											<ul class="actions">
      												<li><input type="submit" value="SUBMIT"></li>
                              <a href="index.php" class="button alt">CANCEL</a>
      											</ul>
      										</div>
      									</div>
      								</form>


      						</div>
      					</div>

      			</div>



    <!-- Scripts -->
			<script src="/static/js/jquery.min.js"></script>
			<script src="/static/js/jquery.scrollex.min.js"></script>
			<script src="/static/js/skel.min.js"></script>
			<script src="/static/js/util.js"></script>
			<script src="/static/js/main.js"></script>
	</body>
</html>
