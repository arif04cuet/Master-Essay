<?php include('check.php'); ?>
<?php include('common/header.php'); ?>
<?php
error_reporting(E_ERROR);
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : NULL;
if ($order_id == NULL)
{
    header('Location: orders.php');
    exit;
}
$db = new Database();
$db->connect();

if ($_POST)
{
    error_reporting(E_ALL);
    $order_id = $_POST['order_id'];
    $where = 'id="' . $order_id . '"';
    $db->select('orders', '*', NULL, $where);
    $order = $db->getResult();
    $customer_id = $order['customer_id'];
    //load customer
    $where = 'id=' . $customer_id;
    $db->select('customers', '*', NULL, $where);
    $customer = $db->getResult();

    $message = mysql_real_escape_string($_POST['message']);
    $status = $_POST['status'];

    //upload doc if uploaded
    $msg = "";
    $filename = "";
    if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0))
    {
	//Check if the file is JPEG image and it's size is less than 350Kb
	$filename = uniqid() . '-' . basename($_FILES['uploaded_file']['name']);
	//Determine the path to which we want to save this file
	$newname = dirname(__FILE__) . '/upload/orders/' . $filename;
	//Check if the file with the same name is already exists on the server
	if (!file_exists($newname))
	{
	    //Attempt to move the uploaded file to it's new place
	    if (!(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname)))
	    {
		echo $msg = "Error: A problem occurred during file upload!";
		exit;
	    }
	}
    }
    //send message to customer
    $params = array(
	'order_id' => $order_id,
	'to_user' => $customer_id,
	'message' => $message,
	'document' => $filename
    );
    $record = $db->insert('order_details', $params);

    if ($record)
    {

	//Send Mail
	$to = $customer['email'];
	$subject = 'Order update information from Master Essay';
	$customer['order_id'] = $order['id'];
	$msg = OrderUpdateEmailTemplate($customer);
	sendMail($subject, $msg, $to);
	?>

	<div class="alert alert-success">
	    <a class="close" data-dismiss="alert">×</a>
	    Message has been sent successfully to <?php echo $to; ?>.
	</div>

	<?php
    }

    //updated order status
    $params = array(
	'status' => $status
    );
    $db->update('orders', $params, $where);
}
//order details
$sql = 'select o.*,c.* from orders o inner join customers c on (o.customer_id = c.id) where o.id=' . $order_id;
$result = mysql_query($sql);
$preview_date = mysql_fetch_assoc($result);
?>


<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="content span6" style="width:100%;">
            <div class="service-list row-fluid block" style="border-radius: 10px 10px;">
                <h2>Orders Details <button class="control">Hide</button></h2>
                <hr/>
		<div class="row-fluid order_details">
		    <div class="span12">
			<fieldset>
			    <legend class="header-title">Personal Info</legend>
			    <table class="table table-bordered table-condensed ">
				<tr>
				    <td><label class="control-label" for="first_name">First name:<span></span></label></td>
				    <td> <?php echo $value = isset($preview_date['first_name']) ? $preview_date['first_name'] : '' ?></td>
				    <td><label class="control-label" for="last_name">Last name:<span></span></label></td>
				    <td><?php echo $value = isset($preview_date['last_name']) ? $preview_date['last_name'] : '' ?></td>
				</tr>
				<tr>
				    <td><label class="control-label" for="email">Email : <span></span></label></td>
				    <td><?php echo $value = isset($preview_date['email']) ? $preview_date['email'] : '' ?></td>
				    <td><label class="control-label" for="re_email">Re-type email: <span></span></label></td>
				    <td><?php echo $value = isset($preview_date['email']) ? $preview_date['email'] : '' ?></td>
				</tr>
				<tr>
				    <td> <label class="control-label" for="country_code">Country code:<span></span></label></td>
				    <td><?php echo $value = isset($preview_date['country']) ? $preview_date['country'] : '' ?></td>
				    <td> <label class="control-label" for="pcountry_code">Contact phone :<span></span></label></td>
				    <td><?php echo $value = isset($preview_date['phone']) ? $preview_date['phone'] : '' ?>
				    </td>
				</tr>

			    </table>
			</fieldset>

			<fieldset>
			    <legend class="header-title">Order Details</legend>
			    <table class="table table-bordered table-condensed ">
				<tr>
				    <td><label class="control-label" for="topic">Topic:<span></span></label></td>
				    <td><?php echo $value = isset($preview_date['topic']) ? $preview_date['topic'] : '' ?></td>
				    <td><label class="control-label" for="type_document">Type of document:<span></span></label></td>
				    <td><?php echo $value = isset($preview_date['type_document']) ? $preview_date['type_document'] : '' ?></td>
				</tr>
				<tr>
				    <td><label class="control-label" for="urgency">Urgency:<span></span></label></td>
				    <td><?php echo $value = isset($preview_date['urgency']) ? $preview_date['urgency'] : '' ?></td>
				    <td><label class="control-label" for="level">Level:<span></span></label></td>
				    <td><?php echo $value = isset($preview_date['level']) ? $preview_date['level'] : '' ?></td>
				</tr>
				<tr>
				    <td><label class="control-label" for="spacing">Spacing:</label></td>
				    <td><?php echo $value = isset($preview_date['spacing']) ? $preview_date['spacing'] : '' ?></td>
				    <td><label class="control-label" for="number_of_pages">Number of pages/words:<span></span></label></td>
				    <td><?php echo $value = isset($preview_date['number_of_pages']) ? $preview_date['number_of_pages'] : '' ?></td>
				</tr>
				<tr>
				    <td><label class="control-label" for="cost_per_page">Cost per page:<span></span></label></td>
				    <td><?php echo $value = isset($preview_date['cost_per_page']) ? $preview_date['cost_per_page'] : '' ?></td>
				    <td><label class="control-label" for="page_summery">1-page summary of your paper:<span></span></label></td>
				    <td><?php echo $value = isset($preview_date['page_summery']) ? 'Yes' : '' ?></td>
				</tr>
				<tr>
				    <td><label class="control-label" for="subject_area">Subject Area:<span></span></label></td>
				    <td><?php echo $value = isset($preview_date['academic_level']) ? $preview_date['academic_level'] : '' ?></td>
				    <td><label class="control-label" for="style">Style: <span></span></label></td>
				    <td><?php echo $value = isset($preview_date['style']) ? $preview_date['style'] : '' ?></td>
				</tr>

				<tr>
				    <td>  <label class="control-label" for="no_sources">Number of sources/references: <span></span></label></td>
				    <td> <?php echo $value = isset($preview_date['no_sources']) ? $preview_date['no_sources'] : '' ?></td>
				    <td><label class="control-label" for="preferred_lang">How did you hear about us ? <span></span></label></td>
				    <td> <?php echo $value = isset($preview_date['how_you_heard']) ? $preview_date['how_you_heard'] : '' ?></td>
				</tr>
				<tr>
				    <td><label class="control-label" for="order_description">Order description: <span></span><br/></label></td>
				    <td><?php echo $value = isset($preview_date['order_description']) ? $preview_date['order_description'] : '' ?></td>
				    <td><label class="control-label" for="academic_level">Academic Level: <span></span></label></td>
				    <td><?php echo $value = isset($preview_date['academic_level']) ? $preview_date['academic_level'] : '' ?></td>
				</tr>
				<tr>
				    <td><label class="control-label" for="preferred_writers_id">Preferred writer's ID (for returning customers): <span></span></label></td>
				    <td><?php echo $value = isset($preview_date['preferred_writers_id']) ? $preview_date['preferred_writers_id'] : '' ?></td>
				    <td><label class="control-label" for="night_calls">Discount Code: <span></span></label></td>
				    <td><?php echo $value = isset($preview_date['discount_code']) ? $preview_date['discount_code'] : '' ?></td>
				</tr>
				<tr>
				    <td> </td>
				    <td> </td>
				    <td><label class="control-label" for="total"><h4>Total</h4></label></td>
				    <td><h4> <?php
