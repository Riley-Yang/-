<?php
// 解决跨域问题
// session_start();
header("Access-Control-Allow-Origin:*");
// 向前台返回的数据类型为JSON
header("Content-type:text/json");
header("content-type:text/html;charset=utf-8");
// if($_SERVER['ERQUEST_METHOD']=="POST"){
    $fileName=$_FILES['file']['name'];
    $fileSize=$_FILES['file']['size'];
    $fileNamekz=strstr($fileName,'.');
	// $fileNewName=substr($fileName,0,strlen($fileName)-4).time().rand(1,10000).strstr($fileName,".");
	// $_SESSION['imgName']=$fileNewName;
    if($fileSize<2097152){
		if(strstr(".jpg.png.gif.webp",$fileNamekz)){
		move_uploaded_file($_FILES['file']['tmp_name'],'.\\upload\\'.$fileName); 
		include("../../common/php/conn.php");
		$num=mysql_query("insert into foodmenu(caiImg) values('$fileName')");
		if($num>0){
			echo '{"status":"10001","message":"图片上传成功","imgName":"'.$fileNewName.'","namekz":"'.$fileNamekz.'"}';
			}else{
			echo '{"status":"20001","message":"图片上传失败"}'; 	
				}
			}else{
				echo '{"status":"30001","message":"图片格式必须是.gif | .jpg | .npg | .webp"}'; 
				}
	 }else{
		echo '{"status":"40001","message":"图片大小超过2M"}'; 
	 };
?>