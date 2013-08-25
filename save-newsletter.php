<?php

include('crud/class/mysql_crud.php');
include('functions.php');

$db = new Database();
$db->connect();

$email = mysql_real_escape_string($_POST['customerEmail']);
// Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$where = "email='" . $email . "' and status=1";
$db->select('newsletter_subscribers', '*', NULL, $where, 'id DESC');
$user = $db->getResult();

$msg = "";
if (!empty($user))
{
    $msg = 'User already exist with email ' . $email . ' ,choose another email.';
    header('Location: index.php?msg=' . $msg);
    exit;
}
else
{
    $user = array(
        'name' => mysql_real_escape_string($_POST['customerName']),
        'email' => mysql_real_escape_string($_POST['customerEmail'])
    );
    //save customer
    $record = $db->insert('newsletter_subscribers', $user);
    if (!$record)
    {
        $msg = "a Problem has been pccured,please try again later";
        header('Location: index.php?msg=' . $msg);
        exit;
    }
    header('Location: index.php?msg=success');
}
exit;
?>
