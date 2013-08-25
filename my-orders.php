<?php include 'common/header-logged-in.php'; ?>
<?php include 'check.php'; ?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="content span12 block">
            <div class="contentPstyle">
                <h2>All Orders <a href="place-order.php" class="btn btn-danger pull-right">New Order</a></h2>
                <hr>
                <div id="orders"></div>
                <script>
                    $(document).ready(function() {
                        $('#orders').html( '<table cellpadding="0" cellspacing="0" border="0" class="display" id="list"></table>' );
                        $('#list').dataTable( {
                            "aoColumns": [
                                { "sTitle": "Order ID" },
                                { "sTitle": "Order Date" },
                                { "sTitle": "Topic" },
                                { "sTitle": "Document Type" },
                                { "sTitle": "Urgency" },
                                { "sTitle": "Pages" },
                                { "sTitle": "Total" },
                                { "sTitle": "Paypal Transaction ID" },
                                { "sTitle": "Status" },
                                { "sTitle": "Document" },
                                { "sTitle": "Details" }
                            ],
                            "bProcessing": true,
                            "sAjaxSource": 'getOrderList.php'
                        } );   
                    } );
                </script>
            </div>
        </div>
    </div>
</div>
<?php include 'common/footer-logged-in.php'; ?>
