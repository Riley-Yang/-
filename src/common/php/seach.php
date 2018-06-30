<?php
header("content-type:text/html;charset=utf-8");
$seach=$_POST['seach'];
include("./conn.php");
$rs=mysql_query("select * from foodmenu where caiName like '%$seach%'");
$num=mysql_num_rows($rs);
    while($arr=mysql_fetch_array($rs)){
        echo '{"sjId":"'.$arr['sjId'].'","caiName":"'.$arr['caiName'].'","caiPrice":"'.$arr['caiPrice'].'","caiImg":"'.$arr['caiImg'].'"};';
    }
?>