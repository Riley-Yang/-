<?php
//登录后请求用户名并显示  显示头像未写
session_start();
if($_SESSION['login']=='success'){
    echo '{"status":"10001","message":"'.$_SESSION['userName'].'"}';
}else{
    echo '{"status":"20001","message":""}';
}
?>