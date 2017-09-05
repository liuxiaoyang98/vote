<?php
include "../actions.php";
session_start();
$db=new pdoC;
function register($user,$pw){//注册需要帐号名称和密码,加入ip为了控制注册数量
    GLOBAL $db;
    $pword=md5($user.$pw);
    $ip=$_SERVER['REMOTE_ADDR'];
    $db->query("SELECT * FROM `users` WHERE `ip` = '$ip' ");
    if(mysql_num_rows(mysql_query($query1))){
        return "此ip已经注册 请<a href='login.php'>登录</a>";
    } else {
        $query2="INSERT INTO `vote`.`users` ( `ip`, `user`, `pw`,`type`) VALUES ( '$ip', '$user', '$pword','0')";
        mysql_query($query2);
        return "注册成功 请<a href='login.php'>登录</a>";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $re1=register($_POST[user],$_POST[pword]);
        if(empty($re1)){
            $logErr="用户名或者密码错误";
        }
        }
mysql_close();
?>
<html>
<link rel="stylesheet" type="text/css" href="../style.css">
<style>
#BG{
margin:100px auto 0;    
  width: 600px;
  border:2px red solid ;
  padding: 0 15px;
  border-radius: 8px;
  box-shadow: -5px 10px 5px #000000;
  text-align: center;
}
</style>
<head>
    <title></title>
</head>
<body>
    <div class="container">
        <div class="background">
            <div class="title">
                标题
            </div>            <?php suoyin(); ?>
            <div class="inner">
                <div class="main">
                <div id="BG">
                <div class="row1">
                <a href="reg.php">注册 </a>
                <a href="login.php"> 登录 </a>
                    <div class="row2">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    用户名*<br>
                    <input type="text" name="user"><br>
                    密码*<br>
                    <input type="password" name="pword"><br>
                    <?php echo $re1."<br>" ?>
                    <input type="submit" value="注册">
                    </form>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
                <div class="footer">
                QQ群:
                </div>
        </div>
    </div>
</body>
</html>