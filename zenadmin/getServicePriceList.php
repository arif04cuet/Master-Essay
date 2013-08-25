<?php

include 'check.php';
include('../crud/class/mysql_crud.php');
include '../functions.php';
/*
 * Output
 */


$db = new Database();
$db->connect();
$service_where = (isset($_GET['service_id']) and $_GET['service_id']) ? 'products.service_id=' . $_GET['service_id'] : '1=1';

$where = 'products.service_id=s.id and ' . $service_where;
$db->select('products', "products.id,products.service_id,s.name,products.urgency,products.standard,products.premium,products.platinum", 'services s', $where, 'products.id desc');
$list = $db->getResult();
$aColumns = array('id', 'name', 'urgency', 'standard', 'premium', 'platinum', 'edit');

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
		$row[] = '<a href="add-service-price.php?service_id=' . $item['service_id'] . '&id=' . $item['id'] . '">Edit</a>';
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