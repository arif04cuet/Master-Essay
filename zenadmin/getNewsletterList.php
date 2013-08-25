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
$db->select('newsletter_subscribers', "*", NULL, $where, 'id desc');
$list = $db->getResult();
$aColumns = array('id', 'name', 'email', 'subscription_date');

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
            default :
                $row[] = $item[$aColumns[$i]];
                break;
        }
    }
    $output['aaData'][] = $row;
}
echo json_encode($output);
?>