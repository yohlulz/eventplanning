<body>
<?php echo $this->load->view('headup'); ?>
<div class="shell">
<?php echo $this->load->view('slider'); ?>
<?php $menu_page='menu';
	if($this->authentication->is_signed_in()){
		$menu_page.='_'.$account->role;
	}
	echo $this->load->view($menu_page); ?>
<!-- main -->
<div id="main">

	<!-- content -->
	<div id="content" class="left">


<!-- ======================================================== -->

	<div class="container_12">
        <div class="grid_12">
            <h2><?php echo lang('connect_create_account'); ?></h2>
        </div>
        <div class="clear"></div>
        <div class="grid_6">
            <?php echo form_open(uri_string()); ?>
			<?php echo form_fieldset(); ?>
            <h3><?php echo lang('connect_create_heading'); ?></h3>
            <?php if (isset($connect_create_error)) : ?>
            <div class="grid_6 alpha">
                <div class="form_error"><?php echo $connect_create_error; ?></div>
            </div>
            <div class="clear"></div>
            <?php endif; ?>
            <div class="grid_2 alpha">
                <?php echo form_label(lang('connect_create_username'), 'connect_create_username'); ?>
            </div>
            <div class="grid_4 omega">
                <?php echo form_input(array(
                        'name' => 'connect_create_username',
                        'id' => 'connect_create_username',
                        'value' => set_value('connect_create_username') ? set_value('connect_create_username') : (isset($connect_create[0]['username']) ? $connect_create[0]['username'] : ''),
                        'maxlength' => '16'
                    )); ?>
                <?php echo form_error('connect_create_username'); ?>
                <?php if (isset($connect_create_username_error)) : ?>
                <span class="field_error"><?php echo $connect_create_username_error; ?></span>
                <?php endif; ?>
            </div>
            <div class="clear"></div>
            <div class="grid_2 alpha">
                <?php echo form_label(lang('connect_create_email'), 'connect_create_email'); ?>
            </div>
            <div class="grid_4 omega">
                <?php echo form_input(array(
                        'name' => 'connect_create_email',
                        'id' => 'connect_create_email',
                        'value' => set_value('connect_create_email') ? set_value('connect_create_email') : (isset($connect_create[0]['email']) ? $connect_create[0]['email'] : ''),
                        'maxlength' => '160'
                    )); ?>
                <?php echo form_error('connect_create_email'); ?>
                <?php if (isset($connect_create_email_error)) : ?>
                <span class="field_error"><?php echo $connect_create_email_error; ?></span>
                <?php endif; ?>
            </div>
            <div class="clear"></div>
            <div class="prefix_2 grid_4 alpha">
                <?php echo form_button(array(
                        'type' => 'submit',
                        'class' => 'btn',
                        'content' => lang('connect_create_button')
                    )); ?>
            </div>
            <div class="clear"></div>
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
				<a href="<?php echo site_url('rss'); ?>" class="rss-feed notext">&nbsp;</a>
				<h2><?php echo lang('menu_blog'); ?></h2>
				<div class="cl">&nbsp;</div>
				<?php echo $items; ?>
			</div>
			<!-- end blog roll -->
							
			<!-- contact -->
			<div class="contact">
				<h2>Contact</h2>
				        <p><?php echo lang('contact_sidebar_message'); ?></p>
			</div>
			<!-- end contact -->
<!-- ====================================================================================== -->


	</div>
	<!-- end sidebar -->

	<div class="cl">&nbsp;</div>
</div>
<!-- end main -->

