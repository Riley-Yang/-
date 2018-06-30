<?php
    // food.shtml  按条件搜索
    session_start();
    header("content-type:text/html;charset=utf-8");
    // $arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
    // $value=$arr["value"];
    $sjId=$_SESSION['sjId'];
    include("../../common/php/conn.php");
    //4.发送select,并且返回结果集对象（结果表+指针，指针默认指向第一条记录）
    $rs=mysql_query("select * from sjinfo where sid='".$_SESSION['sjId']."'");
    $num=mysql_num_rows($rs);
    while($arr=mysql_fetch_array($rs)){
            echo '{"sid":"'.$arr['sid'].'","dpName":"'.$arr['dpName'].'","dpPhone":"'.$arr['dpPhone'].'","sjName":"'.$arr['sjName'].'","sjPhone":"'.$arr['sjPhone'].'","dpAddress":"'.$arr['dpAddress'].'","yState":"'.$arr['yState'].'","dpImg":"'.$arr['dpImg'].'","dnImg":"'.$arr['dnImg'].'"}';
    }
?>