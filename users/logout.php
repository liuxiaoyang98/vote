<?php 
session_start();
session_destroy();
if (empty($_GET[url]))
$url="../index.php";
else 
$url=$_GET[url];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content='1;url= <?php echo $url; ?> '> 
</head>
<body>

</body>
</html>