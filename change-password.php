<?php include 'common/header-logged-in.php'; ?>
<?php include 'check.php'; ?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">

        <div class="content span12 block">
            <div class="contentPstyle">
                <div>
                    <h1 class="header-title">Change Password</h1>
                    <hr/>

		    <?php
		    if ($_POST)
		    {
			$customer = loggedInUser();
			if ($customer['password'] != md5($_POST['old_password']))
			{
			    ?>

			    <div class="alert alert-error">
				<a class="close" data-dismiss="alert">×</a>
				Old Password is not correct.
			    </div>

			    <?php
			}

			//old password is ok,now change the pass

			$db = new Database();
			$db->connect();

			$where = "id=" . $customer['id'];
			$params = array(
			    'password' => md5($_POST['new_pass'])
			);
			$success = $db->update('customers', $params, $where);
			if ($success)
			{
			    ?>

			    <div class="alert alert-success">
				<a class="close" data-dismiss="alert">×</a>
				Password has been changed successfully.
			    </div>

			    <?php
			}
		    }
		    ?>


                    <div class="service-list row-fluid">
                        <form action="" id="change-password" class="form-horizontal" style="color: #ababab !important;" method="post">

                            <div class="control-group">
                                <label class="control-label" for="old-password">Old Password:<span>*</span></label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="old_password" id="old-password" value="" placeholder="Enter Old Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="new_pass">New Password:<span>*</span></label>
                                <div class="controls">
                                    <input autocomplete="off" type="password" class="input-xlarge" name="new_pass" id="new_pass" value="" placeholder="Enter New Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="user_re_pass">Re-New Password:<span>*</span></label>
                                <div class="controls">
                                    <input autocomplete="off" type="password" class="input-xlarge" name="new_re_pass" id="user_re_pass" value="" placeholder="Enter Re-New Password">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-danger">Change</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'common/footer-logged-in.php'; ?>

<script src="<?php echo ADMIN_FOLDER ?>/theme/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_FOLDER ?>/theme/js/jquery.form.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
	$('#change-password').validate(
		{
		    rules: {
			old_password: {
			    required: true
			},
			new_pass: {
			    required: true
			},
			new_re_pass: {
			    required: true,
			    equalTo: "#new_pass"
			}
		    }


		});

    }); // end document.ready
</script>