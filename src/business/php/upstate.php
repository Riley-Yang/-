<?php
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
$danId=$arr['danId'];
include("../../common/php/conn.php");

$rs=mysql_query("update orders set danState='1' where danId='$danId'");
if($rs){
    echo '{"status":"10001","sjId":"'.$arr['sjId'].'","danId":"'.$arr['danId'].'"}';
}
?>