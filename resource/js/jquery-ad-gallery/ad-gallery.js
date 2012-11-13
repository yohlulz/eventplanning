$(function() {
			 var galleries = $('.ad-gallery').adGallery();
			if(document.getElementById('switch-effect')){
			    $('#switch-effect').change(
				 function() {
				   galleries[0].settings.effect = $(this).val();
				   return false;
				 });
			}
});
