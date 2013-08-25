<?php include 'common/header.php'; ?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
        <div class="content span9 block">
            <div class="contentPstyle">
                <h1 class="header-title">Place Order <span style="" class="stripe"></span></h1>
                <!-- Example row of columns -->
                <div class="row-fluid">
                    <form action="order_preview_process.php" method="POST" id="order-form" class="form-horizontal">
			<?php if (!isset($_SESSION['frontend']['username'])): ?>
    			<fieldset>
    			    <legend class=""><img src="theme/img/personal-info.png"/></legend>
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
    			</fieldset>
			<?php else: ?>
    			<input type="hidden" name="customer" value="1" id="customer"/>
			<?php endif; ?>


                        <fieldset>
                            <legend class=""><img src="theme/img/order-details.png"/></legend>
                            <div class="control-group">
                                <label class="control-label" for="topic">Topic:<span>*</span></label>
                                <div class="controls">
				    <?php $selected = getData($_GET, 'topic'); ?>
                                    <input type="text" class="input-xlarge" name="topic" id="topic" value="<?php echo $selected; ?>" placeholder="Topic">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="type_document">Type of document:<span></span></label>
                                <div class="controls">
                                    <div class="styled-select width145">
                                        <select name="type_document" id="type_document" class="input-xlarge">
					    <?php $selected = getData($_GET, 'type_document'); ?>
					    <?php
					    $serviceList = getProductsList();
					    ?>
					    <?php foreach ($serviceList as $service => $name): ?>
    					    <option value="<?php echo $name ?>" <?php echo ($name == $selected) ? 'selected' : "" ?>><?php echo $name ?></option>
					    <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="urgency">Urgency:<span></span></label>
                                <div class="controls">
                                    <div class="styled-select width145">

                                        <select name="urgency" id="urgency" class="input-xlarge">
					    <?php $selected = getData($_GET, 'urgency'); ?>
					    <?php
					    $list = getUrgencyList();
					    ?>
					    <?php foreach ($list as $name): ?>
    					    <option value="<?php echo $name ?>" <?php echo ($name == $selected) ? 'selected' : "" ?>><?php echo $name ?></option>
					    <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="level">Level:<span></span></label>
                                <div class="controls">
                                    <div>

                                        <select size="1" name="level" id="level" style="display: none;" class="">
					    <?php $selected = getData($_GET, 'level', 'Standard Quality'); ?>
					    <?php
					    $list = getLevelList();
					    ?>
					    <?php foreach ($list as $name): ?>
    					    <option value="<?php echo $name ?>" <?php echo ($name == $selected) ? 'selected' : "" ?>><?php echo $name ?></option>
					    <?php endforeach; ?>
                                        </select>

                                        <a id="select-level-value" href="#" class="icon-chevron-down"><?php echo $selected ?></a>

                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="level">Spacing:</label>
                                <div class="controls">
				    <?php $selected = getData($_GET, 'spacing', 'Double Spaced'); ?>
                                    <div class="btn-group" data-toggle-name="spacing" data-toggle="buttons-radio" >
                                        <button type="button" value="Double Spaced" class="btn <?php echo ($selected == 'Double Spaced') ? 'active' : ''; ?>" data-toggle="button">Double Spaced</button>
<!--                                        <button type="button" value="Single Spaced" class="btn <?php echo ($selected == 'Single Spaced') ? 'active' : ''; ?>" data-toggle="button">Single Spaced</button>-->
                                    </div>
                                    <input type="hidden" name="spacing" value="<?php echo $selected ?>" />

                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label" for="number_of_pages">Number of pages/words:<span>*</span></label>

                                <div class="controls">
                                    <div class="styled-select width145">

                                        <select name="number_of_pages" id="number_of_pages" class="input-xlarge">
					    <?php $selected = getData($_GET, 'number_of_pages', '1'); ?>
					    <?php
					    $list = getPageList();
					    ?>
					    <?php foreach ($list as $key => $name): ?>
    					    <option value="<?php echo $key ?>" <?php echo ($key == $selected) ? 'selected' : "" ?>><?php echo $name ?></option>
					    <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="currency">Currency:<span></span></label>
                                <div class="controls">
				    <?php $selected = getData($_GET, 'currency', 'CAD'); ?>
                                    <div class="btn-group" data-toggle-name="currency" data-toggle="buttons-radio" >
					<?php
					$currency_list = getCurrentcyList();
					?>
					<?php foreach ($currency_list as $value): ?>
    					<button type="button" value="<?php echo $value ?>" class="btn <?php echo ($selected == $value) ? 'active' : ''; ?>" data-toggle="button"><?php echo $value ?></button>
					<?php endforeach; ?>

                                    </div>
                                    <input type="hidden" name="currency" value="<?php echo $selected ?>" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="cost_per_page">Cost per page:<span></span></label>
                                <div class="controls">
                                    <div><img src="theme/img/ajax-loader.gif" alt="" class="loader"/></div>
                                    <span class="cur-symble">$</span>
                                    <span id="cost_per_page"></span>
