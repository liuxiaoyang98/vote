<?php session_start();
include "../actions.php";
 ?>
<html>
<script src="../jquery.js"></script>
<link href="https://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="../style.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.2.0/js/tab.min.js"></script>
<style>
.add_v,.del_v{
    display: none;
    margin: 10px;
    font-size: 20px;
    padding: 10px 10px 10px 10px;
}
.add_v_hide{
    display: none;
    height:30px;
    position:absolute;
    top:590px;
    left:210px;
}
.append>a{
    display: block;
    height:50px;
    width:130px;
    float:left;
    margin: 50px;
    font-size: 10px;
    padding: 40px 0px 0px 30px;
}
.roww{
    height:200px;
    width:840px;
}
</style>
<head>
<script type="text/javascript">
$.ajax({
    url:"get_votes.php",
    datatype:"json",
    type:"GET",
    success: function(data){
        var inner="<div class='row'>";
        var n=0;
        data=eval("("+data+")");
        for (x in data){ 
            inner+='<div class="append" ><a href="../voting/index.php?vid='+x+'">投票内容:'+data[x]+'</a></div>';
            n+=1;
            if(n%3==0)
                inner+='</div><div class="roww">';
        }
        inner+='</div>';
        $('.items').html(inner);
    }
});
$(document).ready(function(){
    $(".add_v").click(function(){
        $(".add_v_hide").slideToggle("slow");
    });
    $("#Btn").click(function(){
        $(".add_v").slideToggle("slow");
    });
    $("#Btn").click(function(){
        $(".del_v").slideToggle("slow");
    });
});
</script>
</head>

<body><?php 
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
                <div class="items"></div>
                <?php 
                if($_SESSION[type]==1){
                    $admin="<div id='Btn'>管理</div><div class='add_v'>增加一个投票</div><form action='../admin/add_v.php' method='get' name='add_v'><div class='add_v_hide'>";
                    $admin.="<table><tr><td>输入投票标题:</td><td><input type='text' name='add_v'><input type='submit'></td><td><input type='date' name='time' value='2012-12-21'></td></tr></table></div></form>";
                    $admin.="<a href='../admin/v_del.php' class='del_v'>删除一个投票</a>";
                }
                echo $admin;
                ?>
                    </div>
                    <div>
                    <?php right_votes() ?>
                    </div>
                </div>
    </div>
                <div id="footer">
                QQ群:
                </div>
</body>
</html>