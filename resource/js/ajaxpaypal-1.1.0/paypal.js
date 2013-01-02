$(function(){
	   // Create a new AJAXPaypalCart Object
	if(document.getElementById('cart')){
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
}
            
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

function addItemContainerId1(){
		var cartContainer=document.getElementById('cart-container-id1');
		if(cartContainer.getAttribute('cart_id')==undefined){return;}
		cart.add({
					id: cartContainer.getAttribute('cart_id'),
					name: cartContainer.getAttribute('name'),
					price: cartContainer.getAttribute('price'),
					shipping: cartContainer.getAttribute('shipping'),
					allowMultiple: false
				});
}
if(document.getElementById('cart-container-id1')){
	$('#cart-container-id1').click(function(){addItemContainerId1();});
}
});
