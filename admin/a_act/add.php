<?php 
    include "../../db.php";
    $db=new pdoC;
    $db->pdo_pre("INSERT INTO `vote`.`activities` (`v_id`, `a_name`, `a_quan`) VALUES ( ? , ?, ? );");
    $db->pdo_execute(array($_GET[vid],$_POST[name],0));
    $db->close();
    $db=null;
?>
<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content='0;url=/lxy/vote3.0/admin/add_a.php?vid=<?php echo $_GET[vid]; ?>'> 
<head>
    <title></title>
</head>
<body>

</body>
</html>