<!--                                    <input type="text" class="input-medium" name="cost_per_page" id="cost_per_page" value="" placeholder="cost per page" readonly />-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="page_summery">1-page summary of your paper:<span></span></label>
                                <div class="controls">
				    <?php $selected = getData($_GET, 'page_summery'); ?>
                                    <input type="checkbox" <?php if ($selected): ?>checked="checked" <?php endif; ?> class="input-xlarge" name="page_summery" id="page_summery" value="1" placeholder="Page summery" >
                                    <span class="cur-symble">$</span>
                                    <span class="page_summery_price"></span>
                                    <a href="" title="For $19.99 you can receive a 1-page summary of your paper that will highlight the main points"><img src="./theme/img/help.png" alt="hlep" /></a>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="subject_area">Subject Area:<span>*</span></label>
                                <div class="controls">
                                    <div class="styled-select width145">
					<?php $selected = getData($_GET, 'subject_area'); ?>
                                        <select name="subject_area" id="subject_area" class="input-xlarge">
                                            <option value="">Select</option>
					    <?php
					    $list = getSubjectAreaList();
					    ?>
					    <?php foreach ($list as $name): ?>
    					    <option value="<?php echo $name ?>" <?php echo ($name == $selected) ? 'selected' : "" ?>><?php echo $name ?></option>
					    <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="total">Total:<span></span></label>
                                <div class="controls">
                                    <span class="cur-symble">$</span>
                                    <span id="total"></span>
