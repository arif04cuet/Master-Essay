<?php include('common/header.php') ?>
<?php include('check_order.php') ?>

<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
        <div class="content span9 block">
            <div class="contentPstyle">
		<?php
		if ($_POST)
		{
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

		    //Paypal Processing
		    // Include config file
		    require_once('paypal_config.php');

		    // Store request params in an array
		    $ACCT = $_POST['card_number'];
		    $EXPDATE = $_POST['expiry_month'] . $_POST['expiry_year'];
		    $CVV2 = $_POST['cvv'];
		    $FIRSTNAME = $_POST['holder_fname'];
		    $LASTNAME = $_POST['holder_lname'];
		    $STREET = $_POST['billing_address'];
		    $CITY = $_POST['city_town'];
		    $COUNTRYCODE = $_POST['c_country'];
		    $ZIP = $_POST['zip_code'];
		    $AMT = $order_data['total'];
		    $CURRENCYCODE = $order_data['currency'];
		    $DESC = $order_data['order_description'];
		    $CREDITCARDTYPE = CreditCardCompany($_POST['card_number']);

		    $request_params = array
			(
			'METHOD' => 'DoDirectPayment',
			'USER' => $api_username,
			'PWD' => $api_password,
			'SIGNATURE' => $api_signature,
			'VERSION' => $api_version,
			'PAYMENTACTION' => 'Sale',
			'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
			'CREDITCARDTYPE' => $CREDITCARDTYPE,
			'ACCT' => $ACCT,
			'EXPDATE' => $EXPDATE,
			'CVV2' => $CVV2,
			'FIRSTNAME' => $FIRSTNAME,
			'LASTNAME' => $LASTNAME,
			'STREET' => $STREET,
			'CITY' => $CITY,
			'COUNTRYCODE' => $COUNTRYCODE,
			'ZIP' => $ZIP,
			'AMT' => $AMT,
			'CURRENCYCODE' => $CURRENCYCODE,
			'DESC' => $DESC
		    );
		    // Loop through $request_params array to generate the NVP string.
		    $nvp_string = '';
		    foreach ($request_params as $var => $val)
		    {
			$nvp_string .= '&' . $var . '=' . urlencode($val);
		    }

		    // Send NVP string to PayPal and store response
		    $curl = curl_init();
		    curl_setopt($curl, CURLOPT_VERBOSE, 1);
		    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		    curl_setopt($curl, CURLOPT_URL, $api_endpoint);
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);

		    $result = curl_exec($curl);
		    curl_close($curl);

		    // Parse the API response
		    $paypal_data = NVPToArray($result);

		    //paypal success
		    $newOrderSent = 0;
		    $OrderSuccess = 0;
		    $paypal_error = '';
		    if (($paypal_data['ACK'] == 'Success') OR ($paypal_data['ACK'] == 'SuccessWithWarning'))
		    {
			$order_data['transsaction_time'] = $paypal_data['TIMESTAMP'];
			$order_data['TRANSACTION_ID'] = $paypal_data['TRANSACTIONID'];
			$OrderSuccess = $db->insert('orders', $order_data);
			if ($OrderSuccess)
			{
			    ?>
	    		<div class="alert alert-success">
	    		    <a class="close" data-dismiss="alert">×</a>
	    		    Order has been completed successfully with transaction id <b><?php echo $order_data['TRANSACTION_ID']; ?></b>
	    		</div>
			    <?php
			}
			if ($OrderSuccess)
			{
			    //Send Mail
			    $to = $customer['email'];
			    $subject = 'New Order Information @ Master Essay';
			    $template_data = array_merge($order_data, $customer);
			    $msg = NewOrderEmailTemplate($template_data);
			    $newOrderSent = sendMail($subject, $msg, $to);
			    if ($newOrderSent)
			    {
				?>
				<div class="alert alert-success">
				    <a class="close" data-dismiss="alert">×</a>
				    Order details has been sent to <?php echo $customer['email']; ?>
				</div>
				<?php
			    }
			}
		    }
		    else
		    {
			$paypal_error = $paypal_data['L_LONGMESSAGE0'];
			if ($paypal_error)
			{
			    ?>

	    		<div class="alert alert-error">
	    		    <a class="close" data-dismiss="alert">×</a>
				<?php echo $paypal_error; ?>
	    		</div>
			    <?php
			}
		    }
		}
		?>

		<?php if ($newAccountSent): ?>
    		<div class="alert alert-success">
    		    <a class="close" data-dismiss="alert">×</a>
    		    New Account has been created.account information has been send to <?php echo $customer['email']; ?>
    		</div>
		<?php endif; ?>



            </div>
        </div>
    </div>
</div>
<?php include 'common/footer.php'; ?>