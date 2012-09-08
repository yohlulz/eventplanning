<!-- footer -->
<div id="footer">
	<p class="left">
		<a href="#"><?php echo lang('terms_of_use'); ?></a>
			<span>|</span>
		<a href="#"><?php echo lang('privacy_policy'); ?></a>
		Copyright &copy; <?php echo date('Y')."   <b>".lang('author')."</b>. ".lang('rights_reserved'); ?></p>
	<p class="right">
			<?php echo sprintf(lang('website_page_rendered_in_x_seconds'), $this->benchmark->elapsed_time()); ?>
	</p>
</div>
<!-- end footer -->
</div>
<!-- end shell -->
<script type="text/javascript" charset="utf-8">
	Cufon.now();
</script>
</body>
</html>
