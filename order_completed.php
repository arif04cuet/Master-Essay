<?php include('common/header.php') ?>
<!-- Example row of columns -->
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
        <div class="content span6">
            <h1 class="header-title">Order Completed</h1>
            <div class="service-list row-fluid block">
                <div>
                    <p class="contentPstyle">

			<?php
			//pr($_POST);

			if ($_POST and isset($_POST['payment_status']))
			{
			    $txn_id = $_POST['txn_id'];
			    $unique_key = $_POST['custom'];
			    $payment_date = $_POST['payment_date'];
			    $payment_status = $_POST['payment_status'];
			    $db = new Database();
			    $db->connect();

			    $data = array(
				'TRANSACTION_ID' => $txn_id,
				'transsaction_time' => $payment_date,
				'payment_status' => $payment_status
			    );
			    $where = 'unique_key = "' . $unique_key . '"';
			    $db->update('orders', $data, $where);
			    unset($_SESSION['order']);
			    echo 'Order has been completed';
			}
			?>


		    </p>
                </div>
            </div>
	</div>
        <div class="sidebar span3">
	    <?php include 'common/right-sidebar.php'; ?>
        </div>

    </div>
</div>

<?php include('common/footer.php') ?>