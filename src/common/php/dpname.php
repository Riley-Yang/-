<?php
session_start();
header("content-type:text/html;charset=utf-8");
$sjId=$_POST['sjId'];
// echo $sjId;
include("conn.php");
//4.发送select,并且返回结果集对象（结果表+指针，指针默认指向第一条记录）
$rs=mysql_query("select * from sjinfo where sid='$sjId'");
//echo $rs;
//5.判断返回的结果集有几条记录
$num=mysql_num_rows($rs);
while($arr=mysql_fetch_array($rs)){
    echo '{"dpName":"'.$arr['dpName'].'"}';
}
?>