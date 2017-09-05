    <?php
	include '../db.php';
	$pdo=new pdoC;
    $get_vname=$pdo->query("SELECT * FROM `votes`");
    while($row=$pdo->pdo_fetch($get_vname,'num'))
    {
        $vname[$row[0]]=$row[1];
    }
	$pdo->close();
	$pdo=null;
    echo json_encode($vname);