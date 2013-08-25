<?php include('check.php'); ?>
<?php include('common/header.php'); ?>


<?php
$db = new Database();
$db->connect();
$service_id = $_GET['service_id'];
$where = 'id=' . $_GET['id'];
$db->select('products', '*', NULL, $where);  // Table name, column names and respective values
$data = $db->getResult();
if (!$db->numResults)
    $data = array(
	'service_id' => '',
	'urgency' => '',
	'standard' => '',
	'premium' => '',
	'platinum' => ''
    );
?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="content span6" style="width:100%;">
            <div class="service-list row-fluid block" style="border-radius: 10px 10px;">
                <h2>Add Price to Service</h2>
                <hr/>
                <form enctype="multipart/form-data" action="service-price-list.php?service_id=<?php echo $service_id ?>" id="add-coupon" class="form-horizontal" style="color: #ababab !important;" method="post">
		    <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="type_document">Type of document:<span>*</span></label>
                            <div class="controls">
                                <select name="type_document" id="type_document" class="input-xlarge">
				    <?php
				    $serviceList = getProductsList();
				    if (!empty($service_id))
				    {
					$where = 'id=' . $service_id;
					$db->select('services', '*', NULL, $where);
					$service = $db->getResult();
				    }
				    ?>
				    <?php foreach ($serviceList as $name): ?>
    				    <option value="<?php echo $name ?>" <?php echo ($name == $service['name']) ? 'selected' : ''; ?>><?php echo $name ?></option>
				    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="urgency">Urgency:<span>*</span></label>
                            <div class="controls">
                                <select name="urgency" id="urgency" class="input-xlarge">

				    <?php
				    $list = getUrgencyList();
				    ?>
				    <?php foreach ($list as $name): ?>
    				    <option value="<?php echo $name ?>" <?php echo ($name == $data['urgency']) ? 'selected' : ''; ?>><?php echo $name ?></option>
				    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="type_document">Price:<span>*</span></label>
                            <div class="controls">
                                <table class="table" style="width: 30%;margin: 0">
				    <tr>
					<td>Standard</td>
					<td>Premium</td>
					<td>Platinum</td>
				    </tr>
				    <tr>
					<td><input type="text" name="standard" class="input-mini" value="<?php echo $data['standard'] ?>"/></td>
					<td><input type="text" name="premium" class="input-mini" value="<?php echo $data['premium'] ?>"/></td>
					<td><input type="text" name="platinum" class="input-mini" value="<?php echo $data['platinum'] ?>"/></td>
				    </tr>
				</table>
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
<script type="text/javascript">
    $(document).ready(function() {
	$('#add-coupon').validate(
		{
		    rules: {
			standard: {
			    required: true,
			    number: true
			},
			premium: {
			    required: true,
			    number: true
			},
			platinum: {
			    required: true,
			    number: true
			}
		    }
		});
    }); // end document.ready
</script>
