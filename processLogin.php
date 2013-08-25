<?php

session_start();
include('crud/class/mysql_crud.php');
include 'functions.php';
$db = new Database();
$db->connect();
$email = mysql_real_escape_string($_POST['email']);
$password = md5(mysql_real_escape_string($_POST['password']));


// Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$where = "email='" . $email . "' and password = '" . $password . "' and status=1";
$db->select('customers', 'id,email', NULL, $where, 'id DESC');
$user = $db->getResult();
if (!empty($user))
{
    $_SESSION['frontend']['username'] = $user['email'];
    header('Location: user-profile.php');
    exit;
}
else
{
    $msg = 'Email/Password did not match';
    header('Location: login.php?msg=' . $msg);
    exit;
}
exit;
?>
