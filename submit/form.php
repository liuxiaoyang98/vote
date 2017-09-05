<?php
session_start();
include '../db.php';
$db=new pdoC
$query1="UPDATE `activities` SET `a_quan` = `a_quan`+1 where a_id in (";
$vote=implode(',',$_POST[submit]);
$time=$db->pdo_fetch($db->query("SELECT * FROM `votes` WHERE `v_id` = '$_GET[vid]'"))[v_time];
$now=date("y-m-d");
if((strtotime($now)>strtotime($time))||(strtotime($time)==0)){
    return false;
}
foreach ($_POST[submit] as $key => $value) {
    $query1.=$value.",0";
}
$query1.=")";
$ip1=$_SERVER["REMOTE_ADDR"];
    if($_SESSION[login]==1){//已登录
        $query2="SELECT `id` FROM `users` WHERE `user` = ? ";
        $exeres2=$db->pdo_pre($query2);
        $db->pdo_execute($_SESSION[user]);
        $uid=$db->fetch($exeres2)["id"];
        $query3="SELECT `v_id` FROM `usersVote` WHERE `u_id` = '$uid' AND `v_id`='$_GET[vid]'";
        if($db->fetch($db->query($query3))){//userVote有id也有参加投票的记录 则显示已经投票
            echo "请不要重复投票!";
        }else{ //userVote表中没有参加完投票的记录
            $query4="INSERT INTO `vote`.`usersVote` (`u_id`, `v_id`, `votes`) VALUES ('$uid', '$_GET[vid]', '$vote')";
            $db-query($query1);
            $db->query($query4);//插入记录
            echo "投票成功";
        }
    }else{//user表中没有ip
        echo "您好 你没登录呢 请<a href='/lxy/vote/users/reg.php'>注册</a>或者<a href='/lxy/vote/users/login.php'>登录</a></div>";
    }
    $db->close();
    $db=null;
    echo "<a href='../view/index.php?vid=$_GET[vid]'>点我跳转</a>";
//    print_r($query2);
