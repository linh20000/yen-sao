/**
 * Look under your chair! console.log FOR EVERYONE!
 *
 * @see http://paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
 */
(function(b){function c(){}for(var d="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,timeStamp,profile,profileEnd,time,timeEnd,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try
{console.log();return window.console;}catch(err){return window.console={};}})());

/**
 * Page-specific call-backs
 * Called after dom has loaded.
 */

var GLOBAL = {
	common : {
		init: function(){
			$('.add_to_cart').bind( 'click', addToCart );
			$('.add_to_cart2').bind( 'click', addToCart2);
		}
	},

	templateIndex : {
		init: function(){

		}
	},

	templateProduct : {
		init: function(){

		}
	},

	templateCart : {
		init: function(){

		}
	}

}
var UTIL = {
	fire : function(func,funcname, args){
		var namespace = GLOBAL;
		funcname = (funcname === undefined) ? 'init' : funcname;
		if (func !== '' && namespace[func] && typeof namespace[func][funcname] == 'function'){
			namespace[func][funcname](args);
		}
	},

	loadEvents : function(){
		var bodyId = document.body.id;

		// hit up common first.
		UTIL.fire('common');

		// do all the classes too.
		$.each(document.body.className.split(/\s+/),function(i,classnm){
			UTIL.fire(classnm);
			UTIL.fire(classnm,bodyId);
		});
	}

};
$(document).ready(UTIL.loadEvents);
/**
 * Ajaxy add-to-cart
 */
Number.prototype.formatMoney = function(c, d, t){
	var n = this, 
			c = isNaN(c = Math.abs(c)) ? 2 : c, 
			d = d == undefined ? "." : d, 
			t = t == undefined ? "." : t, 
			s = n < 0 ? "-" : "", 
			i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
			j = (j = i.length) > 3 ? j % 3 : 0;
	return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};
