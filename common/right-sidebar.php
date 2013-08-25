<?php if (isset($_SESSION['frontend']['username'])): ?>
    <div class="block sidebar">
        <div class="block-title">
    	<p class="left-align">Welcome</p>
        </div>
        <div class="block-content">
	    <?php
	    $customer = loggedInUser();
	    ?>
    	<ul class="nav">
    	    <li>
    		<a href="user-profile.php"><?php echo $customer['first_name'] . ' ' . $customer['last_name'] ?></a>
    	    </li>
    	    <li>
    		<a href="logout.php">Logout</a>
    	    </li>

    	</ul>

        </div>
    </div>
<?php endif; ?>

<?php include'todays_activity.php'; ?>
<div class="block sidebar">
    <div class="block-title">
        <p class="left-align">WHY WE ARE</p>
    </div>
    <div class="block-content">
        <div>
            <ul class="nav">
                <li><a href="#">10+ years experiences in the custom writing market</a> </li>
                <li><a href="#">A wide range of services</a> </li>
                <li><a href="#">Satisfied and returning customer</a> </li>
                <li><a href="#">6-hours delivery available</a> </li>
                <li><a href="#">Money-back guarantee</a> </li>
                <li><a href="#">100% privacy guaranteed</a> </li>
                <li><a href="#">Professional team of experienced paper writers</a> </li>
                <li><a href="#">Only custom written papers</a> </li>
                <li><a href="#">Free amendments upon request</a> </li>
                <li><a href="#">Constant access to your paper writer</a> </li>
                <li><a href="#">Free extras by your request</a> </li>
            </ul>
        </div>

    </div>
</div>
<div class="block sidebar">
    <div class="block-title">
        <p class="left-align">FREE FEATURES</p>
    </div>
    <div class="block-content">
        <div>
            <ul class="nav">
                <li><a href="#">FREE Outline <span class="pull-right amount">$5</span></a> </li>
                <li><a href="#">FREE Unlimited Amendments*  <span class="pull-right amount">$30</span></a></li>
                <li><a href="#">FREE Title Page  <span class="pull-right amount">$5</span></a></li>
                <li><a href="#">FREE Bibliography  <span class="pull-right amount">$15</span></a></li>
                <li><a href="#">FREE Formatting  <span class="pull-right amount">$10</span></a></li>

            </ul>
        </div>

    </div>
</div>

<?php if (!isset($_SESSION['frontend']['username'])): ?>
    <div class="block sidebar">
        <div class="block-title">
    	<p class="left-align">CUSTOMER SERVICES</p>
        </div>
        <div class="block-content">
    	<div>
    	    <form id="side-login" action="processLogin.php" style="overflow: hidden;" method="post">
    		<input class="input-medium" id="username" name="email" type="text" style="padding: 0;height: 34px; width: 184px; margin: 10px 0 0 14px;" placeholder="Email">
    		<input class="input-medium" id="password" name="password" type="password" style="padding: 0;height: 34px; width: 184px; margin: 10px 0 12px 14px;" placeholder="Password">
    		<input align="right" type="image" src="theme/img/submit.png" alt="submit">
    	    </form>
    	    <span>
    		<a style="color: #EF1E23; font-size: 14px; font-family: calibri; margin-left: 16px; text-decoration: none;" href="forgot-password.php">Forgot your password?</a>
    		<br/>
    		<a style="color: #EF1E23; font-size: 14px; font-family: calibri; margin-left: 16px; text-decoration: none;" href="user_registration.php">Don't have an account?</a>
    	    </span>
    	</div>

        </div>
    </div>
<?php endif; ?>




<div class="block sidebar">
    <div class="block-content">
        <div style="position: relative;">
            <img src="theme/img/freeGuide.png"/>
            <a href="">
                <img style="left: 82px;position: absolute; top: 55px;" src="theme/img/getfreeGuide_btn.png"/>
            </a>
        </div>

    </div>
</div>
<div class="block sidebar" style="overflow: hidden;">
    <div class="block-content">
        <div>
            <img src="theme/img/tk.png"/>
            <span style="font-family: calibri; font-size: 16px; font-weight: bold; color: #000;">Total Savings : $50</span>
            <span style="font-family: calibri; font-size: 12px; color: #838383; float: right; margin-right: 5px;">*provided upon request</span>
        </div>

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
	$('#side-login').validate(
		{
		    rules: {
			username: {
			    required: true
			},
			password: {
			    required: true
			}
		    },
		    messages: {
			username: {
			    required: "Username can not be empty",
			},
			password: {
			    required: "Password can not be empty",
			}
		    }
		});

    }); // end document.ready
</script>

<style>
    label.error{padding: 2px 15px !important;}
    .amount {color: red;}
</style>
