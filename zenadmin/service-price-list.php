<?php include('check.php') ?>
<?php include('common/header.php') ?>

<?php
if ($_POST)
{
    error_reporting(E_ALL);
    $db = new Database();
    $db->connect();
    $product_id = $_POST['id'];
    $service_name = $_POST['type_document'];
    $urgency = $_POST['urgency'];
    $price_standard = $_POST['standard'];
    $price_premium = $_POST['premium'];
    $price_platinum = $_POST['platinum'];



    $where = 'name="' . $service_name . '" limit 1';
    $db->select('services', '*', NULL, $where);
    $service = $db->getResult();

    ///check already added

    $where = 'urgency="' . $urgency . '" and service_id=' . $service['id'] . ' limit 1';
    $db->select('products', '*', NULL, $where);
    $product = $db->getResult();

    if (!empty($product))
    {
	$html = '<div class = "alert alert-error">
	<a class = "close" data-dismiss = "alert">×</a>
	Service( ' . $service['name'] . ' ) already has price for ungency (' . $urgency . ').
	</div>';
	echo $html;
    }
    else
    {//send message to customer
	$params = array(
	    'service_id' => $service['id'],
	    'urgency' => $urgency,
	    'standard' => $price_standard,
	    'premium' => $price_premium,
	    'platinum' => $price_platinum
	);

	$table = 'products';
	if ($product_id)
	{
	    $where = 'id=' . $product_id;
	    $record = $db->update($table, $params, $where);
	}
	else
	{
	    $record = $db->insert($table, $params);
	}
	if ($record)
	{
	    $html = '<div class = "alert alert-success">
	<a class = "close" data-dismiss = "alert">×</a>
	Service price has been saved successfully.
	</div>';
	    echo $html;
	}
    }
}
?>

<h2>Service Price (USD) List <span class="pull-right"><a href="add-service-price.php?service_id=<?php echo $_GET['service_id']; ?>" class="btn btn-primary">Add</a></span></h2>
<hr>
<div id="coupons"></div>
<script>
    $(document).ready(function() {
	var service_id = <?php echo isset($_GET['service_id']) ? $_GET['service_id'] : '0' ?>;
	$('#coupons').html('<table cellpadding="0" cellspacing="0" border="0" class="display" id="list"></table>');
	$('#list').dataTable({
	    "aoColumns": [
		{ "sTitle": "ID"},
		{ "sTitle": "Service Name"},
		{ "sTitle": "Urgency"},
		{ "sTitle": "Standard"},
		{ "sTitle": "Premium"},
		{ "sTitle": "Platinum"},
		{ "sTitle": "Edit"}
	    ],
	    "bProcessing": true,
	    "iDisplayLength": 20,
	    "aaSorting": [[0, "asc"]],
	    "sAjaxSource": 'getServicePriceList.php?service_id=' + service_id
	});
    });
</script>

<?php include('common/footer.php') ?>