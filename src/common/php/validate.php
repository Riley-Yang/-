<?php
session_start();
if($_SESSION['login']=='success'){
    // echo '{"status":"10001","message":"'.$_SESSION['userName'].'"}';

    include("../../common/php/conn.php");

    $rs=mysql_query("select userName from users where userName='".$_SESSION['userName']."'");
    $count=mysql_num_rows($rs);

    while($arr=mysql_fetch_array($rs)){
        echo '{"status":"10001","userName":"'.$arr['userName'].'"}';
    }
}else{
    echo '{"status":"20001","message":""}';
}
?>