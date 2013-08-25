<?php include('common/header.php') ?>
<!-- Example row of columns -->
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
        <div class="content span6">
            <h1 class="header-title">Order Canceled</h1>
            <div class="service-list row-fluid block">
                <div>
                    <p class="contentPstyle">
			Order has been canceled.
			<?php
			unset($_SESSION['order']);
			?>
		    </p>
                </div>
            </div>
	</div>
        <div class="sidebar span3">
	    <?php include 'common/right-sidebar.php'; ?>
        </div>

    </div>
</div>

<?php include('common/footer.php') ?>