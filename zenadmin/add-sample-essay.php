<?php include('common/header.php'); ?>
<?php include('check.php'); ?>

<div class="row-fluid middle ">
    <div class="container-narrow middle-content">
        <div class="content span6" style="width:100%;">
            <div class="service-list row-fluid block" style="border-radius: 10px 10px;">
                <h2>Add Sample Essay</h2>
                <hr/>
                <form enctype="multipart/form-data" action="processAddSampleEssay.php" id="add-sample-essay" class="form-horizontal" style="color: #ababab !important;" method="post">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="topic">Topic:<span>*</span></label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="topic" id="topic" value="" placeholder="Topic">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="type_document">Type of document:<span>*</span></label>
                            <div class="controls">
                                <select name="type_document" id="type_document" class="input-xlarge">
                                    <?php
                                    $serviceList = getProductsList();
                                    ?>
                                    <?php foreach ($serviceList as $service => $name): ?>
                                        <option value="<?php echo $name ?>" ><?php echo $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="urgency">Urgency:<span>*</span></label>
                            <div class="controls">
                                <select name="urgency" id="urgency" class="input-xlarge">

                                    <?php
                                    $list = getUrgencyList();
                                    ?>
                                    <?php foreach ($list as $name): ?>
                                        <option value="<?php echo $name ?>" ><?php echo $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="level">Level:<span>*</span></label>
                            <div class="controls">
                                <select size="1" name="level" id="level" class="">
                                    <?php
                                    $list = getLevelList();
                                    ?>
                                    <?php foreach ($list as $name): ?>
                                        <option value="<?php echo $name ?>" ><?php echo $name ?></option>
                                    <?php endforeach; ?>
                                </select>                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="number_of_pages">Number of pages/words:<span>*</span></label>
                            <div class="controls">
                                <select name="number_of_pages" id="number_of_pages" class="input-xlarge">

                                    <?php
                                    $list = getPageList();
                                    ?>
                                    <?php foreach ($list as $key => $name): ?>
                                        <option value="<?php echo $key ?>" ><?php echo $name ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="subject_area">Subject Area:<span>*</span></label>
                            <div class="controls">
                                <select name="subject_area" id="subject_area" class="input-xlarge">
                                    <option value="">Select</option>
                                    <?php
                                    $list = getSubjectAreaList();
                                    ?>
                                    <?php foreach ($list as $name): ?>
                                        <option value="<?php echo $name ?>" ><?php echo $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="academic_level">Academic Level: <span>*</span></label>
                            <div class="controls">
                                <select name="academic_level" id="academic_level" class="input-xlarge">
                                    <option value="">select</option>
                                    <?php
                                    $list = getAcademicLevelList();
                                    ?>
                                    <?php foreach ($list as $name): ?>
                                        <option value="<?php echo $name ?>" ><?php echo $name ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="style">Style: <span>*</span></label>
                            <div class="controls">
                                <select name="style" id="style" class="input-xlarge">
                                    <?php
                                    $list = getStylelList();
                                    ?>
                                    <?php foreach ($list as $name): ?>
                                        <option value="<?php echo $name ?>" ><?php echo $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <a href="" title="The whole paper briefly on 1 page - for you to get the main points of the research and ready for the tentative questions from your tutor. Advised to those who will also be asked live on the topic researched"><img src="../theme/img/help.png" alt="hlep" /></a>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="no_sources">Number of sources: <span></span></label>
                            <div class="controls">
                                <select name="no_sources" id="no_sources" class="input-xlarge">
                                    <?php
                                    $list = getNoOfResourceList();
                                    ?>
                                    <?php foreach ($list as $name): ?>
                                        <option value="<?php echo $name ?>" ><?php echo $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <a href="" title="The whole paper briefly on 1 page - for you to get the main points of the research and ready for the tentative questions from your tutor. Advised to those who will also be asked live on the topic researched"><img src="../theme/img/help.png" alt="hlep" /></a>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="style">Upload PDF: <span></span></label>
                            <div class="controls">
                                <input type="file" class="input-xlarge" name="uploaded_file" id="upload_file" value="" >
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-danger btn-large">Add</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('common/footer.php'); ?>

<style>
    label span{color: red}

    #select-level-value{
        background: url("../theme/img/menu_down_arrow.png") no-repeat scroll 124px center #E71C21;
        border-radius: 3px;
        color: #FFFFFF;
        display: block;
        font-size: 12px;
        /*margin: 0 3px 0 13px;*/
        padding: 10px 20px;
        text-decoration: none;
        width: 100px;
    }
</style>

<script src="theme/js/jquery.validate.js" type="text/javascript"></script>
<script src="theme/js/jquery.form.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#add-sample-essay').validate(
        {
            rules: {
                topic: {
                    required: true
                },
                type_document: {
                    required: true
                },
                urgency: {
                    required: true
                },
                level: {
                    required: true
                },
                number_of_pages: {
                    required: true
                },
                subject_area: {
                    required: true
                },
                academic_level: {
                    required: true
                },
                style: {
                    required: true
                },
                no_sources: {
                    required: true
                },
            },
            messages: {
                topic: {
                    required: "This field required.",
                },
                type_document: {
                    required: "This field required.",
                },
                urgency: {
                    required: "This field required.",
                },
                level: {
                    required: "This field required.",
                },
                number_of_pages: {
                    required: "This field required.",
                },
                subject_area: {
                    required: "This field required.",
                },
                academic_level: {
                    required: "This field required.",
                },
                style: {
                    required: "This field required.",
                },
                no_sources: {
                    required: "This field required.",
                },
            }
        });
    }); // end document.ready
</script>
