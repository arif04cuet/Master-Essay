<?php

session_start();
if (!$_SESSION['admin']['username'])
{
    header('Location: login.php');
    exit;
}
?>
