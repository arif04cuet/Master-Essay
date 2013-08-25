<?php

include('crud/class/mysql_crud.php');
include('functions.php');

$db = new Database();
$db->connect();

$email = mysql_real_escape_string($_POST['email']);
// Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$where = "email='" . $email . "' and status=1";
$db->select('customers', '*', NULL, $where, 'id DESC');
$user = $db->getResult();

$msg = "";
if (!empty($user))
{
    $msg = 'User already exist with email ' . $email . ' ,choose another email.';
    header('Location: user_registration.php?msg=' . $msg);
    exit;
}
else
{
    $customer = array();
    $customer['first_name'] = $_POST['first_name'];
    $customer['last_name'] = $_POST['last_name'];
    $customer['email'] = $_POST['email'];
    $customer['country'] = $_POST['country_code'];
    $customer['phone'] = $_POST['pcountry_code'] . '-' . $_POST['phone_no'] . '-' . $_POST['phone_type'];
    $password = $_POST['password'];
    $customer['password'] = md5($password);
    //save customer
    $record = $db->insert('customers', $customer);
    if (!$record)
    {
        $msg = "a Problem has been pccured,please try again later";
        header('Location: user_registration.php?msg=' . $msg);
        exit;
    }

    //Send Mail
    $customer['password'] = $password;
    $to = $customer['email'];
    $subject = 'New Account Information @ Master Essay';
    $msg = ForgotPasswordEmailTemplate($customer);
    $message = "<b>Congratulations!</b> you have successfully registered with Master essay<br/>";
    $sent = sendMail($subject, $msg, $to);
    if ($sent)
    {
        $message.='Account information has been sent to <b>' . $customer['email'] . '</b>';
    }
    header('Location: user_registration.php?msg=success&message=' . $message);
}
exit;
?>
