function new_payment(){
	action = document.getElementById('payment').getAttribute( 'action' );
	action = action.replace( 'submit.php', '' );
	document.getElementById('payment').setAttribute( 'action', action );
	document.getElementById('payment').submit();
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