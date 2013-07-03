<?php include('common/header.php') ?>

<!-- Example row of columns -->
<div class="row-fluid">
    <form action="" id="contact-form" class="form-horizontal">
        <fieldset>
            <legend>Sample Contact Form <small>(will not submit any information)</small></legend>
            <div class="control-group">
                <label class="control-label" for="name">Your Name</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="name" id="name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="email">Email Address</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="email" id="email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="subject">Subject</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="subject" id="subject">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="message">Your Message</label>
                <div class="controls">
                    <textarea class="input-xlarge" name="message" id="message" rows="3"></textarea>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-large">Submit</button>
                <button type="reset" class="btn">Cancel</button>
            </div>
        </fieldset>
    </form>
</div>

<style type="text/css">
    label.valid {
        width: 24px;
        height: 24px;
        background: url(theme/img/valid.png) center center no-repeat;
        display: inline-block;
        text-indent: -9999px;
    }
    label.error {
        font-weight: bold;
        color: red;
        padding: 2px 8px;
        margin-top: 2px;
    }
</style>
<script src="theme/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
 
        $('#contact-form').validate(
        {
            rules: {
                name: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                subject: {
                    minlength: 2,
                    required: true
                },
                message: {
                    minlength: 2,
                    required: true
                }
            },
            highlight: function(element) {
                $(element).closest('.control-group').removeClass('success').addClass('error');
            },
            success: function(element) {
                element
                .text('OK!').addClass('valid')
                .closest('.control-group').removeClass('error').addClass('success');
            }
        });
    }); // end document.ready
</script>
<?php include('common/footer.php') ?>