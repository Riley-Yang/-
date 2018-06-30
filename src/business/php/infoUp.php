<?php
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
$caiId=$arr["caiId"];
$caiName=$arr["caiName"];
$caiPrice=$arr["caiPrice"];
$hePrice=$arr["hePrice"];
$dang=$arr["dang"];
$max=$arr["max"];
$caiStyle=$arr["caiStyle"];
include("../../common/php/conn.php");
$rs=mysql_query("update foodmenu set caiName='$caiName',caiStyle='$caiStyle',caiPrice='$caiPrice',hePrice='$hePrice',dang='$dang',da='$max',time=now() where caiId='$caiId'");
if($rs>0){
    echo '{"status":"10001"}';
}
?>