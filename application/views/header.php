<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $this->lang->line('website_title'); ?></title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<base href="<?php echo base_url(); ?>" />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.png" />
	<link type="text/css" rel="stylesheet" href="resource/css/960gs/960gs.css" />
	<link type="text/css" rel="stylesheet" href="resource/css/style.css" />
	<link type="text/css" href="resource/css/styles.css" rel="stylesheet" />
	<link type="text/css" href="resource/css/jquery.ad-gallery.css" rel="stylesheet" />
	<link type="text/css" href="resource/css/sharre.css" rel="stylesheet" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
		<script src="js/png-fix.js" type="text/javascript" charset="utf-8"></script>
	<![endif]-->
	<script src="resource/js/jquery-1.8.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="resource/js/jquery-1.5/jquery.jcarousel.js" type="text/javascript" charset="utf-8"></script>
	<script src="resource/js/jquery-1.5/cufon-yui.js" type="text/javascript" charset="utf-8"></script>
	<script src="resource/js/jquery-1.5/Arial.font.js" type="text/javascript" charset="utf-8"></script>
	<script src="resource/js/jquery-1.5/js-func.js" type="text/javascript" charset="utf-8"></script>
	<script src="resource/js/contact.js" type="text/javascript" charset="utf-8"></script>
<script src="resource/js/jquery-ad-gallery/jquery.ad-gallery.js" type="text/javascript" charset="utf-8"></script>
<script src="resource/js/jQuery.tubeplayer.min.js" type="text/javascript" charset="utf-8"></script>
<script src="resource/js/jquery.sharrre-1.3.3.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
                $(function() {
			 var galleries = $('.ad-gallery').adGallery();
			    $('#switch-effect').change(
				 function() {
				   galleries[0].settings.effect = $(this).val();
				   return false;
				 });
                $(".bt_events").click(function() {
                    if ($(".bt_events").hasClass("clicked")) {
                        $(".bt_events").removeClass("clicked");
                        $(".events_submenu").hide();
                    } else {
                    	$(".bt_service").removeClass("clicked");
                        $(".service_submenu").hide();
                        $(".bt_events").addClass("clicked");
                        $(".events_submenu").show();
                    }
                });
                $(".bt_service").click(function() {
                    if ($(".bt_service").hasClass("clicked")) {
                        $(".bt_service").removeClass("clicked");
                        $(".service_submenu").hide();
                    } else {
                    	$(".bt_events").removeClass("clicked");
                        $(".events_submenu").hide();
                        $(".bt_service").addClass("clicked");
                        $(".service_submenu").show();
                    }
                });
			function playVideo(divId,videoId){
						jQuery("#"+divId).tubeplayer({
							width: 690, 
							height: 500,
							theme: "light", 
							initialVideo: videoId, 
							preferredQuality: "default"
			});}
			var youtubePlayer=document.getElementsByTagName("div");
			for(var i=0;i<youtubePlayer.length;i++)
			{
				if(youtubePlayer[i].getAttribute("class")=="youtube-player-container")
				{
					playVideo(youtubePlayer[i].getAttribute("id"),youtubePlayer[i].getAttribute("v"));
				}
			}
			$('#share').sharrre({
				 share: {
					googlePlus: true,
				   facebook: true,
				   linkedin: true,
				   delicious: true,
				   pinterest: true,
				   twitter: true
				 },
				 buttons: {
				   googlePlus: {size: 'tall'},
				   facebook: {layout: 'box_count'},
				   twitter: {count: 'vertical'},
					delicious:{size: 'tall'},
					linkedin:{counter:'top'},
					pinterest:{layout:'vertical'}
				 },
				 hover: function(api, options){
				   $(api.element).find('.buttons').show();      
				 },
				 hide: function(api, options){
				   $(api.element).find('.buttons').hide();
				 }
			    });
            });
        </script>
	<script type="text/javascript">
  </script>
</head>
