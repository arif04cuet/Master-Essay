<?php
//session_start();
include 'check.php';
include('../crud/class/mysql_crud.php');
include 'functions.php';
/*
 * Output
 */

$db = new Database();
$db->connect();
$db->select('sample_essay', '*', NULL, '1=1', 'id desc');
$list = $db->getResult();
$aColumns = array('id', 'topic', 'type_document', 'urgency', 'pdf_file', 'update_date');

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
        if ($aColumns[$i] == "status")
        {
            /* Special output formatting for 'version' column */
            $row[] = ($item['status']) ? 'Enabled' : 'Disabled';
        }
        else if ($aColumns[$i] == "id")
        {
            $row[] = $m;
            $m++;
        }
        else if ($aColumns[$i] == "pdf_file")
        {
            $row[] = '<a target="_blank" href="upload/sample_essay/' . $item[$aColumns[$i]] . '">Download</a>';
            $m++;
        }
        else
        {
            $row[] = $item[$aColumns[$i]];
        }
    }
    $output['aaData'][] = $row;
}
echo json_encode($output);
exit;
?>