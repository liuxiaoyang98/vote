<?php
include 'db.php';
function suoyin(){
$pdo=new pdoC;
    echo "<div class='row' id='upper'>";
        if($_SESSION[login]==1){
            echo "<div class='col-md-8 text-right'><h4>".$_SESSION[user]."您好,请您<a href='/lxy/vote3.0/users/logout.php?url=".$_SERVER['PHP_SELF']."'>退出</a></h4></div>";
        }else{
            echo "<div class='col-md-8 text-right'><h4>游客您好 请您<a href='/lxy/vote3.0/users/reg.php?url=".$_SERVER['PHP_SELF']."'>注册</a>或者<a href='/lxy/vote3.0/users/login.php?url=".$_SERVER['PHP_SELF']."'>登录</a></h4></div>";
        }
    $get_vname = $pdo->query("SELECT * FROM `votes`");
    $vname=$pdo->pdo_fetch($get_vname);
	$pdo->close();
	$pdo=null;
    $suoyin="<div class='col-md-4' id='upper2'><ul class='nav nav-pills '>";
    $suoyin.="<li role = 'presentation'><a href='/lxy/vote3.0/index.php'>首页</a></li>";
    $suoyin.="<li role = 'presentation' class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>项目<span class='caret'></span></a>";
    $suoyin.="<ul class='dropdown-menu'>";
    foreach ($vname as $key => $value) {
        $suoyin.="<li><a href='/lxy/vote3.0/voting/index.php?vid=".$value[0]."'>".$value[1]."</a></li>";
    }
    $suoyin.="</ul></li></ul></div></div>";
	echo $suoyin;
}
function right_votes(){
	$pdo=new pdoC;
    $get_vname = $pdo->query("SELECT * FROM `votes`");
    $vname=$pdo->pdo_fetch($get_vname);
	$pdo->close();
	$pdo=null;
    $right="<div class='col-md-3' id='right'><ul id='right' class='nav'>";
    foreach ($vname as $key => $value) {
        $right.="<li><a href='/lxy/vote3.0/voting/index.php?vid=".$value[0]."'>".$value[1]	."</a></li>";
    }
    $right.="</ul></div>";
    echo $right;
}