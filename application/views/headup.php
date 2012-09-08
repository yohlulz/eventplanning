<div id="header" class="center">
	<h1 id="logo"><?php echo anchor('', lang('website_title')); ?></h1>
	<div class="authenticate">
            <ul>
            	<?php if ($this->authentication->is_signed_in()) : ?>
                <li><?php echo sprintf(lang('website_welcome_username'), '<strong>'.$account->username.'</strong>'); ?></li>
                <li><?php echo anchor('account/account_settings', lang('website_account')); ?></li>
                <li><?php echo anchor('account/sign_out', lang('website_sign_out')); ?></li>
                <?php else : ?>
                <li><?php echo anchor('account/sign_up', lang('website_sign_up')); ?></li>
                <li><?php echo anchor('account/sign_in', lang('website_sign_in')); ?></li>
                <?php endif; ?>
			<li>&nbsp;</li>
			<li>&nbsp;</li>
			<li><?php echo anchor('lang/english/'.uri_string(),img(array('src'=>'resource/img/lang/'.(checkLanguage()=='english'?'en_sel.gif':'en.gif'), 'width'=>'32', 'height'=>'20', 'alt'=>'English'))); ?></li>
			<li><?php echo anchor('lang/de/'.uri_string(),img(array('src'=>'resource/img/lang/'.(checkLanguage()=='de'?'de_sel.gif':'de.gif'), 'width'=>'32', 'height'=>'20', 'alt'=>'English'))); ?></li>
			<li><?php echo anchor('lang/ro/'.uri_string(),img(array('src'=>'resource/img/lang/'.(checkLanguage()=='ro'?'ro_sel.gif':'ro.gif'), 'width'=>'32', 'height'=>'20', 'alt'=>'English'))); ?></li>
			</ul>
     </div>
	<div class="cl">&nbsp;</div>
</div>
