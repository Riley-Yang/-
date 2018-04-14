<?php
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
$styleName=$arr['styleName'];
$styleDes=$arr['styleDes'];
include("../../common/php/conn.php");
$rs=mysql_query("insert into foodstyle(styleName,styleDes) values('$styleName','$styleDes') ");
if($rs){
    echo '{"status":"10001","message":"'.$arr.'"}';
}else{
    echo '{"status":"20001","message":"上传失败"}';
}
?>