$(function() {
			 var galleries = $('.ad-gallery').adGallery();
			    $('#switch-effect').change(
				 function() {
				   galleries[0].settings.effect = $(this).val();
				   return false;
				 });
});
