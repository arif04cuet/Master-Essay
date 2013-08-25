<?php include 'common/header.php'; ?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
        <div class="content span6">

            <h1 class="header-title"> SAMPLE ESSAYS <span class="stripe" style=""></span></h1>
            <div class="service-list row-fluid block">

                <div>
                    <p class="contentPstyle">
                        Please feel free to click on the links below in order to view samples of our past projects.
                    </p>
                </div>
            </div>
            <img src="theme/img/all-papers.png" alt="all papers" />
            <div style="position: relative;">
                <img src="theme/img/try_service.png" alt="" />
                <a href="place-order.php"><img style="position: absolute; top: 115px; left: 260px;" src="theme/img/order-try-service.png" alt="" /></a>
            </div>
<!--                <img src="theme/img/writing-service.png" alt="writing service" style="float: left;" />-->
            <br/>

            <div class="service-list row-fluid block" style="overflow: hidden;">
                <ul class="sample-list">
		    <?php
		    $db = new Database();
		    $db->connect();

		    $result = $db->select('sample_essay', '*', NULL, '1=1', 'id desc');
		    $samples = $db->getResult();
		    if ($db->numResults == 1)
			$samples = array($samples);
		    ?>

		    <?php foreach ($samples as $sample): ?>
    		    <li>
    			<div id="sampleLeft">
				<?php $queryString = getQueryStringForPrice($sample, array('id', 'pdf_file', 'status', 'update_date')); ?>
    			    <h4><?php echo $sample['type_document'] ?></h4>
    			    <img style="margin-top: 10px;" src="theme/img/pdf.png" alt="pdf" />
    			    <a href="place-order.php?<?php echo $queryString; ?>"><img src="theme/img/order-sample-essay.png" /></a>
    			</div>
    			<table class="table table-striped" style="width: 300px; float: right;">
    			    <tr>
    				<td width="150">Topic:</td>
    				<td><?php echo $sample['topic'] ?></td>
    			    </tr>
    			    <tr>
    				<td>Number of pages:</td>
    				<td><?php echo $sample['number_of_pages'] ?></td>
    			    </tr>
    			    <tr>
    				<td>Urgency:</td>
    				<td><?php echo $sample['urgency'] ?></td>
    			    </tr>
    			    <tr>
    				<td>Level:</td>
    				<td><?php echo $sample['level'] ?></td>
    			    </tr>
    			    <tr>
    				<td>Subject Area:</td>
    				<td><?php echo $sample['subject_area'] ?></td>
    			    </tr>
    			    <tr>
    				<td>Style:</td>
    				<td><?php echo $sample['style'] ?></td>
    			    </tr>
    			    <tr>
    				<td>Number of Sources:</td>
    				<td><?php echo $sample['no_sources'] ?></td>
    			    </tr>
    			    <tr>
    				<td>Academic Level:</td>
    				<td><?php echo $sample['academic_level'] ?></td>
    			    </tr>
    			    <tr>
    				<td></td>
    				<td>
    				    <a target="_blank" href="admin/upload/sample_essay/<?php echo $sample['pdf_file']; ?>"><img src="theme/img/view-this-sample.png" style="" /></a>

    				</td>
    			    </tr>

    			</table>
    			<br style="clear: both"/>
    		    </li>
		    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="sidebar span3">
	    <?php include 'common/right-sidebar.php'; ?>
        </div>

    </div>
</div>
<?php include 'common/footer.php'; ?>


<style type="text/css">
    #sampleLeft{
        width: 146px;
        margin-left: 14px;
        float: left;
    }
    #sampleLeft h4{
        color: #ED1218;

    }
    ul.sample-list{list-style: none;margin: 0}
    ul.sample-list li{border-bottom: 1px dashed #ccc;padding-top: 5px}
</style>