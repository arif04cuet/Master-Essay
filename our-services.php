<?php include 'common/header.php'; ?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
        <div class="content span6">
            <h1 class="header-title">Writing, Editing and Proofreading for:</h1>
            <div class="service-list row-fluid block">
                <div class="span11 offset1 divider">
                    <div class="">
			<h4>MASTER ESSAYS IS PROUD TO OFFER -</h4>
			<?php
			$key = 'Writing Services';
			$items = getProductsList();
			?>
                        <ul class="services">
			    <?php foreach ($items as $url => $item): ?>
    			    <li><a href="prices.php?type_document=<?php echo $item; ?>"><?php echo $item ?></a></li>
			    <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="position: relative;">
                <img src="theme/img/try_service.png" alt="" />
                <a href=""><img style="position: absolute; top: 115px; left: 260px;" src="theme/img/order-try-service.png" alt="" /></a>
            </div>
            <a href=""><img style="margin: 15px 0 15px 135px;" src="theme/img/beware-order-now.png" alt="beware" align="center" /></a>
        </div>
        <div class="sidebar span3">
	    <?php include 'common/right-sidebar.php'; ?>
        </div>

    </div>
</div>
<?php include 'common/footer.php'; ?>

