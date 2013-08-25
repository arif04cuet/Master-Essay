<?php include 'common/header.php'; ?>
<div class="row-fluid middle ">
    <div class="container-narrow middle-content">

        <div class="sidebar span3">
	    <?php include 'common/left-sidebar.php'; ?>
        </div>
        <div class="content span6">
	    <?php if (isset($_GET['msg']) and $_GET['msg'] == 'success'): ?>
    	    <div class="alert alert-success">
    		<a class="close" data-dismiss="alert">×</a>
    		Thanks you for signing up with our newsletter system.
    	    </div>
	    <?php elseif (isset($_GET['msg'])): ?>
    	    <div class="alert alert-error">
    		<a class="close" data-dismiss="alert">×</a>
		    <?php echo $_GET['msg']; ?>
    	    </div>
	    <?php endif; ?>

            <div class="slider row-fluid">
                <div class="slider-content block" id="first"><img src="theme/img/1.jpg"/></div>
                <div class="slider-content block" id="second"><img src="theme/img/2.jpg"/></div>
                <div class="slider-content block" id="third"><img src="theme/img/3.jpg"/></div>
                <div class="slider-content block" id="four"><img src="theme/img/4.jpg"/></div>
                <div class="slider-content block" id="five"><img src="theme/img/5.jpg"/></div>
                <div class="slider-content block" id="six"><img src="theme/img/6.jpg"/></div>
                <ul id="slider" style="padding: 0; margin: 0;">
                    <li class="active"><a href="#first">New Services</a></li>
                    <li><a href="#second">Your benefit</a></li>
                    <li><a href="#third">Writer's Staff</a></li>
                    <li><a href="#four">Quality</a></li>
                    <li><a href="#five">Free Amendments</a></li>
                    <li><a href="#six">Contact Writer</a></li>
                </ul>
            </div>
            <h1 class="header-title">HOME <span class="stripe" style=""></span></h1>
            <div class="service-list row-fluid block">
                <p class="contentPstyle">
                    <strong>Writing</strong> skills are essential - both at school and in life. This is true irrespective of your profession or field of study. Success in the both the real world and your academic career largely depends upon your ability to produce interesting and clear articles, essays, and reports. Our servicesare specifically designed to assist you as you strive to achieve your highest aspirations and ambitions. Our team of professional writers and researchers is standing by and ready to help, 24 hours a day - 7 days a week.
                    <br/><br/>
                    At   <strong>Master Essays</strong> we have the ability to help with all of your academic needs. High School, College, Undergrad,Masters or Doctoral candidate, we handle everything. Do you need help writing a speech, a business report, or a presentation? Well then you’ve come to the right place. <br/><br/>
                    Master Essays specializes in academic writing.  Each assignment completed by our writers is guaranteed to meet all standard academic requirements. You will receive quality referencing, a coherent layout and structure, and papers that containsolid arguments and reasoning. All of our writers are academically qualified professionals who have a thorough knowledge of their specific fields. If your assignment is not listed as one of our services, please provide a detailed summary of your assignment in our custom quote section and we will get back to you shortly. <br/><br/>
                    If you have any questions about our services, feel free to contact us via our phone number @1-800-573-0840or our visit our contact us page. Our service agents are standing by and eager to assist you. <br/><br/>
                </p>
                Who we are…
                <span class="abtTxt">
                    <ul>
                        <li>We employ over 200 Professional, MA, MSc, JD, MBA& PhD accredited writers</li>
                        <li>We offer comprehensive customer support to all our clients</li>
                        <li>We constantly monitor our projects to ensure the best results</li>
                        <li>We guarantee you 100% original writing, or your money back</li>
                        <li>We automatically run a plagiarism check on every project</li>
                        <li>We offer an unlimited number of amendments at no extra charge</li>
                        <li>We implement the latest web technologies on our website</li>
                        <li>We will never disclose your personal information to the writer</li>
                        <li>We offer a unique discount program to our loyal customers</li>
                        <li>We offer discounts for anyone who provides referrals for our services</li>
                    </ul>

                    Guarantees
                    <ul style="text-indent:50px;">
                        <li>100% satisfaction</li>
                        <li>10-day money-back guarantee</li>
                        <li>Free revisions</li>
                        <li>On-time delivery</li>
                        <li>100% original writing</li>
                        <li>Absolutely confidential</li>
                        <li>Most current sources</li>
                        <li>Full referencing</li>
                        <li>Free title and bibliography</li>
                    </ul>

                </span>
            </div>
        </div>
        <div class="sidebar span3">
	    <?php include 'common/right-sidebar.php'; ?>
        </div>

    </div>
</div>
<?php include 'common/footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
	$("#slider").tabify();
	$('#newsletter').validate(
		{
		    rules: {
			customerEmail: {
			    required: true
			}
		    },
		    highlight: function(element) {
			$(element).closest('.control-group').removeClass('success').addClass('error');
		    },
		    success: function(element) {
			element
				.addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			element.closest('label').remove();
		    }
		});

    });
</script>
