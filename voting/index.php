<?php session_start();
include "../actions.php";?>
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
    #upper{
        background:#D9B3E6;
        border-radius:4px;
        -moz-border-radius:4px
    }
    #title{
        background: #8192D6;
        border-radius:4px;
        moz-border-radius:4px;
        padding-left: 500px;
    }
    #footer{
        background: #444444;
        height:100px;
        padding-left: 366.5px;
        color: white;
    }
</style>
<head>
    <?php
    $ip1=$_SERVER["REMOTE_ADDR"];
    $vid=$_GET[vid];
    $db=new pdoC;
    $votes=$db->pdo_pre("SELECT * FROM `votes` WHERE `v_id` = ? ");
    $db->pdo_execute(array($vid));
    $check=$db->pdo_fetch($votes);
    if(empty($check)){
        $url="https://www.wf163.com/lxy/vote3.0/choose/choose.php";
        echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url=$url\">";}
        else{
            $get_aid=$db->pdo_pre("SELECT * FROM `activities` WHERE `v_id` = ?");
            $db->pdo_execute(array($vid));
            $act=$db->pdo_fetch($get_aid);
            $num=1;
            foreach ($act as $key => $value) {
                $inner.="<tr><td>".($num)."</td><td>".$value[2]."</td><td><input name='submit[]' type='checkbox' value='".$value[0]."'></td></tr>";
                $num+=1;
            }}
            $time=$check[0][2];
            ?>
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
                    <div class="col-md-9" ><form action="/lxy/vote3.0/submit/form.php?vid=<?php echo $vid ?>" method="POST" name="submits">
                        <div id='main'>
                            <table class="table">
                                <thead><tr>
                                    <th width="5%" >序号</th>
                                    <th width="80%">选项</th>
                                    <th width="5%" >按钮</th>
                                </tr></thead>
                                <tbody>
                                    <?php echo $inner;
                                    if(!empty($time)){
                                        $now=date("y-m-d");
                                        if(strtotime($time)==0){
                                            $alert="<td></td><td style='color:red;'>日期错误 请通知管理员修改</td><td></td>";
                                        }else{
                                            if(strtotime($now)>strtotime($time))
                                                $alert="<td></td><td style='color:red;'>截止日期:".$time."此投票已到期</td><td><input class='btn btn-default disabled' type='submit'></td>";
                                            else{
                                                $alert="<td></td><td>截止日期:".$time."</td><td><input class='btn btn-defa' type='submit'></td>";
                                            }
                                        }
                                        echo $alert;
                                    }
                                    $db->close();
                                    $db=null;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <a class="back" href="../choose/choose.php">返回上一页</a>
                    <a class="back" href=<?php echo "../view/index.php?vid=".$vid.""?>>查看结果</a>
                    <?php
                    if($_SESSION['type']==1){
                        echo "<a href='../admin/add_a.php?vid=".$vid."'>管理</a>";
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
