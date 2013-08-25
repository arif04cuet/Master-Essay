<?php

include 'check.php';
include('../crud/class/mysql_crud.php');
include '../functions.php';
/*
 * Output
 */


$db = new Database();
$db->connect();

$where = '1=1';
$db->select('coupons', "*", NULL, $where, 'id desc');
$list = $db->getResult();
$aColumns = array('id', 'code', 'commision_amount', 'commision_type', 'valid_from', 'valid_to', 'status', 'edit');

$output = array(
    "aaData" => array()
);
$m = 1;
if ($db->numResults == 1)
    $list = array($list);
foreach ($list as $item)
{
    $row = array();
    for ($i = 0; $i < count($aColumns); $i++)
    {
	switch ($aColumns[$i])
	{
	    case 'id':
		$row[] = $m;
		$m++;
		break;
	    case 'edit':
		$row[] = '<a href="add-coupon.php?id=' . $item['id'] . '">Edit</a>';
		break;
	    case 'valid_from':
		$row[] = ($item['valid_from'] != '1970-01-01') ? $item['valid_from'] : 'date not set';
		break;
	    case 'valid_to':
		$row[] = ($item['valid_to'] != '1970-01-01') ? $item['valid_to'] : 'date not set';
		break;
	    default :
		$row[] = $item[$aColumns[$i]];
		break;
	}
    }
    $output['aaData'][] = $row;
}
echo json_encode($output);
?>