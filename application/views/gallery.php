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
			<div class="welcome">
				<h2>Welcome</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec mi nisl, sollicitudin eget hendrerit eu, molestie in odio. Suspendisse quis orci vitae purus scelerisque porttitor sollicitudin porttitor sem.</p>
			</div>
			<!-- end welcome  -->
	<!-- news -->
			<div class="news">
				<?php echo $gallery; ?>		
			<!-- news item -->
				<div class="news-item">
					<span class="news-pointer-date"><b>2 Nov </b><i>2012</i></span>
					<div class="news-body">
						<h3>Primis in faucibus luctus</h3>
						<a href="#" class="btn"><span><em>read more</em></span></a>
						<div class="cl">&nbsp;</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
					</div>
					<div class="ad-gallery">
						<div class="ad-image-wrapper"></div>
						<div class="ad-controls"><select id="switch-effect">
      <option value="slide-hori">Slide horizontal</option>
      <option value="slide-vert">Slide vertical</option>
      <option value="resize">Shrink/grow</option>
      <option value="fade">Fade</option>
    </select></div>
						<div class="ad-nav">
        						<div class="ad-thumbs">
								<ul class="ad-thumb-list">
									 <li>
              								<a href="resource/gallery/gal1/11.jpg"><img src="resource/gallery/gal1/thumbs/t11.jpg" title="A title for 11.jpg" longdesc="http://coffeescripter.com" alt="This is a nice, and incredibly descriptive, description of the image 11.jpg" class="image1"></a>
            </li>
            <li>
              <a href="resource/gallery/gal1/12.jpg"><img src="resource/gallery/gal1/thumbs/t12.jpg" title="A title for 12.jpg" alt="This is a nice, and incredibly descriptive, description of the image 12.jpg" class="image2"></a>
            </li>
<li>
              <a href="resource/gallery/gal1/12.jpg"><img src="resource/gallery/gal1/thumbs/t1.jpg" title="A title for 12.jpg" alt="This is a nice, and incredibly descriptive, description of the image 12.jpg" class="image3"></a>
            </li>
<li>
              <a href="resource/gallery/gal1/12.jpg"><img src="resource/gallery/gal1/thumbs/t2.jpg" title="A title for 12.jpg" alt="This is a nice, and incredibly descriptive, description of the image 12.jpg" class="image4"></a>
            </li>
<li>
              <a href="resource/gallery/gal1/12.jpg"><img src="resource/gallery/gal1/thumbs/t3.jpg" title="A title for 12.jpg" alt="This is a nice, and incredibly descriptive, description of the image 12.jpg" class="image5"></a>
            </li>
<li>
              <a href="resource/gallery/gal1/12.jpg"><img src="resource/gallery/gal1/thumbs/t4.jpg" title="A title for 12.jpg" alt="This is a nice, and incredibly descriptive, description of the image 12.jpg" class="image6"></a>
            </li>
<li>
              <a href="resource/gallery/gal1/12.jpg"><img src="resource/gallery/gal1/thumbs/t4.jpg" title="A title for 12.jpg" alt="This is a nice, and incredibly descriptive, description of the image 12.jpg" class="image6"></a>
            </li>
<li>
              <a href="resource/gallery/gal1/12.jpg"><img src="resource/gallery/gal1/thumbs/t4.jpg" title="A title for 12.jpg" alt="This is a nice, and incredibly descriptive, description of the image 12.jpg" class="image6"></a>
            </li>
								</ul>
							</div>
						</div>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- end news item -->
<!-- news item -->
				<div class="news-item">
					<span class="news-pointer-date"><b>10 Dec</b> <i>2013</i></span>
					<div class="news-body">
						<h3>Nulla lovortis cubilia</h3>
						<a href="#" class="btn"><span><em>read more</em></span></a>
						<div class="cl">&nbsp;</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec mi nisl, sollicitudin eget hendrerit eu, molestie in odio. Suspendisse quis orci vitae purus scelerisque porttitor sollicitudin porttitor sem.</p>
					</div>
					<div id="youtube-player-container" v="bpOR_HuHRNs"></div>
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
