<?php 
    include "../../db.php";
    $db=new pdoC;
$result2=$db->pdo_pre("SELECT `v_id` FROM `activities` WHERE `a_id` = ? ");
$db->pdo_execute(array($_POST[num]));
$db->pdo_pre("DELETE FROM `vote`.`activities` WHERE `activities`.`a_id` = ?");
$db->pdo_execute(array($_POST[num]));
$vid=$db->pdo_fetch($result2)[0][v_id];
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
