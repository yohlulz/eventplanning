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
	<!-- ==================================================================-->
	<!-- welcome  -->
			<?php echo $page_info; ?>
			<!-- end welcome  -->
	<!-- news -->
			<div class="news">
				
				<!-- news item -->
				<div class="news-item">
					<span class="news-pointer-date">9 Nov</span>
					<div class="news-body">
						<h3>Vehicula neque</h3>
						<a href="#" class="btn"><span><em>read more</em></span></a>
						<div class="cl">&nbsp;</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec mi nisl, sollicitudin eget hendrerit eu, molestie in odio. Suspendisse quis orci vitae purus scelerisque porttitor sollicitudin porttitor sem.</p>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- end news item -->
				
				<!-- news item -->
				<div class="news-item">
					<span class="news-pointer">2</span>
					<div class="news-body">
						<h3>Primis in faucibus luctus</h3>
						<a href="#" class="btn"><span><em>read more</em></span></a>
						<div class="cl">&nbsp;</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- end news item -->
				
				<!-- news item -->
				<div class="news-item">
					<span class="news-pointer">3</span>
					<div class="news-body">
						<h3>Nulla lovortis cubilia</h3>
						<a href="#" class="btn"><span><em>read more</em></span></a>
						<div class="cl">&nbsp;</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec mi nisl, sollicitudin eget hendrerit eu, molestie in odio. Suspendisse quis orci vitae purus scelerisque porttitor sollicitudin porttitor sem.</p>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- end news item -->
				
				<!-- news item -->
				<div class="news-item">
					<span class="news-pointer-date"><b>9 Nov</b> <i>2009</i></span>
					<div class="news-body">
						<h3>Nulla lovortis cubilia</h3>
						<a href="#" class="btn"><span><em>read more</em></span></a>
						<div class="cl">&nbsp;</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec mi nisl, sollicitudin eget hendrerit eu, molestie in odio. Suspendisse quis orci vitae purus scelerisque porttitor sollicitudin porttitor sem.</p>
					</div>
					<?php echo $gmap; ?>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- end news item -->
				
			</div>
			<!-- end news -->

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