function addToCart(e){




	if (typeof e !== 'undefined') e.preventDefault();
	var $this = $(this);
	var form = $this.parents('form');	

	$.ajax({
		type: 'POST',
		url: '/cart/add.js',
		async: false,
		data: form.serialize(),
		dataType: 'json',
		error: addToCartFail,
		beforeSend: function() {  
		},
		success: addToCartSuccess,
		cache: false
	});
}
function addToCart2(e){	
	$('.tooltip').remove();		
	if (typeof e !== 'undefined') e.preventDefault();
	var $this = $(this),
			form = $this.parents('form'),
			gifId = $this.parents('form').attr('data-id-gif'),
			gifQty = $this.parents('form').find('input#qty').val();

	if(gifId == '0'){

	}else{
		$.ajax({
			type: 'POST',
			url: '/cart/add.js',
			async: false,
			data: 'variantId='+ gifId +'&quantity='+gifQty,
			dataType: 'json',
			error: addToCartFail,
			beforeSend: function() {  
			},
			success: function() {  
			},
			cache: false
		});
	}
	$.ajax({
		type: 'POST',
		url: '/cart/add.js',
		async: false,
		data: form.serialize(),
		dataType: 'json',
		error: addToCartFail,
		beforeSend: function() {  
		},
		success: addToCartSuccess,
		cache: false
	});
}
function addToCartSuccess (jqXHR, textStatus, errorThrown){

	$.ajax({
		type: 'GET',
		url: '/cart.js',
		async: false,
		cache: false,
		dataType: 'json',
		success: function (cart){
			awe_hidePopup('.loading');

			$('#popupCartModal').html('');		
			if(jqXHR['image'] == null){
				src= 'https://hstatic.net/0/0/global/noDefaultImage6_large.gif'
			}
			else
			{
				src=  Haravan.resizeImage(jqXHR['image'], 'small')
			}

			if(jqXHR.variant_options == 'Default Title'){
				var fixtitle = jqXHR.title;
			}else{ 
				var fixtitle = jqXHR.title +" - " + jqXHR.variant_options;
			}

			var $popupMobile = '<div class="popup_overlay"></div>'
			+'<div class="modal-dialog">'

			+'<div class="modal-content">'
			+ '<button type="button" class="close" data-dismiss="modal" data-backdrop="false" aria-label="Close" style="position: relative; z-index: 9;"><span aria-hidden="true">×</span></button>'
			+ '<div class="row row-noGutter"><div class="modal-left col-sm-6">'
			+ '<h3 class="title"><i class="fa fa-check"></i> Sản phẩm đã được thêm vào giỏ hàng</h3>'

			+ '<div class="modal-body"><div class="media"><div class="media-left"><div class="thumb-1x1">'
			+ '<img src="'+ src +'" alt="'+ jqXHR['title'] +'"></div></div>'
			+ '<div class="media-body"><div class="product-title">'+ fixtitle +'</div>'
			+ '<div class="product-new-price"><span>' + Haravan.formatMoney(jqXHR["price"], "{{amount_no_decimals_with_comma_separator}}₫") + '</span></div></div></div>'
			+ '</div>'
			+ '</div>'
			+ '<div class="modal-right col-sm-6">'
			+ '<h3 class="title"><a href="/cart"><ion-icon name="cart"></ion-icon> Giỏ hàng của bạn (<span><span class="cart-popup-count"></span> sản phẩm</span>) </a></h3>'
			+ '<div class="total_price"><div class="total_price_h">Tổng tiền:</div> <div class="price">' + Haravan.formatMoney(cart.total_price, "{{amount_no_decimals_with_comma_separator}}₫") + 'đ</div></div>'
			+ '<a href="/checkout" class="btn btn-red button_gradient">Tiến hành thanh toán</a>'
			+ '</div>'
			+ '</div></div>';
			$('#popupCartModal').html($popupMobile);
			$('#popupCartModal').modal(); 	
			Haravan.updateCartFromForm(cart, '.top-cart-content .mini-products-list');
			Haravan.updateCartPopupForm(cart, '#popup-cart-desktop .tbody-popup');
		}
	});







}
function addToCartFail(jqXHR, textStatus, errorThrown){
	var response = $.parseJSON(jqXHR.responseText);
	var $info = '<div class="error">'+ response.description +'</div>';
}
$(document).on('click', ".remove-item-cart", function () {
	var variantId = $(this).attr('data-id');
	removeItemCart(variantId);
});
$(document).on('click', ".items-count", function () {
	$(this).parent().children('.items-count').prop('disabled', true);
	var thisBtn = $(this);
	var variantId = $(this).parent().find('.variantID').val();
	var qty =  $(this).parent().children('.number-sidebar').val();
	updateQuantity(qty, variantId);
});
$(document).on('change', ".number-sidebar", function () {
	var variantId = $(this).parent().children('.variantID').val();
	var qty =  $(this).val();
	updateQuantity(qty, variantId);
});
function updateQuantity (qty, variantId){
	var variantIdUpdate = variantId;
	$.ajax({
		type: "POST",
		url: "/cart/change.js",
		data: 'quantity='+qty+'&id=' + variantId,
		dataType: "json",
		success: function (cart, variantId) {
			Haravan.onCartUpdateClick(cart, variantIdUpdate);
			Haravan.updateCartFromForm(cart, '.top-cart-content .mini-products-list');
		},
		error: function (qty, variantId) {
			Haravan.onError(qty, variantId)
		}
	})
}
function removeItemCart (variantId){
	var variantIdRemove = variantId;
	$.ajax({
		type: "POST",
		url: "/cart/change.js",
		data: 'quantity=0&id=' + variantId,
		dataType: "json",
		success: function (cart, variantId) {
			Haravan.onCartRemoveClick(cart, variantIdRemove);

			$('.productid-'+variantIdRemove).remove();
			if($('.tbody-popup>div').length == '0' ){
				$('#popup-cart').modal('hide');
			}
			if($('.list-item-cart>li').length == '0' ){
				$('.mini-products-list').html('<div class="no-item"><p>Không có sản phẩm nào trong giỏ hàng.</p></div>');
			}
			if($('.cart-tbody>div').length == '0' ){
				$('.bg-cart-page').remove();
				$('.page_cart div').remove();
				$('.bg-cart-page-mobile').remove();
				jQuery('<div class="bg-cart-page" style="min-height: auto"><p>Không có sản phẩm nào trong giỏ hàng. Quay lại <a href="/">cửa hàng</a> để tiếp tục mua sắm.</p></div>').appendTo('.cart');
			}
			if($('.cart_page_mobile .item-product').length == '0'){
				$('.cart_page_mobile, .header-cart-price').remove();
				$('.header-cart-content').html('<p>Không có sản phẩm nào trong giỏ hàng. Quay lại <a href="/">cửa hàng</a> để tiếp tục mua sắm.</p>');
			}
		},
		error: function (variantId, r) {
			Haravan.onError(variantId, r)
		}
	})
}