<body>
<?php echo $this->load->view('headup'); ?>
<div class="shell">
<?php echo $this->load->view('slider'); ?>
<?php echo $this->load->view('menu'); ?>
<!-- main -->
<div id="main">

	<!-- content -->
	<div id="content" class="left">


<!-- ======================================================== -->

	<!-- login -->
	<div class="container_12 log_form">
		<div class="grid_12">
            <?php echo sprintf(lang('reset_password_sent_instructions'), anchor('account/forgot_password', lang('reset_password_resend_the_instructions'))); ?>
        </div>
        <div class="clear"></div>
    </div>
	<!-- end login -->


          
<!-- ========================================================== -->






</div>
	<!-- end content -->
	
	<!-- sidebar -->
	<div id="sidebar" class="right">

<!--  ==================================================================== -->
<!-- blog roll -->
			<div class="blog-roll">
				<a href="#" class="rss-feed notext">&nbsp;</a>
				<h2>Blog Roll</h2>
				<div class="cl">&nbsp;</div>
				
				<!-- blog roll item -->
				<div class="blog-item">
					<h4><a href="#">Nulla at lobortis mauris.</a></h4>
					<span class="blog-date">23.05.09</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris.</p>
				</div>
				<!-- end blog roll item -->
				
				<!-- blog roll item -->
				<div class="blog-item">
					<h4><a href="#">Ipsum dolor sit</a></h4>
					<span class="blog-date">23.05.09</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris.</p>
				</div>
				<!-- end blog roll item -->
				
				<!-- blog roll item -->
				<div class="blog-item">
					<h4><a href="#">Suspedisse quis orci vitae</a></h4>
					<span class="blog-date">23.05.09</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris.</p>
				</div>
				<!-- end blog roll item -->

			</div>
			<!-- end blog roll -->
							
			<!-- contact -->
			<div class="contact">
				<h2>Contact</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</p>
			</div>
			<!-- end contact -->
<!-- ====================================================================================== -->


	</div>
	<!-- end sidebar -->

	<div class="cl">&nbsp;</div>
</div>
<!-- end main -->
