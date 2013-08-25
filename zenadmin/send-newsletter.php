<?php include('check.php'); ?>
<?php include('common/header.php'); ?>


<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="content span6" style="width:100%;">
            <div class="service-list row-fluid block" style="border-radius: 10px 10px;">
		<?php
		if ($_POST)
		{
		    $db = new Database;
		    $db->connect();
		    $db->select('newsletter_subscribers');
		    $emails = $db->getResult();
		    if ($db->numResults == 1)
			$emails = array($emails);

		    $subject = $_POST['subject'];
		    $msg = $_POST['content'];
		    $to = array();
		    foreach ($emails as $email)
		    {
			$to[] = $email['email'];
		    }
		    $sent = sendMail($subject, $msg, $to);
		    if ($sent)
		    {
			?>
			<div class="alert alert-success">
			    <a class="close" data-dismiss="alert">×</a>
			    Newsletter has been sent successfully.
			</div>
			<?php
		    }
		}
		?>
                <h2>Send to all newsletter subscribed users</h2>
                <hr/>
                <form enctype="multipart/form-data" action="" id="add-sample-essay" class="form-horizontal" style="color: #ababab !important;" method="post">
                    <input type="text" name="subject" style="width: 100%;margin-bottom: 10px" placeholder="Enter Mail Subject"/><br/>
                    <textarea id="content" name="content" style="width:100%"></textarea>
                    <input type="submit" name="submit" value="Send" class="btn btn-primary btn-large pull-right" />
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
</style>

<script src="theme/js/tinymce/tinymce.min.js"></script>
<script src="theme/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
	$('#add-sample-essay').validate(
		{
		    rules: {
			topic: {
			    required: true
			},
			type_document: {
			    required: true
			},
			urgency: {
			    required: true
			},
			level: {
			    required: true
			},
			number_of_pages: {
			    required: true
			},
			subject_area: {
			    required: true
			},
			academic_level: {
			    required: true
			},
			style: {
			    required: true
			},
			no_sources: {
			    required: true
			}
		    },
		    messages: {
			topic: {
			    required: "This field required."
			},
			type_document: {
			    required: "This field required."
			},
			urgency: {
			    required: "This field required."
			},
			level: {
			    required: "This field required."
			},
			number_of_pages: {
			    required: "This field required."
			},
			subject_area: {
			    required: "This field required."
			},
			academic_level: {
			    required: "This field required."
			},
			style: {
			    required: "This field required."
			},
			no_sources: {
			    required: "This field required."
			}
		    }
		});
    }); // end document.ready
</script>

<script type="text/javascript">
    tinymce.init({
	selector: "textarea#content",
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
