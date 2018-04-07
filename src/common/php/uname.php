<?php
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
$userName=$arr['userName'];
$password=$arr['password'];
include("./conn.php");
$rs=mysql_query("select userName from users where userName='$userName'");
$num=mysql_num_rows($rs);
if($num>0){
    echo '{"status":"20001","message":"用户名被占用"}';
}else{
    echo '{"status":"10001","message":"此用户名可用"}';
};
?>