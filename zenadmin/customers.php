<?php include('check.php') ?>
<?php include('common/header.php') ?>

<h2>Users</h2>
<hr>
<div id="users"></div>
<script>
    $(document).ready(function() {
        $('#users').html( '<table cellpadding="0" cellspacing="0" border="0" class="display" id="list"></table>' );
        $('#list').dataTable( {
            "aoColumns": [
                { "sTitle": "id" },
                { "sTitle": "Name" },
                { "sTitle": "Email" },
                { "sTitle": "Country" },
                { "sTitle": "Phone" }
            ],
            "bProcessing": true,
            "sAjaxSource": 'userList.php'
        } );   
    } );
</script>
<?php include('common/footer.php') ?>