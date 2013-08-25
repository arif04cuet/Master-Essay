<?php error_reporting(E_ERROR); ?>
<html lang="en"><head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- styles -->
        <link href="theme/css/bootstrap.css" rel="stylesheet">
        <link href="theme/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="theme/dataTable/media//css/jquery.dataTables.css" rel="stylesheet">
        <link href="theme/css/style.css" rel="stylesheet">


        <!-- js -->
        <script src="theme/js/jquery.min.js" type="text/javascript"></script>
        <script src="theme/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="theme/dataTable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>

    </head>

    <body>
	<?php include('../crud/class/mysql_crud.php'); ?>
	<?php include '../functions.php'; ?>
        <div class="container">
            <div class="header">
                <img src="theme/img/admin-panel-logo.png" />
            </div>
            <div class="navbar">
                <div class="navbar-inner admin-nav">
                    <div class="container">
                        <ul class="nav">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="customers.php">Customers</a></li>
                            <li><a href="orders.php">Orders</a></li>
                            <li><a href="sample-essay-list.php" class="">Sample Essay</a></li>
                            <li><a href="newsletter-list.php" class="">Newsletter</a></li>
			    <li><a href="coupons-list.php" class="">Coupons</a></li>
			    <li><a href="service-list.php" class="">Services</a></li>
                            <li><a href="logout.php" class="logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>