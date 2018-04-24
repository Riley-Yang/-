<?php
header("content-type:text/html;charset=utf-8");

        $caiName=$_POST['caiName'];
        $caiDes=$_POST['caiDes'];
        $caiStyle=$_POST['caiStyle'];
        $caiPrice=$_POST['caiPrice'];
        $hePrice=$_POST['hePrice'];
        $dang=$_POST['dang'];
        $da=$_POST['da'];
        $fileName=$_FILES['imgFile']['name'];
        $fileNameKZ=strstr($fileName,".");
        // $gender=$_POST['gender'];
        if(strstr(".jpg.png.gif.webp",$fileNameKZ)){
		if($_FILES['spic']['size']<=512000){
			$newFileName=time()+rand(1,100000).$fileNameKZ;
            move_uploaded_file($_FILES['imgFile']['tmp_name'],'upload/'.$newFileName);
            // 连接数据库
            include("../../common/php/conn.php");
            $rs=mysql_query("insert into foodmenu(caiName,caiDes,caiStyle,caiPrice,hePrice,dang,da,caiImg,time) values('$caiName','$caiDes','$caiStyle','$caiPrice','$hePrice','$dang','$da','$fileName',now())");
            if($rs){
                echo	'{"status":10001,"message":"上传成功","fileName":"'.$newFileName.'"}';
            }
			
			}else{
				 echo	'{"status":20001,"message":"文件大小超过500KB"}';
				}
            }else{
                echo	'{"status":30001,"message":"文件格式不是.jpg.png.gif.webp"}';
                }
?>