<!--                                    <input type="text" class="input-medium" name="total" id="total" value="" placeholder="" readonly>-->
                                    <a href="" title="The total price of your paper"><img src="./theme/img/help.png" alt="hlep" /></a>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="academic_level">Academic Level: <span></span></label>
                                <div class="controls">
                                    <div class="styled-select width145">
					<?php $selected = getData($_GET, 'academic_level'); ?>
                                        <select name="academic_level" id="academic_level" class="input-xlarge">
                                            <option value="">select</option>
					    <?php
					    $list = getAcademicLevelList();
					    ?>
					    <?php foreach ($list as $name): ?>
    					    <option value="<?php echo $name ?>" <?php echo ($name == $selected) ? 'selected' : "" ?>><?php echo $name ?></option>
					    <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="style">Style: <span></span></label>
                                <div class="controls">
                                    <div class="styled-select width145">
					<?php $selected = getData($_GET, 'style', 'APA'); ?>
                                        <select name="style" id="style" class="input-xlarge">
					    <?php
					    $list = getStylelList();
					    ?>
					    <?php foreach ($list as $name): ?>
    					    <option value="<?php echo $name ?>" <?php echo ($name == $selected) ? 'selected' : "" ?>><?php echo $name ?></option>
					    <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <a href="" title="Style"><img src="./theme/img/help.png" alt="hlep" /></a>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="no_sources">Number of sources/references: <span></span></label>
                                <div class="controls">
                                    <div class="styled-select width145">
					<?php $selected = getData($_GET, 'no_sources'); ?>
                                        <select name="no_sources" id="no_sources" class="input-xlarge">
					    <?php
					    $list = getNoOfResourceList();
					    ?>
					    <?php foreach ($list as $name): ?>
    					    <option value="<?php echo $name ?>" <?php echo ($name == $selected) ? 'selected' : "" ?>><?php echo $name ?></option>
					    <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <a href="" title="Total number of sources for your paper"><img src="./theme/img/help.png" alt="hlep" /></a>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="order_description">Order description: <span>*</span><br/><span>(type order description)</span></label>
                                <div class="controls">
				    <?php $selected = getData($_GET, 'order_description'); ?>
                                    <textarea style="width: 400px;height: 150px" class="input-xlarge" id="order_description" name="order_description" ><?php echo $selected ?></textarea><br/>
                                    <input type="checkbox" size="1" value="" name="will_upload_files" id="will_upload_files">
                                    I will upload additional files later in my account

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="preferred_writers_id">Preferred writer's ID (for returning customers): <span></span></label>
                                <div class="controls">
				    <?php $selected = getData($_GET, 'preferred_writers_id'); ?>
                                    <input class="input-xlarge" type="text" value="<?php echo $selected ?>" name="preferred_writers_id" id="preferred_writers_id">
                                    <a href=""></a><br/>
                                    <span>If your order is accepted by a writer you have chosen you will be charged additional +20%. This additional payment will go directly to the writer. This way your order will get the highest priority among others.</span>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class=""><img src="theme/img/discount-program.png"/></legend>
                            <div class="control-group">
                                <label class="control-label" for="discount_code">Discount Code:</label>
                                <div class="controls">
				    <?php $selected = getData($_GET, 'discount_code'); ?>
                                    <input type="text" class="input-xlarge" name="discount_code" id="discount_code" value="<?php echo $selected ?>" placeholder=""><br/>
                                    <span>Please, be aware that membership discounts are not applied to orders under $30.00</span><br/>
                                    <label class="radio">
                                        <input type="radio" name="accept" id="accept" value="1" checked="checked">
                                        I accept terms and conditions

                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="accept" id="accept" value="0">
                                        I do not accept terms and conditions
                                    </label>

                                </div>
                            </div>
			    <div class="control-group">
                                <label class="control-label" for="how_you_heard">How did you hear about us?</label>
                                <div class="controls">
				    <?php $selected = getData($_GET, 'how_you_heard'); ?>
                                    <div class="btn-group" data-toggle-name="how_you_heard" data-toggle="buttons-radio" >
                                        <button type="button" value="Google" class="btn <?php echo ($selected == 'Google') ? 'active' : '' ?>" data-toggle="button">Google</button>
                                        <button type="button" value="Kijiji" class="btn <?php echo ($selected == 'Kijiji') ? 'active' : '' ?>" data-toggle="button">Kijiji</button>
                                        <button type="button" value="On Campus" class="btn <?php echo ($selected == 'On Campus') ? 'active' : '' ?>" data-toggle="button">On Campus</button>
                                        <button type="button" value="Referral" class="btn <?php echo ($selected == 'Referral') ? 'active' : '' ?>" data-toggle="button">Referral</button>
					<button type="button" value="Other" class="btn <?php echo ($selected == 'Other') ? 'active' : '' ?>" data-toggle="button">Other</button>
                                    </div>
                                    <input type="hidden" name="how_you_heard" value="<?php echo $selected; ?>" />
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-danger btn-large">Preview >></button>
                            <button type="reset" class="btn btn-large">Cancel</button>
                        </div>
                        <input type="hidden" name="page" value="place-order"/>
                        <input type="hidden" name="action" value="getUnitePrice"/>
                    </form>
                </div>
            </div>

            <div id="select-level-popup" style="display: none;z-index: 100">
                <div class="main">
                    <div class="close">
                        <a href="#" class="close-level-popup">Close X</a>
                    </div>
                    <table>
                        <colgroup>
                            <col>
                            <col align="center">
                            <col align="center">
                            <col align="center">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Standard</th>
                                <th>Premium</th>
                                <th>Platinum</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    Priority <sup title="Defines the speed and priority in serving the order">[<a onclick="return false;" href="#">?</a>]</sup>
                                </th>
                                <td>
                                    III
                                </td>
                                <td>
                                    II
                                </td>
                                <td>
                                    I
                                </td>
                            </tr>
                            <tr class="odd">
                                <th>
                                    Direct writer contact <sup title="Enables you to communicate with the writer using the company messaging system">[<a onclick="return false;" href="#">?</a>]</sup>
                                </th>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Writer background <sup title="Stand for an academic degree held by the writers serving a specific writer level">[<a onclick="return false;" href="#">?</a>]</sup>
                                </th>
                                <td>
                                    MA
                                </td>
                                <td>
                                    MA/PhD
                                </td>
                                <td>
                                    MA/PhD
                                </td>
                            </tr>
                            <tr class="odd">
                                <th>
                                    Progress notifications <sup title="Allows you to get regular message updates on your order state changes">[<a onclick="return false;" href="#">?</a>]</sup>
                                </th>
                                <td>
                                    &ndash;
                                </td>
                                <td>
                                    &ndash;
                                </td>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Completed by TOP 10 writers <sup title="Your order is written by top 10 performers in the subject area you’ve chosen">[<a onclick="return false;" href="#">?</a>]</sup>
                                </th>
                                <td>
                                    &ndash;
                                </td>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                            </tr>
                            <tr class="odd">
                                <th>
                                    Proofread by Quality Assurance <sup title="Your order is reviewed by a staff proofreader with solid tutoring background and a recognized academic degree">[<a onclick="return false;" href="#">?</a>]</sup>
                                </th>
                                <td>
                                    &ndash;
                                </td>
                                <td>
                                    &ndash;
                                </td>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    SMS notifications <sup title="You receive SMS notifications of important order states and your order completion">[<a onclick="return false;" href="#">?</a>]</sup>
                                </th>
                                <td>
                                    &ndash;
                                </td>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                            </tr>
                            <tr class="odd">
                                <th>
                                    FREE add-ons <sup title="You get a bibliography, title page, formatting, outline and amendments for FREE">[<a onclick="return false;" href="#">?</a>]</sup>
                                </th>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                                <td>
                                    <img width="12" height="12" alt="yes" src="theme/img/tick_bbg.gif">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Cost per page
                                </th>
                                <td>
                                    <span class="cur-symble">$</span>
                                    <span id="select-level-cpp-standard"></span>
                                </td>
                                <td>
                                    <span class="cur-symble">$</span>
                                    <span id="select-level-cpp-premium"></span>
                                </td>
                                <td><span class="cur-symble">$</span>
                                    <span id="select-level-cpp-platinum"></span>
                                </td>
                            </tr>
                            <tr class="odd">
                                <th>
                                    Total
                                </th>
                                <td>
                                    <span class="cur-symble">$</span>
                                    <span id="select-level-total-standard"></span>
                                </td>
                                <td>
                                    <span class="cur-symble">$</span>
                                    <span id="select-level-total-premium"></span>
                                </td>
                                <td>
                                    <span class="cur-symble">$</span>
                                    <span id="select-level-total-platinum"></span>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <span class="red">YOUR CHOICE</span> <sup title="Mark the writer level you would like to get for this order">[<a onclick="return false;" href="#">?</a>]</sup>
                                </th>
                                <td>
                                    <a name="Standard Quality" class="submit btn-danger btn" href="#">Submit</a>
                                </td>
                                <td>
                                    <a name="Premium Quality" class="submit btn-danger btn" href="#">Submit</a>
                                </td>
                                <td>
                                    <a name="Platinum Quality" class="submit btn-danger btn" href="#">Submit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>



            <script src="theme/js/jquery.validate.js" type="text/javascript"></script>
            <script type="text/javascript">
