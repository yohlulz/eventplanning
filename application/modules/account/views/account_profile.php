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

	<!-- login -->
	<div class="container_12 log_form">
		<?php echo $this->load->view('account/account_menu', array('current' => 'account_profile')); ?>
		 <div class="grid_12">
            <h2><?php echo lang('profile_page_name'); ?></h2>
        </div>
        <div class="clear"></div>
        <div class="grid_8">
            <?php echo form_open_multipart(uri_string()); ?>
            <?php echo form_fieldset(); ?>
            <?php if (isset($profile_info)) : ?>
            <div class="grid_8 alpha omega">
                <div class="form_info"><?php echo $profile_info; ?></div>
            </div>
            <div class="clear"></div>
            <?php endif; ?>
            <p><?php echo lang('profile_instructions'); ?></p>
            <div class="grid_2 alpha">
                <?php echo form_label(lang('profile_username'), 'profile_username'); ?>
            </div>
            <div class="grid_6 omega">
                <?php echo form_input(array(
                        'name' => 'profile_username',
                        'id' => 'profile_username',
                        'value' => set_value('profile_username') ? set_value('profile_username') : (isset($account->username) ? $account->username : ''),
                        'maxlength' => '24'
                    )); ?>
                <?php echo form_error('profile_username'); ?>
                <?php if (isset($profile_username_error)) : ?>
                <span class="field_error"><?php echo $profile_username_error; ?></span>
                <?php endif; ?>
            </div>
            <div class="clear"></div>
            <div class="grid_2 alpha">
                <?php echo form_label(lang('profile_picture'), 'profile_picture'); ?>
            </div>
            <div class="grid_6 omega">
                <p>
                    <?php if (isset($account_details->picture)) : ?>
                    <img src="resource/user/profile/<?php echo $account_details->picture; ?>?t=<?php echo md5(time()); ?>" alt="" /> <?php echo anchor('account/account_profile/index/delete', lang('profile_delete_picture')); ?>
                    <?php else : ?>
                    <img src="resource/img/default-picture.gif" alt="" />
                    <?php endif; ?>
                </p>
            <div class="clear"></div>
                <?php echo form_upload(array(
                    'name' => 'account_picture_upload',
                    'id' => 'account_picture_upload'
                )); ?>
                <p><small><?php echo lang('profile_picture_guidelines'); ?></small></p>
                <?php if (isset($profile_picture_error)) : ?>
                <span class="field_error"><?php echo $profile_picture_error; ?></span>
                <?php endif; ?>
            </div>
            <div class="clear"></div>
            <div class="prefix_2 grid_6 alpha omega">
                <?php echo form_button(array(
                        'type' => 'submit',
                        'class' => 'btn',
                        'content' => lang('profile_save')
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
