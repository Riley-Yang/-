<?php
// 删除session
session_start();
session_destroy();
header("Location: ../xf-wode.html");
?>