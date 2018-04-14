<?php
session_start();
if($_SESSION['login']=='success'){
    echo '{"status":"10001","message":"'.$_SESSION['userName'].'"}';
}else{
    echo '{"status":"20001","message":""}';
}
?>