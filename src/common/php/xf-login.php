<?php
session_start();
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
$userName=$arr["userName"];
$password=$arr["password"];

//print_r($arr);	//打印数组
//echo $str=json_encode($arr);	//对数组进行编码
//连接数据库
include("conn.php");
//4.发送select,并且返回结果集对象（结果表+指针，指针默认指向第一条记录）
$rs=mysql_query("select * from users where userName='$userName' and passwd='$password'");
//echo $rs;
//5.判断返回的结果集有几条记录
$num=mysql_num_rows($rs);
if($num>0){
	$_SESSION['login']="success";
	$_SESSION['userName']=$userName;
	echo '{"status":"10001","message":"success"}';
}else{
	echo '{"status":"20001","message":"用户名或密码错误"}';
}
?>