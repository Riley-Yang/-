<?php
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
$caiName=$arr['caiName'];
$caiStyle=$arr['caiStyle'];
include("../../common/php/conn.php");

$rs=mysql_query("select caiName from foodmenu where caiName='$caiName' and caiStyle='$caiStyle' ");
$num=mysql_num_rows($rs);
if($num>0){
    echo '{"message":"该菜品已存在"}';
}
?>