<?php

session_start();
include('../crud/class/mysql_crud.php');
include '../functions.php';
$db = new Database();
$db->connect();
$username = mysql_real_escape_string($_POST['username']);
$password = md5(mysql_real_escape_string($_POST['password']));


// Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$where = "username='" . $username . "' and password = '" . $password . "' and type = 1 and status=1";
$db->select('users', 'id,username', NULL, $where, 'id DESC');
$user = $db->getResult();
if (!empty($user))
{
    $_SESSION['admin']['username'] = $user['username'];
    header('Location: index.php');
    exit;
}
else
{
    header('Location: login.php?action=failed');
    exit;
}
exit;
?>
