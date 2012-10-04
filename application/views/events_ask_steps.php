<body>
<?php echo $this->load->view('headup'); ?>
<div class="shell">
<?php echo $this->load->view('slider'); ?>
<?php echo $this->load->view('menu'); ?>
<!-- main -->
<div id="main">

	<!-- content -->
	<div id="content" class="left">
	<!-- ==================================================================-->
		<!-- welcome  -->
		<?php echo $page_info; ?>
		<!-- end welcome  -->

	<div class="welcome">
	<ul id="selectedSortableList" class="connectedSortable">
	<li>Selected items</li>	
	<li class="ui-state-default">Item 1</li>
	<li class="ui-state-default">Item 2</li>
	<li class="ui-state-default">Item 3</li>
	<li class="ui-state-default">Item 4</li>
	<li class="ui-state-default">Item 5</li>
</ul>

<ul id="availableSortableList" class="connectedSortable">
	<li>Available items</li>
	<li class="ui-state-highlight">Item 1</li>
	<li class="ui-state-highlight">Item 2</li>
	<li class="ui-state-highlight ui-state-disabled">Item 3</li>
	<li class="ui-state-highlight">Item 4</li>
	<li class="ui-state-highlight">Item 5</li>
</ul>
</div>
	
<!-- ============================================================= -->

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
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</p>
			</div>
			<!-- end contact -->
<!-- ====================================================================================== -->


	</div>
	<!-- end sidebar -->

	<div class="cl">&nbsp;</div>
</div>
<!-- end main -->
