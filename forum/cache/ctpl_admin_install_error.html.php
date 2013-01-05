<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('install_header.html'); ?>


<div class="errorbox">
	<h3><?php echo (isset($this->_rootref['MESSAGE_TITLE'])) ? $this->_rootref['MESSAGE_TITLE'] : ''; ?></h3>
	<p><?php echo (isset($this->_rootref['MESSAGE_TEXT'])) ? $this->_rootref['MESSAGE_TEXT'] : ''; ?></p>
</div>

<?php $this->_tpl_include('install_footer.html'); ?>