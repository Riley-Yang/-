<?php
session_start();
if($_SESSION['login']=="success"){
    echo '{"status":"10001"}';
}
?>