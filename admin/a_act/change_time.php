<?php 
include "../../db.php";
$db=new pdoC;
$vid=$_GET[vid];
$time=$_POST[change_time];
$db->pdo_pre("UPDATE `vote`.`votes` SET `v_time` = ? WHERE `votes`.`v_id` = ? ");
$db->pdo_execute(array($time,$vid));
$db->close();
$db=null;
?>
<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content='0;url=/lxy/vote3.0/admin/add_a.php?vid=<?php echo $vid; ?>'> 
<head>
    <title></title>
</head>
<body>

</body>
</html>
