function hasClass( el, clss ) {
	return el.className && new RegExp( "(^|\\s)" + clss + "(\\s|$)" ).test( el.className );
}

function exchangeClass( element, firstClass, secondClass ){
	if( element==null || element.classList==null ) return;
	if( hasClass( element, firstClass ) ) {
		element.classList.add( secondClass ); // += (' ' + toAdd);
		element.classList.remove( firstClass );
	}else{
		element.classList.add( firstClass ); // += (' ' + toAdd);
		element.classList.remove( secondClass );
	}
}

function closestParentByClassName( el, clss ){
	while( !hasClass( el, clss ) ){
		el = el.parentNode;
		if( !el ){
			return null;
		}
	}
	return el;
}

function get_string( checkboxes ){
	var string = '';
	var array = new Array();
	for( var j=0; j < checkboxes.length; j++ ){
		value = checkboxes[j].getAttribute( 'value' );
		if( hasClass( checkboxes[j], 'checked' ) ) array.push( value );
	}
	string = array.join( '+' );
	return string;
}

window.onload = function(){
	var daily_man_power = document.getElementById( 'daily_man_power' ).value;
	var man_hour_fee = document.getElementById( 'man_hour_fee' ).value;
	var total_price = document.getElementById( 'total_price' );
	var total_time = document.getElementById( 'total_time' );
	var checkboxes = document.getElementsByClassName( 'checkbox' );
	var post_types = document.getElementsByClassName( 'post_type' );
	for( var i=0; i < checkboxes.length; i++ ){
		checkboxes[i].onclick = function(){
			exchangeClass( this, 'checked', 'unchecked' );
			var section = closestParentByClassName( this, 'section' );
			if( section ){
				id = this.getAttribute( 'value' );
				children = section.getElementsByClassName( 'children' + id );
				if( children ){
					coselection = section.getElementsByClassName( 'coselection children' + id );
					if( hasClass( this, 'checked' ) ){
						for( var j=0; j < coselection.length; j++ ){
							coselection[j].classList.add( 'checked' );
							coselection[j].classList.remove( 'unchecked' );
						}
					}else{
						for( var j=0; j < children.length; j++ ){
							children[j].classList.add( 'unchecked' );
							children[j].classList.remove( 'checked' );
						}
					}
				}
				var visible = section.getElementsByClassName( 'description visible' )[0];
				exchangeClass( visible, 'hidden', 'visible' );
			}
			var checked = document.getElementsByClassName( 'checkbox checked' );
			var sum = 0;
			for( var j=0; j < checked.length; j++ ){
				if( checked[j].getAttribute( 'workforce' ) ){
					workforce = checked[j].getAttribute( 'workforce' );
				}else{
					workforce = 0;
				};
				sum = sum + parseInt( workforce, 10 );
			}
			total_price.innerHTML = sum * man_hour_fee;
			total_time.innerHTML = Math.ceil( sum / daily_man_power );
			var post_type = closestParentByClassName( this, 'post_type' );
			if( post_type ){
				var pt_checked = post_type.getElementsByClassName( 'checkbox checked' );
				sum = 0;
				for( var j=0; j < pt_checked.length; j++ ){
					if( pt_checked[j].getAttribute( 'workforce' ) ){
						workforce = pt_checked[j].getAttribute( 'workforce' );
					}else{
						workforce = 0;
					};
					sum = sum + parseInt( workforce, 10 );
				}
				your_pt_price = post_type.getElementsByClassName( 'your_pt_price' )[0];
				your_pt_price.innerHTML = sum * man_hour_fee;
			}
			var description = this.getElementsByClassName( 'description' )[0];
			exchangeClass( description, 'hidden', 'visible' );
			string = get_string( checkboxes );
			document.getElementsByName( 'string' )[0].setAttribute( 'value', string );
		}
	}

	var radios = document.getElementsByClassName( 'radio' );
	for( var i=0; i < radios.length; i++ ){
		radios[i].onclick = function(){
			var section = closestParentByClassName( this, 'section' );
			if( section ){
				var siblings = section.getElementsByClassName( 'radio' );
				if( siblings ){
					for( var j=0; j < siblings.length; j++ ){
						siblings[j].classList.remove( 'checked' );
						siblings[j].classList.add( 'unchecked' );
					}
				}
				this.classList.remove( 'unchecked' );
				this.classList.add( 'checked' );
				var visible = section.getElementsByClassName( 'description visible' )[0];
				exchangeClass( visible, 'hidden', 'visible' );
			}
			if( this.hasAttribute( 'preselection' ) ){
				for( var j=0; j < checkboxes.length; j++ ){
					if( hasClass( checkboxes[j], 'checked') ){
						checkboxes[j].classList.remove( 'checked' );
						checkboxes[j].classList.add( 'unchecked' );
					}
				}
				preselection_str = this.getAttribute( 'preselection' );
				preselection_array = preselection_str.split( '+' );
				if( preselection_array ){
					for( var j=0; j < post_types.length; j++ ){
						your_pt_price = post_types[j].getElementsByClassName( 'your_pt_price' )[0];
						your_pt_price.innerHTML = 0;
					}
					preselection = document.getElementById( 'option' + preselection_array[0] )
					temp = closestParentByClassName( preselection, 'post_type' );
					sum = 0;
					for( var j=0; j < preselection_array.length; j++ ){
						preselection = document.getElementById( 'option' + preselection_array[j] )
						preselection.classList.remove( 'unchecked' );
						preselection.classList.add( 'checked' );
						if( preselection.getAttribute( 'workforce' ) ){
							workforce = preselection.getAttribute( 'workforce' );
						}else{
							workforce = 0;
						};
						post_type = closestParentByClassName( preselection, 'post_type' );
						if( temp != post_type ){
							your_pt_price = temp.getElementsByClassName( 'your_pt_price' )[0];
							your_pt_price.innerHTML = sum * man_hour_fee;
							sum = 0;
							temp = post_type;
						}
						sum = sum + parseInt( workforce, 10 );
						if( j + 1 == preselection_array.length ){
							your_pt_price = temp.getElementsByClassName( 'your_pt_price' )[0];
							your_pt_price.innerHTML = sum * man_hour_fee;
						}
					}
				}
				string = get_string( checkboxes );
				document.getElementsByName( 'string' )[0].setAttribute( 'value', string );
			}
			var checked = document.getElementsByClassName( 'checkbox checked' );
			var sum = 0;
			for( var j=0; j < checked.length; j++ ){
				if( checked[j].getAttribute( 'workforce' ) ){
					workforce = checked[j].getAttribute( 'workforce' );
				}else{
					workforce = 0;
				};
				sum = sum + parseInt( workforce, 10 );
			}
			total_price.innerHTML = sum * man_hour_fee;
			total_time.innerHTML = Math.ceil( sum / daily_man_power );
			var description = this.getElementsByClassName( 'description' )[0];
			exchangeClass( description, 'hidden', 'visible' );
		}
	}

	
}