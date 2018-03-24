<?php
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
$userName=$arr["userName"];
$password=$arr["password"];
//连接数据库
include("../conn.php");
//4.发送select,并且返回结果集对象（结果表+指针，指针默认指向第一条记录）
$rs=mysql_query("select * from users where userName='$userName' and password='$password'");
//5.判断返回的结果集有几条记录
$num=mysql_num_rows($rs);
if($num>0){
	echo '{"status":"10001","message":"success"}';
}else{
	echo '{"status":"20001","message":"用户名或密码错误"}';
}
?>