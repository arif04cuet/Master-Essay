<?php include('check.php') ?>
<?php include('common/header.php') ?>

<?php
if ($_POST)
{
    $db = new Database();
    $db->connect();
    $data = array_map('trim', $_POST);
    $data = array_map('mysql_real_escape_string', $data);
    if ($data['id'])
    {
        $where = 'id=' . $data['id'];
        $record = $db->update('coupons', $data, $where);  // Table name, column names and respective values
    }
    else
    {
        unset($data['id']);
        $coupon_code = $data['code'];
        // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $where = 'code="' . $coupon_code . '" and status="Enabled"';
        $db->select('coupons', '*', NULL, $where);
        $msg = "";
        if ($db->numResults)
        {
            $msg = 'Code (' . $coupon_code . ') already exist.please try another one';
            $html = '<div class = "alert alert-success">
            <a class = "close" data-dismiss = "alert">×</a>
            ' . $msg . '
            </div>';
            echo $html;
        }
        else
            $record = $db->insert('coupons', $data);  // Table name, column names and respective values
    }
    if ($record)
    {
        $html = '<div class = "alert alert-success">
	<a class = "close" data-dismiss = "alert">×</a>
	Coupon has been added successfully.
	</div>';
        echo $html;
    }
}
?>

<h2>Coupons List <span class="pull-right"><a href="add-coupon.php" class="btn btn-primary">Add</a></span></h2>
<hr>
<div id="coupons"></div>
<script>
    $(document).ready(function() {
        $('#coupons').html('<table cellpadding="0" cellspacing="0" border="0" class="display" id="list"></table>');
        $('#list').dataTable({
            "aoColumns": [
                { "sTitle": "ID"},
                { "sTitle": "Code"},
                { "sTitle": "Amount"},
                { "sTitle": "Type"},
                { "sTitle": "Valid From"},
                { "sTitle": "Valid To"},
                { "sTitle": "Status"},
                { "sTitle": "Edit"}
            ],
            "bProcessing": true,
            "sAjaxSource": 'getCouponsList.php'
        });
    });
</script>

<?php include('common/footer.php') ?>