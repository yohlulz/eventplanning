$(function(){
	   // Create a new AJAXPaypalCart Object
            var cart = $('#cart').DCAJAXPaypalCart({
                width:600,
			currency: 'EUR',
			language: document.getElementById('cart').getAttribute('lang'),
                autoOpenWhenAdd:true,
                openNewCheckOutWindow:true,
                //themeColor:'#333',
                //themeDarkColor:'#FFF',
                header:document.getElementById('cart').getAttribute('head'),
                footer:document.getElementById('cart').getAttribute('foot'),
                paypalOptions:{
                    business:document.getElementById('cart').getAttribute('email'),

                    page_style:'digicrafts'
                }
            });            
            
function updateElements(){
		var carts=document.getElementsByTagName('div');
		for(var i=0;i<carts.length;i++){
			if(carts[i].getAttribute('class')=='cart_image'){
				cart.addBuyButton('#'+carts[i].getAttribute('id'),{
					name: carts[i].getAttribute('name'),
					price: carts[i].getAttribute('price'),
					shipping: carts[i].getAttribute('shipping'),
					allowMultiple: false
				});
			}
		}
}
updateElements();
setInterval('updateElements()',1000);
});
