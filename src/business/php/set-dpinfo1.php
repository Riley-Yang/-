<?php
// session_start();
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组

    $sjId=$arr['sid'];
    $dpName=$arr['dpName'];
    $dpPhone=$arr['dpPhone'];
    $sjName=$arr['sjName'];
    $sjPhone=$arr['sjPhone'];
    $dpAddress=$arr['dpAddress'];
    $yState=$arr['yState'];
    // 连接数据库
    include("../../common/php/conn.php");
    $rs=mysql_query("update sjinfo set sjName='$sjName',sjPhone='$sjPhone',dpName='$dpName',dpAddress='$dpAddress',dpPhone='$dpPhone',yState='$yState' where sid='$sjId'");
// if(mysql_num_rows($rs)){
            echo '{"status":10001,"message":"上传成功"}';
    // }

?>