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
$db->select('services', "*", NULL, $where, 'id desc');
$list = $db->getResult();
$aColumns = array('id', 'name', 'description', 'edit', 'price');

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
		$row[] = '<a href="add-service.php?id=' . $item['id'] . '">Edit</a>';
		break;
	    case 'price':
		$row[] = '<a href="service-price-list.php?service_id=' . $item['id'] . '">Show Price</a>';
		break;
	    case 'description':
		$row[] = (strlen($item['description']) > 100) ? substr($item['description'], 0, 100) : $item['description'];

		break;
	    default :
		$row[] = $item[$aColumns[$i]];
		break;
	}
    }
    $output['aaData'][] = $row;
}
echo json_encode($output);
exit;
?>