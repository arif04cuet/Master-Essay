<?php include 'common/header.php'; ?>
<div class="middle ">
    <div class="container-narrow middle-content">
        <div class="row-fluid">
            <div class="sidebar span3">
		<?php include 'common/left-sidebar.php'; ?>
            </div>
            <div class="content span9 block">
                <div class="contentPstyle" >
                    <h2 class="header-title">Customer Login</h2>
                    <hr/>


                    <div style="width: 600px;margin: 0 auto;padding-bottom: 50px">
			<?php if (isset($_GET['msg'])): ?>
    			<div class="alert alert-error">
    			    <a class="close" data-dismiss="alert">×</a>
				<?php echo $_GET['msg'] ?>
    			</div>

			<?php endif; ?>

                        <form id="login" action="processLogin.php" method="post">
                            <div class="control-group">

                                <label class="control-label" for="email">Email : <span>*</span></label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="email" id="email" placeholder="Enter valid email address" value="">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="password">Password : <span>*</span></label>
                                <div class="controls">
                                    <input type="password" class="input-xlarge" name="password" id="password" placeholder="Enter valid email address" value="">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-danger">Login</button>
                                    <a style="color: #EF1E23; font-size: 14px; font-family: calibri; margin-left: 16px; text-decoration: none;" href="forgot-password.php">Forgot your password?</a>
                                    <a style="color: #EF1E23; font-size: 14px; font-family: calibri; margin-left: 16px; text-decoration: none;" href="user_registration.php">Don't have an account?</a>

                                </div>
                            </div>
                        </form>
                        <span>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include 'common/footer.php'; ?>


    <script type="text/javascript">
	$(document).ready(function() {

	    $('#login').validate(
		    {
			rules: {

			    email: {
				required: true,
				email: true
			    },
			    password: {
				required: true
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