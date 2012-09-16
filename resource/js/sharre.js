$(function() {
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
