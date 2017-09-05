<?php session_start(); 
$_SESSION['admin']=0;
?>
<html>
<head>
    <title></title>
<script src="../jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="background">
            <div class="title">
                标题
            </div>
            <div class="inner">
                <div class="left">
                </div>
                <div class="center">
                <form action="<?php echo htmlspecialchars($_SERVER[PHP_SELF]);?>" method="post" name="pw">
                <input type="password" name="pw">
                <br><input type="submit">
                <?php
                    $pw1="www.wf163.com";
                    $pw2=$_POST["pw"];
                    if($pw1==$pw2){
                        $_SESSION['type']=1;
                    }
                    print_r($_SESSION);
                ?>
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