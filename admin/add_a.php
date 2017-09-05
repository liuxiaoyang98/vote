<?php session_start();
include "../actions.php";  ?>
<html>
<title></title>
<script src="../jquery.js"></script>
<link href="https://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="../style.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.2.0/js/tab.min.js"></script>
<style type="text/css">
    .table>tbody>tr:hover>td,.table>tbody>tr:hover>th {
    background-color:#f5f5f5
}
.table>thead>tr>th,.table>tbody>tr>th,.table>thead>tr>td,.table>tbody>tr>td{
    padding:8px;
    line-height:1.42857143;
    vertical-align:top;
    border-top:1px solid #ddd
}
.table{
    width:100%;
    padding: auto;
}
.add{
    position: absolute;
    height:25px;
    width:100px;
    margin: 10px;
    font-size: 20px;
    padding: 10px 10px 10px 10px;
}
.add_hide{
    display: none;
    height:30px;
    position:relative;
    top:45px;
}
.change_time{
    position: absolute;
    left:220px;
    height:25px;
    height:25px;
    width:150px;
    margin: 10px;
    font-size: 20px;
    padding: 10px 10px 10px 10px;
}
.change_time_hide{
    display: none;
    height:30px;
    position:relative;
    top:45px;
}
.del{
    position: absolute;
    left:110px;
    height:25px;
    width:100px;
    margin: 10px;
    font-size: 20px;
    padding: 10px 10px 10px 10px;
    z-index: 2;
}
.del_hide{
    display: none;
    height:30px;
    position:relative;
    top:45px;
    margin-bottom: 10px;
}
[table]{
    margin:10px;
}
</style>
<head>
    <?php
    $ip1=$_SERVER["REMOTE_ADDR"];
    $vid=$_GET[vid];
    $pdo=new pdoC;
    $votes=$pdo->pdo_pre("SELECT * FROM `votes` WHERE `v_id` = ? ");
    $pdo->pdo_execute(array($vid));
    if(empty($pdo->pdo_fetch($votes))){
        $url="https://www.wf163.com/lxy/vote3.0/choose/choose.php";
        echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url=$url\">";}
        else{
            $time=$pdo->pdo_fetch($votes)[v_time];
        $get_aid=$pdo->pdo_pre("SELECT * FROM `activities` WHERE `v_id` = ?");
        $pdo->pdo_execute(array($vid));
        $act=$pdo->pdo_fetch($get_aid);
        $pdo->close();
        $pdo=null;
        $num=1;
        foreach ($act as $key => $value) {
            $inner.="<tr><td>".($num)."</td><td>".$value[2]."</td><td><input name='submit[]' type='checkbox' value='".$value[0]."'></td></tr>";
            $num+=1;
        }}
        ?>
<script type="text/javascript">
    
$(document).ready(function(){
    $(".add").click(function(){
        $(".add_hide").slideToggle("slow");
    });
});
$(document).ready(function(){
    $(".del").click(function(){
        $(".del_hide").slideToggle("slow");
    });
});
$(document).ready(function(){
    $(".change_time").click(function(){
        $(".change_time_hide").slideToggle("slow");
    });
});
</script>
</head>
<body>
        <?php 
        suoyin();
        ?>
    <div class="container">
            <div class="row">
                <div class="col-md-12 " id="title">
                    <h1>
                        投票
                    </h1>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-9" >
                <form action="/lxy/vote3.0/submit/form.php?vid=<?php echo $vid ?>" method="POST" name="submits">
            <table class="table">
                    <thead><tr>
                            <th width="5%" >序号</th>
                            <th width="80%">选项</th>
                            <th width="5%" >按钮</th>
                        </tr></thead>
            <tbody>
                            <?php echo $inner;
                            if(mysql_num_rows($get_aid)){
                                $now=date("y-m-d");
                                if(strtotime($time)==0){
                                    $alert="<td></td><td style='color:red;'>日期错误 请通知管理员修改".$time."</td><td></td>";
                                }else{
                                if(strtotime($now)>strtotime($time))
                                    $alert="<td></td><td style='color:red;'>截止日期:".$time."此投票已到期</td><td><input class='btn btn-default disabled' type='submit'></td>";
                                else{
                                    $alert="<td></td><td>截止日期:".$time."</td><td><input class='btn btn-defa' type='submit'></td>";
                                }
                            }
                                echo $alert;
                            }
                            ?>
                    </tbody>
                </table>

                </form>
                <a class="back" href="../choose/choose.html">返回上一页</a>
                <a class="back" href=<?php echo "../view/index.php?vid=".$vid.""?>>查看结果</a>
                <?php
                if($_SESSION['type']==1){
                    echo "<div class='del'>删除一行</div>";
                    echo "<div class='change_time'>修改结束时间</div>";
                    echo "<div class='add'>添加一行</div>";
                    $add="<div class='add_hide'><form action='a_act/add.php?vid=".$vid."' method='POST' name='submit'><table class='table'><tbody><tr><td width='10%'>输入内容";
                    $add.="</td><td width='80%'><input type='text' name='name'></td><td width='10%'><input type='submit' value='添加'></td></tr></tbody></table></form></div><br>";
                    echo $add;
                    $del="<div class='del_hide'><form action='a_act/del.php' method='POST' name='submit'><table class='table'><tbody><tr><td width='10%'>请选择</td><td width='80%'><select name='num'>";$i=1;
                    foreach ($act as $key => $value){
                        $del.="<option value=".$value[0].">序号:".$i."   内容:".$value[2]."</option>";$i+=1;
                    }
                    $del.="</select></td><td width='10%'><input type='submit' value='删除'></td></tr></tbody></form></table></div>";
                    echo $del;
                    $change_time="<div class='change_time_hide'><form action='a_act/change_time.php?vid=".$vid."' method='POST' name='submit'><table class='table'><tbody><tr><td width='10%'>输入内容";
                    $change_time.="</td><td width='80%'><input type='date' name='change_time' value=".$time."></td><td width='10%'><input type='submit' value='修改'></td></tr></tbody></table></form></div><br>";
                    echo $change_time;
                }
                ?>
                </div>
<?php right_votes() ?>
                </div>
                </div>
                <div id="footer">
                QQ群:
        </div>
</body>
</html>
