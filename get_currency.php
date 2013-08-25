<?php

session_start();
include 'functions.php';

if ($_POST and isset($_POST['page']) and $_POST['page'] == 'checkout')
{
    $return = array(
	'total' => 0,
    );
    $total = $_SESSION['order']['total'];
    $currency = $_SESSION['order']['currency'];
    $toCurency = $_POST['to'];

    $system_currency = getCurrentcyList();
    if (in_array($toCurency, $system_currency))
    {
	$data = currency($currency, $toCurency, 1);
	$data = explode('"', $data);
	$rate = number_format(floatval($data[3]), 2);

	$_SESSION['order']['total'] = number_format($total * $rate, 2);
	$_SESSION['order']['cost_per_page'] = number_format($_SESSION['order']['cost_per_page'] * $rate, 2);
	$_SESSION['order']['currency'] = $toCurency;
	$return['total'] = $_SESSION['order']['total'];
    }
    echo json_encode($return);
    exit;
}
else
{

    $data = currency($_POST['from'], $_POST['to'], 1);
    $data = explode('"', $data);
    echo number_format(floatval($data[3]), 2);
    exit;
}

