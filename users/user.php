<?php
function register($ip,$user,$pw){//注册需要帐号名称和密码,加入ip为了控制注册数量
	$pword=md5($pw.$user);//两次md5加密
	$query1="SELECT * FROM `users` WHERE `ip` = '$ip'";
	if(mysql_num_rows(mysql_query($query1))){
		return "had registered!";
	} else {
		$query2="INSERT INTO `vote`.`users` ( `ip`, `user`, `pw`,`type`) VALUES ( 'ip', '$user', '$pword','0')";
		mysql_query($query2);
		return "register success!";
	}
}
function login($user,$pw){
	$pword=md5($pw.$user);
	$query1="SELECT * FROM `users` WHERE `user` LIKE '$user'";
	$result1=mysql_query($query1);
	$arr1=mysql_fetch_array($result1);
	if($arr1[pw]==$pword){
		return $arr;
	}else{
		return false;
	}
}
