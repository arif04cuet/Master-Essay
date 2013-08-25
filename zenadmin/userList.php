<?php

include 'check.php';
include('../crud/class/mysql_crud.php');
include '../functions.php';
/*
 * Output
 */

$db = new Database();
$db->connect();
$db->select('customers');
$customers = $db->getResult();
$aColumns = array('id', 'name', 'email', 'country', 'phone');

$output = array(
    "aaData" => array()
);
$m = 1;
if ($db->numResults == 1)
    $customers = array($customers);

foreach ($customers as $customer)
{
    $row = array();
    for ($i = 0; $i < count($aColumns); $i++)
    {

        switch ($aColumns[$i])
        {
            case 'name':
                $row[] = $customer['first_name'] . ' ' . $customer['last_name'];
                break;
            case 'id':
                $row[] = $m;
                $m++;
                break;
            default :
                $row[] = $customer[$aColumns[$i]];
                break;
        }
    }
    $output['aaData'][] = $row;
}
echo json_encode($output);
?>