function hasClass( el, clss ) {
	return el.className && new RegExp( "(^|\\s)" + clss + "(\\s|$)" ).test( el.className );
}

function new_payment(){
	action = document.getElementById('payment').getAttribute( 'action' );
	action = action.replace( 'submit/', '' );
	document.getElementById('payment').setAttribute( 'action', action );
	document.getElementById('payment').submit();
}

function menu_box(){
	menu_box = document.getElementById( 'menu_box' );
	top_menu = document.getElementById( 'top_menu' );
	menu_box.onclick = function(){
		if( hasClass( top_menu, 'mhidden' ) ){
			top_menu.classList.remove( 'mhidden' );
		}else{
			top_menu.classList.add( 'mhidden' );
		}
	}
}

function msg_reporting(){
	var alerts = document.getElementById('alerts');
	if (alerts) {
		var alert = alerts.getElementsByClassName('alert');
		setTimeout(function() {
			var interval = setInterval(function() {
				alerts.removeChild(alert[0]);
				if (!alert.length) {
					clearInterval(interval)
				}
			}, 3000);
		}, 5000);
	}
}