<?php include 'common/header-logged-in.php'; ?>
<?php include 'check.php'; ?>
<?php
error_reporting(E_ERROR);
$loggedCustomer = loggedInUser();
$db = new Database();
$db->connect();

$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : NULL;
$where = 'orders.id="' . $order_id . '" and orders.customer_id = c.id and c.id=' . $loggedCustomer['id'];
$db->select('orders', 'orders.id,orders.customer_id,c.email', 'customers c', $where);
$order = $db->getResult();
if ($order_id == NULL || ($order['email'] != $_SESSION['frontend']['username']))
{
    header('Location: my-orders.php');
    exit;
}
if ($_POST)
{
    $order_id = $_POST['order_id'];
    $where = 'id="' . $order_id . '"';
    $db->select('orders', '*', NULL, $where);
    $order = $db->getResult();
    $customer_id = $order['customer_id'];
    $message = mysql_real_escape_string($_POST['message']);

    //upload doc if uploaded
    $msg = "";
    $filename = "";
    if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0))
    {
	//Check if the file is JPEG image and it's size is less than 350Kb
	$filename = basename($_FILES['uploaded_file']['name']);
	//Determine the path to which we want to save this file
	$newname = dirname(__FILE__) . '/admin/upload/orders/' . uniqid() . '-' . $filename;
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
	'from_user' => $customer_id,
	'message' => $message,
	'document' => $filename
    );
    $db->insert('order_details', $params);
}
?>


<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="content span6" style="width:100%;">
            <div class="service-list row-fluid block">
                <div class="contentPstyle">
                    <h2>Orders Details</h2>
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
                    <hr/>
                    <form enctype="multipart/form-data" action="" id="add-sample-essay" class="form-horizontal" style="color: #ababab !important;" method="post">
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
                                <div class="controls">
                                    <button type="submit" class="btn btn-danger ">Submit</button>
                                </div>
                            </div>
                            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>"?>
                        </fieldset>
                    </form>

                    <hr/>
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

<script src="<?php echo ADMIN_FOLDER ?>/theme/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
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


