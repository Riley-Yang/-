<?php
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
$caiId=$arr["caiId"];
include("../../common/php/conn.php");
$rs=mysql_query("delete from foodmenu where caiId='$caiId'");
if($rs>0){
    echo '{"status":"10001"}';
}
?>