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
        <div class="grid_12">
            <h2><?php echo lang('sign_in_heading'); ?></h2>
        </div>
        <div class="cl">&nbsp;</div>
        <div class="grid_6">
            <?php echo form_open(uri_string().($this->input->get('continue')?'/?continue='.urlencode($this->input->get('continue')):'')); ?>
            <?php echo form_fieldset(); ?>
            <?php if (isset($sign_in_error)) : ?>
            <div class="grid_6 alpha omega">
                <div class="form_error"><?php echo $sign_in_error; ?></div>
            </div>
	        <div class="cl">&nbsp;</div>
            <?php endif; ?>
            <div class="grid_2 alpha">
                <?php echo form_label(lang('sign_in_username_email'), 'sign_in_username_email'); ?>
            </div>
            <div class="grid_4 omega">
                <?php echo form_input(array(
                        'name' => 'sign_in_username_email',
                        'id' => 'sign_in_username_email',
                        'value' => set_value('sign_in_username_email'),
                        'maxlength' => '24'
                    )); ?>
                <?php echo form_error('sign_in_username_email'); ?>
                <?php if (isset($sign_in_username_email_error)) : ?>
                <span class="field_error"><?php echo $sign_in_username_email_error; ?></span>
                <?php endif; ?>
            </div>
	        <div class="cl">&nbsp;</div>
            <div class="grid_2 alpha">
                <?php echo form_label(lang('sign_in_password'), 'sign_in_password'); ?>
            </div>
            <div class="grid_4 omega">
                <?php echo form_password(array(
                        'name' => 'sign_in_password',
                        'id' => 'sign_in_password',
                        'value' => set_value('sign_in_password')
                    )); ?>
                <?php echo form_error('sign_in_password'); ?>
            </div>
	        <div class="cl">&nbsp;</div>
            <?php if (isset($recaptcha)) : ?>
            <div class="prefix_2 grid_4 alpha omega">
                <?php echo $recaptcha; ?>
            </div>
            <?php if (isset($sign_in_recaptcha_error)) : ?>
            <div class="prefix_2 grid_4 alpha omega">
                <span class="field_error"><?php echo $sign_in_recaptcha_error; ?></span>
            </div>
            <?php endif; ?>
	        <div class="cl">&nbsp;</div>
            <?php endif; ?>
            <div class="prefix_2 grid_4 alpha omega">
                <span>
                    <?php echo form_button(array(
                            'type' => 'submit',
                            'class' => 'btn',
                            'content' => lang('sign_in_sign_in')
                        )); ?>
                </span>
                <span>
                    <?php echo form_checkbox(array(
                            'name' => 'sign_in_remember',
                            'id' => 'sign_in_remember',
                            'value' => 'checked',
                            'checked' => $this->input->post('sign_in_remember'),
                            'class' => 'checkbox'
                        )); ?>
                    <?php echo form_label(lang('sign_in_remember_me'), 'sign_in_remember'); ?>
                </span>
            </div>
	        <div class="cl">&nbsp;</div>
            <div class="prefix_2 grid_4 alpha omega">
                <p><?php echo anchor('account/forgot_password', lang('sign_in_forgot_your_password')); ?><br />
                <?php echo sprintf(lang('sign_in_dont_have_account'), anchor('account/sign_up', lang('sign_in_sign_up_now'))); ?></p>
            </div>
	        <div class="cl">&nbsp;</div>
            <?php echo form_fieldset_close(); ?>
            <?php echo form_close(); ?>
        </div>
        <div class="grid_6">
            <h2><?php echo sprintf(lang('sign_in_third_party_heading')); ?></h2>
            <ul>
                <?php foreach($this->config->item('third_party_auth_providers') as $provider) : ?>
                <li class="third_party <?php echo $provider; ?>"><?php echo anchor('account/connect_'.$provider, lang('connect_'.$provider), 
                    array('title'=>sprintf(lang('sign_in_with'), lang('connect_'.$provider)))); ?></li>
                <?php endforeach; ?>
            </ul>
	        <div class="cl">&nbsp;</div>
        </div>
        <div class="cl">&nbsp;</div>
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
