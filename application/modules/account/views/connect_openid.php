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
            <h2><?php echo sprintf(lang('connect_with_x'), lang('connect_openid')); ?></h2>
        </div>
        <div class="clear"></div>
        <div class="grid_6">
            <?php echo form_open(uri_string()); ?>
            <?php echo form_fieldset(); ?>
            <h4><?php echo sprintf(lang('connect_enter_your'), lang('connect_openid_url')); ?></h4> 
                <small><?php echo anchor($this->config->item('openid_what_is_url'), lang('connect_start_what_is_openid'), array('target'=>'_blank')); ?></small>
            <?php if (isset($connect_openid_error)) : ?>
            <div class="grid_6 alpha">
                <div class="form_error"><?php echo $connect_openid_error; ?></div>
            </div>
            <div class="clear"></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('connect_openid_error')) : ?>
            <div class="grid_6 alpha">
                <div class="form_error"><?php echo $this->session->flashdata('connect_openid_error'); ?></div>
            </div>
            <div class="clear"></div>
            <?php endif; ?>
            <div class="grid_6 alpha">
                <?php echo form_input(array(
                        'name' => 'connect_openid_url',
                        'id' => 'connect_openid_url',
                        'class' => 'openid-input',
                        'value' => set_value('connect_openid_url')
                    )); ?>
                <?php echo form_error('connect_openid_url'); ?>
            </div>
            <div class="clear"></div>
            <div class="grid_6 alpha">
                <?php echo form_button(array(
                        'type' => 'submit',
                        'class' => 'btn',
                        'content' => lang('connect_proceed')
                    )); ?>
            </div>
            <div class="clear"></div>
            <?php echo form_fieldset_close(); ?>
            <?php echo form_close(); ?>
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
