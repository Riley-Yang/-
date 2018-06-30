<?php
session_start();
header("content-type:text/html;charset=utf-8");
    $dpName=$_POST['dpName'];
    $dpPhone=$_POST['dpPhone'];
    $sjName=$_POST['sjName'];
    $sjPhone=$_POST['sjPhone'];
    $dpAddress=$_POST['dpAddress'];
    $dpImg=$_POST['dpImg'];
    $dnImg=$_POST['dnImg'];
    $dpImgName=$_FILES['dpImg']['name'];
    $dnImgName=$_FILES['dnImg']['name'];
    $dpImgKZ=strstr($dpImgName,".");
    $dnImgKZ=strstr($dnImgName ,".");
    $sjId=$_SESSION['sjId'];

    if(strstr(".jpg.png.gif.webp",$dpImgKZ) && strstr(".jpg.png.gif.webp",$dnImgKZ)){
            $dpImg=time()+rand(1,100000).$dpImgKZ;
            $dnImg=time()+rand(1,100000).$dnImgKZ;
            move_uploaded_file($_FILES['dpImg']['tmp_name'],'upload/sjinfo/'.$dpImg);
            move_uploaded_file($_FILES['dnImg']['tmp_name'],'upload/sjinfo/'.$dnImg);
            // 连接数据库
            include("../../common/php/conn.php");
            $rs1=mysql_query("select * from sjinfo where sjName='$sjName'");
            if(mysql_num_rows($rs1)){
                $rs=mysql_query("update sjinfo set sjName='$sjName',sjPhone='$sjPhone',dpName='$dpName',dpAddress='$dpAddress',dpPhone='$dpPhone',dpImg='$dpImg',dnImg='$dnImg' where sjPhone='$sjPhone'");
            }else{
                $rs=mysql_query("insert into sjinfo(sjName,sjPhone,dpName,dpAddress,dpPhone,dpImg,dnImg) values('$sjName','$sjPhone','$dpName','$dpAddress','$dpPhone','$dpImg','$dnImg')");
            }
            if($rs){
                    echo '{"status":10001,"message":"上传成功"}';
                }
            
    }else{
        echo '{"status":30001,"message":"文件格式不是.jpg.png.gif.webp"}';
    }
?>