<?php

session_start();
include 'check.php';
include('crud/class/mysql_crud.php');
include 'functions.php';
/*
 * Output
 */

$customer = loggedInUser();
$db = new Database();
$db->connect();

$where = 'customer_id=' . $customer['id'];
$db->select('orders', "*", NULL, $where, 'id desc');
$orders = $db->getResult();
$aColumns = array('id', 'order_date', 'topic', 'type_document', 'urgency', 'number_of_pages', 'total', 'TRANSACTION_ID', 'status', 'pdf', 'details');

$output = array(
    "aaData" => array()
);
$m = 1;
if ($db->numResults == 1)
    $orders = array($orders);

foreach ($orders as $order)
{
    $row = array();
    for ($i = 0; $i < count($aColumns); $i++)
    {

	switch ($aColumns[$i])
	{
	    case 'status':
		$row[] = GetOrderStatus($order['status']);
		break;

	    case 'details':
		$row[] = '<a href="order-details.php?order_id=' . $order['id'] . '">Details</a>';
		$m++;
		break;
	    case 'total':
		$row[] = $order['total'] . ' ' . $order['currency'];
		break;
	    case 'pdf':
		$row[] = ($order['status'] == 1) ? '<a href="">Download</span>' : '<span>Not uploaded yet</span>';
		break;
	    default :
		$row[] = $order[$aColumns[$i]];
		break;
	}
    }
    $output['aaData'][] = $row;
}
echo json_encode($output);
?>