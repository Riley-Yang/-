<?php
// 删除session
session_start();
session_destroy();
echo '{"status":"10001"}';
?>