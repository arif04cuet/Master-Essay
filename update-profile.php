<?php include 'common/header-logged-in.php'; ?>
<?php include 'check.php'; ?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">

        <div class="content span12 block">
            <div class="contentPstyle">

                <div class="contentPstyle">
                    <h2 class="header-title">Profile Update</h2>
                    <hr/>
		    <?php
		    if ($_POST)
		    {
			$customerLoggedIn = loggedInUser();

			$customer = array();
			$customer['first_name'] = $_POST['first_name'];
			$customer['last_name'] = $_POST['last_name'];
			$customer['country'] = $_POST['country_code'];
			$customer['phone'] = $_POST['pcountry_code'] . '-' . $_POST['phone_no'] . '-' . $_POST['phone_type'];
			$password = $_POST['password'];
			if ($password != '')
			    $customer['password'] = md5($password);


			$db = new Database();
			$db->connect();
			$where = "id=" . $customerLoggedIn['id'];
			$success = $db->update('customers', $customer, $where);
			if ($success)
			{
			    ?>

			    <div class="alert alert-success">
				<a class="close" data-dismiss="alert">×</a>
				Profile has been updated successfully.
			    </div>

			    <?php
			}
		    }
		    ?>
		    <?php
		    $customer = loggedInUser();
		    $code_number = explode('-', $customer['phone']);
		    $code = $code_number[0];
		    $number = $code_number[1];
		    $type = isset($code_number[2]) ? $code_number[2] : '';
		    ?>

                    <form method="POST" class="form-horizontal" id="user-registration" action="">
                        <fieldset>

                            <div class="control-group">
                                <label class="control-label" for="first_name">First name:<span>*</span></label>
                                <div class="controls">
				    <?php $selected = getData($_GET, 'first_name'); ?>
                                    <input type = "text" class = "input-xlarge" name = "first_name" id = "first_name" value = "<?php echo $customer['first_name'] ?>">
                                </div>
                            </div>
                            <div class = "control-group">
                                <label class = "control-label" for = "last_name">Last name:<span>*</span></label>
                                <div class = "controls">
				    <?php $selected = getData($_GET, 'last_name'); ?>
                                    <input type="text" class="input-xlarge" name="last_name" id="last_name" value="<?php echo $customer['last_name'] ?>">
                                </div>
                            </div>
                            <div class="control-group">
				<?php $selected = getData($_GET, 'email'); ?>
                                <label class="control-label" for="email">Email : <span>*</span></label>
                                <div class="controls">
                                    <input disabled="disabled" type="text" class="input-xlarge" name="email" id="email" value="<?php echo $customer['email'] ?>">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="password">Password:<span>*</span></label>
                                <div class="controls">
                                    <input autocomplete="off" type="password" class="input-xlarge" name="password" id="password" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="re_pass">Re-Password:<span>*</span></label>
                                <div class="controls">
                                    <input autocomplete="off" type="password" class="input-xlarge" name="re_pass" id="re_pass" value="">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="country_code">Country code:<span>*</span></label>
                                <div class="controls">
                                    <div class="styled-select width145">
                                        <select name="country_code" id="country_code" class="input-xlarge">
                                            <option value="">Select country code</option>
					    <?php $selected = $customer['country'] ?>
					    <?php
					    $countryList = getCountryInformation();
					    ?>
					    <?php foreach ($countryList as $code => $name): ?>
    					    <option value="<?php echo $name['country_name'] ?>" <?php echo ($name['country_name'] == $selected) ? 'selected' : "" ?>><?php echo $name['country_name'], '-' . $name['dial_code'] ?></option>
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
						<?php $selected = $code; ?>
                                                <input type="text" class="input-mini" name="pcountry_code" value="<?php echo $selected ?>" id="pcountry_code" placeholder="code">
                                            </td>
                                            <td>
						<?php $selected = $number; ?>
                                                <input type="text" class="input-medium" name="phone_no" value="<?php echo $selected ?>" id="phone_no" placeholder="number">
                                            </td>
                                            <td>
						<?php $selected = $type; ?>
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
                            <input type="hidden" name="action" value="update"/>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'common/footer-logged-in.php'; ?>


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
			re_pass: {
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
