<?php

session_start();
include 'functions.php';
include('crud/class/mysql_crud.php');

$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
	strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if ($_POST)
{
    if (isset($_POST['page']) and $_POST['page'] == 'place-order' and isset($_POST['action']))
    {
	$prices = getUnitPrice($_POST);
	$level = $_POST['level'];
	$no_of_page = $_POST['number_of_pages'] ? $_POST['number_of_pages'] : 1;
	$page_summery = isset($_POST['page_summery']) ? 1 : 0;
	//$spacing_value = ($_POST['spacing'] == 'Single Spaced') ? 2 : 1;
	//1-page summery amount
	$one_page_summary = 19.99;
	$unit = 0;
	if ($level == 'Standard Quality')
	{
	    $unit = $prices['standard'];
	}
	else if ($level == 'Premium Quality')
	{
	    $unit = $prices['premium'];
	}
	else if ($level == 'Platinum Quality')
	{
	    $unit = $prices['platinum'];
	}

	//total amount
	$total = $unit * $no_of_page;

	//add $19.99 for page summmary
	$page_summery = ($page_summery) ? $one_page_summary : 0;
	$total = $total + $page_summery;
	//add 20% of total amount
	if ($_POST['preferred_writers_id'] != '')
	{
	    $twenty_percent = ($total * 20) / 100;
	    $total = $total + $twenty_percent;
	}


	$cuarency_value = 1;
	if ($_POST['currency'] != 'USD')
	{
	    $data = currency('USD', $_POST['currency'], 1);
	    $data = explode('"', $data);
	    $cuarency_value = number_format(floatval($data[3]), 2);
	}
	$prices['cost_per_unit'] = number_format($unit * $cuarency_value, 2);
	$prices['total'] = number_format($total * $cuarency_value, 2);


	//save to session
	$_SESSION['order']['cost_per_page'] = $prices['cost_per_unit'];
	$_SESSION['order']['total'] = $prices['total'];


	//Totals
	$standard = $prices['standard'];
	$premium = $prices['premium'];
	$platinum = $prices['platinum'];

	$prices['one_page_summary'] = number_format($one_page_summary * $cuarency_value, 2);
	$prices['standard'] = number_format($standard * $cuarency_value, 2);
	$prices['premium'] = number_format($premium * $cuarency_value, 2);
	$prices['platinum'] = number_format($platinum * $cuarency_value, 2);

	$prices['standard_total'] = number_format((($standard * $no_of_page) + $page_summery) * $cuarency_value, 2);
	$prices['premium_total'] = number_format((($premium * $no_of_page) + $page_summery) * $cuarency_value, 2);
	$prices['platinum_total'] = number_format((($platinum * $no_of_page) + $page_summery) * $cuarency_value, 2);

	echo json_encode($prices);
	exit;
    }
    if (isset($_POST['action']) and $_POST['action'] == 'regenerateUrgencyList')
    {
	$doctype = $_POST['docType'];
	$selected = $_POST['selected'];
	$list = getUrgencyList($doctype);
	$options = '';
	foreach ($list as $val)
	{
	    $options.='<option value="' . $val . '" >' . $val . '</option>';
	}
	echo $options;
	exit;
    }
    if (isset($_POST['page']) and $_POST['page'] == 'order_preview' and isset($_POST['action']))
    {
	echo $queryString = http_build_query($_SESSION['order']) . "\n";
	exit;
    }
    if (isset($_POST['action']) and $_POST['action'] == 'getUrgenList')
    {
	$doctype = $_POST['doc_type'];
	$list = getUrgencyList($doctype);
	pr($list);
	exit;
    }
    if (isset($_POST['page']) and $_POST['page'] == 'check_price')
    {
	$db = new Database();
	$db->disconnect();
	$db->connect();

	$postedData = $_POST;
	$currency = mysql_real_escape_string($_POST['currency']);
	$no_of_page = $postedData['number_of_pages'] = $_POST['number_of_pages'] ? $_POST['number_of_pages'] : 1;
	$doctype = mysql_real_escape_string($_POST['type_document']);

	$table = '<table class="table table-bordered table-condensed price-list">';
	$table .= '<tr><th>Urgency</th><th>Standard Quality</th><th>Premium Quality</th><th>Platimum Quality</th></tr>';



	$where = 's.name="' . $doctype . '" and s.id=products.service_id';
	$db->select('products', 'urgency,standard,premium,platinum', 'services s', $where, 's.id DESC');
	$products = $db->getResult();
	//$sql = 'select * from products p inner join services s on (p.service_id = s.id) where s.name="' . $doctype . '" and p.urgency="' . $urgency . '" limit 1';
	$data = "";
	$i = 20;

	//get Currency value
	$currency_value = 1;
	if ($currency != 'USD')
	{
	    $cData = currency('USD', $currency, 1);
	    $cData = explode('"', $cData);
	    $currency_value = number_format(floatval($cData[3]), 2);
	}
	foreach ($products as $item)
	{

	    $postedData['urgency'] = $item['urgency'];
	    $data.='
		<tr>
		    <td>' . $item['urgency'] . '</td>';
	    foreach ($item as $key => $val)
	    {
		$val = ($val * $no_of_page) * $currency_value;
		$val = number_format($val, 2);
		if ($key == 'urgency')
		    continue;

		$postedData['level'] = ucfirst($key) . ' Quality';
		$data.='<td><a href = "place-order.php?' . getQueryStringForPrice($postedData) . '"><span class = "cur-symble">' . getCurrencySymble($currency) . '</span><span class = "value">' . $val . '</span></a></td>';
	    }
	    $data.='</tr>';
	}
	$table.=$data;
	$table.='</table>';
	echo $table;
	exit;
    }
}
exit;

