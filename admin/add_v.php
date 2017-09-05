<?php
    include "../db.php";
    $v_name=$_GET[add_v];
    $v_time=$_GET[time];
    $db=new pdoC;
    $db->pdo_pre("INSERT INTO `vote`.`votes`  (`v_id`, `v_name`,`v_time`) VALUES ( ? , ? , ? )");
    $executes=array(NULL, $v_name, $v_time);
    $db->pdo_execute($executes);
    $db->close();
    $db=null;
    echo "已经新建完成 正在跳转".$v_name;
    ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content='1;url= ../choose/choose.php '> 
</head>
<body>

</body>
</html>
