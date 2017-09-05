<?php
session_start();
include "../actions.php";
$dbh=new pdoC;
function login($user,$pw){
    GLOBAL $dbh;
    $pword=md5($user.$pw);
    $stmt1=$dbh->pdo_pre('SELECT * FROM users WHERE user LIKE ? ');
    $dbh->pdo_execute(array($user));
    $arr1=$dbh->pdo_fetch($stmt1);;
    if(empty($arr1)){
        return false;
    }
    if($arr1[0][pw]==$pword){
        return $arr1;
    }else{
        return false;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $re1=login($_POST[user],$_POST[pword]);
    if($re1){
        $_SESSION[login]=1;
        $_SESSION[user]=$re1[0][user];
        $_SESSION[type]=$re1[0][type];
        $logErr="登陆成功!".$_SESSION[user]."您好!";
    }
    else{
        $logErr="用户名或者密码错误";
    }
}
$pdh=null;
?>
<html>
<link rel="stylesheet" type="text/css" href="../style.css">
<style>
    #BG{
        margin:100px auto 0 auto;    
        width: 500px;
        border:2px red solid ;
        padding: 0 15px;
        border-radius: 8px;
        box-shadow: -5px 10px 5px #000000;
        text-align: center;
    }
</style>
<head>
    <?php if($_SESSION[login]==1){
        $logErr.="已经登录 一秒后跳转!";
        echo " <meta http-equiv='refresh'content='1;url=../index.php'> ";}
        ?>
        <script src="../jquery.js"></script>
        <link href="https://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="../style.css" rel="stylesheet">
        <script src="https://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.2.0/js/tab.min.js"></script>
        <title></title>
    </head>
    <body><?php suoyin(); ?>
        <div class="container">
            <div class="row"><!--title -->
                <div class="col-md-12 " id="title">
                    <h1>
                        投票
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9" id="main">
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
                                    <?php echo $logErr."<br>" ?>
                                    <input type="submit" value="登录">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php right_votes() ?>
            </div>
        </div>
        <div id="footer">
            QQ群:
        </div>
    </body>
    </html>