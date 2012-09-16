	<!-- navigation -->
	<div id="navigation">
		<ul>
		    <li><a href="<?php echo site_url('gallery'); ?>"><span><?php echo lang('menu_gallery'); ?></span></a></li>
		    <li><a href="#" class="bt_events" onclick="return false"><span><?php echo lang('menu_events'); ?></span></a></li>
		    <li><a href="#" class="bt_service" onclick="return false"><span><?php echo lang('menu_service'); ?></span></a></li>
		    <li><a href="#"><span><?php echo lang('menu_suggestion'); ?></span></a></li>
		</ul>
		<?php echo $submenus; ?>
	</div>
	<!-- end navigation -->
