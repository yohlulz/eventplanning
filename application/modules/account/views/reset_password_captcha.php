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

<div class="container_12">
        <div class="grid_12">
            <?php echo form_open(uri_string().(empty($_SERVER['QUERY_STRING'])?'':'?'.$_SERVER['QUERY_STRING'])); ?>
            <?php echo form_fieldset(); ?>
            <div class="grid_12 alpha omega">
                <h2><?php echo lang('reset_password_page_name'); ?></h2>
                <p><?php echo lang('reset_password_captcha'); ?></p>
            </div>
            <div class="clear"></div>
            <?php if (isset($recaptcha)) : ?>
            <div class="grid_6 alpha omega">
                <?php echo $recaptcha; ?>
            </div>
            <div class="clear"></div>
            <?php if (isset($reset_password_recaptcha_error)) : ?>
            <div class="grid_6 alpha omega">
                <span class="field_error"><?php echo $reset_password_recaptcha_error; ?></span>
            </div>
            <div class="clear"></div>
            <?php endif; ?>
            <?php endif; ?>
            <div class="grid_6 alpha omega">
                <?php echo form_button(array(
                        'type' => 'submit',
                        'class' => 'btn',
                        'content' => lang('reset_password_captcha_submit')
                    )); ?>
            </div>
            <?php echo form_fieldset_close(); ?>
            <?php echo form_close(); ?>
        </div>
        <div class="clear"></div>
    </div>


          
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
