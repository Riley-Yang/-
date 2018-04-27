<?php
header("content-type:text/html;charset=utf-8");
// $arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
// $userName=$arr['userName'];
// $password=$arr['password'];
include("./conn.php");
$style=mysql_query("select styleName from foodstyle");
$rs=mysql_query("select caiName,caiStyle,caiPrice,caiImg,styleName from foodmenu,foodstyle where foodmenu.caiStyle=foodstyle.styleId");
$num=mysql_num_rows($rs);
while($arr=mysql_fetch_array($rs)){
    $a=0;
    echo '{"caiName":"'.$arr['caiName'].'","caiStyle":"'.$arr['caiStyle'].'","caiPrice":"'.$arr['caiPrice'].'","styleName":"'.$arr['styleName'].'","caiImg":"'.$arr['caiImg'].'"};';
    $a++;
}
?>