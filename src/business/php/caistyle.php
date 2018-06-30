<?php
session_start();  // 添加菜品信息页  显示菜品分类信息
header("content-type:text/html;charset=utf-8");
include("../../common/php/conn.php");
$sjId=$_SESSION['sjId'];
$rs=mysql_query("select styleId,styleName from foodstyle where sjId='$sjId'");
$count=mysql_num_rows($rs);

while($arr=mysql_fetch_array($rs)){
    echo '{"status":"10001","styleId":"'.$arr['styleId'].'","styleName":"'.$arr['styleName'].'"};';
}
?>