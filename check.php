<?php

if (!$_SESSION['frontend']['username'])
{
    header('Location: index.php');
    exit;
}
?>