<?php if (isset($_GET['page_summery'])): ?>
    					$(window).bind("load", function() {
    					    $("#page_summery").trigger('click').attr('checked', 'checked');
    					});
<?php endif; ?>


					$(document).ready(function() {

					    setPopUpPrice($("input[name='spacing']").val());

<?php if (isset($_GET['currency']) and $_GET['currency'] != 'USD'): ?>
    					    //setCurrencyValue('USD', "<?php echo $_GET['currency'] ?>");
<?php endif; ?>

					    regerateUrgencyList();
					    $("#select-level-value").click(function() {
						//set Prices
						//setPopUpPrice($("input[name='spacing']").val());
						var position = $(this).position();
						$("#select-level-popup")
							.css('left', position.left + 10)
							.css('top', position.top + 20)
							.show();
						return false;
					    });
					    $("a.close-level-popup").click(function() {
						$("#select-level-popup").hide();
						return false;
					    });
					    $("a.submit").click(function() {
						var $value = $(this).attr('name');
						$('select#level').val($value);
						$("#select-level-value").text($value);
						$("#select-level-popup").hide();

						setPopUpPrice($("input[name='spacing']").val());
						//setUnitTotalPrice();
						return false;
					    });
					    $('div.btn-group[data-toggle-name="spacing"]').each(function() {
						var group = $(this);
						var form = group.parents('form').eq(0);
						var name = group.attr('data-toggle-name');
						var hidden = $('input[name="' + name + '"]', form);
						$('button', group).each(function() {
						    var button = $(this);
						    button.on('click', function() {
							hidden.val($(this).val());
							setPopUpPrice($("input[name='spacing']").val());
							//setUnitTotalPrice();
						    });
						    if (button.val() == hidden.val()) {
							button.addClass('active');
						    }
						});
					    });
					    $('div.btn-group[data-toggle-name="currency"]').each(function() {
						var group = $(this);
						var form = group.parents('form').eq(0);
						var name = group.attr('data-toggle-name');
						var hidden = $('input[name="' + name + '"]', form);
						$('button', group).each(function() {
						    var button = $(this);
						    button.on('click', function() {
							hidden.val($(this).val());
							setPopUpPrice($("input[name='spacing']").val());
						    });
						    if (button.val() == hidden.val()) {
							button.addClass('active');
						    }
						});
					    });

					    $('div.btn-group[data-toggle-name="how_you_heard"]').each(function() {
						var group = $(this);
						var form = group.parents('form').eq(0);
						var name = group.attr('data-toggle-name');
						var hidden = $('input[name="' + name + '"]', form);
						$('button', group).each(function() {
						    var button = $(this);
						    button.on('click', function() {
							hidden.val($(this).val());
						    });
						    if (button.val() == hidden.val()) {
							button.addClass('active');
						    }
						});
					    });
					    $("#country_code").change(function() {
						var str = $("#country_code option:selected").text();
						var value = str.split("-");
						$("#pcountry_code").val(value[1]);
					    });
					    $('#type_document').change(function() {
						regerateUrgencyList();
						setPopUpPrice($("input[name='spacing']").val());
					    });
					    $('#urgency').change(function() {
						setPopUpPrice($("input[name='spacing']").val());
					    });
					    $('#number_of_pages').change(function() {
						setPopUpPrice($("input[name='spacing']").val());
					    });
					    $('#page_summery').click(function() {
						setPopUpPrice($("input[name='spacing']").val());

					    });
					    $("#preferred_writers_id").focusout(function() {
						setPopUpPrice($("input[name='spacing']").val());
					    });
					    function regerateUrgencyList()
					    {

						$.ajax({
						    type: "POST",
						    url: "ajax_call.php",
						    data: {action: "regenerateUrgencyList", docType: $('#type_document').val()}
						}).done(function(response) {
						    $('#urgency').html(response);
						    var $selected = "<?php echo isset($_GET['urgency']) ? $_GET['urgency'] : '1' ?>";
						    $('#urgency option[value="' + $selected + '"]').attr('selected', 'selected');
						});
					    }
					    function setCurrencyValue(fromCurrency, toCurrency)
					    {
						$("img.loader").show();
						$.ajax({
						    type: "POST",
						    url: "get_currency.php",
						    data: { from: fromCurrency, to: toCurrency}
						}).done(function(msg) {
						    $("img.loader").hide();
						    var $rate = msg;
						    $("span.cur-symble").siblings('span').each(function() {
							var oldValue = parseFloat($(this).text());
							var newValue = oldValue * $rate;
							$(this).text(newValue.toFixed(2));
						    });
						    $("span.cur-symble").siblings('input').each(function() {
							var oldValue = parseFloat($(this).val());
							var newValue = oldValue * $rate;
							$(this).val(newValue.toFixed(2));
						    });
						});
					    }
					    function setCurrencySymble()
					    {
						var $currency = $("input[name='currency']").val();
						var $symble = '$';
						if ($currency == 'EUR')
						{
						    $symble = '€';
						}
						else if ($currency == 'GBP')
						{
						    $symble = '£';
						}
						else if ($currency == 'CAD') {
						    $symble = 'C$';
						}
						$('span.cur-symble').text($symble);
					    }
					    function setPopUpPrice($spacing)
					    {
						var $total = 0;
						var $page_summery = 0;
						var $number_of_pages = parseFloat($("#number_of_pages").val()).toFixed(2);
						if ($('#page_summery').is(':checked')) {
						    $page_summery = parseFloat($("span.page_summery_price").text());
						}

						//get unite value from database
						var $standard_unit_price = 0;
						var $premium_unit_price = 0;
						var $platinum_unit_price = 0;
						var $spacing_value = 1;
						if ($spacing == 'Single Spaced')
						{
						    $spacing_value = 2;
						}

						var form = $('#order-form');
						$("img.loader").show();
						$.ajax({
						    dataType: "json",
						    type: "POST",
						    url: "ajax_call.php",
						    data: form.serialize()
						}).done(function(response) {
						    $("img.loader").hide();
						    $standard_unit_price = response.standard;
						    $premium_unit_price = response.premium;
						    $platinum_unit_price = response.platinum;


						    $("#select-level-cpp-standard").text($standard_unit_price);
						    $("#select-level-total-standard").text('').text(response.standard_total);

						    $("#select-level-cpp-premium").text($premium_unit_price);
						    $("#select-level-total-premium").text('').text(response.premium_total);
						    ;

						    $("#select-level-cpp-platinum").text($platinum_unit_price);
						    $("#select-level-total-platinum").text('').text(response.platinum_total);
						    //set all prices
						    //setUnitTotalPrice();

						    $("#cost_per_page").text(response.cost_per_unit);
						    $(".page_summery_price").text(response.one_page_summary);
						    $("#total").text(response.total);
						    setCurrencySymble();

						});


					    }



					    $('#order-form').validate(
						    {
							rules: {

							    first_name: {
								minlength: 2,
								required: function(element) {
								    return !$('#customer').length
								}
							    },
							    last_name: {
								minlength: 2,
								required: function(element) {
								    return !$('#customer').length
								}
							    },
							    email: {
								required: function(element) {
								    return !$('#customer').length
								},
								email: true
							    },
							    re_email: {
								required: function(element) {
								    return !$('#customer').length
								},
								email: true,
								equalTo: "#email"
							    },
							    country_code: {
								required: function(element) {
								    return !$('#customer').length
								}
							    },
							    pcountry_code: {
								required: function(element) {
								    return !$('#customer').length
								}
							    },
							    pcountry_area: {
								required: function(element) {
								    return !$('#customer').length
								},
								number: true
							    },
							    phone_no: {
								required: function(element) {
								    return !$('#customer').length
								},
								number: true
							    },
							    phone_type: {
								required: function(element) {
								    return !$('#customer').length
								}
							    },
							    topic: {
								required: true
							    },
							    number_of_pages: {
								required: true
							    },
							    subject_area: {
								required: true
							    },
							    order_description: {
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
					    function priceCalculation()
					    {
						var $level = $("select#level").val();
						var $spacing = $("input[name='spacing']").val();
						var $number_of_pages = $("#number_of_pages").val();
						var $unitPrice = 0;
						var $total = 0;
						if ($level == 'Standard Quality' && $spacing == 'Double Spaced')
						{
						    $unitPrice = 17.14;
						}
						else if ($level == 'Premium Quality' && $spacing == 'Double Spaced')
						{
						    $unitPrice = 18.70;
						}
						else if ($level == 'Platinum Quality' && $spacing == 'Double Spaced')
						{
						    $unitPrice = 21.04;
						}
						else if ($level == 'Standard Quality' && $spacing == 'Single Spaced')
						{
						    $unitPrice = 34.28;
						}
						else if ($level == 'Premium Quality' && $spacing == 'Single Spaced')
						{
						    $unitPrice = 37.40;
						}
						else if ($level == 'Platinum Quality' && $spacing == 'Single Spaced')
						{
						    $unitPrice = 42.07;
						}
						$total = $unitPrice * $number_of_pages;
						$("#cost_per_page").text($unitPrice);
						$("span.page_summery_price").text($unitPrice);
						$("#total").text($total);
					    }
					}); // end document.ready
            </script>

        </div>
    </div>
</div>
<?php include 'common/footer.php'; ?>






