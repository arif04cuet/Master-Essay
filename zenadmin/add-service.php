<?php include('check.php'); ?>
<?php include('common/header.php'); ?>
<?php
error_reporting(E_ERROR);
$service_id = isset($_GET['id']) ? $_GET['id'] : NULL;
$db = new Database();
$db->connect();
$where = 'id=' . $service_id;
$db->select('services', '*', NULL, $where);
$service = array('name' => '', 'description' => '');
if ($db->numResults)
{
    $service = $db->getResult();
}
?>


<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="content span6" style="width:100%;">
            <div class="service-list row-fluid block" style="border-radius: 10px 10px;">
                <h2>Service Edit</h2>
                <hr/>
                <form enctype="multipart/form-data" action="service-list.php" id="add-sample-essay" class="" style="color: #ababab !important;" method="post">
                    <fieldset>
			<div class="control-group">
                            <label class="control-label" for="message">Name:</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" value="<?php echo $service['name'] ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="message">Description:</label>
                            <div class="controls">
                                <textarea name="description" class="input-xlarge" id="message"><?php echo $service['description'] ?></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-danger ">Submit</button>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $service_id; ?>" />
                    </fieldset>
                </form>

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
    #tinymce {font-size: 18px}
    .messages ul{list-style: none}
    .messages ul li .msg_body{margin-left: 10px}
</style>
<script src="theme/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
	selector: "textarea#message",
	theme: "modern",
	height: 300,
	fontSize: '18px',
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

