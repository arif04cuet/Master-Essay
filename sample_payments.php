<?php

include('check_order.php');
include 'crud/class/mysql_crud.php';
include 'functions.php';

// PayPal settings
$paypal_email = 'amazingtutors26@gmail.com';
$return_url = 'http://mastersessay.com/order_completed.php';
$cancel_url = 'http://mastersessay.com/order_cancel.php';
$notify_url = 'http://mastersessay.com/sample_payments.php';

$order_data = $_SESSION['order'];
$item_name = $order_data['topic'] . '-' . $order_data['type_document'] . '-' . $order_data['urgency'];
$item_amount = $order_data['total'];
$currentcy = $order_data['currency'];


//Database Connection
//$link = mysql_connect($host, $user, $pass);
//mysql_select_db($db_name);
// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"]) and isset($_POST['bn']))
{
    $querystring = '';
// Firstly Append paypal account to querystring
    $querystring .= "?business=" . urlencode($paypal_email) . "&";

// Append amount& currency (£) to quersytring so it cannot be edited in html
//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
    $querystring .= "item_name=" . urlencode($item_name) . "&";
    $querystring .= "amount=" . urlencode($item_amount) . "&";
    $querystring .= "currency_code=" . urlencode($currentcy) . "&";

//loop for posted values and append to querystring
    foreach ($_POST as $key => $value)
    {
	$value = urlencode(stripslashes($value));
	$querystring .= "$key=$value&";
    }

// Append paypal return addresses
    $querystring .= "return=" . urlencode(stripslashes($return_url)) . "&";
    $querystring .= "cancel_return=" . urlencode(stripslashes($cancel_url)) . "&";
    $querystring .= "notify_url=" . urlencode($notify_url);

    $unique_id = uniqid();
    $querystring .= "&custom=" . $unique_id;
    $_SESSION['order']['unique_key'] = $unique_id;

// Append querystring with custom field
//$querystring .= "&custom=".USERID;
// Redirect to paypal IPN
//save order to database
//save to database
    $db = new Database();
    $db->connect();
    foreach ($_POST as $field => $value)
    {
	$_SESSION['order'][$field] = $value;
    }

    $order_data = $_SESSION['order'];

//get user
    $customer_id = 0;
    $newAccountSent = 0;
    if (isset($_SESSION['frontend']['username']))
    {
	$customer = loggedInUser();
	$customer_id = $customer['id'];
    }
    else
    {
	$where = 'email="' . $order_data['email'] . '"';
	$db->select('customers', '*', NULL, $where);
	$customer = $db->getResult();
	if (empty($customer))
	{
	    $customer = array();
	    $customer['first_name'] = $order_data['first_name'];
	    $customer['last_name'] = $order_data['last_name'];
	    $customer['email'] = $order_data['email'];
	    $customer['country'] = $order_data['country_code'];
	    $customer['phone'] = $order_data['pcountry_code'] . '-' . $order_data['phone_no'];
	    $password = generatePassword();
	    $customer['password'] = md5($password);
//save customer
	    $db->insert('customers', $customer);
	    $customer_id = mysql_insert_id();
	}
	else
	{
	    $customer_id = $customer['id'];
	}


//Send Mail
	$to = $customer['email'];
	$subject = 'New Account Information @ Master Essay';
	$template_data = $customer;
	$template_data['password'] = $password;
	$msg = NewAccounEmailTemplate($template_data);
	$newAccountSent = sendMail($subject, $msg, $to);
    }
    $order_data['customer_id'] = $customer_id;
    $db_columns = $db->getColoumn('orders');
    foreach ($order_data as $key => $val)
    {
	if (!array_search($key, $db_columns))
	    unset($order_data[$key]);
    }
    $OrderSuccess = $db->insert('orders', $order_data);
    if ($OrderSuccess)
    {
//Send Mail
	$to = $customer['email'];
	$subject = 'New Order Information @ Master Essay';
	$template_data = array_merge($order_data, $customer);
	$msg = NewOrderEmailTemplate($template_data);
	$newOrderSent = sendMail($subject, $msg, $to);
    }
    header('location:https://www.paypal.com/cgi-bin/webscr' . $querystring);
    exit();
}

/*
  else
  {
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
  exit;
  // Response from Paypal
  // read the post from PayPal system and add 'cmd'
  $req = 'cmd=_notify-validate';
  foreach ($_POST as $key => $value)
  {
  $value = urlencode(stripslashes($value));
  $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
  $req .= "&$key=$value";
  }

  // assign posted variables to local variables
  $data['item_name'] = $_POST['item_name'];
  $data['item_number'] = $_POST['item_number'];
  $data['payment_status'] = $_POST['payment_status'];
  $data['payment_amount'] = $_POST['mc_gross'];
  $data['payment_currency'] = $_POST['mc_currency'];
  $data['txn_id'] = $_POST['txn_id'];
  $data['receiver_email'] = $_POST['receiver_email'];
  $data['payer_email'] = $_POST['payer_email'];
  $data['custom'] = $_POST['custom'];

  // post back to PayPal system to validate
  $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
  $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
  $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

  $fp = fsockopen('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

  if (!$fp)
  {
  // HTTP ERROR
  }
  else
  {

  fputs($fp, $header . $req);
  while (!feof($fp))
  {
  $res = fgets($fp, 1024);
  if (strcmp($res, "VERIFIED") == 0)
  {

  // Used for debugging
  //@mail("you@youremail.com", "PAYPAL DEBUGGING", "Verified Response<br />data = <pre>".print_r($post, true)."</pre>");
  // Validate payment (Check unique txnid & correct price)
  $valid_txnid = check_txnid($data['txn_id']);
  $valid_price = check_price($data['payment_amount'], $data['item_number']);
  // PAYMENT VALIDATED & VERIFIED!
  if ($valid_txnid && $valid_price)
  {
  $orderid = updatePayments($data);
  if ($orderid)
  {
  // Payment has been made & successfully inserted into the Database
  }
  else
  {
  // Error inserting into DB
  // E-mail admin or alert user
  }
  }
  else
  {
  // Payment made but data has been changed
  // E-mail admin or alert user
  }
  }
  else if (strcmp($res, "INVALID") == 0)
  {

  // PAYMENT INVALID & INVESTIGATE MANUALY!
  // E-mail admin or alert user
  // Used for debugging
  //@mail("you@youremail.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");
  }
  }
  fclose($fp);
  }
  } */
?>