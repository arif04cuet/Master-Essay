<?php

include('check_order.php');
include 'functions.php';
include 'crud/class/mysql_crud.php';
//save form data to session
$discount_amount = 0;
if ($_POST)
{
    unset($_SESSION['order']['page_summery']);
    foreach ($_POST as $field => $value)
    {
	$_SESSION['order'][$field] = $value;
    }
    //check for coupon code
    if (isset($_POST['discount_code']) and $_POST['discount_code'] != '')
    {
	$discount_amount = getDiscountAmount($_POST['discount_code']);
    }
    $_SESSION['order']['discount_amount'] = $discount_amount;
    header('Location: order_preview.php');
    exit;
}
?>

