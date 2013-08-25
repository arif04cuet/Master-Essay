<?php include 'common/header.php'; ?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
        <div class="content span6">
	    <div class="slider row-fluid">
		<div class="slider-content block" id="first"><img src="theme/img/1.jpg"/></div>
		<div class="slider-content block" id="second"><img src="theme/img/2.jpg"/></div>
		<div class="slider-content block" id="third"><img src="theme/img/3.jpg"/></div>
		<div class="slider-content block" id="four"><img src="theme/img/4.jpg"/></div>
		<div class="slider-content block" id="five"><img src="theme/img/5.jpg"/></div>
		<div class="slider-content block" id="six"><img src="theme/img/6.jpg"/></div>
                <ul id="slider" style="padding: 0; margin: 0;">
		    <li class="active"><a href="#first">New Services</a></li>
		    <li><a href="#second">Your benefit</a></li>
		    <li><a href="#third">Waters Staff</a></li>
		    <li><a href="#four">Quality</a></li>
		    <li><a href="#five">Free Amendments</a></li>
		    <li><a href="#six">Contact Writer</a></li>
		</ul>
	    </div>
            <h1 class="header-title">Service - Paper Writing <span class="stripe" style=""></span></h1>
	    <div class="service-list row-fluid block">
		<div class="span6 divider">
		    <div class="">
			<?php
			$services = getServiceList();
			?>
			<?php foreach ($services as $name => $items): ?>
    			<h4><?php echo $name ?></h4>
    			<ul class="services">
				<?php foreach ($items as $url => $item): ?>
				    <li><a href="<?php echo $url ?>"><?php echo $item ?></a></li>
				<?php endforeach; ?>
    			</ul>
			<?php endforeach; ?>
		    </div>
		</div>
		<div class="span6">
		    <div class="">
			<?php
			$services = getServiceList();
			?>
			<?php foreach ($services as $name => $items): ?>
    			<h4><?php echo $name ?></h4>
    			<ul class="services">
				<?php foreach ($items as $url => $item): ?>
				    <li><a href="<?php echo $url ?>"><?php echo $item ?></a></li>
				<?php endforeach; ?>
    			</ul>
			<?php endforeach; ?>

		    </div>
                    <a href=""><img src="theme/img/order_now.png" alt="order now" align="right" style="margin: 0 10px 10px 0"/></a>
		</div>

	    </div>
            <div style="position: relative;">
                <img src="theme/img/try_service.png" alt="" />
                <a href=""><img style="position: absolute; top: 115px; left: 260px;" src="theme/img/order-try-service.png" alt="" /></a>
            </div>
            <h1 class="header-title">About Our Papers Writers <span style="width: 156px;" class="stripe" style=""></span></h1>
            <span style="color: #999999; font-size: 14px; font-family: calibri;">Our essay writers at Bestessays.com are the best in the business. Every essay writer has a PhD or MA, each having proven professional writing experience. What does this mean for you? It means that when you use our essay services, you always get a paper that exceeds your expectations. Place your order today!.Our essay writers at Bestessays.com are the best in the business. Every essay writer has a PhD or MA, each having proven professional writing experience. What does this mean for you? It
                <br/><a href=""><img src="theme/img/order_now.png" alt="" align="right"/></a></span>
	</div>
        <div class="sidebar span3">
	    <?php include 'common/right-sidebar.php'; ?>
        </div>

    </div>
</div>
<?php include 'common/footer.php'; ?>
<style>
    h4{font-size: 16.5px !important}
    #menu { padding: 0; }
    #slider li { display: inline;}
    #slider li a {
	background: none repeat scroll 0 0 #DDDDDD;
	border-bottom: medium none;
	border-right: 1px solid #CCCCCC;
	color: #757475;
	display: block;
	float: left;
	font-size: 17px;
	height: 35px;
	padding: 10px 4px 10px 3px;
	text-align: center;
	text-decoration: none;
	width: 68px;
    }
    #slider li.active a { background: url("theme/img/nav_bg.png") repeat-x scroll 0 0 red;color:white;}
    .slider-content { float: left; clear: both; width: 100%; margin: 0!important}
    .slider-content img{width: 470px;height: 200px}
    .stripe{ width: 197px; height: 3px; border-bottom: 1px solid #ccc; border-top: 1px solid #CCC; float: right; margin-top: 20px;}

</style>
<script type="text/javascript">
    $(document).ready(function() {

	$("#slider").tabify();
    });
</script>
