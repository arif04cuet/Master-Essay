<?php include 'crud/class/mysql_crud.php'; ?>
<?php include 'functions.php'; ?>
<?php

error_reporting(E_ERROR);
$loggedCustomer = loggedInUser();
$db = new Database();
$db->connect();

$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : NULL;
$where = 'orders.id="' . $order_id . '" and orders.customer_id = c.id and c.id=' . $loggedCustomer['id'];
$db->select('orders', 'orders.id,orders.customer_id,c.email', 'customers c', $where);
$order = $db->getResult();
if ($order_id == NULL || ($order['email'] != $_SESSION['frontend']['username']))
{
    header('Location: my-orders.php');
    exit;
}

//get file from order-details table
$fileId = base64_decode($_GET['file_id']);
$where = 'id=' . $fileId;
$db->select('order_details', '*', NULL, $where);
$orderDetails = $db->getResult();


$file = 'admin/upload/orders/' . $orderDetails['document'];
if (file_exists($file))
{
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}
?>
