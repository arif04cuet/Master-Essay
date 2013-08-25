<?php

if (session_id() == '')
    session_start();
if (empty($_POST) and empty($_SESSION['order']['topic']))
{
    header('Location: place-order.php');
    exit;
}
?>
