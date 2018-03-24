<?php
//1.建立php与mysql服务器的链接，并返回链接对象
$conn=mysql_connect("localhost","root","")or die("db connect error!");
//2.选择指定数据库
mysql_select_db("homework",$conn);
//3.设置支持中文
mysql_query("set name utf8");
?>