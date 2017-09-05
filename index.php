<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<title>投票2.0</title>
<link href="https://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<script src="jquery.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.2.0/js/tab.min.js"></script>
<head>
<style>
</style>
</head>
<body><?php 
        include "actions.php";
        suoyin();
        ?>
    <div class="container">
        <div class="row"><!--title -->
        <div class="col-md-12 " id="title">
            <h1>
                投票
            </h1>
            </div>
            </div>
            <div class="row" >
                <div class="col-md-9" id="main">
                    <div id="start">
                        <a class="btn btn-default btn-lg " href="choose/choose.php" role="buttom">我要投票</a>
                    </div>
                    </div>
                    <?php right_votes() ?>
                </div>
            </div>
                <div id="footer">
                页脚
                </div>
</body>

</html>