<?php
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组

include("../../common/php/conn.php");

$rs=mysql_query("select styleName from foodstyle");
$count=mysql_num_rows($rs);

while($arr=mysql_fetch_array($rs)){
    $a=0;
    echo '{"status":"10001","message":"'.$arr[$a].'"};';
    $a++;
}
?>