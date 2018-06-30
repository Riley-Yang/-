<?php
// xf-waimai.shtml
include("../../common/php/conn.php");

$rs=mysql_query("select sId,dpName,dpAddress from sjinfo where dpState=1 and yState=1");
$count=mysql_num_rows($rs);

while($arr=mysql_fetch_array($rs)){
    echo '{"status":"10001","sjId":"'.$arr['sId'].'","dpName":"'.$arr['dpName'].'","dpAddress":"'.$arr['dpAddress'].'"};';
}
?>