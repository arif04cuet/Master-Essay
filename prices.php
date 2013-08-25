<?php include 'common/header.php'; ?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
	<?php
	$db = new Database();
	$db->connect();
	$service_name = htmlentities(getData($_GET, 'type_document', 'PRICES'));
	$where = 'name="' . $service_name . '"';
	$db->select('services', '*', NULL, $where);
	$service = '';
	if ($db->numResults)
	    $service = $db->getResult();
	?>
        <div class="content span6">
            <h1 class="header-title"><?php echo ($service) ? $service['name'] : 'PRICES' ?> <span class="stripe" style=""></span></h1>
            <div class="service-list row-fluid block">
                <div class="contentPstyle">


		    <?php if ($service): ?>
			<?php echo $service['description'] ?>
		    <?php else: ?>
    		    Master Essays prides itself on offering the best possible prices to our clients. That being said – we will never skimp on quality in order to provide you with a cut rate. Other writing services contract foreign workers and pay them pennies per page. Master Essays uses only qualified writers to handle your projects. That way, you can rest assured that you will always get what you pay for!<br/><br/>
    		    The price for your project is determined by its level of difficulty, writing level, and the deadline. Feel free to view the pricing index below for a free quote. If your assignment is not listed as one of our services, please provide a detailed summary of your assignment in our custom quote section and we will get back to you shortly.
		    <?php endif; ?>


                </div>
            </div>
            <div class="row-fluid block price-calculation">
                <br/>

                <div class="contentPstyle">
                    <form class="form-horizontal" id="price-calculation-form">
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
                            <label class="control-label" for="type_document">Type of document:<span></span></label>
                            <div class="controls">
				<?php $selected = getData($_GET, 'type_document', 'Admission Services - Admission Essay'); ?>
                                <div class="styled-select width145">
                                    <select name="type_document" id="type_document" class="input-xlarge ajax">
					<?php
					$serviceList = getProductsList();
					?>
					<?php foreach ($serviceList as $name): ?>
    					<option value="<?php echo $name ?>" <?php echo ($selected == $name) ? 'selected' : '' ?>><?php echo $name ?></option>
    					</optgroup>
					<?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="subject_area">Subject Area:<span>*</span></label>
                            <div class="controls">
                                <div class="styled-select width145">
				    <?php $selected = getData($_GET, 'subject_area'); ?>
                                    <select name="subject_area" id="subject_area" class="input-xlarge ajax">
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
                            <label class = "control-label" for = "number_of_pages">Number Of Pages :<span>*</span></label>
                            <div class = "controls">
                                <input type="text" class="input-mini" name="number_of_pages" id="number_of_pages" value="" placeholder="NOP">
                            </div>
                        </div>
                        <input type="hidden" name="page" value="check_price"/>
                    </form>

                </div>
            </div>
            <img src="theme/img/ajax-loader.gif" alt="" class="loader"/>
            <div class="price-list row-fluid block" id="show-list">

            </div>
            <div class="row-fluid block">
                <img src="theme/img/price-list1.png" alt=""/>
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

	callAjax();
	$('div.btn-group[data-toggle-name="currency"]').each(function() {
	    var group = $(this);
	    var form = group.parents('form').eq(0);
	    var name = group.attr('data-toggle-name');
	    var hidden = $('input[name="' + name + '"]', form);
	    $('button', group).each(function() {
		var button = $(this);
		button.on('click', function() {
		    hidden.val($(this).val());
		    callAjax();
		});
		if (button.val() == hidden.val()) {
		    button.addClass('active');
		}
	    });
	});

	$("select.ajax").change(function() {
	    callAjax();
	});

	$("#number_of_pages").keyup(function() {
	    callAjax();
	});
	function callAjax()
	{
	    var form = $('#price-calculation-form');
	    $("img.loader").show();
	    $.ajax({
		type: "POST",
		url: "ajax_call.php",
		data: form.serialize()
	    }).done(function(msg) {
		$("img.loader").hide();
		$("#show-list").html(msg);
	    });
	    return false;
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
	    else if ($currency == 'AUD') {
		$symble = 'A$';
	    }
	    $('span.cur-symble').text($symble);
	}

    }); // end document.ready
</script>

<style type="text/css">
    .priceService h4{
        background: #ef1e23;
        margin: 0;
        padding: 0;
        width: 330px;
        text-transform: uppercase;
        color: #FFF;
        padding: 16px 0 16px 17px;
    }
    .priceAdditional{
        width: 347px;
        background: #f3f3f3;
        float: left;

    }
    .priceSpan{
        color: #7C7C7C;
        float: left;
        padding: 17px 10px 10px 17px;
        text-align: justify;
        height: 132px;
        width: 290px;
        /*        position: relative;*/
    }
    .addCartArrow{
        position: absolute;
        /*        top: 0px;*/
        right: 120px;
    }
</style>