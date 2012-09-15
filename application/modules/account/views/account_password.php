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
		<?php echo $this->load->view('account/account_menu', array('current' => 'account_password')); ?>
		<div class="grid_12">
            <h2><?php echo lang('password_page_name'); ?></h2>
        </div>
        <div class="clear"></div>
        <div class="grid_8">
            <?php echo form_open(uri_string()); ?>
            <?php echo form_fieldset(); ?>
            <?php if ($this->session->flashdata('password_info')) : ?>
            <div class="grid_8 alpha omega">
                <div class="form_info"><?php echo $this->session->flashdata('password_info'); ?></div>
            </div>
            <div class="clear"></div>
            <?php endif; ?>
            <?php echo lang('password_safe_guard_your_account'); ?>
            <div class="grid_2 alpha">
                <?php echo form_label(lang('password_new_password'), 'password_new_password'); ?>
            </div>
            <div class="grid_6 omega">
                <?php echo form_password(array(
                        'name' => 'password_new_password',
                        'id' => 'password_new_password',
                        'value' => set_value('password_new_password'),
                        'autocomplete' => 'off'
                    )); ?>
                <?php echo form_error('password_new_password'); ?>
            </div>
            <div class="clear"></div>
            <div class="grid_2 alpha">
                <?php echo form_label(lang('password_retype_new_password'), 'password_retype_new_password'); ?>
            </div>
            <div class="grid_6 omega">
                <?php echo form_password(array(
                        'name' => 'password_retype_new_password',
                        'id' => 'password_retype_new_password',
                        'value' => set_value('password_retype_new_password'),
                        'autocomplete' => 'off'
                    )); ?>
                <?php echo form_error('password_retype_new_password'); ?>
            </div>
            <div class="clear"></div>
            <div class="prefix_2 grid_6 alpha omega">
                <?php echo form_button(array(
                        'type' => 'submit',
                        'class' => 'btn',
                        'content' => lang('password_change_my_password')
                    )); ?>
            </div>
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
				<a href="<?php echo site_url('rss'); ?>" class="rss-feed notext">&nbsp;</a>
				<h2><?php echo lang('menu_blog'); ?></h2>
				<div class="cl">&nbsp;</div>
				<?php echo $items; ?>
			</div>

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
