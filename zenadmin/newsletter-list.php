<?php include('check.php') ?>
<?php include('common/header.php') ?>

<h2>Newsletter List <span class="pull-right"><a href="send-newsletter.php" class="btn btn-primary">Send Mail</a></span></h2>
<hr>
<div id="newsletter"></div>
<script>
    $(document).ready(function() {
        $('#newsletter').html( '<table cellpadding="0" cellspacing="0" border="0" class="display" id="list"></table>' );
        $('#list').dataTable( {
            "aoColumns": [
                { "sTitle": "ID" },
                { "sTitle": "Name" },
                { "sTitle": "Email" },
                { "sTitle": "Date" },
                
            ],
            "bProcessing": true,
            "sAjaxSource": 'getNewsletterList.php'
        } );   
    } );
</script>

<?php include('common/footer.php') ?>