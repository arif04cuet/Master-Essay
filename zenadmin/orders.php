<?php include('check.php') ?>
<?php include('common/header.php') ?>

<h2>Order List</h2>
<hr>
<div id="orders"></div>
<script>
    $(document).ready(function() {
	$('#orders').html('<table cellpadding="0" cellspacing="0" border="0" class="display" id="list"></table>');
	$('#list').dataTable({
	    "aoColumns": [
		{ "sTitle": "Order ID"},
		{ "sTitle": "Topic"},
		{ "sTitle": "Document Type"},
		{ "sTitle": "Urgency"},
		{ "sTitle": "Pages"},
		{ "sTitle": "Total"},
		{ "sTitle": "Paypal Tnx ID"},
		{ "sTitle": "Paypal Tnx Status"},
		{ "sTitle": "Paypal Tnx Time"},
		{ "sTitle": "Order Status"},
		{ "sTitle": "Document"},
		{ "sTitle": "Details"},
	    ],
	    "aaSorting": [[0, "desc"]],
	    "bProcessing": true,
	    "sAjaxSource": 'getOrderList.php'
	});
    });
</script>

<?php include('common/footer.php') ?>