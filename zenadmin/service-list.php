<?php include('check.php') ?>
<?php include('common/header.php') ?>

<?php
if ($_POST)
{
    error_reporting(E_ALL);
    $db = new Database();
    $db->connect();
    $service_id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    //send message to customer
    $params = array(
	'name' => $name,
	'description' => $description
    );

    $table = 'services';
    if ($service_id)
    {
	$where = 'id=' . $service_id;
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
	Service has been saved successfully.
	</div>';
	echo $html;
    }
}
?>

<h2>Service List <span class="pull-right"><a href="add-service.php" class="btn btn-primary">Add</a></span></h2>
<hr>
<div id="coupons"></div>
<script>
    $(document).ready(function() {
	$('#coupons').html('<table cellpadding="0" cellspacing="0" border="0" class="display" id="list"></table>');
	$('#list').dataTable({
	    "aoColumns": [
		{ "sTitle": "ID"},
		{ "sTitle": "Name"},
		{ "sTitle": "Description"},
		{ "sTitle": "Edit"},
		{ "sTitle": "Show Price"}
	    ],
	    "bProcessing": true,
	    "iDisplayLength": 20,
	    "aaSorting": [[0, "asc"]],
	    "sAjaxSource": 'getServiceList.php'
	});
    });
</script>

<?php include('common/footer.php') ?>