<?php include 'common/header.php'; ?>
<div class="middle ">
    <div class="container-narrow middle-content">
        <div class="row-fluid">
            <div class="sidebar span3">
		<?php include 'common/left-sidebar.php'; ?>
            </div>
            <div class="content span9 block">
                <div class="contentPstyle">
                    <h2 class="header-title">Customer Registration</h2>
                    <hr/>
		    <?php if (isset($_GET['msg']) and $_GET['msg'] != 'success'): ?>
    		    <div class="alert alert-error">
    			<a class="close" data-dismiss="alert">×</a>
			    <?php echo $_GET['msg'] ?>
    		    </div>

		    <?php endif; ?>

		    <?php if (isset($_GET['msg']) and $_GET['msg'] == 'success'): ?>
    		    <div class="alert alert-success">
    			<a class="close" data-dismiss="alert">×</a>
			    <?php echo $_GET['message'] ?>
    		    </div>

		    <?php endif; ?>
                    <form method="POST" class="form-horizontal" id="user-registration" action="process-user-registration.php">
                        <fieldset>

                            <div class="control-group">
                                <label class="control-label" for="first_name">First name:<span>*</span></label>
                                <div class="controls">
				    <?php $selected = getData($_GET, 'first_name'); ?>
                                    <input type = "text" class = "input-xlarge" name = "first_name" id = "first_name" value = "<?php echo $selected ?>" placeholder = "Enter First Name">
                                </div>
                            </div>
                            <div class = "control-group">
                                <label class = "control-label" for = "last_name">Last name:<span>*</span></label>
                                <div class = "controls">
				    <?php $selected = getData($_GET, 'last_name'); ?>
                                    <input type="text" class="input-xlarge" name="last_name" id="last_name" value="<?php echo $selected ?>" placeholder="Enter Last Name">
                                </div>
                            </div>
                            <div class="control-group">
				<?php $selected = getData($_GET, 'email'); ?>
                                <label class="control-label" for="email">Email : <span>*</span></label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="email" id="email" placeholder="Enter valid email address" value="<?php echo $selected ?>">
                                </div>
                            </div>
                            <div class="control-group">
				<?php $selected = getData($_GET, 're_email'); ?>
                                <label class="control-label" for="re_email">Re-type email: <span>*</span></label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="re_email" id="re_email" value="<?php echo $selected ?>" placeholder="Enter valid email address">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="password">Password:<span>*</span></label>
                                <div class="controls">
                                    <input autocomplete="off" type="password" class="input-xlarge" name="password" id="password" value="" placeholder="Enter New Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="re_pass">Re-Password:<span>*</span></label>
                                <div class="controls">
                                    <input autocomplete="off" type="password" class="input-xlarge" name="re_pass" id="re_pass" value="" placeholder="Enter Re-New Password">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="country_code">Country code:<span>*</span></label>
                                <div class="controls">
                                    <div class="styled-select width145">
					<select name="country_code" id="country_code" class="input-xlarge">
					    <option value="">Select country code</option>
					    <?php $selected = getData($_GET, 'country_code'); ?>
					    <?php
					    $countryList = getCountryList();
					    ?>
					    <?php foreach ($countryList as $name => $value): ?>
    					    <option value="<?php echo $name ?>" <?php echo ($name == $selected) ? 'selected' : "" ?>><?php echo $value ?></option>
					    <?php endforeach; ?>
					</select>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="pcountry_code">Contact phone :<span>*</span></label>
                                <div class="controls">
                                    <table>
                                        <tr>
                                            <td>
						<?php $selected = getData($_GET, 'pcountry_code'); ?>
                                                <input type="text" class="input-mini" name="pcountry_code" value="<?php echo $selected ?>" id="pcountry_code" placeholder="code">
                                            </td>
                                            <td>
						<?php $selected = getData($_GET, 'phone_no'); ?>
                                                <input type="text" class="input-medium" name="phone_no" value="<?php echo $selected ?>" id="phone_no" placeholder="number">
                                            </td>
                                            <td>
						<?php $selected = getData($_GET, 'phone_type'); ?>
                                                <div class="styled-select width125">
                                                    <select name="phone_type" id="phone_type" class="input-medium">
                                                        <option value="">Select</option>
                                                        <option value="land line" <?php echo ($selected == 'land line') ? 'selected' : '' ?>>land line</option>
                                                        <option value="mobile" <?php echo ($selected == 'mobile') ? 'selected' : '' ?>>mobile</option>
                                                    </select>
                                                </div></td>
                                        </tr>
                                    </table>
                                    <span class="help-block">(country code - area code - number) Valid phone number where you can be reached is required</span>
                                </div>
                            </div>
                            <div class="control-group">

                                <div class="controls">
                                    <button type="submit" class="btn btn-danger btn-large">Submit</button>
                                    <button type="reset" class="btn btn-large">Cancel</button>

                                </div>
                            </div>
                            <input type="hidden" name="action" value="new"/>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'common/footer.php'; ?>

    <script type="text/javascript">
	$(document).ready(function() {

	    $("#country_code").change(function() {
		var str = $("#country_code option:selected").text();
		var value = str.split("-");
		$("#pcountry_code").val(value[1]);
	    });


	    $('#user-registration').validate(
		    {
			rules: {
			    first_name: {
				minlength: 2,
				required: true
			    },
			    last_name: {
				minlength: 2,
				required: true
			    },
			    email: {
				required: true,
				email: true
			    },
			    re_email: {
				required: true,
				email: true,
				equalTo: "#email"
			    },
			    password: {
				required: true
			    },
			    re_pass: {
				required: true,
				equalTo: "#password"
			    },
			    country_code: {
				required: true
			    },
			    pcountry_code: {
				required: true
			    },
			    pcountry_area: {
				required: true,
				number: true
			    },
			    phone_no: {
				required: true,
				number: true
			    },
			    phone_type: {
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