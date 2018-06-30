<?php
session_start();
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
    $tpwd=$_POST['data'];
    // 连接数据库
    // echo $tpwd;
    include("../../common/php/conn.php");
    $sjName=$_SESSION['userName'];
    // echo $sjName;
    $rs=mysql_query("update sjinfo set sjPwd='$tpwd' where sjName='$sjName'");
// echo "update sjinfo set sjName='$sjName',sjPhone='$sjPhone',dpName='$dpName',dpAddress='$dpAddress',dpPhone='$dpPhone',yState='$yState' where sid='$sjId'";    
// if(mysql_num_rows($rs)){
            echo '{"status":10001}';
    // }

?>