<?php session_start(); 
include "../actions.php";
?>
<html>
<head>
<?php
$vid=$_GET[vid];
?>
<meta charset="UTF-8">
<script src="../jquery.js"></script>
<link href="https://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="../style.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.2.0/js/tab.min.js"></script>
<style>
.piao{
    height:20px;
    background-color: #c2d7fd;
}
</style>
<?php
$db=new pdoC;
    $get_aid=$db->pdo_pre("SELECT `a_name`, `a_quan` FROM `activities` WHERE `v_id` = ? ");
    $db->pdo_execute(array($vid));
    if(mysql_num_rows(mysql_query("SELECT * FROM `votes` WHERE `v_id` = '$vid'"))==0){
        $url="https://www.wf163.com/lxy/vote3.0/choose/choose.php";
        echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url=$url\">";}
    if(empty($get_aid)){$err= "投票为空";
    } else {
        while($row=mysql_fetch_array($get_aid))
    {
    $act[]=$row;
    }
    mysql_close($con);
    $num=1;
    foreach ($act as $key => $value) {
            $inner.="<tr><td>".$num."</td><td>".$value[0]."</td><td><div class='piao' style='width:".($value[1]*50)."'></div></td><td>".$value[1]."</td></tr>";
            $num+=1;
        }
    }
 ?>
</head>
<body> <?php suoyin(); ?>
<div class="container">
<div class="row">
                <div class="col-md-12 " id="title">
                    <h1>
                        投票
                    </h1>
                </div>
            </div>
            <div class="row">
            <div class="col-md-9" ><?php echo $err; ?>
            <table class="table table-hover">
                    <thead><tr>
                            <th width="5%" >序号</th>
                            <th width="10%">名称</th>
                            <th width="80%">票型</th>
                            <th width="5%" >票数</th>
                        </tr></thead>
            <tbody>
                    <?php echo $inner;
                    ?>
                    </tbody>
                </table>
                <a href="../choose/choose.php">返回</a>
                <?php
                if($_SESSION['type']==1){
                    echo "<a href='../admin/add_a.php?vid=".$vid."'>管理</a>";
                }
                ?>

            </div>
            <?php right_votes() ?>
        </div>
</div>
    </div>
    <div id="footer">
    </div>
</body>