echo $value = isset($preview_date['total']) ? $preview_date['total'] : '';
echo ' ' . $preview_date['currency']
?></h4></td>
				</tr>
			    </table>
			</fieldset>
		    </div>
		</div>


                <form enctype="multipart/form-data" action="" id="add-sample-essay" class="" style="color: #ababab !important;" method="post">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="message">Message:</label>
                            <div class="controls">
                                <textarea name="message" class="input-xlarge" id="message"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="upload_file">Upload Document: <span></span></label>
                            <div class="controls">
                                <input type="file" class="input-xlarge" name="uploaded_file" id="upload_file" value="" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="status">Order Status<span></span></label>
                            <div class="controls">
                                <select name="status" id="status">
				    <?php $list = GetOrderStatus(); ?>
				    <?php foreach ($list as $key => $item): ?>
    				    <option value="<?php echo $key ?>" <?php if ($item == 'Completed') echo 'selected'; ?>><?php echo $item ?></option>
				    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-danger ">Submit</button>
                            </div>
                        </div>
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>"?>
                    </fieldset>
                </form>
		<hr/>
		<div class="messages">
		    <?php
		    $sql = 'select * from order_details where order_id="' . $order_id . '" order by id asc';
		    $result = mysql_query($sql);
		    echo '<ul>';
		    while ($message = mysql_fetch_assoc($result))
		    {
			$agent = ($message['from_user'] == 0) ? '"Support Center"' : '"Customer"';
			$download_url = 'download-file.php?order_id=' . $order_id . '&file_id=' . base64_encode($message['id']);
			$attachment = ($message['document']) ? '<a href="' . $download_url . '">Download</a>' : '';
			echo '<li><p><b><i>' . $agent . '</i> says on <i>' . $message['action_time'] . '</i></b></p><div class="msg_body">' . $message['message'] . ' ' . $attachment . '</div></li>';
		    }
		    echo '</ul>';
		    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('common/footer.php'); ?>

<style>
    label span{color: red}

    #select-level-value{
        background: url("../theme/img/menu_down_arrow.png") no-repeat scroll 124px center #E71C21;
        border-radius: 3px;
        color: #FFFFFF;
        display: block;
        font-size: 12px;
        /*margin: 0 3px 0 13px;*/
        padding: 10px 20px;
        text-decoration: none;
        width: 100px;
    }
    .messages ul{list-style: none}
    .messages ul li .msg_body{margin-left: 10px}
</style>
<script src="theme/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    $("button.control").click(function() {
	$("div.order_details").toggle('slow');
	if ($(this).text() == 'Hide')
	{
	    $(this).text('Show');
	}
	else
	{
	    $(this).text('Hide');
	}
    });

    tinymce.init({
	selector: "textarea#message",
	theme: "modern",
	plugins: [
	    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	    "searchreplace wordcount visualblocks visualchars code fullscreen",
	    "insertdatetime media nonbreaking save table contextmenu directionality",
	    "emoticons template paste textcolor "
		],
	toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	toolbar2: "print preview media | forecolor backcolor emoticons",
	image_advtab: true,
	templates: [
	    {title: 'Test template 1', content: 'Test 1'},
	    {title: 'Test template 2', content: 'Test 2'}
	]
    });
</script>

