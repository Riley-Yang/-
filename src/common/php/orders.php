<?php
// xf-confirm.html
session_start();
header("content-type:text/html;charset=utf-8");
// echo $_SESSION['userName'];
if($_SESSION['userName']!=""){

    $arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
    $cai=$arr['cai'];
    $sjId=$arr['sId'];
    $caiSum=$arr['caiSum'];
    $address=$arr['address'];
    $payStyle=$arr['payStyle'];
    $note=$arr['note'];
    $stime=$arr['time'];
    // 订单ID
    $danId=$newFileName=time()+rand(1,100000);
    include("conn.php");
    

    $en_json=json_encode($cai);
    $de_json=json_decode($en_json,TRUE);
    $count_json=count($de_json);

    for($i=0;$i<$count_json;$i++){
        $caiNum[$i]="'".$de_json[$i][caiNum]."'";
        $caiPrice[$i]="'".$de_json[$i][caiPrice]."'";
        $caiId[$i]="'".$de_json[$i][caiId]."'";
        $caiName[$i]="'".$de_json[$i][caiName]."'";
                    
        $sql="insert into orders(sId,cId,cName,danId,uName,uPhone,cNum,cPrice,address,xTime,sTime,payStyle,note,danState)values('$sjId',$caiId[$i],$caiName[$i],'$danId','".$_SESSION['userName']."','uPhone',$caiNum[$i],$caiPrice[$i],'$address',now(),'$stime','$payStyle','$note','0')";
        
        $rs=mysql_query($sql);
    };

    if($rs){
        echo '{"status":"10001","message":"下单成功"}';
    }else{
        echo '{"status":"20001","message":"下单失败"}';
    };
}else{
    echo '{"status":"30001"}';
}
?>