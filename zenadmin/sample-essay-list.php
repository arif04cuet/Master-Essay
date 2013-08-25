<?php include('check.php') ?>
<?php include('common/header.php') ?>


<h2>Sample Essay List
    <a href="add-sample-essay.php" class="btn btn-primary btn-minis pull-right"> Add</a>
</h2>

<hr>

<div id="sampleEssay"></div>
<script>
    $(document).ready(function() {
        $('#sampleEssay').html('<table cellpadding="0" cellspacing="0" border="0" class="display" id="list"></table>');
        $('#list').dataTable({
            "aoColumns": [
                { "sTitle": "id"},
                { "sTitle": "topic"},
                { "sTitle": "typeDocument"},
                { "sTitle": "urgency"},
                { "sTitle": "pdf_file"},
                { "sTitle": "update_date"}
                
            ],
            "bProcessing": true,
            "sAjaxSource": 'get-sample-essay-list.php'
        });
    });
</script>
<?php include('common/footer.php') ?>