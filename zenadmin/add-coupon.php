<?php include('check.php'); ?>
<?php include('common/header.php'); ?>


<?php
$db = new Database();
$db->connect();
$where = 'id=' . $_GET['id'];
$record = $db->select('coupons', '*', NULL, $where);  // Table name, column names and respective values
$data = $db->getResult();
?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="content span6" style="width:100%;">
            <div class="service-list row-fluid block" style="border-radius: 10px 10px;">
                <h2>Add Coupon</h2>
                <hr/>
                <form enctype="multipart/form-data" action="coupons-list.php" id="add-coupon" class="form-horizontal" style="color: #ababab !important;" method="post">
		    <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="topic">Coupon Code:<span>*</span></label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="code" id="code" value="<?php echo $data['code'] ?>" placeholder="Code">
                            </div>
                        </div>
			<div class="control-group">
                            <label class="control-label" for="topic">Commision Amount:<span>*</span></label>
                            <div class="controls">
                                <input type="text"  class="input-xlarge" name="commision_amount" id="commision_amount" value="<?php echo $data['commision_amount'] ?>" placeholder="Amount">
                            </div>
                        </div>
			<div class="control-group">
                            <label class="control-label" for="commision_type">Commision Type:<span>*</span></label>
                            <div class="controls">
                                <select name="commision_type" id="commision_type" class="input-xlarge">
				    <option value="Fixed" <?php echo ($data['commision_type'] == 'Fixed') ? ' selected' : ''; ?>>Fixed</option>
				    <option value="Percentange" <?php echo ($data['commision_type'] == 'Percentange') ? ' selected' : ''; ?>>Percentange (%)</option>
                                </select>
                            </div>
                        </div>
			<div class="control-group">
                            <label class="control-label" for="valid_from">Valid From:</label>
                            <div class="controls">
                                <input type="text" class="datepicker" class="input-xlarge datepicker" name="valid_from" id="valid_from" value="<?php echo $data['valid_from'] ?>" placeholder="From">
                            </div>
                        </div>
			<div class="control-group">
                            <label class="control-label" for="valid_to">Valid To:</label>
                            <div class="controls">
                                <input type="text" class="datepicker" class="input-xlarge datepicker" name="valid_to" id="valid_to" value="<?php echo $data['valid_to'] ?>" placeholder="To">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="type_document">Status:<span>*</span></label>
                            <div class="controls">
                                <select name="status" id="status" class="input-xlarge">
				    <option value="Enabled" <?php echo ($data['status'] == 'Enabled') ? ' selected' : ''; ?>>Enabled</option>
				    <option value="Disabled" <?php echo ($data['status'] == 'Disabled') ? ' selected' : ''; ?>>Disabled</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-danger btn-large">Add</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('common/footer.php'); ?>

<script src="../theme/js/jquery.validate.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript">
    $(document).ready(function() {
	$(".datepicker").datepicker();
	$('#add-coupon').validate(
		{
		    rules: {
			code: {
			    required: true
			},
			commision_amount: {
			    required: true
			}
		    }
		});
    }); // end document.ready
</script>
