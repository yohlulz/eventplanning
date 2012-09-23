<div id="header" class="center">
	<div id="contactFormContainer" class="center">
        <div id="contactForm">
            <form action="<?php echo site_url().'/ajax/'.uri_string(); ?>" class="contactForm" name="cform" method="post">
                <p><?php echo lang('contact_text');?></p>
                <div class="input_boxes">
                    <p><label for="name"><?php echo lang('contact_name');?></label><span class="name-missing"><?php echo lang('contact_name_error');?></span><br />
                    <input id="name" type="text" value="" name="name" /></p>
                    <p><label for="e-mail"><?php echo lang('contact_email');?></label><span class="email-missing"><?php echo lang('contact_email_error');?></span><br />
                    <input id="e-mail" type="text" value="" name="email" /></p>
                    <p><label for="message"><?php echo lang('contact_message');?></label><span class="message-missing"><?php echo lang('contact_message_error');?></span><br />
                    <textarea id="message" rows="" cols="" name="message"></textarea><input id="url" name="url" type="hidden" value="<?php echo site_url('ajax'); ?>"></p>
                 </div>   
                 <input class="submit" type="submit" name="submit" value="<?php echo lang('contact_send');?>" onfocus="this.blur()"  />
            </form>
      </div>
      <div class="contact"></div>    
  </div>
	<h1 id="logo"><?php echo anchor('', lang('website_title')); ?></h1>
	<div id="authenticate">
            <ul>
			<li><div id="cart" lang="<?php echo (checkLanguage()=='english'?'en':checkLanguage()); ?>" head="<?php echo lang('website_title');?>" foot="<?php echo lang('website_title').' PayPal'; ?>" email="<?php echo getConfigItem('contact_to_email'); ?>">Cart</div></li>
			<li><div id="share" data-title="Share" data-url="<?php echo getConfigItem('check_site'); ?>" ></div></li>
			<li>&nbsp;</li>		
			<li>&nbsp;</li>
			<li>&nbsp;</li>		
			<li>&nbsp;</li>				
            	<?php if ($this->authentication->is_signed_in()) : ?>
                <li><?php echo sprintf(lang('website_welcome_username'), '<strong>'.$account->username.'</strong>'); ?></li>
                <li><?php echo anchor('account/account_settings', lang('website_account')); ?></li>
                <li><?php echo anchor('account/sign_out', lang('website_sign_out')); ?></li>
                <?php else : ?>
                <li><?php echo anchor('account/sign_up', lang('website_sign_up')); ?></li>
                <li><?php echo anchor('account/sign_in', lang('website_sign_in')); ?></li>
                <?php endif; ?>
			<li>&nbsp;</li>		
			<li><?php echo anchor('lang/english/'.uri_string(),img(array('src'=>'resource/img/lang/'.((checkLanguage()=='en'|| checkLanguage()=='english')?'en_sel.gif':'en.gif'), 'width'=>'32', 'height'=>'20', 'alt'=>'English'))); ?></li>
			<li><?php echo anchor('lang/de/'.uri_string(),img(array('src'=>'resource/img/lang/'.(checkLanguage()=='de'?'de_sel.gif':'de.gif'), 'width'=>'32', 'height'=>'20', 'alt'=>'English'))); ?></li>
			<li><?php echo anchor('lang/ro/'.uri_string(),img(array('src'=>'resource/img/lang/'.(checkLanguage()=='ro'?'ro_sel.gif':'ro.gif'), 'width'=>'32', 'height'=>'20', 'alt'=>'English'))); ?></li>
			</ul>
     </div>
	<div class="cl">&nbsp;</div>
</div>
