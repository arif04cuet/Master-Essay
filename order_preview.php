<?php include('check_order.php') ?>
<?php include('common/header.php') ?>

<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
        <div class="content span9 block">
            <div class="contentPstyle">
                <h2 class="header-title">Preview Your Order</h2>
		<?php $preview_date = $_SESSION['order']; ?>
		<?php if ($preview_date['discount_amount']): ?>
    		<div class="alert alert-success">
    		    <a class="close" data-dismiss="alert">×</a>
    		    Congratulation! you got discount <?php echo $preview_date['discount_amount']; ?>
    		</div>
		<?php endif; ?>
                <!-- Example row of columns -->
                <div class="row-fluid preview-order">

                    <br style="clear: both"/>
		    <?php if (!isset($_SESSION['frontend']['username'])): ?>

    		    <fieldset>
    			<legend class="header-title">Personal Info</legend>
    			<table class="table table-bordered table-condensed ">
    			    <tr>
    				<td><label class="control-label" for="first_name">First name:<span></span></label></td>
    				<td> <?php echo $value = isset($preview_date['first_name']) ? $preview_date['first_name'] : '' ?></td>
    				<td><label class="control-label" for="last_name">Last name:<span></span></label></td>
    				<td><?php echo $value = isset($preview_date['last_name']) ? $preview_date['last_name'] : '' ?></td>
    			    </tr>
    			    <tr>
    				<td><label class="control-label" for="email">Email : <span></span></label></td>
    				<td><?php echo $value = isset($preview_date['email']) ? $preview_date['email'] : '' ?></td>
    				<td><label class="control-label" for="re_email">Re-type email: <span></span></label></td>
    				<td><?php echo $value = isset($preview_date['re_email']) ? $preview_date['re_email'] : '' ?></td>
    			    </tr>
    			    <tr>
    				<td> <label class="control-label" for="country_code">Country code:<span></span></label></td>
    				<td><?php echo $value = isset($preview_date['country_code']) ? $preview_date['country_code'] : '' ?></td>
    				<td> <label class="control-label" for="pcountry_code">Contact phone :<span></span></label></td>
    				<td><?php echo $value = isset($preview_date['pcountry_code']) ? $preview_date['pcountry_code'] : '' ?>
					<?php echo $value = isset($preview_date['pcountry_area']) ? $preview_date['pcountry_area'] : '' ?>
					<?php echo $value = isset($preview_date['phone_no']) ? $preview_date['phone_no'] : '' ?>
					<?php echo $value = isset($preview_date['phone_type']) ? $preview_date['phone_type'] : '' ?>
    				</td>
    			    </tr>

    			</table>



    		    </fieldset>
		    <?php endif; ?>
                    <fieldset>
                        <legend class="header-title">Order Details</legend>
                        <table class="table table-bordered table-condensed ">
                            <tr>
                                <td><label class="control-label" for="topic">Topic:<span></span></label></td>
                                <td><?php echo $value = isset($preview_date['topic']) ? $preview_date['topic'] : '' ?></td>
                                <td><label class="control-label" for="type_document">Type of document:<span></span></label></td>
                                <td><?php echo $value = isset($preview_date['type_document']) ? $preview_date['type_document'] : '' ?></td>
                            </tr>
                            <tr>
                                <td><label class="control-label" for="urgency">Urgency:<span></span></label></td>
                                <td><?php echo $value = isset($preview_date['urgency']) ? $preview_date['urgency'] : '' ?></td>
                                <td><label class="control-label" for="level">Level:<span></span></label></td>
                                <td><?php echo $value = isset($preview_date['level']) ? $preview_date['level'] : '' ?></td>
                            </tr>
                            <tr>
                                <td><label class="control-label" for="spacing">Spacing:</label></td>
                                <td><?php echo $value = isset($preview_date['spacing']) ? $preview_date['spacing'] : '' ?></td>
                                <td><label class="control-label" for="number_of_pages">Number of pages/words:<span></span></label></td>
                                <td><?php echo $value = isset($preview_date['number_of_pages']) ? $preview_date['number_of_pages'] : '' ?></td>
                            </tr>
                            <tr>
                                <td><label class="control-label" for="cost_per_page">Cost per page:<span></span></label></td>
                                <td><?php echo $value = isset($preview_date['cost_per_page']) ? $preview_date['cost_per_page'] : '' ?></td>
                                <td><label class="control-label" for="page_summery">1-page summary of your paper:<span></span></label></td>
                                <td><?php echo $value = isset($preview_date['page_summery']) ? 'Yes' : '' ?></td>
                            </tr>
                            <tr>
                                <td><label class="control-label" for="subject_area">Subject Area:<span></span></label></td>
                                <td><?php echo $value = isset($preview_date['academic_level']) ? $preview_date['academic_level'] : '' ?></td>
                                <td><label class="control-label" for="style">Style: <span></span></label></td>
                                <td><?php echo $value = isset($preview_date['style']) ? $preview_date['style'] : '' ?></td>
                            </tr>

                            <tr>
                                <td>  <label class="control-label" for="no_sources">Number of sources/references: <span></span></label></td>
                                <td> <?php echo $value = isset($preview_date['no_sources']) ? $preview_date['no_sources'] : '' ?></td>
                                <td><label class="control-label" for="preferred_lang">How did you hear about us ? <span></span></label></td>
                                <td> <?php echo $value = isset($preview_date['how_you_heard']) ? $preview_date['how_you_heard'] : '' ?></td>
                            </tr>
                            <tr>
                                <td><label class="control-label" for="order_description">Order description: <span></span><br/></label></td>
                                <td><?php echo $value = isset($preview_date['order_description']) ? $preview_date['order_description'] : '' ?></td>
                                <td><label class="control-label" for="academic_level">Academic Level: <span></span></label></td>
                                <td><?php echo $value = isset($preview_date['academic_level']) ? $preview_date['academic_level'] : '' ?></td>
                            </tr>
                            <tr>
                                <td><label class="control-label" for="preferred_writers_id">Preferred writer's ID (for returning customers): <span></span></label></td>
                                <td><?php echo $value = isset($preview_date['preferred_writers_id']) ? $preview_date['preferred_writers_id'] : '' ?></td>
                                <td><label class="control-label" for="night_calls">Discount Code: <span></span></label></td>
                                <td><?php echo $value = isset($preview_date['discount_code']) ? $preview_date['discount_code'] : '' ?></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td><label class="control-label" for="total"><h4>Total</h4></label></td>
                                <td><h4> <?php
		    echo $value = isset($preview_date['total']) ? $preview_date['total'] : '';
		    echo ' ' . $preview_date['currency']
		    ?></h4></td>
                            </tr>
                        </table>
                    </fieldset>
                    <div style="margin: 15px;">
			<?php
			$ignore = array('total', 'customer', 'cost_per_page', 'page', 'action');
			?>
                        <a href="place-order.php?<?php echo getQueryStringForPrice($preview_date, $ignore); ?>" class="edit btn btn-primary btn-large" style="float: left;margin-right: 10px">Edit</a>
                        <!--			<a href="reset-session.php" class="btn btn-danger btn-large" style="float: left">Cancel</a>-->
                        <a href="payment.php" class="btn btn-danger btn-large" style="float: right">Process to Payment</a>
                        <br style="clear: both"/>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
	//        $("a.edit").click(function() {
	//            $.ajax({
	//                type: "POST",
	//                url: "ajax_call.php",
	//                data: { page: 'order_preview', action: 'redirect'}
	//            }).done(function(msg) {
	//                window.location.href = 'http://localhost/cms/place-order.php?' + msg;
	//            });
	//            return false;
	//        });
    }); // end document.ready
</script>
<?php include 'common/footer.php'; ?>
