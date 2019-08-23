<?php
session_start();
if(!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
	header('Location: ./index.php');
}
$name_save = $_POST['name_save'];
$filepath = base64_decode($name_save);
$filesize = filesize($filepath);
$filename = $_POST['name_orig'];

header("Pragma: public");
header("Expires: 0");
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename='$filename'");
header("Content-Transfer-Encoding: binary");
header("Content-Length: $filesize");

ob_clean();
flush();
readfile($filepath);

?>
