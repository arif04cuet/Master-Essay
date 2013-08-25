<?php include('check_order.php') ?>
<?php include('common/header.php') ?>

<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
        <div class="content span9 block">
            <div class="contentPstyle">
                <style type="text/css">
                    .order-details label{font-weight: bold;}
                    select{margin: 0}
                    form#credit-card .control-label{text-align:left}
                </style>


		<?php
		$preview_date = $_SESSION['order'];
//                echo "<pre>";
//                print_r($preview_date);
//                echo "</pre>";
		?>
                <!-- Example row of columns -->
                <div class="row-fluid order-details">

		    <div class="span11">
			<h2 class="header-title">Order Details</h2>

			<table class="table table-condensed">
			    <tr>
				<td><label>Code</label></td>
				<td></td>
				<td><?php echo uniqid(); ?></td>
			    </tr>
			    <tr>
				<td><label>Topic</label></td>
				<td></td>
				<td> <?php echo $value = isset($preview_date['topic']) ? $preview_date['topic'] : '' ?></td>
			    </tr>
			    <tr>
				<td><label>Deadline</label></td>
				<td></td>
				<td><?php echo date("M j , H:i (e)"); ?></td>
			    </tr>
			    <tr>
				<td><label>Type</label></td>
				<td></td>
				<td> <?php echo $value = isset($preview_date['type_document']) ? $preview_date['type_document'] : '' ?></td>
			    </tr><tr>
				<td><label>Level</label></td>
				<td></td>
				<td> <?php echo $value = isset($preview_date['level']) ? $preview_date['level'] : '' ?></td>
			    </tr><tr>
				<td><label>Number of pages </label></td>
				<td></td>
				<td> <?php echo $value = isset($preview_date['number_of_pages']) ? $preview_date['number_of_pages'] : '' ?></td>
			    </tr><tr>
				<td><label>Spacing</label></td>
				<td></td>
				<td><?php echo $value = isset($preview_date['spacing']) ? $preview_date['spacing'] : '' ?></td>
			    </tr>

			    <tr>
				<td><label><h4>Order Total  </h4></label></td>
				<td></td>
				<td>
				    <table>
					<tr>
					    <td>

						<span class="total">
						    <?php echo $preview_date['total'] ?>
						</span>
					    </td>
					    <td>
						<?php $select = isset($preview_date['currency']) ? $preview_date['currency'] : 'USD' ?>
						<div class="styled-select width125">
						    <select name="currency" class="input-medium">
							<?php
							$currency_list = getCurrentcyList();
							?>
							<?php foreach ($currency_list as $value): ?>
    							<option value="<?php echo $value ?>" <?php if ($select == $value) echo 'selected' ?>><?php echo $value ?></option>
							<?php endforeach; ?>
						    </select>
						</div>
						<img src="theme/img/ajax-loader.gif" alt="" class="loader"/>
					    </td>
					</tr>
				    </table>


				</td>
			    </tr>
			</table>
			<h3 class="header-title">Pay with Paypal</h3>
			<hr/>
			<div class="row-fluid">
			    <div class="span6">
				<form action="sample_payments.php" method="post">
				    <input type="hidden" name="cmd" value="_xclick">
				    <input type="hidden" name="lc" value="US">
				    <input type="hidden" name="item_number" value="<?php echo rand(111111, 999999) ?>">
				    <input type="hidden" name="button_subtype" value="services">
				    <input type="hidden" name="no_note" value="0">
				    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
				    <input type="image"
					   src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif"
					   border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif"
					 width="1" height="1">
				</form>
			    </div>
			    <div class="span6">
				<img src="theme/img/interac_en_logo.png"/>
				<a href="http://www.interaconline.com/learn" target="_blank">Interac Online</a>
			    </div>
			</div>
			<form class="form-horizontal" action="order_success.php" method="POST" id="credit-card">
			    <!--		    <form class="paypal" action="sample_payments.php" method="post" id="paypal_form" target="_blank">
						    <input type="hidden" name="cmd" value="_xclick" />
						    <input type="hidden" name="no_note" value="1" />
						    <input type="hidden" name="lc" value="UK" />
						    <input type="hidden" name="currency_code" value="GBP" />
						    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
						    <input type="hidden" name="first_name" value="Customer's First Name"  />
						    <input type="hidden" name="last_name" value="Customer's Last Name"  />
						    <input type="hidden" name="payer_email" value="arif04cuet@gmail.com"  />
						    <input type="hidden" name="item_number" value="123456" />
						    <input type="hidden" name="amount" value="" />
						    <input type="submit"  value="Submit Order" class="btn btn-large btn-success"/>
						</form>-->

		    </div>

		    <div class="span11">
			<br/>
			<br/>
			<h3 class="header-title">Or Credit Card</h3>
			<hr/>

			<fieldset>
			    <!-- Card Number -->
			    <div class="control-group">
				<label class="control-label"  for="card_number">Card Number <span>*</span></label>
				<div class="controls">
				    <input type="text" id="card_number" name="card_number" placeholder="" class="input-xlarge">
				    <span class="help-block"><img src="theme/img/paypal+cards.png" alt="" width="270" /></span>
				</div>
			    </div>


			    <!-- Expiry-->
			    <div class="control-group">
				<label class="control-label" for="password">Card Expiry Date <span>*</span></label>
				<div class="controls">
				    <table>
					<tr>

					    <td>
						<div class="styled-select width125">
						    <select class="input-medium" name="expiry_month" id="expiry_month">
							<option value="">Month</option>
							<option value="01">Jan (01)</option>
							<option value="02">Feb (02)</option>
							<option value="03">Mar (03)</option>
							<option value="04">Apr (04)</option>
							<option value="05">May (05)</option>
							<option value="06">June (06)</option>
							<option value="07">July (07)</option>
							<option value="08">Aug (08)</option>
							<option value="09">Sep (09)</option>
							<option value="10">Oct (10)</option>1
							<option value="11">Nov (11)</option>
							<option value="12">Dec (12)</option>
						    </select>
						</div>
					    </td>
					    <td>
						<div class="styled-select width125">
						    <select class="input-medium" name="expiry_year">
							<option value="">Year</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
						    </select>
						</div>
					    </td>
					    <td>

						<input type="text" id="cvv" name="cvv" placeholder="CVV" class="input-mini">
					    </td>
					</tr>
				    </table>


				</div>
			    </div>


			    <div class="control-group">
				<label class="control-label"  for="holder_fname">Card Holder First Name <span>*</span></label>
				<div class="controls">
				    <input type="text" id="holder_fname" name="holder_fname" placeholder="First Name" class="input-xlarge">
				</div>
			    </div>
			    <div class="control-group">
				<label class="control-label"  for="holder_lname">Card Holder Last Name <span>*</span></label>
				<div class="controls">
				    <input type="text" id="holder_lname" name="holder_lname" placeholder="Last Name" class="input-xlarge">
				</div>
			    </div> <div class="control-group">
				<label class="control-label"  for="billing_address">Billing Address<span>*</span></label>
				<div class="controls">
				    <textarea id="billing_address" name="billing_address" class="input-xlarge"></textarea>
				</div>
			    </div> <div class="control-group">
				<label class="control-label"  for="city_town">City/Town<span>*</span></label>
				<div class="controls">
				    <input type="text" id="city_town" name="city_town" placeholder="City/Town" class="input-xlarge">
				</div>
			    </div> <div class="control-group">
				<label class="control-label"  for="holder_name">Country<span>*</span></label>
				<div class="controls">
				    <div class="styled-select width145">
					<select id="country" name="c_country" class="input-xlarge">
					    <?php foreach (coutryListWithCode() as $code => $name): ?>
    					    <option value="<?php echo $code ?>"><?php echo $name ?></option>
					    <?php endforeach; ?>
					</select>
				    </div>
				</div>
			    </div>

			    <div class="control-group">
				<label class="control-label"  for="zip_code">Zip / Postal Code<span>*</span></label>
				<div class="controls">
				    <input type="text" id="zip_code" name="zip_code" placeholder="Zip / Postal Code" class="input-xlarge">
				</div>
			    </div>

			    <div class="control-group">
				<label class="control-label"  for="holder_phone">Card Holder Phone no.<span>*</span></label>
				<div class="controls">
				    <input type="text" id="holder_phone" name="holder_phone" placeholder="Card Holder Phone no." class="input-xlarge">
				</div>
			    </div>
			    <!-- Submit -->
			    <div class="control-group">
				<div class="controls">
				    <button class="btn btn-danger btn-large">Submit Order</button>
				    <a href="order-reset.php" class="btn btn-danger btn-large">Cancel</a>
				</div>
			    </div>

			</fieldset>

		    </div>
                    </form>

                </div>

                <div class="row-fluid">

                </div>

                <script src="theme/js/jquery.validate.js" type="text/javascript"></script>
                <script type="text/javascript">
		    $(document).ready(function() {
			setPaypalForm();

			var previous;
			$('select[name="currency"]').change(function() {
			    var $to = $(this).val();
			    setCurrencyValue($to);
			    return false;
			}).focus(function() {
			    previous = $(this).val();
			});


			$('#credit-card').validate(
				{
				    rules: {
					card_number: {
					    required: true,
					    creditcard: true
					},
					last_name: {
					    required: true
					},
					expiry_year: {
					    required: true
					},
					cvv: {
					    required: true
					},
					holder_fname: {
					    required: true},
					holder_lname: {
					    required: true
					},
					billing_address: {
					    required: true
					},
					city_town: {
					    required: true
					},
					country: {
					    required: true
					},
					zip_code: {
					    required: true
					},
					holder_phone: {
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

			function setPaypalForm()
			{
			    $("form#paypal_form input[name='currency_code']").val($('select[name="currency"]').val());
			    $("form#paypal_form input[name='amount']").val($('input[name="total"]').val());
			}
			function setCurrencyValue(toCurrency)
			{
			    $("img.loader").show();
			    $.ajax({
				dataType: "json",
				type: "POST",
				url: "get_currency.php",
				data: {to: toCurrency, page: 'checkout'}
			    }).done(function(response) {
				$("img.loader").hide();
				$("span.total").text(response.total);
			    });
			}

		    }); // end document.ready
                </script>
            </div>
        </div>
    </div>
</div>
<?php include 'common/footer.php'; ?>
