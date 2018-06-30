<?php
session_start();
if(!$_GET['timed']) exit();  
date_default_timezone_set("PRC");  
set_time_limit(0);//无限请求超时时间   
$timed = $_GET['timed'];
$sjId=$_SESSION['sjId'];
include("../../common/php/conn.php");
while (true) {  
    sleep(1); 
    $sql="select cName,danId,uName,uPhone,cNum,cPrice,address,xTime,sTime,note from orders where danState='0' and sId='$sjId'";
    $rs=mysql_query($sql);
    $test=mysql_fetch_array($rs);
    if ($test) { 
        $responseTime = time();
        $count=mysql_num_rows($rs);
        while($arr=mysql_fetch_array($rs)){
            $str .= '{"sjId":"'.$sjId.'","danId":"'.$arr['danId'].'","cName":"'.$arr['cName'].'","cNum":"'.$arr['cNum'].'","cPrice":"'.$arr['cPrice'].'","uName":"'.$arr['uName'].'","uPhone":"'.$arr['uPhone'].'","address":"'.$arr['address'].'","xTime":"'.$arr['xTime'].'","sTime":"'.$arr['sTime'].'","note":"'.$arr['note'].'"};';
            // $str .= '{"sjId":"123","danId":"123","cName":"123","cNum":"123","cPrice":"123","uName":"123","uPhone":"123","address":"123","xTime":"123","sTime":"123","note":"123"};';
        }
        echo $str;
        exit();  
    } else { // 模拟没有数据变化，将休眠 hold住连接
        sleep(13);   
        exit();  
    }  

    

    
}
?>