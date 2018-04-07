<?php
session_start();
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
$userName=$arr['userName'];
$password=$arr['password'];
include("./conn.php");
$rs=mysql_query("insert into users(userName,passwd)values('$userName','$password')");
if($rs){
    $_SESSION['userName']=$userName;
    $_SESSION['login']='success';
    echo '{"status":"10001","message":"注册成功"}';
}else{
    echo '{"status":"20001","message":"注册失败"}';
};
?>