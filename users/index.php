<?php session_start(); ?>
<html>
<title>votes</title>
<link rel="stylesheet" href="style.css">
<head>
</head>
<body>
    <div class="container">
        <div class="background">
        <div>
        <?php 
        if($_SESSION[login]==1){
			echo $_SESSION[user]."您好";
		}else{
			echo "游客您好 请您<a href='users/ResLog.php?type=0'>注册</a>或者<a href='users/ResLog.php?type=1'>登录</a>";
        }?>
        </div>
            <div class="title">
                标题
            </div>
            <div class="inner">
                <div class="left">
                </div>
                <div class="center">
                    <div class="url">
                        <a class="href" href="choose/choose.php">我要投票</a>
                    </div>
                </div>
                <div class="right">
                </div>
            </div>
                <div class="footer">
                QQ群:
                </div>
        </div>
    </div>
</body>

</html>