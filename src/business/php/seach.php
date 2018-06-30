<?php
    // food.shtml  按条件搜索
    header("content-type:text/html;charset=utf-8");
    $arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
    $value=$arr["value"];

    include("../../common/php/conn.php");
    //4.发送select,并且返回结果集对象（结果表+指针，指针默认指向第一条记录）
    $rs=mysql_query("select * from foodmenu where caiName like '%$value%'");
    $num=mysql_num_rows($rs);
    while($arr=mysql_fetch_array($rs)){
            echo '{"caiId":"'.$arr['caiId'].'","caiName":"'.$arr['caiName'].'","caiStyle":"'.$arr['caiStyle'].'","caiPrice":"'.$arr['caiPrice'].'","hePrice":"'.$arr['hePrice'].'","dang":"'.$arr['dang'].'","max":"'.$arr['da'].'","styleName":"'.$arr['styleName'].'","caiImg":"'.$arr['caiImg'].'","time":"'.$arr[time].'"};';
    }
?>