<?php
session_start();
header("content-type:text/html;charset=utf-8");
$name=$_GET['name'];
$sex=$_GET['sex'];
$phone=$_GET['phone'];
$address=$_GET['addres'];
echo $_SESSION['userName'];
include("./conn.php");
$rs=mysql_query('update users set address="'.$address.'",phone="'.$phone.'",sex="'.$sex.'" where userName="'.$_SESSION['userName'].'"');
if($rs){
    echo '{"status":"10001","message":"添加地址成功"}';
}else{
    echo '{"status":"20001","message":"添加地址失败"}';
};
?>