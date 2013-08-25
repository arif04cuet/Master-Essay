<?php include 'common/header-logged-in.php'; ?>
<?php include 'check.php'; ?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">

        <div class="content span12 block">
            <div class="contentPstyle">
                <h3 class="">Welcome
                    <i class="header-title">
			<?php
			$user = loggedInUser();
			echo $user['first_name'] . ' ' . $user['last_name'];
			?>
                    </i></h3>
            </div>
        </div>
    </div>
</div>
<?php include 'common/footer-logged-in.php'; ?>
