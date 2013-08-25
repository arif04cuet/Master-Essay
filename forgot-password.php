<?php include 'common/header.php'; ?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
        <div class="content span6 block">
            <div class="contentPstyle">
                <h1 class="header-title"> Forgot Password <span style="width: 150px;" class="stripe" style=""></span></h1>

		<?php
		if ($_POST)
		{

		    $db = new Database;
		    $db->connect();
		    $email = mysql_real_escape_string($_POST['email']);
		    $where = 'email="' . $email . '"';
		    $db->select('customers', '*', NULL, $where);
		    if ($db->numResults > 0)
		    {
			$customer = $db->getResult();
			$newPass = generatePassword();
			$where = 'id=' . $customer['id'];
			$params = array('password' => md5($newPass));
			$record = $db->update('customers', $params, $where);
			if ($record)
			{

			    $customer['password'] = $newPass;
			    //Send Mail
			    $to = $customer['email'];
			    $subject = 'New Password Information @ Master Essay';
			    $msg = ForgotPasswordEmailTemplate($customer);
			    $sent = sendMail($subject, $msg, $to);
			    if ($sent)
			    {
				?>
				<div class="alert alert-success">
				    <a class="close" data-dismiss="alert">×</a>
				    New Password has been sent to <b> <?php echo $to ?></b>
				</div>
				<?php
			    }
			}
		    }
		    else
		    {
			?>
			<div class="alert alert-error">
			    <a class="close" data-dismiss="alert">×</a>
			    Sorry,email <b><?php echo $email ?></b> does not exist in the system.
			</div>
			<?php
		    }
		}
		?>
                <form method="POST" id="forgot-password" action="">
                    <div class="control-group">
			<?php $selected = getData($_GET, 'email'); ?>
                        <label class="control-label" for="email">Email : <span>*</span></label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="email" id="email" placeholder="Enter valid email address" value="<?php echo $selected ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="new"/>
                </form>
            </div>
        </div>
        <div class="sidebar span3">
	    <?php include 'common/right-sidebar.php'; ?>
        </div>

    </div>
</div>
<?php include 'common/footer.php'; ?>


<script type="text/javascript">
    $(document).ready(function() {
	$('#forgot-password').validate(
		{
		    rules: {
			email: {
			    required: true,
			    email: true
			}
		    },
		    highlight: function(element) {
			$(element).closest('.control-group').removeClass('success').addClass('error');
		    },
		    success: function(element) {
			element
				.addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			element.closest('label').remove();
		    }
		});

    }); // end document.ready
</script>

